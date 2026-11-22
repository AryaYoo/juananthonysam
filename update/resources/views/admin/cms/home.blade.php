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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-4">

            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-2">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Beranda (Home)</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ubah banner utama, tema tahunan gereja, rekening donasi/persembahan, dan layanan pastoral</p>
                </div>
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020] self-start sm:self-auto">
                    <span>Lihat Halaman Beranda</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            <form action="{{ route('admin.cms.home.save') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                {{-- =====================================================
                     SECTION 0: BANNER UTAMA
                     ===================================================== --}}
                <div class="rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs overflow-hidden">

                    {{-- Header (klik untuk buka/tutup) --}}
                    <button type="button" onclick="toggleSection('banner')"
                        class="w-full flex items-center justify-between px-5 sm:px-6 py-4 text-left transition-colors hover:bg-gray-50 dark:hover:bg-[#1f1f1f] cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="p-2 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white leading-tight">Banner Utama (Hero Carousel Slides)</p>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Poster besar di bagian paling atas halaman beranda</p>
                            </div>
                        </div>
                        <svg id="chevron-banner" class="w-4 h-4 text-gray-400 flex-shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Body --}}
                    <div id="body-banner" class="border-t border-gray-100 dark:border-[#262626] px-5 sm:px-6 py-5 space-y-4">

                        @php
                            $slides = $homeData['hero_slides'] ?? [
                                ['image' => '/images/Poster1.jpg', 'alt' => 'Saat Teduh Bersama - Ps Juan Anthony Sam', 'link' => ''],
                                ['image' => '/images/Poster2.jpg', 'alt' => 'Jadwal Ibadah Ekklesia Surabaya', 'link' => ''],
                                ['image' => '/images/Poster3.jpg', 'alt' => 'Himbauan Kehati-hatian dan Waspada Penipuan', 'link' => ''],
                            ];
                        @endphp

                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Tambah, hapus, atau ganti poster yang tampil di carousel beranda.</p>
                            <button type="button" onclick="addNewSlideCard()"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-xl bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-900/50 hover:bg-indigo-100 dark:hover:bg-indigo-900/60 transition cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span>Tambah Banner</span>
                            </button>
                        </div>

                        <div id="slidesContainer" class="space-y-3">
                            @foreach($slides as $idx => $s)
                                <div class="slide-card rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] overflow-hidden">

                                    {{-- Slide header --}}
                                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#222]">
                                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                            </svg>
                                            <span class="slide-label">Banner #{{ $idx + 1 }}</span>
                                        </span>
                                        <button type="button" onclick="removeSlideCard(this)"
                                            class="text-xs text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium inline-flex items-center gap-1 cursor-pointer transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>

                                    {{-- Slide body --}}
                                    <div class="p-4 flex flex-col sm:flex-row gap-4">
                                        {{-- Preview --}}
                                        <div class="sm:w-48 flex-shrink-0">
                                            <div class="w-full bg-gray-900 rounded-lg overflow-hidden border border-gray-300 dark:border-[#333]" style="aspect-ratio:16/9">
                                                <img id="preview_{{ $idx }}" src="{{ $s['image'] }}" alt="{{ $s['alt'] ?? 'Preview' }}" class="w-full h-full object-cover" onerror="this.src=''">
                                            </div>
                                            <p class="text-[10px] text-gray-400 text-center mt-1.5">Rasio 16:9 · maks 2 MB</p>
                                        </div>

                                        {{-- Form --}}
                                        <div class="flex-1 min-w-0 space-y-3">
                                            <div>
                                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Upload Gambar Baru</label>
                                                <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-dashed border-gray-300 dark:border-[#383838] bg-white dark:bg-[#1a1a1a] cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-950/20 transition-colors group">
                                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                                    </svg>
                                                    <span class="text-xs text-gray-500 group-hover:text-indigo-600 truncate" id="filelabel_{{ $idx }}">Pilih file foto (JPG, PNG, WebP)</span>
                                                    <input type="file" name="hero_slides[{{ $idx }}][image_file]" accept="image/*" class="sr-only" onchange="previewSlideImage(this,'preview_{{ $idx }}','filelabel_{{ $idx }}')">
                                                </label>
                                            </div>
                                            <div>
                                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Atau URL Gambar</label>
                                                <input type="text" name="hero_slides[{{ $idx }}][image]" value="{{ $s['image'] }}" placeholder="https://..." oninput="updatePreviewFromUrl(this,'preview_{{ $idx }}')"
                                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                            </div>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Keterangan / Judul</label>
                                                    <input type="text" name="hero_slides[{{ $idx }}][alt]" value="{{ $s['alt'] ?? '' }}" placeholder="mis. Jadwal Ibadah Minggu"
                                                        class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                                </div>
                                                <div>
                                                    <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Link Klik <span class="font-normal normal-case text-gray-400">(Opsional)</span></label>
                                                    <input type="text" name="hero_slides[{{ $idx }}][link]" value="{{ $s['link'] ?? '' }}" placeholder="https://... atau kosongkan"
                                                        class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Quick upload --}}
                        <div class="p-4 rounded-xl bg-indigo-50/50 dark:bg-indigo-950/20 border border-dashed border-indigo-200 dark:border-indigo-900/40 space-y-3">
                            <p class="text-xs font-semibold text-indigo-900 dark:text-indigo-300 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                Upload Banner Baru Langsung
                            </p>
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

                    </div>{{-- /body-banner --}}
                </div>{{-- /section banner --}}


                {{-- =====================================================
                     SECTION 1: TEMA TAHUNAN
                     ===================================================== --}}
                <div class="rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs overflow-hidden">

                    <button type="button" onclick="toggleSection('tema')"
                        class="w-full flex items-center justify-between px-5 sm:px-6 py-4 text-left transition-colors hover:bg-gray-50 dark:hover:bg-[#1f1f1f] cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="p-2 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white leading-tight">Tema Tahunan Gereja</p>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Tampil di banner tema beranda dan footer seluruh website</p>
                            </div>
                        </div>
                        <svg id="chevron-tema" class="w-4 h-4 text-gray-400 flex-shrink-0 transition-transform duration-200 -rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="body-tema" class="hidden border-t border-gray-100 dark:border-[#262626] px-5 sm:px-6 py-5 space-y-4">

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

                    </div>{{-- /body-tema --}}
                </div>{{-- /section tema --}}


                {{-- =====================================================
                     SECTION 2: REKENING & DONASI
                     ===================================================== --}}
                <div class="rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs overflow-hidden">

                    <button type="button" onclick="toggleSection('rekening')"
                        class="w-full flex items-center justify-between px-5 sm:px-6 py-4 text-left transition-colors hover:bg-gray-50 dark:hover:bg-[#1f1f1f] cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="p-2 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white leading-tight">Rekening Persembahan & Donasi</p>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Informasi rekening transfer perpuluhan, persembahan umum, dan misi</p>
                            </div>
                        </div>
                        <svg id="chevron-rekening" class="w-4 h-4 text-gray-400 flex-shrink-0 transition-transform duration-200 -rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="body-rekening" class="hidden border-t border-gray-100 dark:border-[#262626] px-5 sm:px-6 py-5 space-y-4">

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

                    </div>{{-- /body-rekening --}}
                </div>{{-- /section rekening --}}


                {{-- =====================================================
                     SECTION 3: LAYANAN PASTORAL
                     ===================================================== --}}
                <div class="rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs overflow-hidden">

                    <button type="button" onclick="toggleSection('pastoral')"
                        class="w-full flex items-center justify-between px-5 sm:px-6 py-4 text-left transition-colors hover:bg-gray-50 dark:hover:bg-[#1f1f1f] cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white leading-tight">Layanan Pastoral</p>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">4 layanan gereja untuk mendampingi jemaat (dilengkapi link WhatsApp otomatis)</p>
                            </div>
                        </div>
                        <svg id="chevron-pastoral" class="w-4 h-4 text-gray-400 flex-shrink-0 transition-transform duration-200 -rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div id="body-pastoral" class="hidden border-t border-gray-100 dark:border-[#262626] px-5 sm:px-6 py-5 space-y-4">

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

                    </div>{{-- /body-pastoral --}}
                </div>{{-- /section pastoral --}}


                {{-- Simpan Button --}}
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
        // ── Dark mode ──────────────────────────────────────────────────────────
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            const sun   = document.getElementById('sunIcon');
            const moon  = document.getElementById('moonIcon');
            const lbl   = document.getElementById('themeLabel');
            if (sun && moon) {
                isDark ? sun.classList.remove('hidden') : sun.classList.add('hidden');
                isDark ? moon.classList.add('hidden')  : moon.classList.remove('hidden');
            }
            if (lbl) lbl.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';
        }
        function toggleAdminTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            updateThemeIcons();
        }
        updateThemeIcons();

        // ── Collapsible sections ───────────────────────────────────────────────
        // Default: banner = open, others = closed (chevron rotated -90deg in HTML for closed)
        function toggleSection(id) {
            const body    = document.getElementById('body-' + id);
            const chevron = document.getElementById('chevron-' + id);
            if (!body) return;

            const isOpen = !body.classList.contains('hidden');
            body.classList.toggle('hidden', isOpen);
            if (chevron) chevron.style.transform = isOpen ? 'rotate(-90deg)' : 'rotate(0deg)';

            try { localStorage.setItem('cms_sec_' + id, isOpen ? '0' : '1'); } catch(e) {}
        }

        // Restore saved open/closed state on load
        (function() {
            const defaults = { banner: '1', tema: '0', rekening: '0', pastoral: '0' };
            Object.keys(defaults).forEach(function(id) {
                const saved   = localStorage.getItem('cms_sec_' + id) ?? defaults[id];
                const body    = document.getElementById('body-' + id);
                const chevron = document.getElementById('chevron-' + id);
                if (!body) return;
                if (saved === '1') {
                    body.classList.remove('hidden');
                    if (chevron) chevron.style.transform = 'rotate(0deg)';
                } else {
                    body.classList.add('hidden');
                    if (chevron) chevron.style.transform = 'rotate(-90deg)';
                }
            });
        })();

        // ── Slide helpers ──────────────────────────────────────────────────────
        function previewSlideImage(input, previewId, labelId) {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(previewId);
                if (img) img.src = e.target.result;
            };
            reader.readAsDataURL(file);
            const lbl = labelId ? document.getElementById(labelId) : null;
            if (lbl) lbl.textContent = file.name;
        }

        function updatePreviewFromUrl(input, previewId) {
            const img = document.getElementById(previewId);
            if (img && input.value.trim()) img.src = input.value.trim();
        }

        function removeSlideCard(btn) {
            const container = document.getElementById('slidesContainer');
            if (container.querySelectorAll('.slide-card').length <= 1) {
                swalAlert('Minimal harus ada 1 banner slide.', 'Tidak Bisa Dihapus', 'warning');
                return;
            }
            confirmAction(() => {
                const card = btn.closest('.slide-card');
                if (card) { card.remove(); renumberSlides(); }
            }, 'Banner slide ini akan dihapus dari carousel.', 'Hapus Banner?');
        }

        function renumberSlides() {
            document.querySelectorAll('#slidesContainer .slide-card').forEach(function(card, idx) {
                const lbl = card.querySelector('.slide-label');
                if (lbl) lbl.textContent = 'Banner #' + (idx + 1);
            });
        }

        function addNewSlideCard() {
            const container = document.getElementById('slidesContainer');
            const idx   = Date.now();
            const count = container.querySelectorAll('.slide-card').length + 1;
            const div   = document.createElement('div');
            div.className = 'slide-card rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] overflow-hidden';
            div.innerHTML = `
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#222]">
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span class="slide-label">Banner #\${count} (Baru)</span>
                    </span>
                    <button type="button" onclick="removeSlideCard(this)" class="text-xs text-red-500 hover:text-red-700 font-medium inline-flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </div>
                <div class="p-4 flex flex-col sm:flex-row gap-4">
                    <div class="sm:w-48 flex-shrink-0">
                        <div class="w-full bg-gray-900 rounded-lg overflow-hidden border border-gray-300 dark:border-[#333]" style="aspect-ratio:16/9">
                            <img id="preview_\${idx}" src="" alt="Preview" class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400 text-center mt-1.5">Rasio 16:9 · maks 2 MB</p>
                    </div>
                    <div class="flex-1 min-w-0 space-y-3">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Upload Gambar Baru</label>
                            <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-dashed border-gray-300 dark:border-[#383838] bg-white dark:bg-[#1a1a1a] cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition-colors group">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                <span class="text-xs text-gray-500 truncate" id="filelabel_\${idx}">Pilih file foto (JPG, PNG, WebP)</span>
                                <input type="file" name="hero_slides[\${idx}][image_file]" accept="image/*" class="sr-only" onchange="previewSlideImage(this,'preview_\${idx}','filelabel_\${idx}')">
                            </label>
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Atau URL Gambar</label>
                            <input type="text" name="hero_slides[\${idx}][image]" placeholder="https://..." oninput="updatePreviewFromUrl(this,'preview_\${idx}')"
                                class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Keterangan / Judul</label>
                                <input type="text" name="hero_slides[\${idx}][alt]" placeholder="mis. Jadwal Ibadah"
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Link Klik <span class="font-normal normal-case text-gray-400">(Opsional)</span></label>
                                <input type="text" name="hero_slides[\${idx}][link]" placeholder="https://..."
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(div);
            renumberSlides();
            div.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    </script>
</body>
</html>
