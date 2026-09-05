# Design — Fiche profil utilisateur

Date : 2026-09-05

---

## 1. Contexte et objectif

Une page « Mon profil » minimale existe déjà (`app_profile` → `ProfileController::index`, template `profile/index.html.twig`), créée avec le header d'authentification (spec `auth-header-menu.md`) : elle affiche uniquement nom, e-mail et rôles.

**Objectif** : enrichir cette page en **fiche profil utilisateur** complète :
- affichage soigné des infos de compte (avatar, nom, e-mail, rôles lisibles, date d'inscription, statut),
- **édition** des informations (nom, e-mail, avatar),
- **changement de mot de passe** (séparé, sécurisé).

Le profil concerne **uniquement le compte utilisateur** — aucun volet « personnages » (pas d'entité dédiée à ce jour).

## 2. Décisions validées

| Sujet | Décision |
|---|---|
| Portée | **Lecture + édition** (nom, e-mail, mot de passe) |
| Avatar | **Upload** via VichUploader (déjà installé, mapping à activer) + fallback initiale |
| Personnages RPG | **Hors périmètre** — infos de compte uniquement |
| Page technique | Fiche sur `/profile`, formulaire d'édition sur `/profile/edit` |
| Mot de passe | Formulaire **séparé**, exige l'**ancien mot de passe** |
| Changement d'e-mail | Modifiable **sans re-confirmation** (limite assumée, cf. §6) |

## 3. Modèle de données

### 3.1 `User` — champs ajoutés

| Champ | Type | Notes |
|---|---|---|
| `avatarName` | string, nullable | nom de fichier stocké (géré par VichUploader) |
| `avatarFile` | *non mappé* | upload SkipMe (`VichImageType`), le fichier physique n'est pas une colonne |
| `createdAt` | `datetime_immutable`, nullable | date d'inscription (affichage fiche) |

### 3.2 Migration / backfill

- Migration Doctrine : ajout des colonnes `avatar_name` et `created_at`.
- **Backfill** : les utilisateurs existants reçoivent `created_at = NOW()` (requête de migration, une seule fois).
- Les **nouveaux** comptes : `createdAt` renseigné au moment de l'inscription (`RegistrationController` → `setCreatedAt(new DateTimeImmutable())`, ou prePersist listener).

### 3.3 VichUploader

Dans `config/packages/vich_uploader.yaml`, activer un mapping :

```yaml
vich_uploader:
    db_driver: orm
    mappings:
        user_avatar:
            uri_prefix: /uploads/avatars
            upload_destination: '%kernel.project_dir%/public/uploads/avatars'
            namer: Vich\UploaderBundle\Naming\SmartUniqueNamer
```

- Validation du fichier : image (`image/png|jpeg|webp|gif`), max **~2 Mo**.
- **Pas de purge** de l'ancien fichier en cas de remplacement (listener dédié = hors périmètre, fichiers possiblement orphelins acceptés).

## 4. Routes & contrôleur

### 4.1 Routes

| Route | URL | Méthodes | Rôle requis |
|---|---|---|---|
| `app_profile` | `/profile` | `GET` | `IS_AUTHENTICATED_FULLY` |
| `app_profile_edit` | `/profile/edit` | `GET`, `POST` | `IS_AUTHENTICATED_FULLY` |

- L'utilisateur ne modifie que **son propre** profil : le contrôleur agit sur `$this->getUser()` (jamais d'id en paramètre d'URL).
- Contrôleur `ProfileController` étendu :
  - `index()` — affiche la fiche (l'existant, enrichi),
  - `edit()` — gère le formulaire infos + le formulaire mot de passe.

## 5. Formulaires

Deux formulaires **distincts** sur `/profile/edit` (évite tout conflit de champ mappé entre envois).

### 5.1 `ProfileFormType` (nom, e-mail, avatar)

- `username` : texte requis (min/max raisonnable) ;
- `email` : e-mail requis, unique (`UniqueEntity` déjà actif sur `User`) ;
- `avatarFile` : `VichImageType`, requis `false`.

### 5.2 `ChangePasswordFormType` (mot de passe)

- `currentPassword` : requis, vérifié par `UserPasswordHasherInterface::isPasswordValid()` ;
- `newPassword` + `newPasswordConfirm` : requis, identiques (contrainte).

Chaque formulaire est soumis de façon indépendante (bouton dédié, redirection vers `/profile` avec flash `success`).

## 6. Rendu (front)

### 6.1 `profile/index.html.twig` (fiche)

- **Avatar** : image uploadée si `avatarName`, sinon disque avec l'initiale (réutilisation du rendu initiale du header).
- **Nom** (`username`), **e-mail** (`email`), **statut vérifié** (`isVerified` → badge « E-mail vérifié » / « Non vérifié »).
- **Rôles** en libellés lisibles :

| Rôle | Libellé |
|---|---|
| `ROLE_SUPER_ADMIN` | Super administrateur |
| `ROLE_ADMIN` | Administrateur |
| `ROLE_EDITOR` | Éditeur |
| défaut | Membre |

- **Date d'inscription** (`createdAt`, format lisible, ex. `d/m/Y`).
- Bouton « **Modifier mes informations** » → `app_profile_edit`.

### 6.2 `profile/edit.html.twig` (édition)

Deux cartes :
1. **Informations** : `ProfileFormType` (nom, e-mail, upload avatar + aperçu).
2. **Sécurité** : `ChangePasswordFormType` (mot de passe actuel, nouveau, confirmation).

Style réutilise la section `auth-card` (palette `#efdcbb→#e6cda2`, champs, boutons `auth-btn`).

### 6.3 Navigation

Le menu utilisateur pointe déjà sur `app_profile` (« Mon profil ») — sans changement.

## 7. Fichiers impactés

| Fichier | Action |
|---|---|
| `webroot/src/Entity/User.php` | + `avatarName`, `avatarFile` (non mappé), `createdAt` |
| Doctrine migration | `avatar_name`, `created_at` + backfill |
| `webroot/config/packages/vich_uploader.yaml` | Mapping `user_avatar` |
| `webroot/src/Controller/ProfileController.php` | + `edit()` ; page copyrights |
| `webroot/src/Form/ProfileFormType.php` | **NOUVEAU** |
| `webroot/src/Form/ChangePasswordFormType.php` | **NOUVEAU** |
| `webroot/templates/profile/index.html.twig` | Fiche enrichie |
| `webroot/templates/profile/edit.html.twig` | **NOUVEAU** — édition |
| `webroot/assets/styles/app.css` | Styles fiche profil (variantes `auth-card`) |
| `webroot/src/Controller/RegistrationController.php` | `setCreatedAt` à l'inscription |

## 8. Hors périmètre (futur)

- Volet « personnages » RPG
- Re-confirmation d'e-mail après changement d'adresse
- Purge des anciens fichiers d'avatar
- Rôles éditables par l'utilisateur (reste dans l'admin Sonata)

## 9. Critères d'acceptation

- [ ] `/profile` affiche : avatar (uploadé ou initiale), nom, e-mail, badge de vérification, rôles lisibles, date d'inscription.
- [ ] `/profile/edit` permet de changer nom et e-mail (unicité respectée) et de remplacer l'avatar.
- [ ] Le mot de passe se change uniquement avec le bon mot de passe actuel + confirmation.
- [ ] Après chaque sauvegarde : flash de succès + redirection vers `/profile`.
- [ ] Un utilisateur ne peut modifier que son propre profil (tentative sur un autre id impossible).
- [ ] Les nouveaux comptes ont un `createdAt` ; les anciens comptes sont backfillés.
- [ ] Migration doctrine appliquée sans perte de données.
- [ ] Rendu cohérent avec la palette du site, responsive.

## 10. Suivi

- Mise à jour de `specs/auth-header-menu.md` (§8 « Hors périmètre ») : retirer « Édition du profil » et « Upload d'avatar », désormais couverts par la présente spec.