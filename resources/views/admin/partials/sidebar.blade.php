{{-- Admin Sidebar --}}
{{-- Usage: @include('admin.partials.sidebar', ['activePage' => 'dashboard']) --}}

@php
    $active = $activePage ?? '';
    $allPrayers = \App\Services\CmsService::getPrayerRequests();
    $uncontactedPrayers = count(array_filter($allPrayers, fn($p) => empty($p['is_contacted'])));
@endphp

<aside id="adminSidebar"
       class="fixed inset-y-0 left-0 z-40 flex flex-col w-64 bg-white dark:bg-[#161616] border-r border-gray-200 dark:border-[#262626] transition-transform duration-300
              -translate-x-full lg:translate-x-0 select-none">

    {{-- Logo / Header --}}
    <div class="flex items-center gap-3 px-5 h-16 border-b border-gray-100 dark:border-[#242424] shrink-0">
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg overflow-hidden shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Ekklesia Surabaya" class="w-full h-full object-contain">
        </span>
        <div class="min-w-0 flex-1">
            <p class="text-sm font-semibold text-gray-950 dark:text-white leading-tight truncate">Ekklesia Admin</p>
            <p class="text-[10px] text-gray-500 dark:text-gray-400 font-light truncate">Area Manajemen Web</p>
        </div>
    </div>

    {{-- Navigation Menu (Scrollable) --}}
    <nav class="flex-1 px-3 py-4 space-y-5 overflow-y-auto custom-scrollbar">

        {{-- KELOMPOK 1: UTAMA --}}
        <div>
            <p class="px-2.5 mb-1.5 text-[10px] font-semibold tracking-wider text-gray-400 dark:text-gray-500 uppercase">
                Utama
            </p>
            <div class="space-y-1">
                {{-- Analitik --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'dashboard' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="truncate">Analitik Pengunjung</span>
                </a>

                {{-- Kotak Permohonan Doa --}}
                <a href="{{ route('admin.prayers') }}"
                   class="flex items-center justify-between px-3 py-2 rounded-xl text-xs transition {{ $active === 'prayers' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <div class="flex items-center gap-3 min-w-0">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="truncate">Kotak Doa Jemaat</span>
                    </div>
                    @if($uncontactedPrayers > 0)
                        <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-semibold rounded-full bg-amber-500 text-white shrink-0">
                            {{ $uncontactedPrayers }}
                        </span>
                    @endif
                </a>
            </div>
        </div>

        {{-- KELOMPOK 2: KELOLA KONTEN HALAMAN (CMS) --}}
        <div>
            <p class="px-2.5 mb-1.5 text-[10px] font-semibold tracking-wider text-gray-400 dark:text-gray-500 uppercase">
                Konten Halaman
            </p>
            <div class="space-y-1">
                {{-- Beranda (Home) --}}
                <a href="{{ route('admin.cms.home') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-home' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="truncate">Beranda (Home)</span>
                </a>

                {{-- Jadwal Ibadah --}}
                <a href="{{ route('admin.cms.schedules') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-schedules' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="truncate">Jadwal Ibadah</span>
                </a>

                {{-- Profil Gereja --}}
                <a href="{{ route('admin.cms.profile') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-profile' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="truncate">Profil Gereja</span>
                </a>

                {{-- Profil Gembala --}}
                <a href="{{ route('admin.cms.pastors') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-pastors' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="truncate">Profil Gembala</span>
                </a>

                {{-- Pelayanan Ibadah Khusus --}}
                <a href="{{ route('admin.cms.ibadah') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-ibadah' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="truncate">Pelayanan Ibadah</span>
                </a>

                {{-- Acara & Agenda --}}
                <a href="{{ route('admin.cms.events') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-events' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="truncate">Acara & Agenda</span>
                </a>

                {{-- Galeri & Media Digital --}}
                <a href="{{ route('admin.cms.gallery') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'cms-gallery' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="truncate">Galeri & Media</span>
                </a>
            </div>
        </div>

        {{-- KELOMPOK 3: PENGUMUMAN --}}
        <div>
            <p class="px-2.5 mb-1.5 text-[10px] font-semibold tracking-wider text-gray-400 dark:text-gray-500 uppercase">
                Pengumuman
            </p>
            <div class="space-y-1">
                {{-- Banner Iklan --}}
                <a href="{{ route('admin.banner') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs transition {{ $active === 'banner' ? 'bg-gray-950 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    <span class="truncate">Banner Iklan & Kemitraan</span>
                </a>
            </div>
        </div>

    </nav>

    {{-- Bottom Section: Theme + Buka Web + Logout --}}
    <div class="px-3 py-3 space-y-1 border-t border-gray-100 dark:border-[#242424] shrink-0 bg-gray-50/50 dark:bg-[#141414]">

        {{-- Theme Toggle --}}
        <button type="button"
                onclick="toggleAdminTheme()"
                id="adminThemeToggleBtn"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222] transition cursor-pointer"
                title="Ubah Mode Gelap / Terang">
            <svg id="sunIcon" class="w-4 h-4 shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <svg id="moonIcon" class="w-4 h-4 shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
            <span id="themeLabel" class="truncate font-normal">Mode Gelap</span>
        </button>

        {{-- Buka Web --}}
        <a href="{{ route('home') }}"
           target="_blank"
           class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222] transition">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            <span class="truncate font-normal">Buka Website</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-xl text-xs text-red-600 dark:text-red-400 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 transition cursor-pointer">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span class="truncate font-normal">Keluar</span>
            </button>
        </form>
    </div>
</aside>

{{-- Mobile Overlay --}}
<div id="sidebarOverlay"
     class="fixed inset-0 z-30 bg-black/40 backdrop-blur-sm hidden lg:hidden"
     onclick="closeSidebar()"></div>

{{-- Mobile Top Bar --}}
<header class="lg:hidden fixed top-0 left-0 right-0 z-30 h-14 flex items-center justify-between px-4
               bg-white/90 dark:bg-[#161616]/90 backdrop-blur-md border-b border-gray-200 dark:border-[#262626]">
    <button onclick="toggleSidebar()" class="p-2 rounded-lg text-gray-500 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222] transition">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
    <div class="flex items-center gap-2">
        <span class="inline-flex items-center justify-center w-6 h-6 rounded-md overflow-hidden">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
        </span>
        <span class="text-sm font-semibold text-gray-950 dark:text-white">Ekklesia Admin</span>
    </div>
    <div class="w-9"></div>{{-- spacer --}}
</header>

<script>
    function toggleSidebar() {
        document.getElementById('adminSidebar').classList.toggle('-translate-x-full');
        document.getElementById('sidebarOverlay').classList.toggle('hidden');
    }
    function closeSidebar() {
        document.getElementById('adminSidebar').classList.add('-translate-x-full');
        document.getElementById('sidebarOverlay').classList.add('hidden');
    }
</script>
