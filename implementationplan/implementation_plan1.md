# Ekklesia Surabaya — Web Application Implementation Plan

Membangun website gereja profesional untuk **Ekklesia Surabaya** berbasis Laravel 12 + PostgreSQL + Tailwind CSS, dengan deployment target di Vercel (serverless). Desain mengacu pada gaya modern church website ala philipmantofa.com — dark, premium, cinematic.

---

## Current State
- Laravel 12 sudah ter-install (`composer.json` confirms `laravel/framework: ^12.0`)
- `.env` sudah dikonfigurasi dengan `DB_CONNECTION=pgsql`, DB local `juan` di port 5432
- Hanya ada `welcome.blade.php` default — belum ada halaman maupun komponen sama sekali
- Tailwind CSS belum diinstall (hanya `package.json` default)
- Tidak ada routes, controllers, migrations (kecuali default Laravel)

---

## Proposed Changes

### Phase 1 — Foundation & Documentation

#### [MODIFY] [README.md](file:///c:/xampp/htdocs/juananthony/README.md)
Ganti konten default Laravel dengan dokumentasi proyek Ekklesia Surabaya:
- Deskripsi proyek & tujuan
- Tech stack detail
- Panduan instalasi lokal step-by-step
- Progress tracking table (checklist per section)

#### [MODIFY] [.env](file:///c:/xampp/htdocs/juananthony/.env)
Tambahkan variabel baru:
- `APP_NAME="Ekklesia Surabaya"`
- Placeholder untuk Supabase/Cloudinary storage
- WhatsApp CTA number config

#### [MODIFY] [.env.example](file:///c:/xampp/htdocs/juananthony/.env.example)
Sinkronisasi dengan `.env` (tanpa nilai sensitif)

---

### Phase 2 — Tailwind CSS & Vite Setup

#### [MODIFY] [package.json](file:///c:/xampp/htdocs/juananthony/package.json)
Tambah `tailwindcss`, `@tailwindcss/forms`, `@tailwindcss/typography`

#### [NEW] `tailwind.config.js`
Konfigurasi custom color palette (church/dark aesthetic):
- Primary: Gold/Amber tones `#C9A84C`
- Background: Deep Navy/Charcoal `#0D0F1A`
- Accent: White/cream

#### [MODIFY] [vite.config.js](file:///c:/xampp/htdocs/juananthony/vite.config.js)
Pastikan Vite mengcompile Tailwind + JS dengan benar

#### [MODIFY] `resources/css/app.css`
Import Tailwind directives + custom CSS variables + font imports (Google Fonts: Inter + Playfair Display)

---

### Phase 3 — Database Migrations & Seeders

#### [NEW] `database/migrations/xxxx_create_events_table.php`
Tabel untuk listing acara (Events page):
- `id`, `title`, `description`, `date`, `time`, `location`, `image_url`, `category`, `is_featured`, `timestamps`

#### [NEW] `database/migrations/xxxx_create_prayer_requests_table.php`
Tabel form permohonan doa (Home CTA):
- `id`, `name`, `phone`, `email`, `prayer_request`, `is_anonymous`, `timestamps`

#### [NEW] `database/migrations/xxxx_create_gallery_table.php`
Tabel galeri foto:
- `id`, `title`, `image_url`, `category` (ibadah/kidz/eff/retreat), `caption`, `timestamps`

#### [NEW] `database/seeders/EventSeeder.php`
Seed data acara (Worship Night, My Home, EFF, Retreat)

#### [NEW] `database/seeders/GallerySeeder.php`
Seed data galeri placeholder

---

### Phase 4 — Routes & Controllers

#### [MODIFY] [routes/web.php](file:///c:/xampp/htdocs/juananthony/routes/web.php)
```php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/acara', [EventController::class, 'index'])->name('events');
Route::post('/doa', [HomeController::class, 'prayerRequest'])->name('prayer.store');
```

#### [NEW] `app/Http/Controllers/HomeController.php`
#### [NEW] `app/Http/Controllers/ProfileController.php`
#### [NEW] `app/Http/Controllers/MediaController.php`
#### [NEW] `app/Http/Controllers/EventController.php`

---

### Phase 5 — Blade Layout & Components

#### [NEW] `resources/views/layouts/app.blade.php`
Master layout dengan:
- `<head>` dengan meta SEO, Google Fonts, Vite assets
- Sticky Navbar (transparent → solid on scroll) dengan logo + nav links
- Footer (alamat, sosmed links, copyright)
- Mobile hamburger menu

