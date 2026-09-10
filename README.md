# Ekklesia Surabaya — Official Website

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12" />
  <img src="https://img.shields.io/badge/PostgreSQL-16-4169E1?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="Tailwind CSS" />
  <img src="https://img.shields.io/badge/Vercel-Serverless-000000?style=for-the-badge&logo=vercel&logoColor=white" alt="Vercel" />
</p>

---

## 📖 Deskripsi Proyek

Website resmi **Ekklesia Surabaya** — gereja keluarga di bawah pimpinan **Pastor Juan Anthony Sam** & **Ps Samuel**. Website ini dibangun untuk menyediakan:

- 📋 Informasi profil gereja, visi, misi, dan tim pelayanan
- 🕊️ Jadwal ibadah & acara (Worship Night, EFF, Retreat, dll.)
- 🎬 Akses media digital (YouTube channels & galeri foto)
- 🙏 Layanan jemaat via WhatsApp CTA & form permohonan doa
- 💛 Informasi persembahan / giving (Danamon M3 & QRIS)

**Tema Tahun 2026:** *"Tahun Pemulihan bagi Kemuliaan Tuhan"*

---

## 🛠️ Tech Stack

| Layer | Teknologi | Keterangan |
|---|---|---|
| **Backend Framework** | Laravel 12.x (PHP 8.2+) | MVC framework utama |
| **Database (Local)** | PostgreSQL 16 (Port 5432) | Development & testing lokal |
| **Database (Production)** | Neon.tech PostgreSQL Cloud | Serverless-compatible cloud DB |
| **Frontend Styling** | Tailwind CSS v4 | Via `@tailwindcss/vite` plugin |
| **Build Tool** | Vite 7.x | Asset bundling & HMR |
| **Templating** | Laravel Blade | Server-side rendering |
| **Media Storage** | Supabase Storage / Cloudinary | Karena Vercel bersifat ephemeral |
| **Hosting** | Vercel (Serverless) | PHP via serverless runtime |

### 🎨 Design System & Fitur UI/UX

| Fitur | Keterangan | Implementasi |
|---|---|---|
| **Dual Theme System** | Mendukung **Light Mode** (default cerah elegan) & **Dark Mode** (soft monochrome) | Tombol toggle Sun/Moon di Navbar & Drawer + persistensi `localStorage` |
| **Font Heading** | **Stack Sans Notch** (Lightweight weight: 300 / 400) | Elegan, modern, tidak tebal/berat, cocok untuk gereja modern |
| **Font Body** | **Source Sans 3** (Google Fonts) | Nyaman dibaca untuk paragraf dan elemen UI |
| **Scroll Animation** | Scroll Reveal Animation via `IntersectionObserver` | Efek halus fade-in & float-up saat user menggulir halaman |
| **Scroll Progress Bar** | Indikator progres scroll di puncak layar | Real-time visual reading progress |
| **Mobile-First UX** | Hamburger Button di sisi kanan (thumb-friendly) | Slide drawer dari kanan + backdrop blur |

#### Palet Warna (Dual Theme)

| Token | Light Mode | Dark Mode |
|---|---|---|
| **Background Halaman** | `#FFFFFF` (clean white) | `#141414` (soft dark) |
| **Surface Card** | `#FFFFFF` / `#F8F9FA` | `#1C1C1C` / `#242424` |
| **Border** | `#E5E7EB` | `#2B2B2B` |
| **Text Primary (Heading)** | `#111827` (charcoal dark) | `#F5F5F5` (off-white) |
| **Text Secondary** | `#4B5563` | `#C8C8C8` |
| **CTA Button** | Solid `#111111` (text white) | Solid `#FFFFFF` (text dark) |

---

## ⚙️ Panduan Instalasi Lokal

### Prasyarat

Pastikan sudah terinstall di sistem kamu:
- PHP **8.2+** (via XAMPP atau standalone)
- **Composer** (dependency manager PHP)
- **Node.js 20+** & npm
- **PostgreSQL 16** berjalan di port `5432`
- Database bernama `juan` sudah dibuat di PostgreSQL lokal

### Step-by-Step Setup

**1. Clone repository**
```bash
git clone <repository-url> ekklesia-surabaya
cd ekklesia-surabaya
```

**2. Install PHP dependencies**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Konfigurasi `.env`**

Buka file `.env` dan sesuaikan nilai berikut:
```env
APP_NAME="Ekklesia Surabaya"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=juan
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

# WhatsApp CTA
WHATSAPP_NUMBER="+62xxxxxxxxxx"

# Supabase Storage (opsional, untuk production)
SUPABASE_URL=https://xxxx.supabase.co
SUPABASE_KEY=your_supabase_key
SUPABASE_BUCKET=ekklesia-media

# Cloudinary (alternatif media storage)
CLOUDINARY_URL=cloudinary://api_key:api_secret@cloud_name
```

**6. Jalankan database migrations**
```bash
php artisan migrate
```

