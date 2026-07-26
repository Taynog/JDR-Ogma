# Plan de conversion — PHP brut → Symfony 6.4

Date : 2026-07-24

---

## 1. État des lieux

### 1.1 Branches

| Branche | Description | HEAD |
|---|---|---|
| `master` | Application PHP brut d'origine (InfinityFree) | `23b3da8` |
| `symfony` | Début de conversion Symfony | `71821d1` |
| `symfony-agent` | Branche de travail agent (actuelle) | `c013693` |

### 1.2 Structure du master (PHP brut)

```
/
├── index.php              → Page d'accueil (images factions + changelog)
├── header.php             → Layout HTML + sidenav (navigation latérale)
├── footer.php             → JS include + closing tags
├── Data/
│   ├── Rules/             → 15 fichiers PHP (pages de règles)
│   ├── Factions/          → 11 fichiers PHP (pages de factions)
│   └── World/             → 3 fichiers PHP (lore monde)
├── Images/                → Images factions, etc.
├── Styles/                → CSS
└── Javascript/            → JS
```

### 1.3 Structure actuelle Symfony

```
webroot/
├── src/
│   ├── Controller/        → 4 contrôleurs (Rules, Frontend, Security, Registration)
│   ├── Entity/            → 19 entités Doctrine
│   ├── Repository/        → 17 repositories
│   ├── Admin/             → 16 admins Sonata
│   └── Form/
├── templates/
│   ├── base.html.twig     → Layout principal (navbar + Webpack Encore)
│   ├── rules/             → 15 fichiers + 2 includes
│   ├── factions/          → 11 fichiers
│   ├── world/             → 3 fichiers
│   ├── frontend/          → navBar.html.twig, webcontent.html.twig
│   ├── pages/             → accueil.html.twig
│   ├── security/          → login.html.twig
│   └── registration/      → register.html.twig, confirmation_email.html.twig
├── config/
├── migrations/
└── ...
```

---

## 2. Correspondance master → Symfony

### 2.1 Pages de règles (Data/Rules/)

| PHP Master | Twig Template | Statut | Route | Données BDD |
|---|---|---|---|---|
| `Systeme.php` | `rules/systeme.html.twig` | ✅ Converti | `app_rules_index` (`/regles/`) | Non |
| `Personnage.php` | `rules/personnage.html.twig` | ✅ Converti | `app_rules_character` (`/regles/personnage`) | Non |
| `Magie.php` | `rules/magie.html.twig` | ✅ Converti | `app_rules_magic` (`/regles/magie`) | `sort` (injecté via SortRepository) |
| `Combat.php` | `rules/combat.html.twig` | ✅ Converti | `app_rules_combat` (`/regles/combat`) | Non |
| `Types_actions.php` | `rules/types_actions.html.twig` | ✅ Converti | `app_rules_types_actions` (`/regles/types-actions`) | Non |
| `Survie.php` | `rules/survie.html.twig` | ✅ Converti | `app_rules_survival` (`/regles/survie`) | Non |
| `Artisanat.php` | `rules/artisanat.html.twig` | ✅ Converti | `app_rules_crafting` (`/regles/artisanat`) | Non |
| `Objets.php` | `rules/objets.html.twig` | ✅ Converti | `app_rules_items` (`/regles/objets`) | `item` + `item_category` (injecté via ItemCategoryRepository) |
| `ObjetsBDD.php` | `rules/objetsbdd.html.twig` | ✅ Converti | `app_rules_objets_bdd` (`/regles/objets-services`) | `item` + `item_category` (injecté) |
| `Armes.php` | `rules/armes.html.twig` | ✅ Converti | `app_rules_weapons` (`/regles/armes`) | `weapon` + `weapon_category` (injecté) |
| `Armures.php` | `rules/armures.html.twig` | ✅ Converti | `app_rules_armors` (`/regles/armures`) | `armor` (injecté, affiché par catégorie) |
| `Glossaire.php` | `rules/glossaire.html.twig` | ✅ Dynamisé | `app_rules_glossary` (`/regles/glossaire`) | `glossary_condition` (21 lignes) + `glossary_trait` (27 lignes) injectés |
| `Gabarit.php` | `rules/gabarit.html.twig` | ✅ Converti | `app_rules_gabarit` (`/regles/gabarit`) | Non |
| `arts_du_combat.php` | `rules/arts_du_combat.html.twig` | ✅ Dynamisé | `app_rules_arts_combat` (`/regles/arts-du-combat`) | `combat_art` (51 lignes, 3 sections avec rowspan dynamique) |
| `Recherche.php` | `rules/recherche.html.twig` | ✅ Converti | `app_rules_search` (`/regles/recherche`) | `sort` (injecté via SortRepository::search()) |

