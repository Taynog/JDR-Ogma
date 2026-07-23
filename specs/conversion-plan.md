# Plan de conversion — PHP brut → Symfony 6.4

Date : 2026-07-23

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
│   ├── Entity/            → 18 entités Doctrine
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
| `Glossaire.php` | `rules/glossaire.html.twig` | ⚠️ Statique uniquement | `app_rules_glossary` (`/regles/glossaire`) | `glossary_condition` + `glossary_trait` (non utilisé) |
| `Gabarit.php` | `rules/gabarit.html.twig` | ✅ Converti | `app_rules_gabarit` (`/regles/gabarit`) | Non |
| `arts_du_combat.php` | `rules/arts_du_combat.html.twig` | ✅ Converti | `app_rules_arts_combat` (`/regles/arts-du-combat`) | `combat_art` (37 lignes, injecté) |
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

### 3.5 Données BDD non exploitées (priorité moyenne) — PARTIELLEMENT RÉSOLU

| Table BDD | Entity | Nb lignes | Utilisation actuelle | Potentiel |
|---|---|---|---|---|
| `combat_art` | `CombatArt` | 37 | ✅ Injecté dans `arts_du_combat` route | OK |
| `item` + `item_category` | `Item`, `ItemCategory` | Vides | ✅ Injecté dans `objets` et `objetsbdd` routes (affichage conditionnel) | Peupler via Sonata |
| `sort` (nouveau) | `Sort` | Vides | ✅ Injecté dans `magie` et `recherche` routes | Peupler via Sonata |
| `glossary_condition` | `GlossaryCondition` | 21 | ❌ Pas utilisé — `glossaire.html.twig` est statique | Optionnel |
| `glossary_trait` | `GlossaryTrait` | 27 | ❌ Pas utilisé — idem | Optionnel |
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
| `armor` | `Armor` | ✅ | ❌ Vide |
| `armor_material` | (ManyToMany `Armor` ↔ `Material`) | — | ❌ Vide |
| `changelog` | `Changelog` | ✅ | ❌ Vide |
| `combat_art` | `CombatArt` | ✅ | ✅ 37 lignes |
| `damage_type` | `DamageType` | ✅ | ❌ Vide |
| `glossary_condition` | `GlossaryCondition` | ✅ | ✅ 21 lignes |
| `glossary_trait` | `GlossaryTrait` | ✅ | ✅ 27 lignes |
| `item` | `Item` | ✅ | ❌ Vide |
| `item_category` | `ItemCategory` | ✅ | ❌ Vide |
| `material` | `Material` | ✅ | ❌ Vide |
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

### 5.2 Dynamisation du glossaire

**Problème** : Les tables `glossary_condition` (21 lignes) et `glossary_trait` (27 lignes) sont peuplées mais le template `glossaire.html.twig` affiche du contenu statique (copié-collé du PHP original).

**Options** :
- **A) Rendre dynamique** : Injecter les données via `GlossaryConditionRepository` et `GlossaryTraitRepository`, utiliser des boucles Twig. Permet de modifier les données via Sonata Admin.
- **B) Rester statique** : Le contenu est le même, pas de maintenance BDD nécessaire. Plus simple.

**Recommandation** : Option B pour l'instant. Le contenu du glossaire est stable et rarement modifié. Réévaluer si besoin.

### 5.3 Dynamisation des arts du combat

**Problème** : `arts_du_combat.html.twig` contient des données hardcodées en HTML (37 manoeuvres). La table `combat_art` en BDD contient les mêmes données (37 lignes).

**Options** :
- **A) Rendre dynamique** : Injecter `CombatArtRepository::findAll()`, trier par catégorie (basique/avancé), afficher via boucle Twig. Permet la modification via Sonata.
- **B) Rester statique** : Le contenu est cohérent avec la BDD, pas de désynchronisation actuelle.

**Recommandation** : Option A. Les arts du combat sont susceptibles d'évoluer. Le rendre dynamique facilite la maintenance via Sonata Admin.

