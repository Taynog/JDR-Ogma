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
| `Magie.php` | `rules/magie.html.twig` | ✅ Converti | `app_rules_magic` (`/regles/magie`) | Non |
| `Combat.php` | `rules/combat.html.twig` | ✅ Converti | `app_rules_combat` (`/regles/combat`) | Non |
| `Types_actions.php` | `rules/types_actions.html.twig` | ✅ Converti | ❌ **Aucune route** | Non |
| `Survie.php` | `rules/survie.html.twig` | ✅ Converti | `app_rules_survival` (`/regles/survie`) | Non |
| `Artisanat.php` | `rules/artisanat.html.twig` | ✅ Converti | `app_rules_crafting` (`/regles/artisanat`) | Non |
| `Objets.php` | `rules/objets.html.twig` | ✅ Converti | `app_rules_items` (`/regles/objets`) | Non (partie statique) |
| `ObjetsBDD.php` | `rules/objetsbdd.html.twig` | ⚠️ Template existe | ❌ **Aucune route** | `item` + `item_category` (non injecté) |
| `Armes.php` | `rules/armes.html.twig` | ✅ Converti | `app_rules_weapons` (`/regles/armes`) | `weapon` + `weapon_category` (injecté) |
| `Armures.php` | `rules/armures.html.twig` | ⚠️ Partiellement converti | `app_rules_armors` (`/regles/armures`) | `armor` (injecté mais non utilisé correctement) |
| `Glossaire.php` | `rules/glossaire.html.twig` | ⚠️ Statique uniquement | `app_rules_glossary` (`/regles/glossaire`) | `glossary_condition` + `glossary_trait` (non utilisé) |
| `Gabarit.php` | `rules/gabarit.html.twig` | ✅ Converti | ❌ **Aucune route** | Non |
| `arts_du_combat.php` | `rules/arts_du_combat.html.twig` | ⚠️ Statique hardcoded | ❌ **Aucune route** | `combat_art` (37 lignes en BDD, non utilisé) |
| `Recherche.php` | `rules/recherche.html.twig` | ❌ **Encore du PHP brut** | ❌ **Aucune route** | `sorts` (table inexistante en BDD actuelle) |

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

### 3.1 Templates sans route (priorité haute)

Ces templates existent dans `templates/rules/` mais n'ont aucune route defined dans `RulesController` :

| Template | Contenu | Action |
|---|---|---|
| `gabarit.html.twig` | Gabarit des créatures (statique) | Ajouter route GET `/regles/gabarit` |
| `types_actions.html.twig` | Types d'actions (statique) | Ajouter route GET `/regles/types-actions` |
| `arts_du_combat.html.twig` | Arts du combat (statique, mais données en BDD) | Ajouter route GET `/regles/arts-du-combat` + injecter `CombatArtRepository` |
| `objetsbdd.html.twig` | Objets et services (template existe, contenu statique) | Ajouter route GET `/regles/objets-services` + injecter `ItemRepository` |

### 3.2 Template encore en PHP brut (priorité haute)

