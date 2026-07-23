# AGENTS.md

## Project

Symfony 6.4 PHP application (RPG/game reference tool called "Ogma"). All app code lives under `webroot/`, not the repo root.

## Prerequisites

Before running any command, ensure Apache and PostgreSQL are running on WSL by executing the startup script from the project root:

```bash
./start-services.sh
```

This script checks whether services are already running and starts them only if needed — it is safe to run repeatedly.

## Key Commands

All commands run from `webroot/`:

```bash
# Symfony console
php bin/console <command>

# Frontend assets (Webpack Encore)
npm run dev          # dev build
npm run watch        # dev build with watch
npm run build        # production build

# Tests
php bin/phpunit      # or: vendor/bin/phpunit
# Test suite is effectively empty — only tests/bootstrap.php exists.

# Composer
composer install     # runs cache:clear, ckeditor:install, elfinder:install, assets:install, importmap:install automatically
```

No lint, typecheck, or static analysis tools are configured. No CI workflows exist.

## Architecture

- **Database**: PostgreSQL 17 (`DATABASE_URL` in `webroot/.env`). Despite `compose.yaml` defining a Postgres container, the app uses MySQL. An SQL dump `webroot/ogma.sql` is available as a backup/snapshot — it is not used directly for schema setup; use Doctrine migrations to create/reset the schema.
- **ORM**: Doctrine with PHP 8 attribute mapping (`src/Entity/`).
- **Admin**: Sonata Admin (`src/Admin/`). Admin services are registered in `config/services.yaml`.
- **Frontend**: Webpack Encore (`webpack.config.js`). Entry point: `assets/app.js`. Sass enabled. Stimulus controllers via importmap.
- **Content editing**: CKEditor bundle + elFinder file manager.
- **File uploads**: VichUploader bundle.
- **Locale**: `fr` (set in `config/services.yaml`).
- **Auth**: Form login with email-based user provider, CSRF enabled.

## Specs

The `specs/` directory (at repo root, same level as `webroot/`) contains markdown documents generated and used by agents. These include architecture decisions, conversion plans, audit reports, and any other reference material produced during the project.

## Conventions

- Entity namespace: `App\Entity`, mapping type: `attribute`.
- Controller routing: PHP attributes on controller classes (`config/routes.yaml` uses `type: attribute`).
- Sonata admin classes live in `src/Admin/`, registered as tagged services in `config/services.yaml`.
- `.env.local` is gitignored; use it for local overrides (database credentials, etc.).