### 2.2 Pages de factions (Data/Factions/)

| PHP Master | Twig Template | Statut | Route |
|---|---|---|---|
| `Azuma.php` | `factions/azuma.html.twig` | ✅ Converti | `app_factions` (`/factions/{faction}`) |
| `Chono.php` | `factions/chono.html.twig` | ✅ Converti | `app_factions` |
| `Kanta.php` | `factions/kanta.html.twig` | ✅ Converti | `app_factions` |
| `Mushuk.php` | `factions/mushuk.html.twig` | ✅ Converti | `app_factions` |
| `Sakha.php` | `factions/sakha.html.twig` | ✅ Converti | `app_factions` |
| `Sarpa.php` | `factions/sarpa.html.twig` | ✅ Converti | `app_factions` |
| `Sever.php` | `factions/sever.html.twig` | ✅ Converti | `app_factions` |
| `Sihir.php` | `factions/sihir.html.twig` | ✅ Converti | `app_factions` |
| `Steinn.php` | `factions/steinn.html.twig` | ✅ Converti | `app_factions` |
| `Tori.php` | `factions/tori.html.twig` | ✅ Converti | `app_factions` |
| `Tuskizi.php` | `factions/tuskizi.html.twig` | ✅ Converti | `app_factions` |

### 2.3 Pages monde (Data/World/)

| PHP Master | Twig Template | Statut | Route |
|---|---|---|---|
| `Histoire_Ogma.php` | `world/histoire_ogma.html.twig` | ✅ Converti | `app_univers` (`/univers/{page}`) |
| `Carte_Ogma.php` | `world/carte_ogma.html.twig` | ✅ Converti | `app_univers` |
| `Bestiaire.php` | `world/bestiaire.html.twig` | ✅ Converti | `app_univers` |

### 2.4 Pages d'accueil et layout

| PHP Master | Twig Template | Statut | Route |
|---|---|---|---|
| `index.php` | `pages/accueil.html.twig` | ✅ Converti | `app_index` (`/`) |
| `header.php` | `base.html.twig` + `frontend/navBar.html.twig` | ⚠️ Partiellement | N/A (layout) |
| `footer.php` | Webpack Encore | ✅ Converti | N/A |

### 2.5 Authentification

| Composant | Statut |
|---|---|
| Login (form login, email provider, CSRF) | ✅ `SecurityController` + `security/login.html.twig` |
| Registration + vérification email | ✅ `RegistrationController` + templates |
| Entity User + UserInterface | ✅ |

---

## 3. Problèmes identifiés

### 3.1 Templates sans route (priorité haute) — ✅ RÉSOLU

~~Ces templates existaient dans `templates/rules/` mais n'avaient aucune route defined dans `RulesController`~~ — Toutes les routes ont été ajoutées (2026-07-23).

### 3.2 Template encore en PHP brut (priorité haute) — ✅ RÉSOLU

~~**`recherche.html.twig`**~~ — Entièrement réécrit en Twig pur (2026-07-23). Nouvelle entité `Sort` créée + `SortRepository` + route `app_rules_search` + Twig extension `AppExtension` avec `calc_dc()` et `calc_mag()`.

### 3.3 Template avec code PHP non converti (priorité haute) — ✅ RÉSOLU

~~**`armures.html.twig`**~~ — Code PHP commenté supprimé, `print_armures()` converti en boucle Twig, `print_boucliers()` remplacé par un placeholder (2026-07-23).

### 3.4 Liens internes cassés dans la NavBar (priorité haute) — ✅ RÉSOLU

~~`frontend/navBar.html.twig`~~ — Tous les 14+ liens corrigés vers `{{ path() }}` (2026-07-23).

### 3.5 Données BDD non exploitées (priorité moyenne) — ✅ RÉSOLU (code)

