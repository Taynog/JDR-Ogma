# Design — Header d'authentification et menu utilisateur

Date : 2026-09-05

---

## 1. Contexte et objectif

Le site « Ogma » dispose d'une **sidebar gauche** (`frontend/navBar.html.twig`) qui contient toute la navigation. La zone d'authentification (`sidenav__item--auth`) se trouve tout **en bas** de cette sidebar :

- **déconnecté** : « Connexion » + « Créer un compte »
- **connecté** : « Connecté : <nom> », lien « Administration » (si rôle), lien « Déconnexion »

**Objectif** : déplacer cette zone d'authentification hors de la sidebar vers un **bloc compact fixe dans le coin supérieur droit** de l'écran, visible sur toutes les pages, et remplacer les liens plats par un **menu utilisateur** (profil, administration, déconnexion) une fois connecté.

**Objectif secondaire** : fournir une **page « Mon profil »** jusqu'ici inexistante.

## 2. Décisions validées

| Sujet | Décision |
|---|---|
| Emplacement | **Bloc compact fixe en haut à droite** (pas de bande pleine largeur) |
| Bouton connexion (déconnecté) | Dans le header, à droite |
| Menu utilisateur (connecté) | Menu déroulant dans le header : **Profil**, **Administration** (si rôle), **Déconnexion** |
| Zone auth de la sidebar | **Supprimée** de `navBar.html.twig` (déplacée vers le header) |
| Page profil | À **créer** (`app_profile`), contenu minimal |
| Accès admin | L'affichage du lien « Administration » reste conditionné à `ROLE_ADMIN` / `ROLE_EDITOR` |
| Responsive | Sur mobile, le header reste visible et le menu reste accessible (voir §6) |

## 3. Architecture

### 3.1 Structure DOM

Le header est un petit **bloc flottant** (pilule dégradée `#e6cda2` semi-transparente, bordure arrondie) dans le coin supérieur droit, inclus dans `base.html.twig` **au-dessus** de la sidebar :

```
<body>
  {% include '@App/frontend/header.html.twig' %}    <!-- NOUVEAU -->
  {% include '@App/frontend/navBar.html.twig' %}    <!-- existant (zone auth supprimée) -->
  <div id="main">...</div>
</body>
```

### 3.2 Comportement du menu (dès connecté)

- Clic sur le bouton du header (avatar + nom) → ouvre/ferme le menu déroulant.
- Clic en dehors du menu / touche `Échap` → ferme le menu.
- Le menu se ferme après sélection d'un lien.
- Un seul menu ouvert à la fois (pas de conflit avec la sidebar).

### 3.3 État déconnecté

Dans le header, à droite : lien « **Connexion** » → `app_login`, et lien « **Créer un compte** » → `app_register`. (Reprise du libellé et des routes existants.)

### 3.4 État connecté

Bouton compact dans le **coin supérieur droit** du header (simple avatar rond) :
- l'**avatar** : cercle avec l'initiale du nom (aucun avatar uploadé, pas de VichUploader pour User) — couleur unique par utilisateur dérivée du nom (hash).
- le **nom** et l'**e-mail** sont affichés en en-tête du menu déroulant.

Menu déroulant (sous l'avatar) :
1. **En-tête** : nom (`app.user.username ?? app.user.userIdentifier`) + e-mail
2. **Mon profil** → `app_profile`
3. **Administration** → `sonata_admin_dashboard` (seulement si `ROLE_ADMIN` ou `ROLE_EDITOR`)
4. **Déconnexion** → `app_logout`

## 4. Page « Mon profil » (`app_profile`)

- **Route** : `app_profile`, méthode `GET/POST` (modification possible en POST, à confirmer à l'implémentation).
- **Contrôleur** : nouveau `ProfileController` (ou méthode dans `FrontendController`), accessible **uniquement connecté** (`#[IsGranted('IS_AUTHENTICATED_FULLY')]` ou `is_granted` vérifié).
- **Template** : `templates/profile/index.html.twig`, étend `base.html.twig`.
- **Contenu minimal** :
  - Nom (`username`)
  - E-mail (`email` / `userIdentifier`)
  - Rôles (affichés en clair)
  - Lien retour à l'accueil
- **Hors périmètre** : édition des données (futur), avatar, mot de passe.

## 5. Styles

Ajouter au scroll SCSS/CSS existant (`assets/styles/app.css`) une section « Header » :

- `.site-header` : `position: fixed`, **coin supérieur droit** (`top: 8px; right: 12px`), z-index élevé — pas de bande pleine largeur.
- `.site-header__auth` : pilule compacte (fond `#e6cda2` semi-transparent, `border-radius`, ombre légère).
- `.user-menu` (menu déroulant) : fond clair, ombre, bordure ; liens alignés à gauche.
- **La sidebar, `#main` et le `nav-tab` ne sont pas décalés** (le header flotte au-dessus du contenu).

## 6. Responsive / mobile

- Header présent sur toutes les tailles d'écran.
- État connecté : bouton menu réduit à l'avatar + initiale (le nom est déjà hors du bouton, il figure en en-tête du menu).
- Le menu déroulant doit rester à l'écran (alignement à droite, `max-width`, scroll si nécessaire).

## 7. Fichiers impactés

| Fichier | Action |
|---|---|
| `webroot/templates/base.html.twig` | Ajouter l'inclusion du header |
| `webroot/templates/frontend/header.html.twig` | **NOUVEAU** — header + menu utilisateur |
| `webroot/templates/frontend/navBar.html.twig` | **Supprimer** le bloc `sidenav__item--auth` (lignes ~315-328) |
| `webroot/assets/styles/app.css` | Ajouter section bloc utilisateur (+ menu) ; sidebar/`#main` inchangés |
| `webroot/assets/app.js` (ou controller Stimulus) | Logique d'ouverture/fermeture du menu |
| `webroot/src/Controller/ProfileController.php` | **NOUVEAU** — page Mon profil |
| `webroot/templates/profile/index.html.twig` | **NOUVEAU** — template profil |

## 8. Hors périmètre (futur)

- ~~Édition du profil (changer nom / e-mail / mot de passe)~~ → couvert par `profile-page.md`
- ~~Upload d'avatar~~ → couvert par `profile-page.md`
- Page « Mes personnages »
- Notifications / messages

## 9. Critères d'acceptation

- [ ] La zone auth n'est plus en bas de la sidebar.
- [ ] Le bloc utilisateur s'affiche en haut à droite sur toutes les pages, sans bande pleine largeur.
- [ ] Déconnecté : lien « Connexion » + « Créer un compte » visibles dans le bloc.
- [ ] Connecté : un bouton compact (avatar + initiale) affiche un menu déroulant contenant un en-tête (nom + e-mail), Mon profil, Administration (si rôle) et Déconnexion.
- [ ] Le menu se ferme au clic extérieur et à `Échap`.
- [ ] « Mon profil » ouvre une page accessible uniquement connecté, affichant nom, e-mail et rôles.
- [ ] Déconnexion fonctionne toujours et recharge proprement le bloc.
- [ ] La sidebar et `#main` gardent leur position d'origine (le bloc flotte au-dessus du contenu).
- [ ] Rendu correct sur mobile (bloc visible, menu déroulant aligné à droite).