**7. Jalankan database seeders**
```bash
php artisan db:seed
```

**8. Install Node.js dependencies**
```bash
npm install
```

**9. Jalankan development server**
```bash
# Jalankan Laravel + Vite bersamaan
composer run dev
```

Atau secara terpisah:
```bash
# Terminal 1 — Laravel
php artisan serve

# Terminal 2 — Vite (Tailwind HMR)
npm run dev
```

Buka browser di **http://localhost:8000** 🎉

---

## 🗂️ Struktur Proyek

```
ekklesia-surabaya/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── ProfileController.php
│   │   ├── MediaController.php
│   │   └── EventController.php
│   └── Models/
│       ├── Event.php
│       ├── Gallery.php
│       └── PrayerRequest.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/app.css          ← Tailwind v4 + Design tokens
│   ├── js/app.js
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php  ← Master layout
│       ├── components/
│       │   ├── navbar.blade.php
│       │   └── footer.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── profile.blade.php
│           ├── media.blade.php
│           └── events.blade.php
├── routes/
│   └── web.php
├── .env.example
├── README.md
└── vercel.json              ← Vercel serverless config (coming soon)
```

---

## 🏛️ Arsitektur & Konvensi Pengembangan (SRP)

> **Wajib dipatuhi** seluruh pengembangan pada proyek ini menggunakan prinsip **Single Responsibility Principle (SRP)** — setiap class, file, dan folder hanya memiliki **satu tanggung jawab** yang jelas dan terdefinisi.

### Mengapa SRP?

| Tanpa SRP | Dengan SRP |
|---|---|
| Logic bisnis campur di Controller | Setiap layer punya peran tunggal |
| Hard to test & maintain | Mudah di-unit test per layer |
| Perubahan kecil berdampak besar | Isolasi perubahan per class |
| Fat controllers & models | Thin controllers, focused services |

---

### 📁 Struktur Folder SRP

```
app/
├── Http/
│   ├── Controllers/          ← [LAYER 1] Hanya terima request & return response
│   │   ├── HomeController.php
│   │   ├── ProfileController.php
│   │   ├── MediaController.php
│   │   └── EventController.php
│   │
│   ├── Requests/             ← [LAYER 1a] Validasi input form (Form Request)
│   │   └── StorePrayerRequestRequest.php
│   │
│   └── Resources/            ← [LAYER 1b] Transformasi output API/JSON
│       └── EventResource.php
│
├── Services/                 ← [LAYER 2] Logic bisnis & orkestrasi antar domain
│   ├── EventService.php
│   ├── GalleryService.php
│   └── PrayerRequestService.php
│
├── Repositories/             ← [LAYER 3] Semua query & akses database
│   ├── Contracts/
│   │   ├── EventRepositoryInterface.php
│   │   └── GalleryRepositoryInterface.php
│   └── Eloquent/
│       ├── EventRepository.php
│       └── GalleryRepository.php
│
├── Models/                   ← [LAYER 4] Definisi data, relasi, casting — BUKAN logic
│   ├── Event.php
│   ├── Gallery.php
│   └── PrayerRequest.php
│
├── Actions/                  ← [OPSIONAL] Satu class = satu aksi spesifik
│   └── StorePrayerRequestAction.php
│
└── Providers/
    └── RepositoryServiceProvider.php  ← Bind Interface → Implementation
```

---

### 📐 Aturan Per Layer

#### 1. `Controllers/` — HTTP Handler
```php
// ✅ BENAR: Controller hanya dispatch ke Service
public function index()
{
    $events = $this->eventService->getUpcoming();
    return view('pages.events', compact('events'));
}

// ❌ SALAH: Logic bisnis & query langsung di Controller
public function index()
{
    $events = Event::where('date', '>=', now())->orderBy('date')->get();
    // manipulasi data... kirim email... dll
}
```

#### 2. `Services/` — Business Logic
- Berisi logika aplikasi, tidak langsung sentuh DB
- Boleh memanggil satu atau lebih Repository
- Tidak boleh berisi query Eloquent langsung

```php
// ✅ BENAR
class EventService {
    public function __construct(private EventRepositoryInterface $repo) {}

    public function getUpcoming(): Collection
    {
        return $this->repo->findUpcoming();
    }
}
```

#### 3. `Repositories/` — Data Access
- **Satu-satunya** tempat query database / Eloquent
- Implements sebuah Interface (untuk mudah di-mock saat testing)
- Tidak boleh berisi logika bisnis

```php
// ✅ BENAR
class EventRepository implements EventRepositoryInterface {
    public function findUpcoming(): Collection
    {
        return Event::where('date', '>=', now())
                    ->where('is_active', true)
                    ->orderBy('date')
                    ->get();
    }
}
```

#### 4. `Models/` — Data Contract
- Hanya definisi: `$fillable`, `$casts`, relasi (`hasMany`, `belongsTo`), scope sederhana
- **Tidak boleh** berisi logika bisnis, validasi kompleks, atau query besar