#### [NEW] `resources/views/components/navbar.blade.php`
#### [NEW] `resources/views/components/footer.blade.php`
#### [NEW] `resources/views/components/hero-slide.blade.php`
#### [NEW] `resources/views/components/section-title.blade.php`

---

### Phase 6 — Pages

#### [NEW] `resources/views/pages/home.blade.php`
Sections:
1. **Hero Carousel** — Full-screen, cinematic. Slide 1: "Saat Teduh", Slide 2: "Tahun Pemulihan bagi Kemuliaan Tuhan 2026", Slide 3: Undangan ibadah
2. **Sekilas Profil & Visi Misi** — Split layout (teks + gambar gereja)
3. **Jadwal Ibadah** — Card grid: Sunday Service 09.00, Ekidz 09.30, E-Teens 11.00, Doa Senin/Jumat 19.00
4. **CTA WhatsApp + Form Doa** — Dua kolom: tombol WA & form permohonan doa
5. **Persembahan / Giving** — Detail rekening Danamon M3 + QRIS card

#### [NEW] `resources/views/pages/profile.blade.php`
Sections:
1. **Visi & Misi** — Full detail dengan typography premium
2. **Pastor Cards** — Pastor Juan Anthony Sam & Ps Samuel dengan foto & bio
3. **Divisi Pelayanan** — Volunteer, Creative, Usher (icon cards)
4. **Peta Lokasi** — Embed Google Maps (Jln Ruko Ngaglik 2 No 15, Surabaya) + alamat detail

#### [NEW] `resources/views/pages/media.blade.php`
Sections:
1. **YouTube Channels** — Embed cards untuk Ekklesia Ministry, Ekklesia Worship, Ekklesia World
2. **Galeri Foto** — Masonry/grid dengan filter kategori (Ibadah, Kidz, EFF, Retreat)

#### [NEW] `resources/views/pages/events.blade.php`
Sections:
1. **Featured Event Banner** — Hero untuk acara terdekat
2. **Event Listing** — Cards dengan tanggal, kategori, deskripsi
3. **Recurring Events** — Worship Night (Jumat Minggu ke-4), My Home, EFF, Retreat

---

### Phase 7 — Models & Business Logic

#### [NEW] `app/Models/Event.php`
#### [NEW] `app/Models/PrayerRequest.php`
#### [NEW] `app/Models/Gallery.php`

---

## Design System

| Token | Value |
|---|---|
| Primary Gold | `#C9A84C` |
| Deep Navy | `#0D0F1A` |
| Surface Dark | `#161927` |
| Surface Light | `#1E2235` |
| Text Primary | `#F5F0E8` |
| Text Muted | `#8B8FA8` |
| Accent White | `#FFFFFF` |
| Font Heading | Playfair Display (serif, editorial) |
| Font Body | Inter (sans-serif, clean) |

---

## Verification Plan

### Automated
- `php artisan migrate:fresh --seed` — validasi migrations & seeders berjalan tanpa error
- `php artisan route:list` — konfirmasi semua routes terdaftar

### Manual
- Jalankan `composer run dev` dan buka `http://localhost:8000`
- Verifikasi semua 4 halaman dapat diakses dan responsive (mobile/tablet/desktop)
- Uji form permohonan doa (POST ke DB)
- Uji carousel, galeri filter, dan WhatsApp CTA link

---

## Open Questions

> [!IMPORTANT]
> **Foto Pastor** — Apakah ada foto resmi Pastor Juan Anthony Sam & Ps Samuel yang bisa digunakan? Jika belum tersedia, saya akan menggunakan placeholder yang dihasilkan AI.

> [!IMPORTANT]
> **QRIS Image** — Apakah ada file gambar QRIS yang harus ditampilkan? Jika belum, saya akan membuat placeholder card dengan informasi rekening Danamon M3 saja.

> [!IMPORTANT]
> **Nomor WhatsApp** — Berapa nomor WhatsApp untuk CTA layanan jemaat? (Saya akan set default `+62` placeholder jika belum ada)

> [!NOTE]
> **YouTube Channel URL** — Saya akan gunakan nama channel sebagai placeholder embed. Tolong konfirmasi URL/handle YouTube resmi untuk Ekklesia Ministry, Ekklesia Worship, dan Ekklesia World jika sudah ada.

> [!NOTE]
> **Vercel Deployment** — Konfigurasi `vercel.json` dan PHP serverless runtime akan disiapkan di tahap akhir. Untuk saat ini fokus pada development lokal terlebih dahulu.
