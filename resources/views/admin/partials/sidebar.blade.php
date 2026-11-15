{{-- Admin Sidebar --}}
{{-- Usage: @include('admin.partials.sidebar', ['activePage' => 'dashboard']) --}}

@php $active = $activePage ?? ''; @endphp

<aside id="adminSidebar"
       class="fixed inset-y-0 left-0 z-40 flex flex-col w-56 bg-white dark:bg-[#161616] border-r border-gray-200 dark:border-[#262626] transition-transform duration-300
              -translate-x-full lg:translate-x-0">

    {{-- Logo --}}
    <div class="flex items-center gap-3 px-5 h-16 border-b border-gray-100 dark:border-[#242424] shrink-0">
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg overflow-hidden shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Ekklesia Surabaya" class="w-full h-full object-contain">
        </span>
        <div>
            <p class="text-sm font-medium text-gray-950 dark:text-white leading-none">Ekklesia Admin</p>
            <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5 font-light">Area Manajemen</p>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        <p class="px-2 mb-2 text-[10px] uppercase tracking-widest text-gray-400 dark:text-gray-600 font-normal">Menu</p>

        {{-- Analitik --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs transition font-normal
                  {{ $active === 'dashboard'
                     ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm'
                     : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            Analitik
        </a>

        {{-- Banner Iklan --}}
        <a href="{{ route('admin.banner') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs transition font-normal
                  {{ $active === 'banner'
                     ? 'bg-gray-900 text-white dark:bg-white dark:text-gray-950 font-medium shadow-sm'
                     : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222]' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
            </svg>
            Banner Iklan
        </a>
    </nav>

    {{-- Bottom: Theme + Buka Web + Logout --}}
    <div class="px-3 py-4 space-y-1 border-t border-gray-100 dark:border-[#242424] shrink-0">

        {{-- Theme Toggle --}}
        <button type="button"
                onclick="toggleAdminTheme()"
                id="adminThemeToggleBtn"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222] transition cursor-pointer"
                title="Ubah Mode Gelap / Terang">
            <svg id="sunIcon" class="w-4 h-4 shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <svg id="moonIcon" class="w-4 h-4 shrink-0 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
            <span id="themeLabel">Mode Gelap</span>
        </button>

        {{-- Buka Web --}}
        <a href="{{ route('home') }}"
           target="_blank"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#222222] transition">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            Buka Website
        </a>

        {{-- Logout --}}
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs text-red-600 dark:text-red-400 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 transition cursor-pointer">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Keluar
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
    <span class="text-sm font-medium text-gray-950 dark:text-white">Ekklesia Admin</span>
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