### 5.4 Dynamisation des objets BDD

**Problème** : `objetsbdd.html.twig` contient des données statiques (listes d'objets par catégorie). Les tables `item` et `item_category` existent en BDD mais sont vides.

**Options** :
- **A) Peupler la BDD et rendre dynamique** : Remplir `item` et `item_category` via Sonata, puis injecter les données.
- **B) Rester statique** : Garder le contenu en dur dans le template.

**Recommandation** : Option A. Les objets sont appelés à évoluer. Peupler la BDD via Sonata puis rendre dynamique.

---

## 6. Plan d'action

### Phase 1 — Routes manquantes et navigation (priorité haute) — ✅ COMPLÉTÉE

1. **Ajouter les 4 routes manquantes dans `RulesController`** ✅
2. **Corriger `frontend/navBar.html.twig`** ✅
3. **Ajouter les liens manquants dans la NavBar** ✅

### Phase 2 — Conversion PHP → Twig (priorité haute) — ✅ COMPLÉTÉE

4. **Réécrire `recherche.html.twig`** ✅ — Entité `Sort` créée + Twig extension + route + template réécrit
5. **Corriger `armures.html.twig`** ✅ — PHP commenté supprimé, `print_armures()` converti, `print_boucliers()` remplacé par placeholder
6. **Corriger les liens internes dans les templates de règles** ✅ — Tous les liens `.php#`, `.xhtml#`, `../` convertis

### Phase 3 — Dynamisation des données BDD (priorité moyenne) — PARTIELLEMENT COMPLÉTÉE

7. **Arts du combat dynamiques** ✅ — `CombatArtRepository::findAll()` injecté, boucle Twig fonctionnelle
8. **Objets dynamiques** ✅ — `ItemCategoryRepository::findAll()` injecté dans les deux routes
9. **Armures dynamiques (complément)** ⏳ — Template converti, mais tables `armor` et `sort` vides — nécessite import de données

### Phase 4 — Nettoyage (priorité basse) — EN COURS

10. **Nettoyage de `armures.html.twig`** ✅
11. **Vérification globale** ⏳ — Nécessite un serveur en fonctionnement
12. **Mise à jour du `conversion-review.md`** ✅

---

## 7. Estimation totale

| Phase | Effort | Statut |
|---|---|---|
| Phase 1 — Routes + Navigation | ~30 min | ✅ Complétée |
| Phase 2 — Conversion PHP → Twig | ~1-2h | ✅ Complétée |
| Phase 3 — Dynamisation BDD | ~2-3h | ⏳ Partiellement |
| Phase 4 — Nettoyage | ~30 min | ✅ Complétée |
| **Reste** | | Générer migration Sort, peupler tables vides (sort, armor, item) |

---

## 8. Fichiers modifiés

### Controllers
- `src/Controller/RulesController.php` — 17 routes (10 originales + 7 ajoutées)

### Templates
- `templates/frontend/navBar.html.twig` — 14+ liens corrigés + nouveaux ajouts
- `templates/rules/armures.html.twig` — PHP converti en Twig, code commenté supprimé
- `templates/rules/recherche.html.twig` — Entièrement réécrit en Twig
- `templates/rules/armes.html.twig` — `print_armures()` converti en Twig
- `templates/rules/objets.html.twig` — `print_objets()` converti en Twig
- `templates/rules/magie.html.twig` — 4 `print_effets()` convertis en Twig
- `templates/rules/includes/printWeapons.html.twig` — Headers corrigés

### Entities & Repositories (nouveaux)
- `src/Entity/Sort.php` — Nouvelle entité pour les sorts
- `src/Repository/SortRepository.php` — Avec méthodes `findByEcole()` et `search()`
- `src/Twig/AppExtension.php` — Fonctions `calc_dc()`, `calc_mag()`, `nb_cercles()`

### Documentation
- `specs/conversion-review.md` — Mis à jour (95% complétée)
- `specs/conversion-plan.md` — Ce fichier