**`recherche.html.twig`** — Le fichier contient 100% de PHP brut :
- Fonctions `test_input()`, `handle_form()`, `print_recherche_magie()`
- Requêtes SQL directes vers une table `sorts` (qui n'existe pas dans le schéma Doctrine actuel)
- Doit être entièrement réécrit en Twig

**Note** : La table `sorts` n'existe pas dans les entités Doctrine ni dans `ogma.sql`. Cette fonctionnalité de recherche de sorts devra soit être abandonnée, soit l'entité `Sort` (spell) devra être créée. Voir section 5 pour la décision.

### 3.3 Template avec code PHP non converti (priorité haute)

**`armures.html.twig`** — Le fichier contient :
- Lignes 1-61 : Code PHP commenté (`{# ... #}`) avec les fonctions `print_armures()` et `print_boucliers()` — à supprimer
- Ligne 108-110 : Appel PHP `print_armures(array('Légère', 'Intermédiaire', 'Lourde'))` — **non converti en Twig**
- Ligne 179-181 : Appel PHP `print_boucliers()` — **non converti en Twig**
- Le contrôleur injecte `$armors` mais le template ne boucle pas dessus

**Action** : Remplacer les appels PHP par des boucles Twig `{% for armor in armors %}` et ajouter l'injection des boucliers dans le contrôleur.

### 3.4 Liens internes cassés dans la NavBar (priorité haute)

`frontend/navBar.html.twig` contient **14 liens** pointant encore vers l'ancien chemin PHP :

| Lien actuel | Lien Symfony correct |
|---|---|
| `/Data/Rules/Personnage.php#table_origine` | `{{ path('app_rules_character') ~ '#table_origine' }}` |
| `/Data/Rules/Personnage.php#Caracteristiques` | `{{ path('app_rules_character') ~ '#Caracteristiques' }}` |
| `/Data/Rules/Personnage.php#Attributs` | `{{ path('app_rules_character') ~ '#Attributs' }}` |
| `/Data/Rules/Personnage.php#Competences` | `{{ path('app_rules_character') ~ '#Competences' }}` |
| `/Data/Rules/Personnage.php#traits_perso` | `{{ path('app_rules_character') ~ '#traits_perso' }}` |
| `/Data/Rules/Personnage.php#faveur_tychi` | `{{ path('app_rules_character') ~ '#faveur_tychi' }}` |
| `/Data/Rules/Personnage.php#richesse_depart` | `{{ path('app_rules_character') ~ '#richesse_depart' }}` |
| `/Data/Rules/Personnage.php#progression_perso` | `{{ path('app_rules_character') ~ '#progression_perso' }}` |
| `/Data/Rules/Magie.php#table_forme_sort` | `{{ path('app_rules_magic') ~ '#table_forme_sort' }}` |
| `/Data/Rules/Magie.php#table_alteration` | `{{ path('app_rules_magic') ~ '#table_alteration' }}` |
| `/Data/Rules/Magie.php#table_conjuration` | `{{ path('app_rules_magic') ~ '#table_conjuration' }}` |
| `/Data/Rules/Magie.php#table_domination` | `{{ path('app_rules_magic') ~ '#table_domination' }}` |
| `/Data/Rules/Magie.php#table_mysticisme` | `{{ path('app_rules_magic') ~ '#table_mysticisme' }}` |
| `/Data/Rules/Combat.php#deroulement_combat` | `{{ path('app_rules_combat') ~ '#deroulement_combat' }}` |
| `/Data/Rules/Combat.php#tour_de_jeu` | `{{ path('app_rules_combat') ~ '#tour_de_jeu' }}` |
| `/Data/Rules/Combat.php#reactions` | `{{ path('app_rules_combat') ~ '#reactions' }}` |
| `/Data/Rules/Combat.php#style_combat` | `{{ path('app_rules_combat') ~ '#style_combat' }}` |
| `/Data/Rules/Combat.php#engagement` | `{{ path('app_rules_combat') ~ '#engagement' }}` |
| `/Data/Rules/Combat.php#passe_armes` | `{{ path('app_rules_combat') ~ '#passe_armes' }}` |
| `/Data/Rules/Combat.php#combat_cac` | `{{ path('app_rules_combat') ~ '#combat_cac' }}` |
| `/Data/Rules/Combat.php#combat_distance` | `{{ path('app_rules_combat') ~ '#combat_distance' }}` |
| `/Data/Rules/Combat.php#blessures_mort` | `{{ path('app_rules_combat') ~ '#blessures_mort' }}` |
| `/Data/Rules/Survie.php#besoins_journaliers` | `{{ path('app_rules_survival') ~ '#besoins_journaliers' }}` |
| `/Data/Rules/Survie.php#voyage` | `{{ path('app_rules_survival') ~ '#voyage' }}` |
| `/Data/Rules/Survie.php#eclairage` | `{{ path('app_rules_survival') ~ '#eclairage' }}` |
| `/Data/Rules/Survie.php#biomes` | `{{ path('app_rules_survival') ~ '#biomes' }}` |
| `/Data/Rules/Survie.php#dangers_naturels` | `{{ path('app_rules_survival') ~ '#dangers_naturels' }}` |
| `/Data/Rules/Artisanat.php#alchimie` | `{{ path('app_rules_crafting') ~ '#alchimie' }}` |
| `/Data/Rules/Armures.php#boucliers` | `{{ path('app_rules_armors') ~ '#boucliers' }}` |
| `/Data/Rules/Glossaire.php#traits` | `{{ path('app_rules_glossary') ~ '#traits' }}` |
| `/Data/Rules/Gabarit.php#gabarit_creatures` | Route à créer puis `{{ path('app_rules_gabarit') ~ '#gabarit_creatures' }}` |
| `/Data/Rules/Objets.php#materiel_aventurier` | `{{ path('app_rules_items') ~ '#materiel_aventurier' }}` |
| `/Data/Rules/Objets.php#taverne` | `{{ path('app_rules_items') ~ '#taverne' }}` |
| `/Data/Rules/Objets.php#transports` | `{{ path('app_rules_items') ~ '#transports' }}` |
| `/Data/Rules/Objets.php#montures` | `{{ path('app_rules_items') ~ '#montures' }}` |
| `/Data/Rules/Systeme.php#form_contact` | `{{ path('app_rules_index') ~ '#form_contact' }}` |

**Note** : Les templates de règles contiennent aussi des liens internes cassés (ex: dans `armures.html.twig` : `href="Survie.php#capacite_port"`, `href="Glossaire.php#aveugle"`, etc.). Ces liens doivent aussi être convertis.

### 3.5 Données BDD non exploitées (priorité moyenne)

| Table BDD | Entity | Nb lignes | Utilisation actuelle | Potentiel |
|---|---|---|---|---|
| `combat_art` | `CombatArt` | 37 | ❌ Pas utilisé — `arts_du_combat.html.twig` est statique avec données hardcodées | Rendre dynamique |
| `item` + `item_category` | `Item`, `ItemCategory` | Non vérifié | ❌ Pas utilisé — `objetsbdd.html.twig` a du contenu statique | Rendre dynamique |
| `glossary_condition` | `GlossaryCondition` | 21 | ❌ Pas utilisé — `glossaire.html.twig` est statique | Optionnel |
| `glossary_trait` | `GlossaryTrait` | 27 | ❌ Pas utilisé — idem | Optionnel |
| `weapon_property` | `WeaponProperty` | 25 | ✅ Utilisé via `includes/printWeaponProperties.html.twig` | OK |
| `stance` | `Stance` | Non vérifié | ❌ Pas utilisé | À voir |
| `skill` | `Skill` | Non vérifié | ❌ Pas utilisé | À voir |
| `material` | `Material` | Non vérifié | ❌ Pas utilisé | À voir |
| `damage_type` | `DamageType` | Non vérifié | ❌ Pas utilisé | À voir |

### 3.6 Code commenté à supprimer

**`armures.html.twig`** lignes 1-61 : Bloc `{# ... #}` contenant le code PHP original avec les fonctions `print_armures()` et `print_boucliers()`. Ce code n'est plus exécuté mais encombre le fichier.

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

### 4.2 Tables manquantes (présentes dans master mais pas dans le schéma Symfony)

| Table master | Description | Action |
|---|---|---|
| `sorts` | Sorts/magie (utilisée par `Recherche.php`) | Entité à créer si besoin de la recherche |
| `objets` | Objets (ancêtre de `item`?) | Vérifier si `item` suffit |
| `armures` | Armures (ancêtre de `armor`?) | Vérifier si `armor` suffit |
| `boucliers` | Boucliers | Entité à créer si besoin |
| `armes` | Armes (ancêtre de `weapon`?) | Vérifier si `weapon` suffit |

---

## 5. Décisions à prendre

### 5.1 Recherche de sorts (`Recherche.php`)

**Problème** : La page de recherche dans le master interroge une table `sorts` qui n'existe pas dans le schéma Doctrine actuel. Le template `recherche.html.twig` est encore du PHP brut.

**Options** :
- **A) Abandonner la recherche** : La fonctionnalité n'est pas critique pour un site de référence. Supprimer `recherche.html.twig`.
- **B) Créer l'entité `Sort`** : Créer une nouvelle entity + migration + admin Sonata, puis convertir la recherche en Twig. C'est du travail supplémentaire mais ça préserve la fonctionnalité.
- **C) Reporter** : Laisser la recherche pour plus tard, se concentrer sur le reste de la conversion.

