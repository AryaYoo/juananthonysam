<nav class="sticky top-0 z-40 bg-white/90 dark:bg-[#141414]/90 backdrop-blur-md border-b border-gray-200 dark:border-[#282828] transition-colors duration-300" id="mainNavbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo (Left) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-[#111111] dark:bg-[#222222] border border-black dark:border-[#383838] flex items-center justify-center text-white shadow-sm group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M7 8h10"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-['Stack_Sans_Notch',sans-serif] text-lg sm:text-xl font-light tracking-wider text-gray-950 dark:text-[#F5F5F5] group-hover:text-black dark:group-hover:text-white transition-colors">
                        EKKLESIA
                    </span>
                    <span class="text-[10px] tracking-[0.25em] text-gray-500 dark:text-[#8A8A8A] uppercase font-normal">
                        SURABAYA
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links (Center) -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 text-sm font-normal rounded-md transition-all {{ request()->routeIs('home') ? 'text-gray-950 dark:text-white bg-gray-100 dark:bg-[#222222] font-medium' : 'text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-50 dark:hover:bg-[#1A1A1A]' }}">
                    Beranda
                </a>
                <!-- Dropdown Menu Profil -->
                <div class="relative group" id="profileDropdownContainer">
                    <button type="button" 
                            id="profileDropdownBtn"
                            onclick="window.toggleProfileDropdown(event)"
                            class="flex items-center gap-1.5 px-4 py-2 text-sm font-normal rounded-md transition-all cursor-pointer {{ request()->routeIs('profile') ? 'text-gray-950 dark:text-white bg-gray-100 dark:bg-[#222222] font-medium' : 'text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-50 dark:hover:bg-[#1A1A1A]' }}"
                            aria-expanded="false"
                            aria-haspopup="true">
                        <span>Profil</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180" id="profileDropdownChevron" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Panel -->
                    <div id="profileDropdownMenu" 
                         class="absolute left-0 mt-1.5 w-60 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#2C2C2C] shadow-xl py-1.5 opacity-0 invisible translate-y-1 transition-all duration-200 z-50 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                        <a href="{{ route('profile') }}#ekklesia" 
                           class="flex flex-col px-3.5 py-2 hover:bg-gray-50 dark:hover:bg-[#242424] rounded-lg mx-1.5 transition-colors">
                            <span class="text-xs font-semibold text-gray-900 dark:text-white tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                                EKKLESIA
                            </span>
                            <span class="text-[11px] text-gray-500 dark:text-gray-400 font-light">
                                Profil, Visi & Misi Gereja
                            </span>
                        </a>
                        <div class="h-px bg-gray-100 dark:bg-[#252525] my-1 mx-2"></div>
                        <a href="{{ route('profile') }}#pastor-juan" 
                           class="flex flex-col px-3.5 py-2 hover:bg-gray-50 dark:hover:bg-[#242424] rounded-lg mx-1.5 transition-colors">
                            <span class="text-xs font-medium text-gray-900 dark:text-white">
                                Ps Juan Anthony Sam
                            </span>
                            <span class="text-[11px] text-gray-500 dark:text-gray-400 font-light">
                                Lead Pastor
                            </span>
                        </a>
                        <a href="{{ route('profile') }}#ps-samuel" 
                           class="flex flex-col px-3.5 py-2 hover:bg-gray-50 dark:hover:bg-[#242424] rounded-lg mx-1.5 transition-colors">
                            <span class="text-xs font-medium text-gray-900 dark:text-white">
                                Ps Samuel
                            </span>
                            <span class="text-[11px] text-gray-500 dark:text-gray-400 font-light">
                                Associate Pastor
                            </span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('media') }}" 
                   class="px-4 py-2 text-sm font-normal rounded-md transition-all {{ request()->routeIs('media') ? 'text-gray-950 dark:text-white bg-gray-100 dark:bg-[#222222] font-medium' : 'text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-50 dark:hover:bg-[#1A1A1A]' }}">
                    Media & Galeri
                </a>
                <a href="{{ route('events') }}" 
                   class="px-4 py-2 text-sm font-normal rounded-md transition-all {{ request()->routeIs('events') ? 'text-gray-950 dark:text-white bg-gray-100 dark:bg-[#222222] font-medium' : 'text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-50 dark:hover:bg-[#1A1A1A]' }}">
                    Acara & Ibadah
                </a>
            </div>

            <!-- Action Buttons + Theme Toggle (Right) -->
            <div class="hidden md:flex items-center gap-3">
                <!-- Theme Toggle Button (Desktop) -->
                <button type="button" 
                        onclick="window.toggleTheme()" 
                        aria-label="Ganti Mode Tampilan (Light / Dark)"
                        class="p-2.5 rounded-lg text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-[#222222] hover:bg-gray-200 dark:hover:bg-[#2D2D2D] border border-gray-200 dark:border-[#353535] transition-all cursor-pointer shadow-2xs flex items-center justify-center"
                        title="Ubah Mode Tampilan">
                    <!-- Sun Icon (Active in dark mode) -->
                    <svg class="theme-icon-sun w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (Active in light mode) -->
                    <svg class="theme-icon-moon w-4 h-4 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <a href="{{ route('home') }}#doa" 
                   class="px-3.5 py-1.5 text-xs font-normal text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#242424] rounded-md transition-colors border border-transparent hover:border-gray-300 dark:hover:border-[#3A3A3A]">
                    Permohonan Doa
                </a>
                
                <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia%20Surabaya" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-[#EAEAEA] text-white dark:text-[#141414] text-xs font-normal rounded-md transition-all shadow-sm">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                    </svg>
                    <span>Layanan WA</span>
                </a>
            </div>

            <!-- Mobile Controls (Theme Toggle + Hamburger strictly on the RIGHT) -->
            <div class="flex items-center gap-2 md:hidden">
                <!-- Theme Toggle Button (Mobile Topbar) -->
                <button type="button" 
                        onclick="window.toggleTheme()" 
                        aria-label="Ganti Mode Tampilan (Light / Dark)"
                        class="p-2.5 rounded-lg text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-[#202020] hover:bg-gray-200 dark:hover:bg-[#2A2A2A] border border-gray-200 dark:border-[#353535] transition-all cursor-pointer focus:outline-none flex items-center justify-center">
                    <svg class="theme-icon-sun w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg class="theme-icon-moon w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Hamburger Button (Strictly on the RIGHT) -->
                <button type="button" 
                        id="mobileMenuToggle" 
                        onclick="window.openMobileNav(event)"
                        aria-label="Buka Menu Navigasi" 
                        class="p-2.5 rounded-lg text-gray-900 dark:text-white bg-gray-100 dark:bg-[#202020] hover:bg-gray-200 dark:hover:bg-[#2A2A2A] active:scale-95 border border-gray-200 dark:border-[#353535] transition-all cursor-pointer focus:outline-none focus:ring-2 focus:ring-black/10 dark:focus:ring-white/10">
                    <svg id="hamburgerIcon" class="w-6 h-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- =========================================================
     MOBILE DRAWER & OVERLAY (Supports Light & Dark Modes)
     ========================================================= -->