| Table BDD | Entity | Nb lignes | Utilisation actuelle | Potentiel |
|---|---|---|---|---|
| `combat_art` | `CombatArt` | 51 (37+14) | ✅ Dynamisé — 3 sections (basics/specialist/arts) avec rowspan Twig | OK |
| `item` + `item_category` | `Item`, `ItemCategory` | ✅ 59 items, 13 catégories | ✅ Injecté dans `objets` et `objetsbdd` routes | OK |
| `sort` | `Sort` | ✅ 59 sorts | ✅ Injecté dans `magie` et `recherche` routes | OK |
| `glossary_condition` | `GlossaryCondition` | 21 | ✅ Dynamisé — boucle Twig dans `glossaire.html.twig` | OK |
| `glossary_trait` | `GlossaryTrait` | 27 | ✅ Dynamisé — boucle Twig dans `glossaire.html.twig` | OK |
| `weapon_property` | `WeaponProperty` | 25 | ✅ Utilisé via `includes/printWeaponProperties.html.twig` | OK |
| `stance` | `Stance` | Non vérifié | ❌ Pas utilisé | À voir |
| `skill` | `Skill` | Non vérifié | ❌ Pas utilisé | À voir |
| `material` | `Material` | Non vérifié | ❌ Pas utilisé | À voir |
| `damage_type` | `DamageType` | Non vérifié | ❌ Pas utilisé | À voir |

### 3.6 Code commenté à supprimer — ✅ RÉSOLU

~~**`armures.html.twig`** lignes 1-61~~ — Supprimé (2026-07-23).

---

## 4. BDD : tables et entités

### 4.1 Tables existantes dans ogma.sql (21 tables)

| Table | Entity Doctrine | Admin Sonata | Données |
|---|---|---|---|
| `armor` | `Armor` | ✅ | ✅ 15 armures (5×3 catégories) |
| `armor_material` | (ManyToMany `Armor` ↔ `Material`) | — | ✅ 15 liens (1:1 avec armor) |
| `changelog` | `Changelog` | ✅ | ❌ Vide |
| `combat_art` | `CombatArt` | ✅ | ✅ 51 lignes (37 originales + 14 ajoutées) |
| `damage_type` | `DamageType` | ✅ | ❌ Vide |
| `glossary_condition` | `GlossaryCondition` | ✅ | ✅ 21 lignes |
| `glossary_trait` | `GlossaryTrait` | ✅ | ✅ 27 lignes |
| `item` | `Item` | ✅ | ✅ 59 lignes |
| `item_category` | `ItemCategory` | ✅ | ✅ 13 lignes |
| `material` | `Material` | ✅ | ✅ 15 lignes |
| `skill` | `Skill` | ✅ | ❌ Vide |
| `stance` | `Stance` | ✅ | ❌ Vide |
| `user` | `User` | ❌ (auth) | À vérifier |
| `weapon` | `Weapon` | ✅ | ✅ 37 lignes |
| `weapon_category` | `WeaponCategory` | ✅ | ✅ 12 lignes |
| `weapon_property` | `WeaponProperty` | ✅ | ✅ 25 lignes |
| `weapon_property_details` | `WeaponPropertyDetails` | ✅ | ✅ Données |
| `weapon_property_weapon` | (ManyToMany `Weapon` ↔ `WeaponPropertyDetails`) | — | ✅ Données |
| `web_content` | `WebContent` | ✅ | ❌ Vide |

### 4.2 Tables manquantes (présentes dans master mais pas dans le schéma Symfony) — PARTIELLEMENT RÉSOLU

| Table master | Description | Action |
|---|---|---|
| `sorts` | Sorts/magie (utilisée par `Recherche.php`) | ✅ Entité `Sort` créée (2026-07-23). Migration à générer + données à importer. |
| `objets` | Objets (ancêtre de `item`?) | ✅ Remplacé par `Item`/`ItemCategory`. `print_objets()` converti en Twig. |
| `armures` | Armures (ancêtre de `armor`?) | ✅ Remplacé par `Armor`. Données à importer. |
| `boucliers` | Boucliers | ⏳ Pas encore créé. Placeholder dans le template. |
| `armes` | Armes (ancêtre de `weapon`?) | ✅ Remplacé par `Weapon`. Données importées. |

---

## 5. Décisions à prendre

### 5.1 Recherche de sorts (`Recherche.php`) — ✅ RÉSOLU

**Problème** : La page de recherche dans le master interrogeait une table `sorts` qui n'existait pas dans le schéma Doctrine actuel.

**Décision** : Option B — Créer l'entité `Sort`. Fait le 2026-07-23 :
- Entity `Sort` créée avec champs : id, effet, propriete, ecole, dc, magnitude, description, inkarnai
- `SortRepository` avec méthodes `findByEcole()` et `search()`
- Twig extension `AppExtension` avec fonctions `calc_dc()` et `calc_mag()` (portage des fonctions PHP originales)
- Route `app_rules_search` (`/regles/recherche`)
- Template `recherche.html.twig` réécrit en Twig pur
- Formulaire de recherche dans `magie.html.twig` mis à jour pour pointer vers la nouvelle route

