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
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
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
