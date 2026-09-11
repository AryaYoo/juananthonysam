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
    <title>@yield('title', 'Ekklesia Surabaya') — Gereja Keluarga & Pemulihan</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Tema 2026: Tahun Pemulihan bagi Kemuliaan Tuhan.')">
    <meta name="author" content="Ekklesia Surabaya">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Ekklesia Surabaya') — Gereja Keluarga & Pemulihan">
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
            <p class="text-[10px] uppercase tracking-[0.25em] text-gray-600 text-center mb-6 font-normal">
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
                                     class="h-12 w-auto object-contain opacity-70 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                                <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Ekklesia</span>
                            </div>
                            <div class="w-px h-10 bg-[#2A2A2A]"></div>
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset_v('images/GospelSurabaya.png') }}"
                                     alt="Logo Gospel Surabaya"
                                     class="h-12 w-auto object-contain opacity-70 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                                <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Gospel Surabaya</span>
                            </div>
                        </div>

                        {{-- Slide 2: VeloraGroup --}}
                        <div class="min-w-full flex items-center justify-center px-4">
                            <div class="flex flex-col items-center gap-2">
                                <img src="{{ asset_v('images/VeloraGroup.png') }}"
                                     alt="Logo Velora Group"
                                     class="h-12 w-auto object-contain opacity-70 hover:opacity-100 transition-opacity duration-300 filter grayscale hover:grayscale-0">
                                <span class="text-[10px] text-gray-600 font-light tracking-wider uppercase">Velora Group</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Dot Indicators --}}
                <div class="flex justify-center items-center gap-2 mt-5">
                    <button type="button" data-lslide="0"
                            class="logo-dot h-1.5 rounded-full transition-all duration-300 w-5 bg-gray-500"
                            aria-label="Slide 1"></button>
                    <button type="button" data-lslide="1"
                            class="logo-dot h-1.5 rounded-full transition-all duration-300 w-1.5 bg-gray-700"
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
                        dot.classList.remove('w-1.5', 'bg-gray-700');
                        dot.classList.add('w-5', 'bg-gray-500');
                    } else {
                        dot.classList.remove('w-5', 'bg-gray-500');
                        dot.classList.add('w-1.5', 'bg-gray-700');
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
            window.addEventListener('scroll', () => {
                const scrollTop = window.scrollY || document.documentElement.scrollTop;
                const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                if (docHeight > 0 && progressBar) {
                    const scrollPercent = (scrollTop / docHeight) * 100;
                    progressBar.style.width = scrollPercent + '%';
                }
            }, { passive: true });
        });
    </script>

    @stack('scripts')
</body>
</html>
