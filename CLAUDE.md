# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A Laravel 13 (PHP 8.3) single-page marketing site with a lightweight admin CMS behind it. The public page (Hero, Services, Portfolio, Testimonials, CTA) reads content live from the database; the admin panel at `/admin` provides CRUD over that content for a non-developer editor. Frontend stack: Blade + Tailwind CSS v4 + Alpine.js + AOS (scroll animations), bundled with Vite.

## Commands

```bash
composer dev          # runs server + queue listener + pail (log viewer) + vite, all concurrently — primary dev command
php artisan serve      # server only
npm run dev             # vite only
npm run build            # production frontend build

composer test          # clears config cache, then runs php artisan test
php artisan test                                # full suite
php artisan test --filter=AdminPanelTest         # single test class
php artisan test --filter=test_admin_can_login    # single test method

vendor/bin/pint         # format PHP (Laravel Pint, no custom config — default ruleset)
```

Database is SQLite (`database/database.sqlite`). Tests use an in-memory SQLite DB (see `phpunit.xml`) with `RefreshDatabase`.

```bash
php artisan migrate:fresh --seed   # rebuild schema + seed demo content + admin user
php artisan storage:link            # required once for uploaded images (projects/testimonials thumbnails, hero image) to be servable
```

Seeded admin login (local only — see `database/seeders/AdminUserSeeder.php`): `admin@example.com` / `password`.

## Architecture

**Two route groups, one auth guard:**
- `routes/web.php` — public `/` → `Public\LandingController@index`, plus `require routes/auth.php` (Breeze).
- `routes/admin.php` — everything under `/admin`, behind `auth` middleware. Resource controllers for `services`, `projects`, `testimonials` (all `except('show')` — no public single-item admin view), plus a singleton-style `settings.edit`/`settings.update` pair.

**Content model:** four Eloquent models back the CMS — `Project`, `Service`, `Testimonial`, `Setting`. The first three share the same shape: `guarded = []`, an `is_active` boolean cast, a `scopeActive()` and a `scopeOrdered()` (orders by `sort_order` then `id`). `LandingController::index()` pulls `active()->ordered()->get()` from each and passes them straight to `public.landing`. `Setting` is a flat key/value table; `Setting::map()` collapses it to a `['key' => 'value']` array consumed by the hero/CTA partials.

**Admin controller pattern** (see `Admin\ProjectController` as the reference implementation — `ServiceController`/`TestimonialController` follow the same shape): a private `validated()` method does `$request->validate()` plus post-processing — slug generation via a private `uniqueSlug()` (Str::slug + `-2`, `-3`… suffix on collision, scoped to exclude the current record on update), boolean coercion for checkbox fields, and image handling. Uploaded images are stored on the `public` disk under a per-resource subfolder (`store('projects', 'public')`), the DB column holds the `storage/...`-prefixed path (rendered directly with `asset()`), and `deleteImage()` removes the old file on replace/destroy.

**Views:**
- `resources/views/components/layouts/public.blade.php` and `.../admin.blade.php` are the two page shells (public site vs. admin sidebar shell). Admin nav items are declared inline in the layout as a PHP array.
- `resources/views/public/landing.blade.php` is a thin composition of `public/partials/{hero,services,portfolio,testimonials,cta}.blade.php`.
- `resources/views/admin/{services,projects,testimonials}/` each follow `index`, `create`, `edit`, `_form` (shared form partial included by create/edit).
- `resources/views/components/admin/input.blade.php` is the reusable form field component used across admin forms.

**Frontend:** Tailwind v4 via `@tailwindcss/vite` (no separate `tailwind.config.js` — v4 is CSS-first, see `resources/css/app.css`). AOS is initialized for scroll-triggered animations; navbar uses an Intersection Observer for active-section highlighting. Font Awesome is loaded via a hosted kit script tag in the layouts (not npm).

**Ignored/local-only directories** (present on disk but excluded via `.gitignore`, so `git log`/`git status` won't reflect them): `docs/` (includes `docs/admin-panel-proposal.md`, background on the admin panel's design decisions and trade-offs) and `_referensi/` (a reference Laravel project kept for inspiration only — not part of this app's dependency graph or build).

## Conventions

- Indonesian (`lang="id"`) is set on the HTML root, but UI copy and code comments/identifiers are English (page content was deliberately migrated from Indonesian to English for consistency — see git history).
- Controllers whitelist fields explicitly via `validate()` even though models use `guarded = []`; don't rely on mass-assignment guarding for security.
- `sort_order` + `is_active` drive visibility/ordering on the public page for every content type — when adding a content type, follow the same `scopeActive`/`scopeOrdered` pattern rather than inventing a new mechanism.
