<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Analitik — Ekklesia Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Anti-FOUC Theme Script -->
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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Chart.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-50 dark:bg-[#121212] text-gray-900 dark:text-gray-100 antialiased font-['Plus_Jakarta_Sans',sans-serif] selection:bg-gray-400/20">

    <!-- Top Minimalist Navigation Bar -->
    <header class="sticky top-0 z-30 bg-white/90 dark:bg-[#161616]/90 backdrop-blur-md border-b border-gray-200 dark:border-[#262626]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-14 sm:h-16 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="inline-flex items-center justify-center w-7 h-7 sm:w-8 sm:h-8 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Ekklesia Surabaya" class="w-full h-full object-contain">
                </span>
                <div>
                    <h1 class="text-sm sm:text-base font-medium tracking-tight text-gray-950 dark:text-white leading-none">
                        Ekklesia Admin
                    </h1>
                    <span class="text-[10px] text-gray-500 dark:text-gray-400 font-light hidden sm:inline">
                        Dashboard Analitik
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Theme Toggle Button -->
                <button type="button" 
                        onclick="toggleAdminTheme()" 
                        id="adminThemeToggleBtn"
                        class="p-2 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-[#222222] transition cursor-pointer"
                        title="Ubah Mode Gelap / Terang">
                    <svg id="sunIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg id="moonIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Website Link -->
                <a href="{{ route('home') }}" 
                   target="_blank" 
                   class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333333] rounded-lg transition hover:bg-gray-50 dark:hover:bg-[#202020]">
                    <span>Buka Web</span>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>

                <!-- Logout Form -->
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-normal text-red-600 dark:text-red-400 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 border border-red-200 dark:border-red-900/40 rounded-lg transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

        @if(session('success'))
            <div class="p-3.5 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <span class="text-[11px] opacity-70">Masuk sebagai {{ session('admin_user', 'admin') }}</span>
            </div>
        @endif

        @if(!empty($summary['is_demo_data']))
            <div class="p-3.5 rounded-xl bg-blue-50/70 dark:bg-blue-950/20 border border-blue-200 dark:border-blue-900/40 text-blue-800 dark:text-blue-300 text-xs flex items-start gap-2.5">
                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="leading-relaxed">
                    <strong class="font-medium">Mode Pratinjau:</strong> Tabel database analitik belum dimigrasi di server. Grafik menampilkan data simulasi kunjungan &amp; klik link agar Anda dapat melihat tampilannya langsung. Begitu migrasi dijalankan, data otomatis diambil dari database secara live.
                </div>
            </div>
        @endif

        <!-- 1. Summary Cards (2 columns on mobile, 4 columns on desktop) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            <!-- Total Visits -->
            <div class="p-4 sm:p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
                <span class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-normal">
                    Total Kunjungan
                </span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-light text-gray-950 dark:text-white">
                        {{ number_format($summary['total_visits']) }}
                    </span>
                    <span class="text-[10px] text-gray-400 font-light">Semua Halaman</span>
                </div>
            </div>

            <!-- Visits Today -->
            <div class="p-4 sm:p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
                <span class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-normal">
                    Kunjungan Hari Ini
                </span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-light text-gray-950 dark:text-white">
                        {{ number_format($summary['today_visits']) }}
                    </span>
                    <span class="text-[10px] text-emerald-600 dark:text-emerald-400 font-medium">Hari ini</span>
                </div>
            </div>

            <!-- Total Link Clicks -->
            <div class="p-4 sm:p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
                <span class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-normal">
                    Total Klik Link
                </span>
                <div class="mt-2 flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-light text-gray-950 dark:text-white">
                        {{ number_format($summary['total_clicks']) }}
                    </span>
                    <span class="text-[10px] text-gray-400 font-light">+{{ $summary['today_clicks'] }} hari ini</span>
                </div>
            </div>

            <!-- Top Link -->
            <div class="p-4 sm:p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
                <span class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-normal">
                    Link Terfavorit
                </span>
                <div class="mt-2">
                    <span class="text-base sm:text-lg font-medium text-gray-950 dark:text-white truncate block" title="{{ $summary['top_link'] }}">
                        {{ $summary['top_link'] }}
                    </span>
                    <span class="text-[10px] text-gray-400 font-light mt-0.5 block">Paling sering diklik</span>
                </div>
            </div>
        </div>

        <!-- 2. Charts Section (Grid: 1 on mobile, 2 columns on desktop) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Grafik Riwayat Kunjungan (Takes 2 cols on lg) -->
            <div class="lg:col-span-2 p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs flex flex-col justify-between">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                    <div>
                        <h2 class="text-sm sm:text-base font-medium text-gray-950 dark:text-white">
                            Grafik Riwayat Kunjungan
                        </h2>
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-light">
                            Tren aktivitas pengunjung halaman
                        </p>
                    </div>

                    <!-- Range Selector (7 / 14 / 30 Hari) -->
                    <div class="inline-flex p-0.5 rounded-lg bg-gray-100 dark:bg-[#242424] text-xs self-start sm:self-auto">
                        <a href="{{ route('admin.dashboard', ['range' => 7]) }}" 
                           class="px-2.5 py-1 rounded-md transition {{ $days === 7 ? 'bg-white dark:bg-[#141414] text-gray-950 dark:text-white font-medium shadow-2xs' : 'text-gray-500 hover:text-gray-900 dark:hover:text-white' }}">
                            7 Hari
                        </a>
                        <a href="{{ route('admin.dashboard', ['range' => 14]) }}" 
                           class="px-2.5 py-1 rounded-md transition {{ $days === 14 ? 'bg-white dark:bg-[#141414] text-gray-950 dark:text-white font-medium shadow-2xs' : 'text-gray-500 hover:text-gray-900 dark:hover:text-white' }}">
                            14 Hari
                        </a>
                        <a href="{{ route('admin.dashboard', ['range' => 30]) }}" 
                           class="px-2.5 py-1 rounded-md transition {{ $days === 30 ? 'bg-white dark:bg-[#141414] text-gray-950 dark:text-white font-medium shadow-2xs' : 'text-gray-500 hover:text-gray-900 dark:hover:text-white' }}">
                            30 Hari
                        </a>
                    </div>
                </div>

                <!-- Canvas Wrapper -->
                <div class="relative w-full h-56 sm:h-72">
                    <canvas id="visitChartCanvas"></canvas>
                </div>
            </div>

            <!-- Grafik Distribusi Klik Link (Takes 1 col on lg) -->
            <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs flex flex-col justify-between">
                <div class="mb-4">
                    <h2 class="text-sm sm:text-base font-medium text-gray-950 dark:text-white">
                        Grafik Klik Link
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-light">
                        Distribusi tombol &amp; tautan yang diklik
                    </p>
                </div>

                <!-- Canvas Wrapper -->
                <div class="relative w-full h-56 sm:h-72">
                    <canvas id="clickChartCanvas"></canvas>
                </div>
            </div>

        </div>

        <!-- 3. Recent Link Clicks Log (Simple, clean list) -->
        <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-sm sm:text-base font-medium text-gray-950 dark:text-white">
                        Riwayat Klik Link Terakhir
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-light">
                        Aktivitas pengguna saat menekan tautan penting
                    </p>
                </div>
            </div>

            <div class="divide-y divide-gray-100 dark:divide-[#262626]">
                @forelse($recentClicks as $click)
                    <div class="py-3 flex items-center justify-between gap-3 text-xs">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-950 dark:text-white truncate">
                                    {{ $click['label'] }}
                                </span>
                                <span class="px-1.5 py-0.5 text-[9px] uppercase tracking-wider rounded bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400">
                                    {{ $click['device'] }}
                                </span>
                            </div>
                            <span class="text-gray-400 dark:text-gray-500 truncate block mt-0.5 text-[11px]">
                                {{ $click['url'] }}
                            </span>
                        </div>
                        <div class="text-right text-[11px] text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ $click['time_human'] }}
                        </div>
                    </div>
                @empty
                    <div class="py-6 text-center text-xs text-gray-400 font-light">
                        Belum ada data riwayat klik link.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- 4. Banner Iklan Kemitraan Manager -->
        <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
            <div class="flex items-start justify-between mb-5">
                <div>
                    <h2 class="text-sm sm:text-base font-medium text-gray-950 dark:text-white flex items-center gap-2">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-amber-100 dark:bg-amber-900/30">
                            <svg class="w-3.5 h-3.5 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </span>
                        Banner Iklan Kemitraan
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-light mt-0.5">
                        Floating banner di bagian bawah tengah website — input HTML bebas
                    </p>
                </div>

                <!-- Status Badge -->
                <span id="bannerStatusBadge"
                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-medium
                             {{ $bannerData['enabled'] ? 'bg-emerald-50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-900/40' : 'bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-[#333333]' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $bannerData['enabled'] ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                    {{ $bannerData['enabled'] ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>

            @if(session('banner_success'))
                <div class="mb-4 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('banner_success') }}
                </div>
            @endif

            <form action="{{ route('admin.banner.save') }}" method="POST" id="bannerForm">
                @csrf

                <!-- Enable Toggle -->
                <div class="flex items-center justify-between p-3.5 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-100 dark:border-[#252525] mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-900 dark:text-white">Tampilkan Banner</p>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">Aktifkan untuk menampilkan banner di semua halaman website</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox"
                               id="bannerEnabledToggle"
                               name="banner_enabled"
                               value="1"
                               {{ $bannerData['enabled'] ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-10 h-5.5 sm:w-11 sm:h-6 bg-gray-200 dark:bg-[#333333] peer-focus:outline-none rounded-full peer
                                    peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-gray-900 dark:peer-checked:bg-white
                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                    after:bg-white dark:after:bg-[#121212] after:rounded-full after:h-4 after:w-4 sm:after:h-5 sm:after:w-5
                                    after:transition-all"></div>
                    </label>
                </div>

                <!-- HTML Editor -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <label for="bannerHtmlInput" class="text-xs font-medium text-gray-700 dark:text-gray-300">
                            Konten HTML Banner
                        </label>
                        <div class="flex items-center gap-2">
                            <button type="button"
                                    onclick="toggleBannerPreview()"
                                    class="text-[11px] text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Preview
                            </button>
                            <button type="button"
                                    onclick="clearBannerHtml()"
                                    class="text-[11px] text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>

                    <textarea id="bannerHtmlInput"
                              name="banner_html"
                              rows="8"
                              placeholder="Masukkan HTML untuk banner iklan kemitraan...&#10;&#10;Contoh:&#10;&lt;div style=&quot;text-align:center;&quot;&gt;&#10;  &lt;a href=&quot;https://mitra.com&quot; target=&quot;_blank&quot;&gt;&#10;    &lt;img src=&quot;https://mitra.com/banner.jpg&quot; alt=&quot;Mitra&quot;&gt;&#10;  &lt;/a&gt;&#10;&lt;/div&gt;"
                              class="w-full px-3 py-3 text-[12px] leading-relaxed font-mono rounded-xl bg-gray-50 dark:bg-[#0E0E0E] border border-gray-200 dark:border-[#2E2E2E] text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900/20 dark:focus:ring-white/10 focus:border-gray-400 dark:focus:border-gray-600 resize-y transition">{{ $bannerData['html'] }}</textarea>

                    <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-1.5">
                        HTML bebas — gambar, link, teks, atau embed diperbolehkan. Maks. 10.000 karakter.
                        @if($bannerData['updated_at'])
                            · Terakhir diperbarui: {{ $bannerData['updated_at'] }}
                        @endif
                    </p>
                </div>

                <!-- Live Preview Box -->
                <div id="bannerPreviewBox" class="hidden mb-4">
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mb-2 uppercase tracking-widest font-medium">Preview Banner</p>
                    <div class="relative rounded-xl overflow-hidden border border-dashed border-gray-300 dark:border-[#333333] bg-gray-900/5 dark:bg-white/5 p-4 min-h-[80px] flex items-center justify-center">
                        <div id="bannerPreviewContent" class="w-full text-center"></div>
                    </div>
                </div>

                <!-- Quick Template Buttons -->
                <div class="mb-4">
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mb-2">Template Cepat:</p>
                    <div class="flex flex-wrap gap-2">
                        <button type="button"
                                onclick="insertTemplate('image-link')"
                                class="px-2.5 py-1 text-[10px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333]">
                            🖼 Gambar + Link
                        </button>
                        <button type="button"
                                onclick="insertTemplate('text-cta')"
                                class="px-2.5 py-1 text-[10px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333]">
                            📢 Teks + CTA
                        </button>
                        <button type="button"
                                onclick="insertTemplate('gradient-card')"
                                class="px-2.5 py-1 text-[10px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333]">
                            ✨ Kartu Gradient
                        </button>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100 dark:border-[#252525]">
                    <span class="text-[11px] text-gray-400 dark:text-gray-500" id="bannerCharCount">0 / 10.000 karakter</span>
                    <button type="submit"
                            class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-medium bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-200 transition active:scale-95 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Banner
                    </button>
                </div>
            </form>
        </div>

    </main>

    <!-- Theme & Chart.js Initialization Script -->
    <script>
        // 1. Dark/Light Mode Switcher
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            const sun = document.getElementById('sunIcon');
            const moon = document.getElementById('moonIcon');
            if (sun && moon) {
                if (isDark) {
                    sun.classList.remove('hidden');
                    moon.classList.add('hidden');
                } else {
                    sun.classList.add('hidden');
                    moon.classList.remove('hidden');
                }
            }
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
            renderCharts();
        }

        updateThemeIcons();

        // 2. Chart.js Render Engine
        let visitChartInstance = null;
        let clickChartInstance = null;

        const visitLabels = @json($visitChart['labels']);
        const visitValues = @json($visitChart['values']);

        const clickLabels = @json($clickChart['labels']);
        const clickValues = @json($clickChart['values']);

        function renderCharts() {
            const isDark = document.documentElement.classList.contains('dark');
            const textColor = isDark ? '#A0A0A0' : '#6B7280';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.05)';
            const primaryColor = isDark ? '#FFFFFF' : '#111111';

            // Destroy previous instances if re-rendering
            if (visitChartInstance) visitChartInstance.destroy();
            if (clickChartInstance) clickChartInstance.destroy();

            // 1) Visit History Line Chart
            const visitCtx = document.getElementById('visitChartCanvas');
            if (visitCtx) {
                const ctx = visitCtx.getContext('2d');
                let gradient = ctx.createLinearGradient(0, 0, 0, 260);
                if (isDark) {
                    gradient.addColorStop(0, 'rgba(255, 255, 255, 0.15)');
                    gradient.addColorStop(1, 'rgba(255, 255, 255, 0.0)');
                } else {
                    gradient.addColorStop(0, 'rgba(17, 17, 17, 0.12)');
                    gradient.addColorStop(1, 'rgba(17, 17, 17, 0.0)');
                }

                visitChartInstance = new Chart(visitCtx, {
                    type: 'line',
                    data: {
                        labels: visitLabels,
                        datasets: [{
                            label: 'Kunjungan',
                            data: visitValues,
                            borderColor: primaryColor,
                            borderWidth: 2,
                            pointBackgroundColor: primaryColor,
                            pointBorderColor: primaryColor,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                            fill: true,
                            backgroundColor: gradient,
                            tension: 0.35
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: isDark ? '#1C1C1C' : '#FFFFFF',
                                titleColor: isDark ? '#FFFFFF' : '#111111',
                                bodyColor: isDark ? '#CCCCCC' : '#4B5563',
                                borderColor: isDark ? '#333333' : '#E5E7EB',
                                borderWidth: 1,
                                padding: 10,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        scales: {
                            x: {
                                grid: { color: gridColor },
                                ticks: {
                                    color: textColor,
                                    font: { size: 10, family: 'Plus Jakarta Sans' },
                                    maxRotation: 0,
                                    autoSkip: true,
                                    maxTicksLimit: 7
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: gridColor },
                                ticks: {
                                    color: textColor,
                                    font: { size: 10, family: 'Plus Jakarta Sans' },
                                    precision: 0
                                }
                            }
                        }
                    }
                });
            }

            // 2) Link Click Bar Chart
            const clickCtx = document.getElementById('clickChartCanvas');
            if (clickCtx) {
                clickChartInstance = new Chart(clickCtx, {
                    type: 'bar',
                    data: {
                        labels: clickLabels,
                        datasets: [{
                            label: 'Total Klik',
                            data: clickValues,
                            backgroundColor: isDark ? '#383838' : '#D1D5DB',
                            hoverBackgroundColor: primaryColor,
                            borderRadius: 6,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y', // Horizontal bars are very readable on mobile!
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: isDark ? '#1C1C1C' : '#FFFFFF',
                                titleColor: isDark ? '#FFFFFF' : '#111111',
                                bodyColor: isDark ? '#CCCCCC' : '#4B5563',
                                borderColor: isDark ? '#333333' : '#E5E7EB',
                                borderWidth: 1,
                                padding: 10,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                                grid: { color: gridColor },
                                ticks: {
                                    color: textColor,
                                    font: { size: 10, family: 'Plus Jakarta Sans' },
                                    precision: 0
                                }
                            },
                            y: {
                                grid: { display: false },
                                ticks: {
                                    color: textColor,
                                    font: { size: 10, family: 'Plus Jakarta Sans' },
                                    callback: function(val, index) {
                                        const label = this.getLabelForValue(val);
                                        return label.length > 14 ? label.substr(0, 14) + '...' : label;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        }

        window.addEventListener('DOMContentLoaded', renderCharts);
    </script>

    <!-- Banner Editor Scripts -->
    <script>
        // Character counter
        const bannerInput = document.getElementById('bannerHtmlInput');
        const charCount   = document.getElementById('bannerCharCount');
        function updateCharCount() {
            const len = bannerInput ? bannerInput.value.length : 0;
            if (charCount) charCount.textContent = len.toLocaleString('id-ID') + ' / 10.000 karakter';
        }
        if (bannerInput) {
            bannerInput.addEventListener('input', updateCharCount);
            updateCharCount();
        }

        // Preview toggle
        function toggleBannerPreview() {
            const box  = document.getElementById('bannerPreviewBox');
            const cont = document.getElementById('bannerPreviewContent');
            if (!box || !cont) return;
            if (box.classList.contains('hidden')) {
                cont.innerHTML = bannerInput ? bannerInput.value : '';
                box.classList.remove('hidden');
            } else {
                box.classList.add('hidden');
                cont.innerHTML = '';
            }
        }

        // Clear HTML
        function clearBannerHtml() {
            if (!bannerInput) return;
            if (confirm('Hapus seluruh konten HTML banner?')) {
                bannerInput.value = '';
                updateCharCount();
                const box = document.getElementById('bannerPreviewBox');
                if (box && !box.classList.contains('hidden')) {
                    box.classList.add('hidden');
                    const cont = document.getElementById('bannerPreviewContent');
                    if (cont) cont.innerHTML = '';
                }
            }
        }

        // Quick templates
        const templates = {
            'image-link': `<div style="display:flex;align-items:center;justify-content:center;gap:12px;padding:8px 16px;">
  <a href="https://mitra-anda.com" target="_blank" rel="noopener" style="display:inline-block;text-decoration:none;">
    <img src="https://via.placeholder.com/200x50?text=Logo+Mitra" alt="Mitra Iklan" style="height:50px;width:auto;display:block;">
  </a>
  <span style="font-size:12px;color:#888;">| Mitra Kemitraan Ekklesia</span>
</div>`,
            'text-cta': `<div style="display:flex;align-items:center;justify-content:center;gap:12px;padding:10px 20px;font-family:inherit;">
  <span style="font-size:13px;color:#555;">✨ Ingin bermitra dengan kami?</span>
  <a href="https://wa.me/628XXXXXXXXXX" target="_blank" rel="noopener"
     style="display:inline-flex;align-items:center;gap:6px;padding:6px 14px;background:#111;color:#fff;border-radius:20px;font-size:12px;font-weight:500;text-decoration:none;">
    Hubungi Kami
  </a>
</div>`,
            'gradient-card': `<div style="background:linear-gradient(135deg,#667eea,#764ba2);padding:12px 24px;border-radius:12px;display:inline-flex;align-items:center;gap:12px;">
  <span style="font-size:16px;">🙌</span>
  <div style="text-align:left;">
    <div style="color:#fff;font-size:13px;font-weight:600;line-height:1.2;">Nama Mitra / Sponsor</div>
    <div style="color:rgba(255,255,255,0.75);font-size:11px;">Deskripsi singkat layanan atau produk mitra</div>
  </div>
  <a href="https://mitra.com" target="_blank" rel="noopener"
     style="padding:5px 12px;background:rgba(255,255,255,0.2);border:1px solid rgba(255,255,255,0.4);color:#fff;border-radius:8px;font-size:11px;text-decoration:none;white-space:nowrap;">
    Kunjungi →
  </a>
</div>`
        };

        function insertTemplate(key) {
            if (!bannerInput || !templates[key]) return;
            bannerInput.value = templates[key];
            updateCharCount();
        }
    </script>
</body>
</html>