**Recommandation** : Option C (reporter). Se concentrer d'abord sur les pages de règles restantes.

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

### Phase 1 — Routes manquantes et navigation (priorité haute)

**Estimation** : ~30 minutes

1. **Ajouter les 4 routes manquantes dans `RulesController`** :
   - `GET /regles/gabarit` → `app_rules_gabarit` → render `gabarit.html.twig`
   - `GET /regles/types-actions` → `app_rules_types_actions` → render `types_actions.html.twig`
   - `GET /regles/arts-du-combat` → `app_rules_arts_combat` → render `arts_du_combat.html.twig` (+ injection `CombatArtRepository`)
   - `GET /regles/objets-services` → `app_rules_objets_bdd` → render `objetsbdd.html.twig` (+ injection `ItemRepository` + `ItemCategoryRepository`)

2. **Corriger `frontend/navBar.html.twig`** :
   - Remplacer les 14+ liens `/Data/Rules/*.php#...` par `{{ path('...') ~ '#...' }}`
   - Pour les routes pas encore créées (gabarit), utiliser un comment temporaire ou créer la route d'abord

3. **Ajouter les liens manquants dans la NavBar** :
   - Types d'actions (actuellement pas dans la sidenav)
   - Arts du combat (actuellement pas dans la sidenav)