**Action restante** : Générer la migration (`doctrine:migrations:diff`) et peupler la table `sort` via Sonata Admin.

### 5.2 Dynamisation du glossaire — ✅ RÉSOLU

**Problème** : Les tables `glossary_condition` (21 lignes) et `glossary_trait` (27 lignes) sont peuplées mais le template `glossaire.html.twig` affiche du contenu statique (copié-collé du PHP original).

**Décision** : Option A — Rendre dynamique. Fait le 2026-07-23 :
- Injection via `GlossaryConditionRepository` et `GlossaryTraitRepository` dans le contrôleur
- Boucles Twig avec filtrage alphabétique
- Filtre `slug` ajouté à `AppExtension` pour les ancres
- Toutes les textes utilisent `{{ 'key'|trans }}`

### 5.3 Dynamisation des arts du combat — ✅ RÉSOLU

**Problème** : `arts_du_combat.html.twig` contient des données hardcodées en HTML (37 manoeuvres). La table `combat_art` en BDD contient les mêmes données (37 lignes).

**Décision** : Option A — Rendre dynamique. Fait le 2026-07-23 :
- Entité `CombatArt` enrichie : `category`, `tier`, `orderIndex`, `section`, `critique` ajoutés
- Contrainte `unique` sur `name` supprimée (même nom pour différentes armes)
- 15 entrées manquantes ajoutées (Tir précis ×6 armes, Tir déstabilisant ×5, etc.) → 51 total
- 2 migrations Doctrine créées (schema + données)
- Repository avec méthodes `findBySection()`, `findGroupedByCategoryAndTier()`
- Template réécrit : 145 lignes (↓ de 688) avec boucles Twig + rowspans dynamiques
- Toutes les textes utilisent `{{ 'key'|trans }}` (20 clés dans `messages.fr.yaml`)

## 6. Plan d'action

### Phase 1 — Routes manquantes et navigation (priorité haute) — ✅ COMPLÉTÉE

1. **Ajouter les 4 routes manquantes dans `RulesController`** ✅
2. **Corriger `frontend/navBar.html.twig`** ✅
3. **Ajouter les liens manquants dans la NavBar** ✅

### Phase 2 — Conversion PHP → Twig (priorité haute) — ✅ COMPLÉTÉE

4. **Réécrire `recherche.html.twig`** ✅ — Entité `Sort` créée + Twig extension + route + template réécrit
5. **Corriger `armures.html.twig`** ✅ — PHP commenté supprimé, `print_armures()` converti, `print_boucliers()` remplacé par placeholder
6. **Corriger les liens internes dans les templates de règles** ✅ — Tous les liens `.php#`, `.xhtml#`, `../` convertis

### Phase 3 — Dynamisation des données BDD (priorité moyenne) — ✅ COMPLÉTÉE (code)

7. **Glossaire dynamisé** ✅ — `GlossaryConditionRepository` + `GlossaryTraitRepository` injectés, boucles Twig avec ancres `slug`
8. **Arts du combat dynamisés** ✅ — `CombatArt` enrichi (5 fields), 51 entrées, 3 sections avec rowspan Twig, 2 migrations
9. **Objets dynamiques** ✅ — `ItemCategoryRepository::findAll()` injecté dans les deux routes
10. **Sorts dynamisés** ✅ — `Sort` entity + `SortRepository` + Twig extension + macro `printSort()`
11. **Armures** ✅ — Template converti, table `armor` peuplée (15 armures), `material` peuplé (15 matériaux), `armor_material` peuplé (15 liens)
12. **Tables peuplées** ✅ — `sort` (59), `item`/`item_category` (59/13), `armor` (15), `material` (15), `armor_material` (15) — peuplés via migrations

### Phase 4 — Nettoyage (priorité basse) — ✅ COMPLÉTÉE

10. **Nettoyage de `armures.html.twig`** ✅
11. **Nettoyage des repositories** ✅ — Boilerplate commentée supprimée dans 15 repositories
12. **Nettoyage du code mort** ✅ — `User.php`, `login.html.twig`, `RegistrationController`
13. **Correction i18n RegistrationController** ✅ — Flash message traduit en français + email subject traduit
14. **Mise à jour du `conversion-review.md`** ✅

---

## 7. Estimation totale

