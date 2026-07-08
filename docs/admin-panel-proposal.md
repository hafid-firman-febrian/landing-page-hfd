# Admin Panel / CMS — Proposal

**Branch:** `feature/admin-panel`
**Status:** Working prototype, tested (9 feature tests passing)
**Purpose:** Give a non-developer a web UI to manage the landing page content (Services, Portfolio, Testimonials, and Hero/CTA text) without editing seeders or the database directly.

---

## 1. What this adds

A lightweight admin panel at `/admin`, protected by login, that provides full CRUD over every piece of content shown on the public landing page:

| Section on landing | Managed in admin | Image upload |
|---|---|---|
| Hero (badge, title, subtitle, buttons) | Settings → *Hero & CTA* | ✅ hero image |
| Services | Services CRUD | — |
| Portfolio | Projects CRUD | ✅ thumbnail |
| Testimonials | Testimonials CRUD | ✅ avatar |
| CTA (title, subtitle, button) | Settings → *Hero & CTA* | — |

Every change is reflected on the public page immediately (content is read live from the database).

---

## 2. Chosen approach & trade-offs

Three options were considered. This prototype implements **Option A**.

| Option | Pros | Cons | Verdict |
|---|---|---|---|
| **A. Blade + Tailwind CRUD** (this branch) | No new dependencies; full control over markup; consistent with the existing stack; easy to review | Forms/tables written by hand | ✅ Chosen — lowest risk, smallest footprint |
| **B. Filament** | Very fast to build; batteries-included (tables, filters, media) | Large dependency; ships its own asset pipeline (Tailwind v3) alongside our Tailwind v4; heavier to customise | Good if scope grows a lot |
| **C. Livewire CRUD** | Reactive UX without full page reloads | Adds Livewire dependency; more moving parts than needed for simple CRUD | Middle ground |

**Auth model:** single admin account (email + password) using Laravel's built-in session auth — no roles/permissions package. This matches the "one content manager" use case. If multiple roles are later required, `spatie/laravel-permission` can be layered on without rewriting the CRUD.

---

## 3. Architecture

```
routes/web.php
  /                         → LandingController (public)
  /admin/login             → Admin\LoginController (guest)
  /admin/*  (auth)         → Dashboard + resource controllers + Settings

app/Http/Controllers/Admin/
  LoginController          session login/logout
  DashboardController      counts + shortcuts
  ServiceController        resource (except show)
  ProjectController        resource + thumbnail upload
  TestimonialController    resource + avatar upload
  SettingController        edit/update Hero & CTA (+ hero image)

resources/views/
  components/layouts/admin.blade.php   sidebar shell
  components/admin/input.blade.php     reusable form field
  components/admin/status-badge.blade.php
  admin/auth/login, admin/dashboard
  admin/{services,projects,testimonials}/{index,create,edit,_form}
  admin/settings/edit
```

- **Validation** lives in each controller (single `validated()` method per resource).
- **Slugs** are auto-generated and de-duplicated (`title` → `konsultasi-produk`, `-2`, `-3`…).
- **Images** are stored on the `public` disk (`storage/app/public`, symlinked via `php artisan storage:link`) and the stored path (`storage/…`) is rendered directly with `asset()`. Replacing or deleting a record removes its old file.
- **`is_active` / `sort_order`** are editable and control visibility/ordering on the landing page.

---

## 4. Security notes

- All `/admin/*` routes (except login) are behind the `auth` middleware.
- Passwords are hashed (`password` cast on the `User` model); login uses `Auth::attempt` with session regeneration.
- CSRF protection on every form; image uploads validated as `image|max:4096`.
- No mass-assignment of the primary key; controllers whitelist fields via `validate()`.
- **Before production:** change the seeded admin credentials (see below) and consider adding rate limiting on the login route and email verification / password reset if needed.

---

## 5. How to run & log in

```bash
php artisan migrate:fresh --seed   # creates tables + seed content + admin user
php artisan storage:link           # once, for uploaded images
composer dev                       # or: npm run dev + php artisan serve
```

Open **http://127.0.0.1:8000/admin** and log in:

- **Email:** `admin@example.com`
- **Password:** `password`

> ⚠️ These are seed defaults for local review only — change them before any shared/production deploy (edit `database/seeders/AdminUserSeeder.php` or update via Tinker).

---

## 6. Tests

`tests/Feature/AdminPanelTest.php` covers the critical paths:

- Login page renders; dashboard redirects guests to login
- Admin can authenticate and view the dashboard
- All admin index/settings pages render when authenticated
- Creating a Service persists and appears on the landing page
- Uploading a Project thumbnail stores the file
- Updating Hero settings persists and appears on the landing page

```bash
php artisan test --filter=AdminPanelTest   # 7 tests
php artisan test                           # full suite (9 tests) — all green
```

---

## 7. Possible next steps (not in this prototype)

- Roles/permissions (multi-editor) via `spatie/laravel-permission`
- Drag-and-drop reordering instead of a numeric `sort_order`
- WYSIWYG/markdown editor for longer text fields
- Audit log of content changes
- Login rate limiting + password reset flow
- Image cropping/optimisation on upload
