@extends('layouts.app')

@section('title', 'Beranda — Ekklesia Surabaya')
@section('meta_description', 'Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Tema 2026: Tahun Pemulihan bagi Kemuliaan Tuhan. Welcome Home.')

@section('content')
    <!-- =========================================================
         1. HERO SECTION & CAROUSEL (Mobile-First, philipmantofa.com style)
         ========================================================= -->
    <!-- =========================================================
         1. HERO SECTION & CAROUSEL (Poster Images 1-3)
         ========================================================= -->
    <section class="relative bg-black text-white overflow-hidden select-none" id="heroCarouselSection">
        <!-- Carousel Slides Container -->
        <div class="relative w-full min-h-[420px] sm:min-h-[560px] lg:min-h-[720px] flex items-center justify-center bg-black" style="height: calc(100vw * 10 / 16); max-height: 780px; min-height: 420px;">

            
            <!-- SLIDE 1: Poster 1 - Saat Teduh Bersama Hadirat Tuhan -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out flex items-center justify-center" data-slide="0">
                <img src="{{ asset_v('images/Poster1.jpg') }}" 
                     alt="Saat Teduh Bersama - Ps Juan Anthony Sam" 
                     class="w-full h-full object-cover object-center">
            </div>

            <!-- SLIDE 2: Poster 2 - Jadwal Ibadah Ekklesia Surabaya -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex items-center justify-center" data-slide="1">
                <img src="{{ asset_v('images/Poster2.jpg') }}" 
                     alt="Jadwal Ibadah Ekklesia Surabaya" 
                     class="w-full h-full object-cover object-center">
            </div>

            <!-- SLIDE 3: Poster 3 - Himbauan Waspada Penipuan -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex items-center justify-center" data-slide="2">
                <img src="{{ asset_v('images/Poster3.jpg') }}" 
                     alt="Himbauan Kehati-hatian dan Waspada Penipuan" 
                     class="w-full h-full object-cover object-center">
            </div>


            <!-- Carousel Prev/Next Arrows — aligned with max-w-7xl header container -->
            <div class="absolute inset-0 z-20 pointer-events-none flex items-center">
                <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <button type="button" 
                            id="carouselPrev" 
                            aria-label="Slide Sebelumnya" 
                            class="pointer-events-auto w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/50 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 focus:outline-none backdrop-blur-sm shadow-lg cursor-pointer">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button type="button" 
                            id="carouselNext" 
                            aria-label="Slide Berikutnya" 
                            class="pointer-events-auto w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/50 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 focus:outline-none backdrop-blur-sm shadow-lg cursor-pointer">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Carousel Slide Dots Indicator -->
            <div class="absolute bottom-5 sm:bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
                <button type="button" class="carousel-dot w-6 h-1.5 rounded-full bg-white transition-all duration-300 cursor-pointer" data-index="0" aria-label="Slide 1"></button>
                <button type="button" class="carousel-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" data-index="1" aria-label="Slide 2"></button>
                <button type="button" class="carousel-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" data-index="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <!-- =========================================================
         1.5. PASTORAL GREETING SECTION (philipmantofa.com reference style)
         "HELLO, THIS IS PASTOR JUAN ANTHONY SAM" (Aligned with max-w-7xl)
         ========================================================= -->
    <section class="bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300 overflow-hidden">
        <!-- Outer wrapper: max-w-7xl keeps left text aligned -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 items-stretch">

                <!-- Left: Greeting Text — order-1 so it's ABOVE photo on mobile -->
                <div class="lg:col-span-7 py-14 sm:py-20 pr-0 lg:pr-12 space-y-6 text-left order-1 pastoral-slide-up">
                    <div>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif] leading-tight">
                            HELLO, THIS IS PASTOR JUAN ANTHONY SAM
                        </h2>
                        <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4"></div>
                    </div>

                    <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-300 font-light leading-relaxed max-w-xl">
                        Welcome home! I pray that this point of contact with us will begin your exciting adventure with the Holy Spirit and His Word.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center gap-4">
                        <a href="{{ route('pastor.juan') }}" 
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-[#111111] text-xs font-normal rounded-lg transition-all shadow-sm">
                            <span>Baca Profil Pastor Juan</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/6281213131060?text=Halo%20Pastor%20Juan%20Anthony%20Sam,%20salam%20dalam%20kasih%20Kristus" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-xs font-normal text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">
                            <span>Hubungi Pastoral via WA</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right: Photo — full height on desktop, full-bleed width on mobile (below text) -->
                <div class="lg:col-span-5 relative order-2 -mx-4 sm:-mx-6 lg:mx-0 h-[380px] sm:h-[460px] lg:h-auto pastoral-slide-up pastoral-slide-up--delayed">
                    @php
                        $pastorJuanImg = file_exists(public_path('images/juan.png'))
                            ? asset_v('images/juan.png')
                            : (file_exists(public_path('images/pastor-juan.png'))
                                ? asset_v('images/pastor-juan.png')
                                : (file_exists(public_path('images/pastor-juan.jpg'))
                                    ? asset_v('images/pastor-juan.jpg')
                                    : 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=800&auto=format&fit=crop'));
                    @endphp
                    <img src="{{ $pastorJuanImg }}"
                         alt="Pastor Juan Anthony Sam - Ekklesia Surabaya"
                         class="absolute inset-0 w-full h-full object-cover object-top select-none">
                </div>

            </div>
        </div>
    </section>




    <!-- =========================================================
         3. JADWAL IBADAH (5 Jadwal Lengkap Sesuai Permintaan)
         Sunday Service (09.00), Ekidz (09.30), E-Teens (11.00), Doa Senin (19.00), Doa Jumat (19.00)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#101010] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    WAKTU PELAYANAN
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    JADWAL IBADAH EKKLESIA
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-4 font-light">
                    Kami menantikan kehadiran Anda dan keluarga dalam setiap jam persekutuan jemaat
                </p>
            </div>

            <!-- Schedule Cards Grid (5 Jadwal) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
                @foreach($schedules as $index => $schedule)
                    <div class="p-5 sm:p-6 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-normal uppercase tracking-wider px-2 py-0.5 rounded bg-gray-100 dark:bg-[#242424] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#333333]">
                                    {{ $schedule['badge'] }}
                                </span>
                            </div>
                            <h3 class="text-base sm:text-lg font-normal text-gray-950 dark:text-white mb-1">
                                {{ $schedule['name'] }}
                            </h3>
                            <div class="text-xs text-gray-500 font-normal mb-2">
                                {{ $schedule['day'] }}
                            </div>
                            <div class="text-2xl font-light text-gray-900 dark:text-white font-['Stack_Sans_Notch',sans-serif] my-2">
                                {{ $schedule['time'] }}
                            </div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400 leading-relaxed font-light mt-2">
                                {{ $schedule['target'] }}
                            </p>
                        </div>
                        
                        <div class="pt-4 mt-4 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between">
                            <span class="text-[10px] text-gray-400">Sanctuary Lt. 2</span>
                            <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-xs text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white font-normal flex items-center gap-1 transition-colors">
                                <span>Peta</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- =========================================================
         5. GIVING / PERSEMBAHAN M3 (Bank Danamon 3620.989.776 a.n. GKRI JEMAAT EKKLESIA)
         Untuk lahan/bangunan, gedung, dan sarana + QRIS
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#101010] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300" id="giving">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Intro -->
                <div class="lg:col-span-5 space-y-4 reveal-on-scroll">
                    <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block">
                        GIVING & PERSEPULUHAN
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif] leading-tight">
                        PERSEMBAHAN & PERSEPULUHAN
                    </h2>
                    <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-3 mb-4"></div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Dukungan persembahan dan persepuluhan jemaat dialokasikan untuk pekerjaan Tuhan, sarana ibadah, dan pembangunan pelayanan melalui GKRI Jemaat Ekklesia Surabaya.
                    </p>
                    <blockquote class="text-xs italic text-gray-500 dark:text-gray-400 border-l-2 border-gray-300 dark:border-[#333333] pl-3 py-1 font-serif font-light">
                        "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita." — 2 Korintus 9:7
                    </blockquote>
                </div>

                <!-- Right Giving Cards: Perpuluhan & Persembahan Images -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 reveal-on-scroll delay-200">
                    <!-- Card 1: Perpuluhan -->
                    <div class="group bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between theme-card">
                        <div class="overflow-hidden bg-gray-50 dark:bg-[#141414] p-3 flex items-center justify-center">
                            <img src="{{ asset_v('images/Perpuluhan.png') }}" 
                                 alt="Ekklesia Perpuluhan — BCA Aily Yunnita Wardhany" 
                                 class="w-full h-auto rounded-xl object-contain transition-transform duration-300 group-hover:scale-[1.02]">
                        </div>
                        <div class="p-4 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between gap-2 bg-white dark:bg-[#181818]">
                            <div>
                                <span class="text-[11px] text-gray-500 dark:text-gray-400 block font-light">BCA Perpuluhan</span>
                                <span class="font-mono text-sm sm:text-base font-medium text-gray-900 dark:text-white tracking-wider">1870099246</span>
                            </div>
                            <button type="button" 
                                    onclick="navigator.clipboard.writeText('1870099246'); alert('Nomor rekening BCA Perpuluhan (1870099246) berhasil disalin!');" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-normal rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-[#252525] dark:hover:bg-[#303030] text-gray-800 dark:text-gray-200 transition-colors cursor-pointer shrink-0"
                                    title="Salin Nomor Rekening">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Persembahan -->
                    <div class="group bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between theme-card">
                        <div class="overflow-hidden bg-gray-50 dark:bg-[#141414] p-3 flex items-center justify-center">
                            <img src="{{ asset_v('images/Persembahan.png') }}" 
                                 alt="Ekklesia Persembahan — BCA GKRI Jemaat Ekklesia" 
                                 class="w-full h-auto rounded-xl object-contain transition-transform duration-300 group-hover:scale-[1.02]">
                        </div>
                        <div class="p-4 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between gap-2 bg-white dark:bg-[#181818]">
                            <div>
                                <span class="text-[11px] text-gray-500 dark:text-gray-400 block font-light">BCA Persembahan</span>
                                <span class="font-mono text-sm sm:text-base font-medium text-gray-900 dark:text-white tracking-wider">0888850123</span>
                            </div>
                            <button type="button" 
                                    onclick="navigator.clipboard.writeText('0888850123'); alert('Nomor rekening BCA Persembahan (0888850123) berhasil disalin!');" 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-normal rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-[#252525] dark:hover:bg-[#303030] text-gray-800 dark:text-gray-200 transition-colors cursor-pointer shrink-0"
                                    title="Salin Nomor Rekening">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Carousel Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            const prevBtn = document.getElementById('carouselPrev');
            const nextBtn = document.getElementById('carouselNext');
            let current = 0;
            let autoTimer = null;

            function showSlide(index) {
                if (index < 0) index = slides.length - 1;
                if (index >= slides.length) index = 0;
                current = index;

                slides.forEach((s, i) => {
                    if (i === current) {
                        s.classList.remove('opacity-0', 'pointer-events-none');
                        s.classList.add('opacity-100');
                    } else {
                        s.classList.remove('opacity-100');
                        s.classList.add('opacity-0', 'pointer-events-none');
                    }
                });

                dots.forEach((d, i) => {
                    if (i === current) {
                        d.classList.remove('bg-white/40', 'w-2');
                        d.classList.add('bg-white', 'w-6');
                    } else {
                        d.classList.remove('bg-white', 'w-6');
                        d.classList.add('bg-white/40', 'w-2');
                    }
                });
            }

            function startTimer() {
                stopTimer();
                autoTimer = setInterval(() => {
                    showSlide(current + 1);
                }, 6000);
            }

            function stopTimer() {
                if (autoTimer) clearInterval(autoTimer);
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    showSlide(current - 1);
                    startTimer();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    showSlide(current + 1);
                    startTimer();
                });
            }

            dots.forEach(dot => {
                dot.addEventListener('click', (e) => {
                    const idx = parseInt(e.target.getAttribute('data-index'));
                    showSlide(idx);
                    startTimer();
                });
            });

            // Touch Swipe for mobile devices
            let touchStartX = 0;
            let touchEndX = 0;
            const carouselSec = document.getElementById('heroCarouselSection');

            if (carouselSec) {
                carouselSec.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });

                carouselSec.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        showSlide(current + 1);
                        startTimer();
                    }
                    if (touchEndX - touchStartX > 50) {
                        showSlide(current - 1);
                        startTimer();
                    }
                }, { passive: true });
            }

            startTimer();
        });
    </script>

    {{-- Pastoral Greeting Slide-Up Animation --}}
    <style>
        .pastoral-slide-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .pastoral-slide-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .pastoral-slide-up--delayed {
            transition-delay: 0.2s;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const targets = document.querySelectorAll('.pastoral-slide-up');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15 });
                targets.forEach(el => observer.observe(el));
            } else {
                targets.forEach(el => el.classList.add('is-visible'));
            }
        });
    </script>
@endsection