### Phase 2 — Conversion PHP → Twig (priorité haute)

**Estimation** : ~1-2 heures

4. **Réécrire `recherche.html.twig`** :
   - Supprimer tout le code PHP
   - Réécrire en Twig pur
   - Si la table `sorts` n'existe pas : reporter ou abandonner
   - Si elle existe : créer le contrôleur + repository

5. **Corriger `armures.html.twig`** :
   - Supprimer le code PHP commenté (lignes 1-61)
   - Remplacer `print_armures()` par une boucle Twig `{% for armor in armors %}`
   - Remplacer `print_boucliers()` par une boucle Twig (nécessite d'injecter les boucliers via le contrôleur)
   - Ajouter `ArmorRepository::findGroupedByCategory()` ou équivalent
   - Vérifier que le contrôleur injecte bien les données

6. **Corriger les liens internes dans les templates de règles** :
   - `armures.html.twig` : `href="Survie.php#..."` → `href="{{ path('app_rules_survival') ~ '#...' }}"`
   - `armures.html.twig` : `href="Glossaire.php#..."` → `href="{{ path('app_rules_glossary') ~ '#...' }}"`
   - `glossaire.html.twig` : `href="Glossaire.xhtml#a_terre"` → `href="{{ path('app_rules_glossary') ~ '#a_terre' }}"`
   - `types_actions.html.twig` : `href="Glossaire.php#..."` → `href="{{ path('app_rules_glossary') ~ '#...' }}"`
   - `types_actions.html.twig` : `href="Types_actions.xhtml#..."` → `href="{{ path('app_rules_types_actions') ~ '#...' }}"`
   - `combat.html.twig` : vérifier et corriger tous les liens internes
   - Parcourir chaque template et lister les liens cassés

### Phase 3 — Dynamisation des données BDD (priorité moyenne)

**Estimation** : ~2-3 heures

7. **Arts du combat dynamiques** :
   - Injecter `CombatArtRepository::findAll()` dans `RulesController::arts_du_combat()`
   - Modifier `arts_du_combat.html.twig` pour utiliser des boucles Twig
   - Trier par type/catégorie (basiques vs avancés)
   - Vérifier que les données BDD correspondent au contenu statique actuel

8. **Objets dynamiques** :
   - Peupler `item_category` et `item` via Sonata Admin (si pas déjà fait)
   - Injecter `ItemRepository::findAll()` et `ItemCategoryRepository::findAll()` dans le contrôleur
   - Modifier `objetsbdd.html.twig` pour utiliser des boucles Twig

9. **Armures dynamiques (complément)** :
   - S'assurer que la table `armor` est peuplée (elle est vide dans le dump)
   - Si nécessaire, créer une migration de données

### Phase 4 — Nettoyage (priorité basse)

**Estimation** : ~30 minutes

10. **Nettoyage de `armures.html.twig`** :
    - Supprimer le bloc de code PHP commenté (lignes 1-61)

11. **Vérification globale** :
    - Tester toutes les routes dans le navigateur
    - Vérifier que tous les liens internes fonctionnent
    - Vérifier l'affichage sur mobile
    - Vérifier que les données BDD s'affichent correctement

12. **Mise à jour du `conversion-review.md`** :
    - Marquer les phases complétées
    - Ajouter les nouvelles étapes si nécessaire

---

## 7. Estimation totale

| Phase | Effort | Priorité |
|---|---|---|
| Phase 1 — Routes + Navigation | ~30 min | 🔴 Haute |
| Phase 2 — Conversion PHP → Twig | ~1-2h | 🔴 Haute |
| Phase 3 — Dynamisation BDD | ~2-3h | 🟡 Moyenne |
| Phase 4 — Nettoyage | ~30 min | 🟢 Basse |
| **Total** | **~4-6h** | |

---

## 8. Fichiers à modifier

### Controllers
- `src/Controller/RulesController.php` — Ajouter 4 routes + injections

### Templates
- `templates/frontend/navBar.html.twig` — Corriger 14+ liens
- `templates/rules/armures.html.twig` — Convertir PHP → Twig, supprimer code commenté
- `templates/rules/recherche.html.twig` — Réécrire entièrement
- `templates/rules/arts_du_combat.html.twig` — Rendre dynamique (optionnel)
- `templates/rules/objetsbdd.html.twig` — Rendre dynamique (optionnel)
- Tous les templates de règles — Vérifier/corriger liens internes

### Documentation
- `specs/conversion-review.md` — Mettre à jour
- `specs/conversion-plan.md` — Ce fichier
