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
        <div class="relative w-full min-h-[300px] sm:min-h-[480px] lg:min-h-[580px] flex items-center justify-center bg-black" style="height: calc(100vw * 9 / 16); max-height: 580px; min-height: 260px;">
            
            <!-- SLIDE 1: Poster 1 - Saat Teduh Bersama Hadirat Tuhan -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out flex items-center justify-center" data-slide="0">
                <img src="{{ asset('images/Poster1.jpg') }}" 
                     alt="Saat Teduh Bersama - Ps Juan Anthony Sam" 
                     class="w-full h-full object-cover object-center">
            </div>

            <!-- SLIDE 2: Poster 2 - Jadwal Ibadah Ekklesia Surabaya -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex items-center justify-center" data-slide="1">
                <img src="{{ asset('images/Poster2.jpg') }}" 
                     alt="Jadwal Ibadah Ekklesia Surabaya" 
                     class="w-full h-full object-cover object-center">
            </div>

            <!-- SLIDE 3: Poster 3 - Himbauan Waspada Penipuan -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex items-center justify-center" data-slide="2">
                <img src="{{ asset('images/Poster3.jpg') }}" 
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
        <!-- Outer wrapper: max-w-7xl keeps left text aligned; right photo escapes via negative margin trick -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 items-stretch">

                <!-- Left: Greeting Text -->
                <div class="lg:col-span-7 py-14 sm:py-20 pr-0 lg:pr-12 space-y-6 text-left order-2 lg:order-1 reveal-on-scroll">
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

                <!-- Right: Photo — full height of the row, object-cover, anchored to top -->
                <div class="lg:col-span-5 relative order-1 lg:order-2 h-[360px] sm:h-[440px] lg:h-auto">
                    @php
                        $pastorJuanImg = file_exists(public_path('images/juan.png'))
                            ? asset('images/juan.png')
                            : (file_exists(public_path('images/pastor-juan.png'))
                                ? asset('images/pastor-juan.png')
                                : (file_exists(public_path('images/pastor-juan.jpg'))
                                    ? asset('images/pastor-juan.jpg')
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
         2. PROFIL RINGKAS: SEKILAS EKKLESIA CHURCH
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column: Vision Statement -->
                <div class="lg:col-span-7 space-y-6 reveal-on-scroll">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-px bg-gray-950 dark:bg-white"></span>
                        <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400">
                            SEKILAS EKKLESIA CHURCH
                        </span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-gray-950 dark:text-white tracking-tight leading-tight font-['Stack_Sans_Notch',sans-serif]">
                        Gereja Keluarga yang Sehat dan Memuridkan
                    </h2>

                    <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Ekklesia Surabaya (GKRI Jemaat Ekklesia) bertumbuh di bawah kepemimpinan gembala <strong class="text-gray-950 dark:text-white font-medium">Pastor Juan Anthony Sam</strong> dan <strong class="text-gray-950 dark:text-white font-medium">Ps Samuel</strong>. Kami bertekad membangun pribadi-pribadi yang unggul dan profesional, memperlengkapi setiap generasi di segala usia, serta menghadirkan keluarga Allah yang kuat dan berakar di dalam Kristus.
                    </p>

                    <!-- Core Pillars -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2B2B2B] theme-card">
                            <div class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-[#252525] flex items-center justify-center text-gray-900 dark:text-white mb-3">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-normal text-gray-950 dark:text-white mb-1">Gereja Keluarga</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-light">
                                Komunitas yang hangat, ramah, dan aman bagi setiap generasi dari anak-anak hingga orang tua.
                            </p>
                        </div>

                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2B2B2B] theme-card">
                            <div class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-[#252525] flex items-center justify-center text-gray-900 dark:text-white mb-3">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-normal text-gray-950 dark:text-white mb-1">Pemuridan Nyata</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-light">
                                Memuridkan jemaat menjadi pribadi yang unggul, berintegritas, dan profesional di dunia kerja.
                            </p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('profile') }}" class="inline-flex items-center gap-2 text-xs font-medium text-gray-900 dark:text-white hover:underline">
                            <span>Pelajari Profil & Visi Misi Selengkapnya</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Visual Feature Card -->
                <div class="lg:col-span-5 reveal-on-scroll delay-200">
                    <div class="relative rounded-2xl overflow-hidden border border-gray-200 dark:border-[#2B2B2B] bg-gray-50 dark:bg-[#181818] shadow-lg p-2">
                        <div class="relative aspect-[4/3] rounded-xl overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?q=80&w=800&auto=format&fit=crop" 
                                 alt="Ibadah Ekklesia Surabaya" 
                                 class="w-full h-full object-cover grayscale contrast-125 brightness-95">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-4 left-4 right-4">
                                <span class="text-[10px] uppercase font-normal text-white/90 tracking-widest bg-black/60 px-2 py-0.5 rounded backdrop-blur-sm">
                                    KOMUNITAS KASIH
                                </span>
                                <h3 class="text-lg font-light text-white mt-1 font-['Stack_Sans_Notch',sans-serif]">
                                    Ibadah yang Mengubahkan
                                </h3>
                                <p class="text-xs text-gray-300 mt-0.5 font-light">
                                    Jln Ruko Ngaglik 2 No 15, Surabaya
                                </p>
                            </div>
                        </div>
                    </div>
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
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Jadwal Ibadah Ekklesia
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
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
         4. CTA WHATSAPP LAYANAN JEMAAT (+62 812-1313-1060)
         Baptisan, Pernikahan, Penyerahan Anak, Penghiburan/Dukacita
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    LAYANAN PASTORAL CARE
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Layanan Pastoral WhatsApp
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
                    Tim Pastoral Ekklesia Surabaya siap melayani kebutuhan rohani dan momen berharga Anda
                </p>
                <div class="mt-3">
                    <a href="https://wa.me/6281213131060" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:underline">
                        <span>WhatsApp Center: +62 812-1313-1060</span>
                    </a>
                </div>
            </div>

            <!-- 4 Specific Pastoral Service Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($pastoral_services as $index => $service)
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-950 border border-emerald-300 dark:border-emerald-800 flex items-center justify-center text-emerald-700 dark:text-emerald-400 mb-4">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                                </svg>
                            </div>
                            <h3 class="text-base sm:text-lg font-normal text-gray-950 dark:text-white mb-2">
                                {{ $service['title'] }}
                            </h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300 leading-relaxed font-light mb-6">
                                {{ $service['desc'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-[#242424]">
                            <a href="https://wa.me/6281213131060?text={{ urlencode($service['whatsapp_text']) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 bg-white dark:bg-[#242424] hover:bg-gray-100 dark:hover:bg-[#2C2C2C] text-gray-900 dark:text-white text-xs font-normal rounded-lg transition-all border border-gray-300 dark:border-[#383838]">
                                <span>Hubungi via WhatsApp</span>
                                <svg class="w-3.5 h-3.5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
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
                        GIVING & PERSEMBAHAN M3
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] leading-tight">
                        Persembahan M3
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Dukungan persembahan jemaat dialokasikan khusus untuk pembangunan <strong class="text-gray-950 dark:text-white font-medium">lahan/bangunan, gedung, dan sarana</strong> pekerjaan Tuhan melalui GKRI Jemaat Ekklesia Surabaya.
                    </p>
                    <blockquote class="text-xs italic text-gray-500 dark:text-gray-400 border-l-2 border-gray-300 dark:border-[#333333] pl-3 py-1 font-serif font-light">
                        "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita." — 2 Korintus 9:7
                    </blockquote>
                </div>

                <!-- Right Giving Cards -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 reveal-on-scroll delay-200">
                    <!-- Bank Danamon M3 Card (Exact Client Details) -->
                    <div class="p-6 bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-900 dark:text-white tracking-wider">BANK DANAMON</span>
                                <span class="text-[10px] font-normal uppercase bg-gray-100 dark:bg-[#252525] text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded border border-gray-200 dark:border-[#333333]">
                                    Persembahan M3
                                </span>
                            </div>
                            <div class="text-xs text-gray-500">Nomor Rekening Resmi:</div>
                            <div class="font-mono text-xl sm:text-2xl font-light text-gray-950 dark:text-white tracking-widest bg-gray-50 dark:bg-[#121212] p-3 rounded-lg border border-gray-200 dark:border-[#252525] flex items-center justify-between shadow-2xs">
                                <span id="accountNumberText">{{ $giving['account_number'] }}</span>
                                <button type="button" 
                                        onclick="navigator.clipboard.writeText('{{ $giving['account_number_raw'] }}'); alert('Nomor rekening disalin: {{ $giving['account_number'] }}');" 
                                        class="text-xs p-1 text-gray-400 hover:text-black dark:hover:text-white transition-colors cursor-pointer"
                                        title="Salin Nomor Rekening">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-300 font-light">
                                a.n. <strong class="text-gray-950 dark:text-white font-medium">{{ $giving['account_holder'] }}</strong>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-[#222222] text-[11px] text-gray-500 font-light">
                            Peruntukan: {{ $giving['purpose'] }}
                        </div>
                    </div>

                    <!-- QRIS Card Presentation -->
                    <div class="p-6 bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-900 dark:text-white tracking-wider">QRIS STANDAR NASIONAL</span>
                                <span class="text-[10px] font-normal uppercase bg-gray-100 dark:bg-[#252525] text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded border border-gray-200 dark:border-[#333333]">
                                    Semua E-Wallet
                                </span>
                            </div>
                            <div class="aspect-square w-32 mx-auto bg-white p-2.5 rounded-lg border border-gray-200 flex items-center justify-center shadow-xs">
                                <div class="w-full h-full border border-gray-950 flex flex-col items-center justify-center text-center text-[10px] text-black font-mono font-normal leading-tight">
                                    <span class="text-base font-light font-['Stack_Sans_Notch',sans-serif]">QRIS</span>
                                    <span>GKRI JEMAAT</span>
                                    <span>EKKLESIA</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="text-xs font-medium text-gray-900 dark:text-white block">{{ $giving['account_holder'] }}</span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $giving['qris_info'] }}</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-[#222222] text-center text-[11px] text-gray-500 font-light">
                            BCA, Mandiri, Danamon, GoPay, OVO, Dana, ShopeePay
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
         6. FORM PERMOHONAN DOA (Online Submission)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#141414] transition-colors duration-300" id="doa">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="p-6 sm:p-10 bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card shadow-sm reveal-on-scroll">
                    <div class="text-center mb-8">
                        <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                            KOTAK DOA JEMAAT
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                            Kirimkan Permohonan Doa Anda
                        </h2>
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light max-w-xl mx-auto">
                            Setiap pokok doa akan dijaga kerahasiaannya dan didoakan secara khusus oleh Pastor Juan Anthony Sam, Ps Samuel, dan tim pendoa syafaat.
                        </p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('prayer.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Nama Lengkap / Panggilan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   value="{{ old('name') }}"
                                   placeholder="Contoh: Yohanes"
                                   class="w-full px-3.5 py-2.5 bg-white dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
                            @error('name')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Nomor WhatsApp / Telepon
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="0812xxxxxxxx"
                                       class="w-full px-3.5 py-2.5 bg-white dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Email (Opsional)
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="nama@email.com"
                                       class="w-full px-3.5 py-2.5 bg-white dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
                            </div>
                        </div>

                        <div>
                            <label for="request_text" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Pokok Permohonan Doa <span class="text-red-500">*</span>
                            </label>
                            <textarea id="request_text" 
                                      name="request_text" 
                                      rows="4" 
                                      required
                                      placeholder="Tuliskan pokok permohonan doa atau kebutuhan rohani Anda di sini..."
                                      class="w-full px-3.5 py-2.5 bg-white dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">{{ old('request_text') }}</textarea>
                            @error('request_text')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center gap-2 pt-1">
                            <input type="checkbox" 
                                   id="is_anonymous" 
                                   name="is_anonymous" 
                                   value="1" 
                                   {{ old('is_anonymous') ? 'checked' : '' }}
                                   class="rounded bg-white dark:bg-[#121212] border-gray-300 dark:border-[#333333] text-gray-900 dark:text-white focus:ring-0">
                            <label for="is_anonymous" class="text-xs text-gray-500 font-light">
                                Kirimkan sebagai permohonan anonim (nama dirahasiakan saat doa bersama)
                            </label>
                        </div>

                        <div class="pt-2">
                            <button type="submit" 
                                    class="w-full py-3 px-6 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm cursor-pointer">
                                Kirimkan Pokok Doa
                            </button>
                        </div>
                    </form>
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
@endsection