| Phase | Effort | Statut |
|---|---|---|
| Phase 1 — Routes + Navigation | ~30 min | ✅ Complétée |
| Phase 2 — Conversion PHP → Twig | ~1-2h | ✅ Complétée |
| Phase 3 — Dynamisation BDD | ~2-3h | ✅ Complétée (code) |
| Phase 4 — Nettoyage | ~30 min | ✅ Complétée |
| **Reste** | | Bouclier entity, vérification serveur, matériaux (bonus/passifs)|

---

## 8. Fichiers modifiés

### Controllers
- `src/Controller/RulesController.php` — 17 routes (10 originales + 7 ajoutées), injection de données pour glossaire, arts du combat, magie, recherche, armes, armures, objets

### Templates
- `templates/frontend/navBar.html.twig` — 14+ liens corrigés + nouveaux ajouts
- `templates/rules/armures.html.twig` — PHP converti en Twig, code commenté supprimé
- `templates/rules/recherche.html.twig` — Entièrement réécrit en Twig
- `templates/rules/armes.html.twig` — `print_armures()` converti en Twig
- `templates/rules/objets.html.twig` — `print_objets()` converti en Twig
- `templates/rules/magie.html.twig` — 4 `print_effets()` convertis en Twig, utilisation macro `printSort()`
- `templates/rules/glossaire.html.twig` — Dynamisé avec `GlossaryCondition` + `GlossaryTrait`
- `templates/rules/arts_du_combat.html.twig` — Réécrit : 145 lignes (↓ de 688), 3 sections dynamiques
- `templates/rules/includes/printWeapons.html.twig` — Headers corrigés + traductions
- `templates/macros/sort.html.twig` — Macro `printSort()` pour les sorts

### Entities & Repositories (nouveaux/modifiés)
- `src/Entity/Sort.php` — Nouvelle entité pour les sorts
- `src/Entity/CombatArt.php` — Enrichi : `category`, `tier`, `orderIndex`, `section`, `critique` ajoutés
- `src/Repository/SortRepository.php` — Avec méthodes `findByEcole()` et `search()`
- `src/Repository/CombatArtRepository.php` — Avec méthodes `findBySection()`, `findGroupedByCategoryAndTier()`
- `src/Twig/AppExtension.php` — Fonctions `calc_dc()`, `calc_mag()`, `nb_cercles()`, filtre `slug()`

### Migrations (corrigées pour PostgreSQL)
- `migrations/Version20260723120000.php` — Ajoute colonnes `category`, `tier`, `critique`, `order_index`, `section` à `combat_art` + séquence ID
- `migrations/Version20260723120100.php` — Insère 14 nouvelles entrées (doublons d'armes pour weapon skills)
- `migrations/Version20260724000000.php` — Insère les 37 entrées originales du dump MySQL avec section/category/tier/critique

### Repositories (nettoyés)
- `src/Repository/ArmorRepository.php` — Boilerplate supprimée
- `src/Repository/ChangelogRepository.php` — Boilerplate supprimée
- `src/Repository/DamageTypeRepository.php` — Boilerplate supprimée
- `src/Repository/GlossaryConditionRepository.php` — Boilerplate supprimée
- `src/Repository/GlossaryTraitRepository.php` — Boilerplate supprimée
- `src/Repository/ItemCategoryRepository.php` — Boilerplate supprimée
- `src/Repository/ItemRepository.php` — Boilerplate supprimée
- `src/Repository/MaterialRepository.php` — Boilerplate supprimée
- `src/Repository/SkillRepository.php` — Boilerplate supprimée
- `src/Repository/StanceRepository.php` — Boilerplate supprimée
- `src/Repository/UserRepository.php` — Boilerplate supprimée
- `src/Repository/WebContentRepository.php` — Boilerplate supprimée
- `src/Repository/WeaponCategoryRepository.php` — Boilerplate supprimée
- `src/Repository/WeaponPropertyDetailsRepository.php` — Boilerplate supprimée
- `src/Repository/WeaponPropertyRepository.php` — Boilerplate supprimée

### Controllers (nettoyés)
- `src/Controller/RegistrationController.php` — Flash message + email subject traduits en français, commentaires scaffold supprimés

### Entities (nettoyées)
- `src/Entity/User.php` — Code mort supprimé dans `eraseCredentials()`

### Templates (nettoyés)
- `templates/security/login.html.twig` — Bloc remember-me commenté supprimé

### Traductions
- `translations/messages.fr.yaml` — Clé `registration.email_verified` ajoutée

### Documentation
- `specs/conversion-review.md` — Mis à jour
- `specs/conversion-plan.md` — Ce fichier