#### 5. `Requests/` — Validasi Input
- Setiap form memiliki class `FormRequest` tersendiri
- Controller tidak boleh berisi `$request->validate([...])`

---

### 🏷️ Konvensi Penamaan

| Tipe | Konvensi | Contoh |
|---|---|---|
| Controller | `{Entity}Controller` | `EventController` |
| Service | `{Entity}Service` | `EventService` |
| Repository Interface | `{Entity}RepositoryInterface` | `EventRepositoryInterface` |
| Repository Impl | `{Entity}Repository` | `EventRepository` |
| Form Request | `{Action}{Entity}Request` | `StoreEventRequest` |
| Model | Singular PascalCase | `Event`, `PrayerRequest` |
| Migration | `snake_case` timestamp prefix | `2026_09_11_create_events_table` |
| Blade View | `snake_case` | `pages/home.blade.php` |
| Blade Component | `kebab-case` | `<x-section-title />` |

---

## 📋 Progress Tracking

### Milestone Status

| # | Section / Fitur | Status | Catatan |
|---|---|---|---|
| **FOUNDATION** | | | |
| 1 | README.md & Dokumentasi | ✅ Done | Initial documentation & SRP rules |
| 2 | Environment Setup (`.env`, Tailwind v4) | ✅ Done | Monochrome design system & fonts |
| 3 | Database Migrations (Events, Gallery, Prayer Requests) | ✅ Done | Schema & PostgreSQL 5432 native |
| 4 | Database Seeders | ✅ Done | EventSeeder & GallerySeeder |
| 5 | Routes & Controllers (4 halaman) | ✅ Done | SRP: Controllers, Services, Repositories |
| **LAYOUT** | | | |
| 6 | Master Layout (`layouts/app.blade.php`) | ✅ Done | Base layout, SEO meta & fonts |
| 7 | Sticky Navbar + Mobile Menu | ✅ Done | Hamburger di sebelah KANAN + slide drawer |
| 8 | Footer | ✅ Done | Jadwal, Giving, YouTube, Lokasi |
| **HALAMAN** | | | |
| 9 | Home — Hero Carousel | ✅ Done | Mobile-first, ref philipmantofa.com style |
| 10 | Home — Sekilas Profil & Visi Misi | ✅ Done | Visi & pilar gereja keluarga |
| 11 | Home — Jadwal Ibadah | ✅ Done | Sunday 09:00, Ekidz, E-Teens, Doa |
| 12 | Home — CTA WhatsApp + Form Doa | ✅ Done | Direct WA & store prayer form |
| 13 | Home — Persembahan / Giving | ✅ Done | Danamon M3 (copyable) & QRIS card |
| 14 | Profile — Visi & Misi Detail | ✅ Done | Visi & misi gereja keluarga |
| 15 | Profile — Pastor Cards (Juan & Samuel) | ✅ Done | Profil Ps Juan Anthony Sam & Ps Samuel |
| 16 | Profile — Divisi Pelayanan | ✅ Done | Creative, Usher, Worship, Volunteer |
| 17 | Profile — Peta Lokasi (Google Maps) | ✅ Done | Interactive embed Ruko Ngaglik 2 No 15 |
| 18 | Media — YouTube Channel Embeds | ✅ Done | Ministry, Worship, World channels |
| 19 | Media — Galeri Foto (filter kategori) | ✅ Done | Filter: Ibadah, Kidz, EFF, Retreat |
| 20 | Events — Listing Acara | ✅ Done | Worship Night, My Home, EFF, Retreat |
| **DEPLOYMENT** | | | |
| 21 | Vercel `vercel.json` Config | ⬜ Todo | Serverless PHP runtime |
| 22 | Neon.tech PostgreSQL Connection | ⬜ Todo | Production DB |
| 23 | Supabase / Cloudinary Media Storage | ⬜ Todo | Ephemeral-safe file storage |

---

## 🌍 Deployment ke Vercel

> 📌 *Dokumentasi deployment akan diupdate saat tahap ini dicapai.*

Secara garis besar:
1. Install Vercel CLI: `npm i -g vercel`
2. Buat `vercel.json` dengan PHP serverless runtime config
3. Set environment variables di Vercel dashboard (gunakan Neon.tech DB URL)
4. Push ke GitHub → auto-deploy via Vercel

---

## 📍 Informasi Gereja

| | |
|---|---|
| **Nama** | Ekklesia Surabaya |
| **Pimpinan** | Pastor Juan Anthony Sam & Ps Samuel |
| **Alamat** | Jln Ruko Ngaglik 2 No 15, Surabaya |
| **Ibadah Minggu** | 09:00 WIB (Sunday Service) |
| **Ekidz** | 09:30 WIB |
| **E-Teens** | 11:00 WIB |
| **Doa Senin & Jumat** | 19:00 WIB |

---

## 📄 License

Proyek ini adalah properti **Ekklesia Surabaya**. Seluruh hak cipta dilindungi.
