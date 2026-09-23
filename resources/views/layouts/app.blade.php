<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="robots" content="index, follow">

    <!-- Anti-FOUC Theme Script: Runs immediately before page paints -->
    <script>
        (function() {
            try {
                const storedTheme = localStorage.getItem('theme');
                if (storedTheme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Ekklesia Surabaya — Gereja Keluarga & Pemulihan')</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Tema 2026: Tahun Pemulihan bagi Kemuliaan Tuhan.')">
    <meta name="author" content="Ekklesia Surabaya">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Ekklesia Surabaya — Gereja Keluarga & Pemulihan')">
    <meta property="og:description" content="@yield('meta_description', 'Website resmi Gereja Ekklesia Surabaya. Ibadah Minggu 09:00 WIB, Ekidz 09:30, E-Teens 11:00, Doa Senin & Jumat 19:00.')">
    <meta property="og:site_name" content="Ekklesia Surabaya">

    <!-- Favicon / App Icon -->
    @php
        $faviconPath = file_exists(public_path('images/logo.png')) ? asset_v('images/logo.png') : (file_exists(public_path('favicon.ico')) ? asset_v('favicon.ico') : null);
    @endphp
    @if($faviconPath)
        <link rel="icon" type="image/png" href="{{ $faviconPath }}">
        <link rel="apple-touch-icon" href="{{ $faviconPath }}">
        <link rel="shortcut icon" href="{{ $faviconPath }}">
    @endif

    <!-- Google Fonts: Source Sans 3 + Plus Jakarta Sans (Lightweights) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Plus+Jakarta+Sans:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Stack Sans Notch';
            src: local('Stack Sans Notch Light'), local('Stack Sans Notch'), local('Plus Jakarta Sans Light'), local('Plus Jakarta Sans');
            font-weight: 300;
        }
        @font-face {
            font-family: 'Stack Sans Notch';
            src: local('Stack Sans Notch Regular'), local('Stack Sans Notch'), local('Plus Jakarta Sans Regular'), local('Plus Jakarta Sans');
            font-weight: 400;
        }

        /* =========================================================
           PAGE TRANSITIONS: FADE IN & FADE OUT (GENTLE & CINEMATIC)
           ========================================================= */
        @keyframes pageFadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Content Area animates in softly on page load */
        main {
            animation: pageFadeIn 0.65s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            will-change: opacity, transform;
        }

        /* Full-body gentle fade-out before navigating away */
        body {
            transition: opacity 0.45s cubic-bezier(0.25, 1, 0.5, 1);
        }

        body.page-fade-out {
            opacity: 0 !important;
            pointer-events: none;
        }
    </style>

    <!-- Scripts and Styles via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen flex flex-col selection:bg-gray-400/30">

    <!-- Subtle Scroll Progress Bar at very top of screen -->
    <div id="scrollProgressBar" class="bg-gray-900 dark:bg-white opacity-80"></div>

    <!-- Global Toast / Alert Notification -->
    @if(session('success'))
        <div id="flashAlert" class="fixed top-24 right-4 z-50 max-w-md bg-white dark:bg-[#1E1E1E] border-l-4 border-gray-900 dark:border-white text-gray-900 dark:text-white p-4 rounded-r-lg shadow-xl flex items-start justify-between gap-3 animate-fade-in border border-gray-200 dark:border-gray-800">
            <div class="flex items-start gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div>
                    <p class="text-xs font-semibold">Berhasil Dikirim</p>
                    <p class="text-xs opacity-80 mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="document.getElementById('flashAlert').remove()" class="opacity-60 hover:opacity-100 text-sm">&times;</button>
        </div>
        <script>
            setTimeout(() => {
                const el = document.getElementById('flashAlert');
                if (el) el.remove();
            }, 6000);
        </script>
    @endif

    <!-- Navbar with Theme Toggle & Mobile Menu -->
    <x-navbar />

    <!-- Main Content Area -->
    <main class="flex-1 w-full">
        @yield('content')
    </main>

    <!-- =========================================================
         SECTION: MITRA & JARINGAN PELAYANAN (Logo Bar)
         ========================================================= -->
    <section class="bg-[#0D0D0D] border-t border-[#1E1E1E] py-8 sm:py-10" aria-label="Mitra Pelayanan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Label -->
            <p class="text-[10px] uppercase tracking-[0.25em] text-gray-400 text-center mb-6 font-normal">
                Mitra &amp; Jaringan Pelayanan
            </p>

            {{-- MOBILE: Auto slider, 2 logo per slide (horizontal) --}}
            <div class="block sm:hidden relative" id="logoSlider">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-600 ease-in-out" id="logoTrack">

                        {{-- Slide 1: Ekklesia + GospelSurabaya --}}
                        <div class="min-w-full flex items-center justify-center gap-8 px-4">
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset_v('images/logo.png') }}"
                                     alt="Logo Ekklesia Surabaya"
                                     class="h-12 w-auto object-contain">
                                <span class="text-[10px] text-gray-300 font-light tracking-wider uppercase">Ekklesia</span>
                            </div>
                            <div class="w-px h-10 bg-[#2A2A2A]"></div>
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset_v('images/GospelSurabaya.png') }}"
                                     alt="Logo Gospel Surabaya"
                                     class="h-12 w-auto object-contain">
                                <span class="text-[10px] text-gray-300 font-light tracking-wider uppercase">Gospel Surabaya</span>
                            </div>
                        </div>

                        {{-- Slide 2: VeloraGroup --}}
                        <div class="min-w-full flex items-center justify-center px-4">
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset_v('images/VeloraGroup.png') }}"
                                     alt="Logo Velora Group"
                                     class="h-12 w-auto object-contain">
                                <span class="text-[10px] text-gray-300 font-light tracking-wider uppercase">Velora Group</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Dot Indicators --}}
                <div class="flex justify-center items-center gap-2 mt-5">
                    <button type="button" data-lslide="0"
                            class="logo-dot h-1.5 rounded-full transition-all duration-300 w-5 bg-white/80"
                            aria-label="Slide 1"></button>
                    <button type="button" data-lslide="1"
                            class="logo-dot h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/30"
                            aria-label="Slide 2"></button>
                </div>
            </div>

            {{-- DESKTOP: Semua logo satu baris --}}
            <div class="hidden sm:flex items-center justify-center gap-12 lg:gap-20">
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset_v('images/logo.png') }}"
                         alt="Logo Ekklesia Surabaya"
                         class="h-12 w-auto object-contain opacity-60 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                    <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Ekklesia</span>
                </div>
                <div class="w-px h-10 bg-[#2A2A2A]"></div>
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset_v('images/GospelSurabaya.png') }}"
                         alt="Logo Gospel Surabaya"
                         class="h-12 w-auto object-contain opacity-60 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                    <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Gospel Surabaya</span>
                </div>
                <div class="w-px h-10 bg-[#2A2A2A]"></div>
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset_v('images/VeloraGroup.png') }}"
                         alt="Logo Velora Group"
                         class="h-12 w-auto object-contain opacity-60 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                    <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Velora Group</span>
                </div>
            </div>

        </div>
    </section>

    {{-- Logo Slider Script (Mobile) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lTrack = document.getElementById('logoTrack');
            const lDots  = document.querySelectorAll('.logo-dot');
            if (!lTrack || lDots.length === 0) return;

            const total = lDots.length;
            let current = 0;
            let timer   = null;

            function lGoTo(index) {
                if (index < 0) index = total - 1;
                if (index >= total) index = 0;
                current = index;
                lTrack.style.transform = `translateX(-${current * 100}%)`;
                lDots.forEach((dot, i) => {
                    if (i === current) {
                        dot.classList.remove('w-1.5', 'bg-white/30');
                        dot.classList.add('w-5', 'bg-white/80');
                    } else {
                        dot.classList.remove('w-5', 'bg-white/80');
                        dot.classList.add('w-1.5', 'bg-white/30');
                    }
                });
            }

            function lStartAuto() {
                lStopAuto();
                timer = setInterval(() => lGoTo(current + 1), 3000);
            }

            function lStopAuto() {
                if (timer) clearInterval(timer);
            }

            lDots.forEach(dot => {
                dot.addEventListener('click', () => {
                    lGoTo(parseInt(dot.dataset.lslide));
                    lStartAuto();
                });
            });

            // Touch swipe
            let touchStartX = 0;
            const slider = document.getElementById('logoSlider');
            if (slider) {
                slider.addEventListener('touchstart', e => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                slider.addEventListener('touchend', e => {
                    const diff = touchStartX - e.changedTouches[0].screenX;
                    if (Math.abs(diff) > 40) {
                        lGoTo(diff > 0 ? current + 1 : current - 1);
                        lStartAuto();
                    }
                }, { passive: true });
            }

            lStartAuto();
        });
    </script>

    <!-- Footer -->
    <x-footer />

    <!-- Floating Partnership Banner (dikelola dari Admin) -->
    @php
        $bannerPath = storage_path('app/banner.json');
        $bannerData = file_exists($bannerPath) ? json_decode(file_get_contents($bannerPath), true) : null;
        $showBanner = is_array($bannerData) && !empty($bannerData['enabled']) && !empty($bannerData['html']);
    @endphp
    @if($showBanner)
        <div id="partnershipBannerWrap"
             class="fixed bottom-0 left-0 right-0 z-50 flex justify-center pointer-events-none"
             style="padding-bottom: env(safe-area-inset-bottom, 0);">
            <div id="partnershipBanner"
                 class="pointer-events-auto relative w-full max-w-2xl mx-4 mb-4 sm:mb-5 rounded-2xl
                        bg-white/95 dark:bg-[#1A1A1A]/95 backdrop-blur-md
                        border border-gray-200/80 dark:border-[#2E2E2E]
                        shadow-[0_8px_40px_rgba(0,0,0,0.18)] dark:shadow-[0_8px_40px_rgba(0,0,0,0.5)]
                        overflow-hidden translate-y-4 opacity-0"
                 style="transition: opacity 0.5s cubic-bezier(0.16,1,0.3,1), transform 0.5s cubic-bezier(0.16,1,0.3,1);">

                <!-- Close Button -->
                <button type="button"
                        id="closeBannerBtn"
                        onclick="closeBanner()"
                        aria-label="Tutup banner"
                        title="Tutup"
                        class="absolute top-2 right-2 z-10 w-6 h-6 rounded-full flex items-center justify-center
                               bg-gray-100/80 dark:bg-[#2A2A2A]/80 hover:bg-gray-200 dark:hover:bg-[#383838]
                               text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white
                               transition-all duration-200 text-xs leading-none cursor-pointer">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Label Kemitraan -->
                <div class="absolute top-2 left-3 flex items-center gap-1.5">
                    <span class="text-[9px] uppercase tracking-[0.15em] text-gray-400 dark:text-gray-500 font-medium">Iklan Kemitraan</span>
                </div>

                <!-- Banner Content (HTML dari Admin) -->
                <div class="pt-6 pb-3 px-4 sm:px-6 flex items-center justify-center min-h-[72px]">
                    {!! $bannerData['html'] !!}
                </div>
            </div>
        </div>

        <script>
            (function() {
                const BANNER_SESSION_KEY = 'ekklesia_banner_closed_{{ md5($bannerData["updated_at"] ?? "") }}';

                function initBanner() {
                    if (sessionStorage.getItem(BANNER_SESSION_KEY)) return; // Already closed this session

                    const banner = document.getElementById('partnershipBanner');
                    if (!banner) return;

                    // Animate in after short delay
                    setTimeout(function() {
                        banner.style.opacity  = '1';
                        banner.style.transform = 'translateY(0)';
                    }, 1200);
                }

                window.closeBanner = function() {
                    const wrap = document.getElementById('partnershipBannerWrap');
                    const banner = document.getElementById('partnershipBanner');
                    if (banner) {
                        banner.style.opacity  = '0';
                        banner.style.transform = 'translateY(16px)';
                        setTimeout(function() { if (wrap) wrap.remove(); }, 500);
                    }
                    sessionStorage.setItem(BANNER_SESSION_KEY, '1');
                };

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initBanner);
                } else {
                    initBanner();
                }
            })();
        </script>
    @endif

    <!-- Floating Scroll To Top Button -->
    <button type="button" 
            id="scrollToTopBtn" 
            onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
            aria-label="Kembali ke atas" 
            title="Kembali ke atas"
            class="fixed bottom-6 right-6 z-40 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/90 dark:bg-[#1C1C1C]/90 text-gray-800 dark:text-gray-100 border border-gray-200 dark:border-[#333333] shadow-lg hover:shadow-xl backdrop-blur-md flex items-center justify-center cursor-pointer transition-all duration-300 opacity-0 invisible translate-y-3 hover:-translate-y-1 hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black focus:outline-none focus:ring-2 focus:ring-black/20 dark:focus:ring-white/20 active:scale-95 group">
        <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <!-- Global Scroll Animation & Scroll Progress Observer -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Intersection Observer for Scroll Animations
            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                });

                revealElements.forEach(el => observer.observe(el));
            } else {
                revealElements.forEach(el => el.classList.add('is-visible'));
            }

            // 2. Scroll Progress Bar
            const progressBar = document.getElementById('scrollProgressBar');
            // 3. Scroll To Top Button
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            function handleGlobalScroll() {
                const scrollTop = window.scrollY || document.documentElement.scrollTop;
                const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

                // Update Progress Bar
                if (docHeight > 0 && progressBar) {
                    const scrollPercent = (scrollTop / docHeight) * 100;
                    progressBar.style.width = scrollPercent + '%';
                }

                // Toggle Scroll To Top Button (Muncul setelah scroll > 350px)
                if (scrollToTopBtn) {
                    if (scrollTop > 350) {
                        scrollToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-3');
                        scrollToTopBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
                    } else {
                        scrollToTopBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        scrollToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-3');
                    }
                }
            }

            window.addEventListener('scroll', handleGlobalScroll, { passive: true });
            handleGlobalScroll();
        });
    </script>

    <!-- Page Fade Transitions Script (Seamless MPA Navigation) -->
    <script>
        (function() {
            let isNavigating = false;

            function initPageTransitions() {
                // Ensure body is visible and clean state
                document.body.classList.remove('page-fade-out');
                isNavigating = false;

                document.addEventListener('click', function(e) {
                    if (isNavigating) return;

                    const link = e.target.closest('a');
                    if (!link) return;

                    // Skip modified clicks, middle click, right click, or already handled events
                    if (e.defaultPrevented || e.button !== 0 || e.ctrlKey || e.metaKey || e.shiftKey || e.altKey) {
                        return;
                    }

                    // Skip links with target="_blank", download, or explicit bypass attribute
                    if (link.target === '_blank' || link.hasAttribute('download') || link.hasAttribute('data-no-transition')) {
                        return;
                    }

                    const href = link.getAttribute('href');
                    if (!href) return;

                    // Skip hash jumps, javascript, mailto, tel, whatsapp API
                    if (href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('https://wa.me')) {
                        return;
                    }

                    try {
                        const targetUrl = new URL(link.href, window.location.origin);

                        // Only transition internal links within same origin
                        if (targetUrl.origin !== window.location.origin) {
                            return;
                        }

                        // Same-page hash anchor: let browser smoothly scroll without page reload
                        if (targetUrl.pathname === window.location.pathname && targetUrl.search === window.location.search && targetUrl.hash) {
                            return;
                        }

                        // Trigger smooth fade-out
                        isNavigating = true;
                        e.preventDefault();

                        document.body.classList.add('page-fade-out');

                        setTimeout(function() {
                            window.location.href = targetUrl.href;
                        }, 420);
                    } catch (err) {
                        // Fallback to default browser navigation
                    }
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initPageTransitions);
            } else {
                initPageTransitions();
            }

            // Restore state on Back/Forward navigation (bfcache)
            window.addEventListener('pageshow', function(event) {
                document.body.classList.remove('page-fade-out');
                isNavigating = false;
            });
        })();
    </script>

    <!-- Pelacakan Otomatis Klik Link Keluar / Action Links -->
    <script>
        (function() {
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (!link || !link.href) return;

                let label = link.getAttribute('data-track-label');
                const href = link.href;

                if (!label) {
                    if (href.includes('wa.me') || href.includes('whatsapp.com')) {
                        label = link.innerText.trim() ? ('WA: ' + link.innerText.trim().slice(0, 30)) : 'WhatsApp Pastoral';
                    } else if (href.includes('instagram.com')) {
                        label = 'Instagram @ekklesiagereja';
                    } else if (href.includes('youtube.com') || href.includes('youtu.be')) {
                        label = 'YouTube Streaming';
                    } else if (href.includes('maps.google.com') || href.includes('goo.gl/maps') || href.includes('google.com/maps')) {
                        label = 'Google Maps Lokasi';
                    } else if (href.includes('tel:')) {
                        label = 'Telepon Kontak';
                    } else if (href.includes('mailto:')) {
                        label = 'Email Kontak';
                    }
                }

                if (label) {
                    try {
                        const payload = JSON.stringify({
                            link_label: label,
                            link_url: href,
                            page_url: window.location.pathname
                        });

                        if (navigator.sendBeacon) {
                            navigator.sendBeacon('/track-click', new Blob([payload], { type: 'application/json' }));
                        } else {
                            fetch('/track-click', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: payload,
                                keepalive: true
                            });
                        }
                    } catch (err) {}
                }
            }, { passive: true });
        })();
    </script>

    @stack('scripts')
</body>
</html>