<div id="mobileDrawerOverlay" 
     onclick="window.handleOverlayClick(event)"
     class="fixed inset-0 bg-black/50 dark:bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"
     style="display: none; z-index: 99998;">
    
    <div id="mobileDrawer" 
         onclick="event.stopPropagation()"
         class="fixed top-0 right-0 w-[85%] max-w-sm h-full bg-white dark:bg-[#161616] border-l border-gray-200 dark:border-[#2C2C2C] shadow-2xl flex flex-col justify-between overflow-y-auto transition-transform duration-300 ease-out"
         style="transform: translateX(100%); z-index: 99999;">
        
        <!-- Drawer Header -->
        <div class="p-5 border-b border-gray-200 dark:border-[#262626] bg-gray-50 dark:bg-[#1A1A1A] flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-full bg-[#111111] dark:bg-[#222222] flex items-center justify-center text-white">
                    <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v20M7 8h10"/>
                    </svg>
                </div>
                <div>
                    <span class="font-['Stack_Sans_Notch',sans-serif] text-sm font-light text-gray-950 dark:text-white tracking-wider block">
                        EKKLESIA
                    </span>
                    <span class="text-[9px] tracking-[0.2em] text-gray-500 dark:text-gray-400 uppercase block font-normal">
                        SURABAYA
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Theme toggle inside drawer -->
                <button type="button" 
                        onclick="window.toggleTheme()" 
                        class="p-2 text-gray-600 dark:text-gray-300 bg-white dark:bg-[#242424] hover:bg-gray-100 dark:hover:bg-[#2D2D2D] rounded-lg border border-gray-200 dark:border-[#353535] transition-colors cursor-pointer flex items-center justify-center">
                    <svg class="theme-icon-sun w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg class="theme-icon-moon w-4 h-4 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Close button (X) -->
                <button type="button" 
                        id="closeDrawerBtn" 
                        onclick="window.closeMobileNav(event)"
                        aria-label="Tutup Menu"
                        class="p-2 text-gray-500 dark:text-gray-400 hover:text-black dark:hover:text-white bg-white dark:bg-[#242424] hover:bg-gray-100 dark:hover:bg-[#2D2D2D] rounded-lg border border-gray-200 dark:border-[#353535] transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Drawer Nav Links -->
        <div class="px-4 py-6 space-y-1.5 flex-1">
            <div class="text-[10px] font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500 px-3 mb-2">
                Navigasi Halaman
            </div>
            
            <a href="{{ route('home') }}" 
               onclick="window.closeMobileNav()"
               class="flex items-center justify-between px-3.5 py-3 rounded-lg text-sm transition-colors {{ request()->routeIs('home') ? 'bg-[#111111] dark:bg-white text-white dark:text-[#141414] font-medium' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white font-normal' }}">
                <span>Beranda</span>
                <svg class="w-4 h-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <!-- Mobile Profil Accordion Item -->
            <div class="rounded-lg overflow-hidden transition-colors border border-transparent">
                <button type="button" 
                        onclick="window.toggleMobileProfileSubmenu(event)"
                        class="w-full flex items-center justify-between px-3.5 py-3 rounded-lg text-sm transition-colors cursor-pointer {{ request()->routeIs('profile') ? 'bg-[#111111] dark:bg-white text-white dark:text-[#141414] font-medium' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white font-normal' }}">
                    <div class="flex items-center gap-2">
                        <span>Profil</span>
                    </div>
                    <svg id="mobileProfileChevron" class="w-4 h-4 opacity-60 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Mobile Submenu (EKKLESIA, Ps Juan Anthony Sam, Ps Samuel) -->
                <div id="mobileProfileSubmenu" class="space-y-1 pl-3 pr-1 py-1.5 transition-all duration-200" style="display: none;">
                    <a href="{{ route('profile') }}#ekklesia" 
                       onclick="window.closeMobileNav()"
                       class="flex items-center justify-between px-3 py-2.5 text-xs rounded-lg text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#242424] transition-colors">
                        <div class="flex flex-col">
                            <span class="font-semibold font-['Stack_Sans_Notch',sans-serif] tracking-wider text-gray-950 dark:text-white text-[13px]">
                                EKKLESIA
                            </span>
                            <span class="text-[10px] text-gray-500 dark:text-gray-400 font-light">Profil, Visi & Misi Gereja</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="{{ route('profile') }}#pastor-juan" 
                       onclick="window.closeMobileNav()"
                       class="flex items-center justify-between px-3 py-2.5 text-xs rounded-lg text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#242424] transition-colors">
                        <div class="flex flex-col">
                            <span class="font-medium text-gray-950 dark:text-white text-[13px]">Ps Juan Anthony Sam</span>
                            <span class="text-[10px] text-gray-500 dark:text-gray-400 font-light">Lead Pastor</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="{{ route('profile') }}#ps-samuel" 
                       onclick="window.closeMobileNav()"
                       class="flex items-center justify-between px-3 py-2.5 text-xs rounded-lg text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#242424] transition-colors">
                        <div class="flex flex-col">
                            <span class="font-medium text-gray-950 dark:text-white text-[13px]">Ps Samuel</span>
                            <span class="text-[10px] text-gray-500 dark:text-gray-400 font-light">Associate Pastor</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <a href="{{ route('media') }}" 
               onclick="window.closeMobileNav()"
               class="flex items-center justify-between px-3.5 py-3 rounded-lg text-sm transition-colors {{ request()->routeIs('media') ? 'bg-[#111111] dark:bg-white text-white dark:text-[#141414] font-medium' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white font-normal' }}">
                <span>Media & Galeri Foto</span>
                <svg class="w-4 h-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ route('events') }}" 
               onclick="window.closeMobileNav()"
               class="flex items-center justify-between px-3.5 py-3 rounded-lg text-sm transition-colors {{ request()->routeIs('events') ? 'bg-[#111111] dark:bg-white text-white dark:text-[#141414] font-medium' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white font-normal' }}">
                <span>Jadwal Acara & Ibadah</span>
                <svg class="w-4 h-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <!-- Quick Service Shortcuts -->
            <div class="pt-6">
                <div class="text-[10px] font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500 px-3 mb-2">
                    Layanan & Aksi
                </div>
                
                <a href="{{ route('home') }}#doa" 
                   onclick="window.closeMobileNav()"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-xs font-normal text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white transition-colors">
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>Form Permohonan Doa</span>
                </a>

                <a href="{{ route('home') }}#giving" 
                   onclick="window.closeMobileNav()"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-xs font-normal text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#222222] hover:text-black dark:hover:text-white transition-colors">
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Informasi Persembahan (Giving)</span>
                </a>
            </div>
        </div>

        <!-- Drawer Footer (CTA WhatsApp) -->
        <div class="p-5 border-t border-gray-200 dark:border-[#262626] bg-gray-50 dark:bg-[#1A1A1A] space-y-3">
            <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia%20Surabaya" 
               target="_blank" 
               rel="noopener noreferrer"
               class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-lg bg-[#111111] dark:bg-white text-white dark:text-[#141414] font-normal text-xs hover:bg-[#2B2B2B] dark:hover:bg-[#EAEAEA] transition-all shadow-sm">
                <svg class="w-4 h-4 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                </svg>
                <span>WhatsApp Pastoral Care</span>
            </a>
            <p class="text-[10px] text-center text-gray-500 dark:text-gray-400 font-normal">
                Jln Ruko Ngaglik 2 No 15, Surabaya
            </p>
        </div>
    </div>
</div>

<script>
    // Theme Switcher Logic
    window.updateThemeIcons = function() {
        const isDark = document.documentElement.classList.contains('dark');
        const sunIcons = document.querySelectorAll('.theme-icon-sun');
        const moonIcons = document.querySelectorAll('.theme-icon-moon');
        
        sunIcons.forEach(icon => {
            icon.style.display = isDark ? 'block' : 'none';
        });
        moonIcons.forEach(icon => {
            icon.style.display = isDark ? 'none' : 'block';
        });
    };

    window.toggleTheme = function() {
        const html = document.documentElement;
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
        window.updateThemeIcons();
    };

    // Desktop Profile Dropdown Toggle
    window.toggleProfileDropdown = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const menu = document.getElementById('profileDropdownMenu');
        const chevron = document.getElementById('profileDropdownChevron');
        const btn = document.getElementById('profileDropdownBtn');
        if (!menu) return;

        const isVisible = menu.classList.contains('opacity-100');
        if (isVisible) {
            menu.classList.remove('opacity-100', 'visible', 'translate-y-0');
            menu.classList.add('opacity-0', 'invisible', 'translate-y-1');
            if (chevron) chevron.classList.remove('rotate-180');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        } else {
            menu.classList.remove('opacity-0', 'invisible', 'translate-y-1');
            menu.classList.add('opacity-100', 'visible', 'translate-y-0');
            if (chevron) chevron.classList.add('rotate-180');
            if (btn) btn.setAttribute('aria-expanded', 'true');
        }
    };

    // Close desktop profile dropdown on outside click
    document.addEventListener('click', function(e) {
        const container = document.getElementById('profileDropdownContainer');
        const menu = document.getElementById('profileDropdownMenu');
        const chevron = document.getElementById('profileDropdownChevron');
        const btn = document.getElementById('profileDropdownBtn');
        if (container && !container.contains(e.target) && menu && menu.classList.contains('opacity-100')) {
            menu.classList.remove('opacity-100', 'visible', 'translate-y-0');
            menu.classList.add('opacity-0', 'invisible', 'translate-y-1');
            if (chevron) chevron.classList.remove('rotate-180');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        }
    });

    // Mobile Profile Submenu Accordion Toggle
    window.toggleMobileProfileSubmenu = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const submenu = document.getElementById('mobileProfileSubmenu');
        const chevron = document.getElementById('mobileProfileChevron');
        if (!submenu) return;

        const isExpanded = submenu.style.display !== 'none';
        if (isExpanded) {
            submenu.style.display = 'none';
            if (chevron) chevron.classList.remove('rotate-180');
        } else {
            submenu.style.display = 'block';
            if (chevron) chevron.classList.add('rotate-180');
        }
    };

    // Ensure icons match on initial render
    document.addEventListener('DOMContentLoaded', () => {
        window.updateThemeIcons();
    });

    // Mobile Navigation Controls
    window.openMobileNav = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const overlay = document.getElementById('mobileDrawerOverlay');
        const drawer = document.getElementById('mobileDrawer');
        if (!overlay || !drawer) return;

        overlay.style.display = 'block';
        overlay.offsetHeight;
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100', 'pointer-events-auto');
        drawer.style.transform = 'translateX(0)';
        document.body.style.overflow = 'hidden';
    };

    window.closeMobileNav = function(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        const overlay = document.getElementById('mobileDrawerOverlay');
        const drawer = document.getElementById('mobileDrawer');
        if (!overlay || !drawer) return;

        drawer.style.transform = 'translateX(100%)';
        overlay.classList.remove('opacity-100', 'pointer-events-auto');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 300);
        document.body.style.overflow = '';
    };

    window.handleOverlayClick = function(e) {
        const drawer = document.getElementById('mobileDrawer');
        if (drawer && !drawer.contains(e.target)) {
            window.closeMobileNav(e);
        }
    };

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            window.closeMobileNav();
        }
    });
</script>
