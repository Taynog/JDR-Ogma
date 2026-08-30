# Design — Édition en ligne des pages Lore (WebContent)

Date : 2026-08-15

---

## 1. Contexte et objectif

Permettre l'édition **en ligne** (depuis le navigateur) du contenu des pages de la catégorie **Lore** de la navbar, sans redéploiement.

Aujourd'hui ces pages sont des templates Twig statiques non éditables :
- `templates/world/histoire_ogma.html.twig`, `carte_ogma.html.twig`
- `templates/factions/*.html.twig` (11 factions)
- le bestiaire (`templates/world/bestiaire.html.twig`, ~2300 lignes) est **hors périmètre** pour l'instant (reste en Twig).

L'infra d'édition existe déjà : admin Sonata + CKEditor + elFinder, rôle `ROLE_EDITOR` (`ROLE_ADMIN_WEB_CONTENT_ALL`), route `app_front` (`/{page}`), table `web_content` vide.

## 2. Décisions validées

| Sujet | Décision |
|---|---|
| Structuration du contenu | **Une ligne BDD par section** (nouvelle entité dédiée) |
| URLs publiques | Conserver `/univers/x` et `/factions/x` (fallback Twig) |
| Templates Twig | Conservés en **fallback** (rien n'est supprimé) |
| Insertion d'images | CKEditor + elFinder (déjà configuré, à valider en test) |
| Sous-sections imbriquées (h3 dans une grande section) | **Restent imbriquées** dans le corps HTML de la section parente |
| UX d'édition | Bouton « Modifier » sur la page publique → formulaire Sonata |

## 3. Modèle de données

### 3.1 `WebContent` (page, table existante)

- `id` (int, PK)
- `page` (string, unique) — slug utilisé par les routes : `histoire_ogma`, `carte_ogma`, `azuma`, `chono`, …
- `title` (string) — titre de la page (`<title>`)
- `category` (enum `WebContentCategory`)
- `sections` — OneToMany `WebContentSection` (cascade persist/remove, orphanRemoval)

**Le champ `content` actuel est retiré** (table vide, aucun impact).

### 3.2 `WebContentSection` (nouvelle entité)

| Champ | Type | Notes |
|---|---|---|
| `id` | int, PK | |
| `webContent` | ManyToOne (inverse) | cascade persist/remove, orphanRemoval |
| `position` | int | ordre d'affichage |
| `title` | string, nullable | texte du heading ; `null` = bloc sans titre (ex. carte) |
| `level` | int, défaut 2 | niveau de heading rendu (h1/h2/h3) |
| `anchor` | string, nullable | `id` HTML pour les liens d'ancrage (ex. `#langages`) |
| `collapsible` | bool, défaut true | ajoute `onclick="hideContent(this)"` sur le heading |
| `content` | text, nullable | HTML du corps (CKEditor) |

Ces champs permettent de reproduire la mise en page actuelle à l'identique (niveaux de headings mélangés, headings non repliables, ancres internes).

## 4. Rendu (front)

### 4.1 Routes

- `app_univers` (`/univers/{page}`) et `app_factions` (`/factions/{faction}`) :
  1. recherche d'un `WebContent` par slug (champ `page`) ;
  2. trouvé → rendu du template sections ;
  3. sinon → **fallback** sur le rendu Twig actuel (bestiaire, sécurité).

### 4.2 Template `templates/frontend/webcontent.html.twig`

Boucle sur les sections ordonnées (`position` ASC) :

```
si title :  <h{level} id="{anchor}" onclick="hideContent(this)">{title}</h{level}>
            <div>{content|raw}</div>
sinon :     <div>{content|raw}</div>
```

Le corps doit être le **frère suivant** du heading (contrat de `hideContent()` dans `assets/app.js`).

### 4.3 Bouton « Modifier »

Bouton flottant (position fixed), affiché si `is_granted('ROLE_EDITOR')` ou `ROLE_ADMIN`, lien vers `admin_web_content_edit` avec l'id de la page.

## 5. Admin Sonata

`WebContentAdmin` restructuré :
- onglet/formulaire principal : `page`, `title`, `category` ;
- **collection inline de sections** (`CollectionType` Sonata, `by_reference=false`, add/delete) — chaque entrée : `position`, `title`, `level`, `anchor`, `collapsible`, `content` en CKEditor ;
- liste : `page`, `title`, `category`, nombre de sections.

Pas d'admin séparé pour les sections (édition groupée dans la page).

## 6. Images

- `fos_ckeditor.yaml` configure déjà `filebrowserBrowseRoute: elfinder` → insertion d'image opérationnelle dans tout champ CKEditor. Uploads dans `public/uploads/` (racine elFinder `uploads`).
- Les images existantes sont migrées en URLs statiques `/images/Factions/…`, `/images/Misc/…` dans le HTML.
- (Optionnel plus tard) racine elFinder dédiée sur `public/images` pour réutiliser les visuels existants.

## 7. Migration des données (implémentation)

1. Nouvelle table `web_content_section` (migration Doctrine).
2. Insertion des 13 pages `WebContent` (`page`, `title`, `category = LORE`).
3. Découpage de chaque template en sections : split sur les **headings racine** (blocs au premier niveau du body, ou `<div><hX>…` racine) ; conversion `{{ asset('...') }}` → `/...` ; `level`/`anchor`/`collapsible` extraits du HTML d'origine.
4. Rien n'est supprimé côté templates (fallback conservé).

## 8. Ce qui ne change pas

- URLs, navbar, routes existantes.
- Bestiaire (reste en Twig).
- Rôles (`ROLE_EDITOR` / `ROLE_ADMIN`), sécurité `/admin`.
- Rendu CKEditor/elFinder existant.

## 9. Prochaines étapes

1. ~~Migration : table `web_content_section` + entité `WebContentSection`.~~ ✅
2. ~~Découpage/import des 13 pages en sections.~~ ✅ (`Version20260815000000` + `Version20260815000100`)
3. ~~Adaptation des routes `app_univers`/`app_factions` (BDD d'abord, fallback Twig).~~ ✅
4. ~~Réécriture de `webcontent.html.twig` (sections + bouton Modifier).~~ ✅
5. ~~Restructuration de `WebContentAdmin` (collection inline de sections).~~ ✅
6. Vérification : rendu identique, ancres fonctionnelles, édition + sauvegarde, insertion d'image elFinder.
7. Vérification du bouton « Modifier » (apparaît pour `ROLE_EDITOR`/`ROLE_ADMIN`, redirige vers l'admin Sonata).
