<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Beranda (Home) — Ekklesia Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <script>
        (function() {
            try {
                if (localStorage.getItem('theme') === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-50 dark:bg-[#121212] text-gray-900 dark:text-gray-100 antialiased font-['Plus_Jakarta_Sans',sans-serif]">

    @include('admin.partials.sidebar', ['activePage' => 'cms-home'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Beranda (Home)</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ubah banner utama (hero carousel), tema tahunan gereja, rekening donasi/persembahan, dan layanan pastoral</p>
                </div>
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020] self-start sm:self-auto">
                    <span>Lihat Halaman Beranda</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.cms.home.save') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- 0. BANNER UTAMA (HERO CAROUSEL SLIDES) -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                        <div class="flex items-center gap-2.5">
                            <span class="p-2 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Banner Utama (Hero Carousel Slides)</h2>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400">Banner besar di bagian paling atas halaman beranda (Poster Jadwal, Waspada Penipuan, Renungan, dll)</p>
                            </div>
                        </div>
                        <button type="button" onclick="addNewSlideCard()" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-xl bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-900/50 hover:bg-indigo-100 dark:hover:bg-indigo-900/60 transition cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Banner</span>
                        </button>
                    </div>

                    @php
                        $slides = $homeData['hero_slides'] ?? [
                            ['image' => asset('images/Poster1.jpg'), 'alt' => 'Saat Teduh Bersama - Ps Juan Anthony Sam', 'link' => ''],
                            ['image' => asset('images/Poster2.jpg'), 'alt' => 'Jadwal Ibadah Ekklesia Surabaya', 'link' => ''],
                            ['image' => asset('images/Poster3.jpg'), 'alt' => 'Himbauan Kehati-hatian dan Waspada Penipuan', 'link' => ''],
                        ];
                    @endphp

                    <div id="slidesContainer" class="space-y-4">
                        @foreach($slides as $idx => $s)
                            <div class="slide-card p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] space-y-4 transition-all">
                                <div class="flex items-center justify-between pb-2 border-b border-gray-200 dark:border-[#222]">
                                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                        <span class="slide-label">Banner #{{ $idx + 1 }}</span>
                                    </span>
                                    <button type="button" onclick="removeSlideCard(this)" class="text-xs text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium inline-flex items-center gap-1 cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                                    <!-- Preview Image -->
                                    <div class="md:col-span-4">
                                        <div class="relative w-full aspect-16/9 bg-gray-900 rounded-lg overflow-hidden border border-gray-200 dark:border-[#333] flex items-center justify-center">
                                            <img id="preview_{{ $idx }}" src="{{ $s['image'] }}" alt="{{ $s['alt'] ?? 'Preview' }}" class="w-full h-full object-contain">
                                        </div>
                                        <p class="text-[10px] text-gray-400 text-center mt-1">Rekomendasi rasio: 16:9 atau resolusi poster 1920x1080</p>
                                    </div>

                                    <!-- Form Controls -->
                                    <div class="md:col-span-8 space-y-3">
                                        <div>
                                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Ganti File Gambar (Upload Foto Baru)</label>
                                            <input type="file" name="hero_slides[{{ $idx }}][image_file]" accept="image/*" onchange="previewSlideImage(this, 'preview_{{ $idx }}')" class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-gray-200 dark:file:bg-[#252525] file:text-gray-800 dark:file:text-gray-200 hover:file:bg-gray-300 dark:hover:file:bg-[#333] cursor-pointer">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Atau Gunakan URL Gambar</label>
                                            <input type="text" name="hero_slides[{{ $idx }}][image]" value="{{ $s['image'] }}" onchange="updatePreviewFromUrl(this, 'preview_{{ $idx }}')" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Judul / Keterangan Banner</label>
                                                <input type="text" name="hero_slides[{{ $idx }}][alt]" value="{{ $s['alt'] ?? '' }}" placeholder="Contoh: Waspada Penipuan / Jadwal Ibadah" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                            </div>
                                            <div>
                                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Link Klik (Opsional)</label>
                                                <input type="text" name="hero_slides[{{ $idx }}][link]" value="{{ $s['link'] ?? '' }}" placeholder="https://... atau biarkan kosong" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Card Cepat: Upload Banner Baru Langsung -->
                    <div class="p-4 rounded-xl bg-indigo-50/50 dark:bg-indigo-950/20 border border-dashed border-indigo-200 dark:border-indigo-900/40 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                            <span class="text-xs font-semibold text-indigo-950 dark:text-indigo-300">Upload Banner Baru Langsung</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih File Banner</label>
                                <input type="file" name="new_slide_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-medium file:bg-indigo-100 dark:file:bg-indigo-900/50 file:text-indigo-800 dark:file:text-indigo-200 hover:file:bg-indigo-200 cursor-pointer">
                            </div>
                            <div>
                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Keterangan / Judul</label>
                                <input type="text" name="new_slide_alt" placeholder="Contoh: Pengumuman Acara Natal" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                            </div>
                            <div>
                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Link Klik (Opsional)</label>
                                <input type="text" name="new_slide_link" placeholder="https://..." class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 1. TEMA TAHUNAN GEREJA -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <div class="flex items-center gap-2.5 pb-3 border-b border-gray-100 dark:border-[#262626]">
                        <span class="p-2 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Tema Tahunan Gereja</h2>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Tampil di banner tema beranda dan footer seluruh website</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Tahun</label>
                            <input type="text" name="theme_year" value="{{ $homeData['theme_2026']['year'] ?? '2026' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Slogan / Tagline</label>
                            <input type="text" name="theme_slogan" value="{{ $homeData['theme_2026']['slogan'] ?? 'Welcome Home' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Tema</label>
                        <input type="text" name="theme_title" value="{{ $homeData['theme_2026']['title'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Ayat Firman Tuhan</label>
                        <textarea name="theme_verse" rows="3" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ $homeData['theme_2026']['verse'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Referensi Alkitab (Kitab, Pasal:Ayat)</label>
                        <input type="text" name="theme_reference" value="{{ $homeData['theme_2026']['reference'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                    </div>
                </div>

                <!-- 2. REKENING PERSEMBAHAN & DONASI -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <div class="flex items-center gap-2.5 pb-3 border-b border-gray-100 dark:border-[#262626]">
                        <span class="p-2 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Rekening Persembahan & Donasi</h2>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Informasi rekening transfer perpuluhan, persembahan umum, dan misi</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Bank</label>
                            <input type="text" name="giving_bank_name" value="{{ $homeData['giving']['bank_name'] ?? 'Bank Danamon' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor Rekening</label>
                            <input type="text" name="giving_account_number" value="{{ $homeData['giving']['account_number'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Atas Nama Rekening</label>
                            <input type="text" name="giving_account_holder" value="{{ $homeData['giving']['account_holder'] ?? 'GKRI JEMAAT EKKLESIA' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Kode Misi / Persembahan Khusus</label>
                            <input type="text" name="giving_m3_code" value="{{ $homeData['giving']['m3_code'] ?? 'Persembahan M3' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Tujuan / Alokasi Persembahan</label>
                            <input type="text" name="giving_purpose" value="{{ $homeData['giving']['purpose'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Info QRIS (NMID)</label>
                            <input type="text" name="giving_qris_info" value="{{ $homeData['giving']['qris_info'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>
                </div>

                <!-- 3. LAYANAN PASTORAL -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <div class="flex items-center gap-2.5 pb-3 border-b border-gray-100 dark:border-[#262626]">
                        <span class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Layanan Pastoral</h2>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">4 layanan gereja untuk mendampingi jemaat (dilengkapi link WhatsApp otomatis)</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @foreach($homeData['pastoral_services'] as $idx => $srv)
                            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-100 dark:border-[#252525] space-y-3">
                                <input type="hidden" name="pastoral_services[{{ $idx }}][icon]" value="{{ $srv['icon'] ?? 'shield' }}">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Layanan</label>
                                        <input type="text" name="pastoral_services[{{ $idx }}][title]" value="{{ $srv['title'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Template Chat WhatsApp</label>
                                        <input type="text" name="pastoral_services[{{ $idx }}][whatsapp_text]" value="{{ $srv['whatsapp_text'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi Singkat</label>
                                    <input type="text" name="pastoral_services[{{ $idx }}][desc]" value="{{ $srv['desc'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Simpan Button -->
                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan Beranda
                    </button>
                </div>
            </form>

        </div>
    </main>

    <script>
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            const sun = document.getElementById('sunIcon');
            const moon = document.getElementById('moonIcon');
            const label = document.getElementById('themeLabel');
            if (sun && moon) {
                isDark ? sun.classList.remove('hidden') : sun.classList.add('hidden');
                isDark ? moon.classList.add('hidden') : moon.classList.remove('hidden');
            }
            if (label) label.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';
        }
        function toggleAdminTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateThemeIcons();
        }
        updateThemeIcons();

        // Slide helpers
        function previewSlideImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(previewId);
                    if (img) img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updatePreviewFromUrl(input, previewId) {
            const img = document.getElementById(previewId);
            if (img && input.value.trim() !== '') {
                img.src = input.value.trim();
            }
        }

        function removeSlideCard(btn) {
            const container = document.getElementById('slidesContainer');
            const cards = container.querySelectorAll('.slide-card');
            if (cards.length <= 1) {
                alert('Minimal harus ada 1 banner!');
                return;
            }
            const card = btn.closest('.slide-card');
            if (card) {
                card.remove();
                renumberSlides();
            }
        }

        function renumberSlides() {
            const cards = document.querySelectorAll('#slidesContainer .slide-card');
            cards.forEach((card, idx) => {
                const label = card.querySelector('.slide-label');
                if (label) label.textContent = 'Banner #' + (idx + 1);
            });
        }

        function addNewSlideCard() {
            const container = document.getElementById('slidesContainer');
            const idx = Date.now();
            const count = container.querySelectorAll('.slide-card').length + 1;
            
            const div = document.createElement('div');
            div.className = 'slide-card p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] space-y-4 transition-all';
            div.innerHTML = `
                <div class="flex items-center justify-between pb-2 border-b border-gray-200 dark:border-[#222]">
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="slide-label">Banner #\${count} (Baru)</span>
                    </span>
                    <button type="button" onclick="removeSlideCard(this)" class="text-xs text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-medium inline-flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Hapus</span>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                    <div class="md:col-span-4">
                        <div class="relative w-full aspect-16/9 bg-gray-900 rounded-lg overflow-hidden border border-gray-200 dark:border-[#333] flex items-center justify-center">
                            <img id="preview_\${idx}" src="/images/Poster1.jpg" alt="Preview" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <div class="md:col-span-8 space-y-3">
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Upload File Gambar</label>
                            <input type="file" name="hero_slides[\${idx}][image_file]" accept="image/*" onchange="previewSlideImage(this, 'preview_\${idx}')" class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-gray-200 dark:file:bg-[#252525] file:text-gray-800 dark:file:text-gray-200 hover:file:bg-gray-300 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Atau Gunakan URL Gambar</label>
                            <input type="text" name="hero_slides[\${idx}][image]" placeholder="https://..." onchange="updatePreviewFromUrl(this, 'preview_\${idx}')" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Judul / Keterangan Banner</label>
                                <input type="text" name="hero_slides[\${idx}][alt]" placeholder="Contoh: Banner Waspada Penipuan" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                            </div>
                            <div>
                                <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Link Klik (Opsional)</label>
                                <input type="text" name="hero_slides[\${idx}][link]" placeholder="https://... atau kosongkan" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(div);
            renumberSlides();
        }
    </script>
</body>
</html>
