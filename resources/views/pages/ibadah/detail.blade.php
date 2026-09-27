@extends('layouts.app')

@section('title', $title ?? ($pageName . ' — Gereja Ekklesia Surabaya'))
@section('meta_description', $metaDescription ?? ('Informasi pelayanan dan jadwal ibadah ' . $pageName . ' di Gereja Ekklesia Surabaya.'))

@section('content')
    <!-- =========================================================
         1. HERO IMAGE SLIDER
         (Seperti profil ekklesia tapi dilengkapi fungsi slider)
         ========================================================= -->
    <section class="relative bg-black text-white overflow-hidden select-none border-b border-gray-200 dark:border-[#242424]" id="ibadahHeroSection">
        <div class="relative w-full min-h-[360px] sm:min-h-[500px] lg:min-h-[640px] flex items-center justify-center bg-black overflow-hidden"
             style="height: calc(100vw * 10 / 16); max-height: 720px; min-height: 360px;"
             id="ibadahSliderContainer">

            @foreach($heroSlides as $i => $slide)
                <div class="ibadah-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out {{ $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' }}"
                     data-slide-index="{{ $i }}">
                    <img src="{{ asset_v($slide['image']) }}" 
                         alt="{{ $slide['alt'] }}" 
                         class="w-full h-full object-cover object-center select-none">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20 pointer-events-none"></div>
                </div>
            @endforeach

            @if(count($heroSlides) > 1)
                <!-- Navigation Arrows -->
                <button type="button" 
                        onclick="window.prevIbadahSlide()" 
                        aria-label="Slide Sebelumnya"
                        class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/50 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 backdrop-blur-sm shadow-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button type="button" 
                        onclick="window.nextIbadahSlide()" 
                        aria-label="Slide Berikutnya"
                        class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/50 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 backdrop-blur-sm shadow-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Dot Indicators -->
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2" id="ibadahDotsContainer">
                    @foreach($heroSlides as $i => $slide)
                        <button type="button" 
                                onclick="window.goToIbadahSlide({{ $i }})"
                                class="ibadah-dot h-2 rounded-full transition-all duration-300 cursor-pointer {{ $i === 0 ? 'w-8 bg-white' : 'w-2 bg-white/50 hover:bg-white/80' }}"
                                aria-label="Slide {{ $i + 1 }}">
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- =========================================================
         2. TULISAN BERGERAK (MARQUEE NAMA HALAMAN)
         (Struktur identik dengan halaman profil Ekklesia)
         ========================================================= -->
    <div class="relative w-full bg-[#0A0A0A] text-white border-b border-white/10 py-3 sm:py-3.5 overflow-hidden select-none group"
         style="mask-image: linear-gradient(to right, transparent, black 3%, black 97%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 3%, black 97%, transparent);"
         aria-label="{{ $pageName }}">
        <div class="flex items-center gap-6 whitespace-nowrap animate-theme-marquee group-hover:[animation-play-state:paused]">
            <!-- Set 1 -->
            <div class="flex items-center gap-8 shrink-0">
                @for ($i = 0; $i < 12; $i++)
                    <div class="inline-flex items-center gap-3">
                        <span class="text-amber-400 text-xs">✦</span>
                        <span class="text-xs sm:text-sm font-light uppercase tracking-[0.25em] text-gray-200 font-['Stack_Sans_Notch',sans-serif]">
                            {{ $marqueeText ?? $pageName }}
                        </span>
                    </div>
                @endfor
            </div>
            <!-- Set 2 (Duplicate for smooth infinite scroll) -->
            <div class="flex items-center gap-8 shrink-0" aria-hidden="true">
                @for ($i = 0; $i < 12; $i++)
                    <div class="inline-flex items-center gap-3">
                        <span class="text-amber-400 text-xs">✦</span>
                        <span class="text-xs sm:text-sm font-light uppercase tracking-[0.25em] text-gray-200 font-['Stack_Sans_Notch',sans-serif]">
                            {{ $marqueeText ?? $pageName }}
                        </span>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- =========================================================
         3. KETERANGAN (2 KOLOM: NAMA BESAR DI KIRI & DESKRIPSI DI KANAN)
         (Sesuai contoh layout terlampir: ARMY OF GOD)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 lg:gap-16 items-start">
                
                <!-- Kolom Kiri: Judul Tipografi Besar Bertumpuk -->
                <div class="md:col-span-4 lg:col-span-5 reveal-on-scroll">
                    <div class="space-y-0 select-none">
                        @foreach($headingLines as $line)
                            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-black uppercase tracking-tight text-gray-950 dark:text-white leading-[0.92] font-['Stack_Sans_Notch',sans-serif]">
                                {{ $line }}
                            </h1>
                        @endforeach
                    </div>
                </div>

                <!-- Kolom Kanan: Paragraf Keterangan Pelayanan -->
                <div class="md:col-span-8 lg:col-span-7 space-y-5 text-gray-600 dark:text-gray-300 font-light text-sm sm:text-base leading-relaxed reveal-on-scroll delay-150">
                    @foreach($descriptionParagraphs as $paragraph)
                        <p class="text-justify sm:text-left">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================
         4. WAKTU IBADAH
         (Jadwal Pelayanan, Lokasi, dan Tombol Interaksi)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#151515] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    WAKTU PELAYANAN
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    WAKTU IBADAH {{ strtoupper($pageName) }}
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-3 font-light">
                    Mari hadir dan alami hadirat serta perjumpaan yang mengubahkan bersama jemaat Ekklesia Surabaya.
                </p>
            </div>

            <!-- Kartu Detail Waktu Ibadah -->
            <div class="p-6 sm:p-10 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2C2C2C] shadow-lg theme-card reveal-on-scroll">
                <div class="flex flex-col md:flex-row md:items-center justify-between pb-6 border-b border-gray-200 dark:border-[#282828] gap-4">
                    <div>
                        <span class="inline-block text-[10px] font-normal uppercase tracking-wider px-3 py-1 rounded bg-black/5 dark:bg-white/10 text-gray-800 dark:text-gray-200 border border-black/10 dark:border-white/10 mb-2">
                            {{ $schedule['badge'] ?? 'Jadwal Rutin' }}
                        </span>
                        <h3 class="text-xl sm:text-2xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                            {{ $schedule['name'] }}
                        </h3>
                    </div>
                    <div class="text-left md:text-right">
                        <div class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 font-normal">
                            {{ $schedule['day'] }}
                        </div>
                        <div class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] mt-1">
                            {{ $schedule['time'] }}
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigasi Cepat ke Ibadah Lainnya -->
            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-[#222222]">
                <span class="text-xs uppercase tracking-[0.2em] font-normal text-gray-500 dark:text-gray-400 block mb-4 text-center">
                    IBADAH LAINNYA DI EKKLESIA
                </span>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <a href="{{ route('ibadah.my-home') }}" 
                       class="p-4 rounded-xl text-center border transition-all {{ request()->routeIs('ibadah.my-home') ? 'bg-gray-950 text-white dark:bg-white dark:text-black border-transparent font-medium shadow-sm' : 'bg-white dark:bg-[#1A1A1A] text-gray-800 dark:text-gray-200 border-gray-200 dark:border-[#282828] hover:border-gray-400 dark:hover:border-[#444]' }}">
                        <span class="text-xs uppercase font-['Stack_Sans_Notch',sans-serif] block">My Home</span>
                        <span class="text-[10px] text-gray-400 dark:text-gray-400 block mt-0.5">Komunitas Sel</span>
                    </a>
                    <a href="{{ route('ibadah.ekidz') }}" 
                       class="p-4 rounded-xl text-center border transition-all {{ request()->routeIs('ibadah.ekidz') ? 'bg-gray-950 text-white dark:bg-white dark:text-black border-transparent font-medium shadow-sm' : 'bg-white dark:bg-[#1A1A1A] text-gray-800 dark:text-gray-200 border-gray-200 dark:border-[#282828] hover:border-gray-400 dark:hover:border-[#444]' }}">
                        <span class="text-xs uppercase font-['Stack_Sans_Notch',sans-serif] block">Ekidz</span>
                        <span class="text-[10px] text-gray-400 dark:text-gray-400 block mt-0.5">Ibadah Anak</span>
                    </a>
                    <a href="{{ route('ibadah.teens') }}" 
                       class="p-4 rounded-xl text-center border transition-all {{ request()->routeIs('ibadah.teens') ? 'bg-gray-950 text-white dark:bg-white dark:text-black border-transparent font-medium shadow-sm' : 'bg-white dark:bg-[#1A1A1A] text-gray-800 dark:text-gray-200 border-gray-200 dark:border-[#282828] hover:border-gray-400 dark:hover:border-[#444]' }}">
                        <span class="text-xs uppercase font-['Stack_Sans_Notch',sans-serif] block">Ekklesia Teens</span>
                        <span class="text-[10px] text-gray-400 dark:text-gray-400 block mt-0.5">Remaja & Pemuda</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Slider Script Logic -->
    <script>
        (function() {
            let currentSlide = 0;
            const slides = document.querySelectorAll('.ibadah-slide');
            const dots = document.querySelectorAll('.ibadah-dot');
            const totalSlides = slides.length;
            let slideTimer = null;

            if (totalSlides <= 1) return;

            function showSlide(index) {
                if (index < 0) index = totalSlides - 1;
                if (index >= totalSlides) index = 0;
                currentSlide = index;

                slides.forEach((slide, idx) => {
                    if (idx === currentSlide) {
                        slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                        slide.classList.add('opacity-100', 'z-10');
                    } else {
                        slide.classList.remove('opacity-100', 'z-10');
                        slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                    }
                });

                dots.forEach((dot, idx) => {
                    if (idx === currentSlide) {
                        dot.classList.remove('w-2', 'bg-white/50');
                        dot.classList.add('w-8', 'bg-white');
                    } else {
                        dot.classList.remove('w-8', 'bg-white');
                        dot.classList.add('w-2', 'bg-white/50');
                    }
                });
            }

            window.prevIbadahSlide = function() {
                showSlide(currentSlide - 1);
                resetTimer();
            };

            window.nextIbadahSlide = function() {
                showSlide(currentSlide + 1);
                resetTimer();
            };

            window.goToIbadahSlide = function(index) {
                showSlide(index);
                resetTimer();
            };

            function startTimer() {
                slideTimer = setInterval(() => {
                    showSlide(currentSlide + 1);
                }, 5000);
            }

            function resetTimer() {
                if (slideTimer) clearInterval(slideTimer);
                startTimer();
            }

            const container = document.getElementById('ibadahSliderContainer');
            if (container) {
                container.addEventListener('mouseenter', () => {
                    if (slideTimer) clearInterval(slideTimer);
                });
                container.addEventListener('mouseleave', () => {
                    startTimer();
                });
            }

            startTimer();
        })();
    </script>

    {{-- Running Marquee Animation for Ibadah Pages --}}
    <style>
        @keyframes themeMarquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        .animate-theme-marquee {
            display: flex !important;
            width: max-content !important;
            animation: themeMarquee 26s linear infinite !important;
        }
        .animate-theme-marquee:hover {
            animation-play-state: paused !important;
        }
        @media (prefers-reduced-motion: reduce) {
            .animate-theme-marquee {
                animation-duration: 60s !important;
            }
        }
    </style>
@endsection
