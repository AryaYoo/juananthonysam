@extends('layouts.app')

@section('title', 'Beranda — Ekklesia Surabaya')
@section('meta_description', 'Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Tema 2026: Tahun Pemulihan bagi Kemuliaan Tuhan.')

@section('content')
    <!-- =========================================================
         1. HERO SECTION & CAROUSEL (Mobile-First, philipmantofa.com style)
         ========================================================= -->
    <section class="relative bg-[#111111] dark:bg-[#0D0D0D] text-white overflow-hidden select-none" id="heroCarouselSection">
        <!-- Carousel Slides Container -->
        <div class="relative w-full min-h-[580px] sm:min-h-[640px] lg:min-h-[720px] flex items-center">
            
            <!-- SLIDE 1: Saat Teduh Bersama (Direct Inspiration from Reference) -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out flex flex-col justify-between" data-slide="0">
                <!-- Background Textured Panels & Ambient Glow -->
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#242424] via-[#141414] to-[#0A0A0A] z-0"></div>
                <!-- Subtle Vertical Ribbed Panel Lines (Aesthetic from reference) -->
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#222222_1px,transparent_1px)] bg-[size:32px_100%] opacity-25 z-0"></div>

                <!-- Big Stylized Brand Background Monogram (like "PMB" in reference) -->
                <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 text-center pointer-events-none z-0 overflow-hidden">
                    <span class="text-[120px] sm:text-[180px] lg:text-[260px] font-light font-['Stack_Sans_Notch',sans-serif] tracking-tighter text-white opacity-[0.03] select-none">
                        EKKLESIA
                    </span>
                </div>

                <!-- Slide Content Container -->
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-8 pb-4 flex-1 flex flex-col justify-center items-center text-center">
                    
                    <!-- Emblem & Pastoral Name Eyebrow -->
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 rounded-full bg-[#2A2A2A] border border-[#3D3D3D] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M7 8h10"/>
                            </svg>
                        </div>
                        <span class="text-xs tracking-[0.2em] uppercase font-normal text-gray-300">
                            PS. JUAN ANTHONY SAM & PS. SAMUEL
                        </span>
                    </div>

                    <!-- Main Headline: "SAAT TEDUH Bersama" (Lightweight Typography as requested) -->
                    <div class="mb-4">
                        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-light tracking-tight text-white leading-none font-['Stack_Sans_Notch',sans-serif]">
                            SAAT TEDUH
                        </h1>
                        <span class="block text-2xl sm:text-3xl lg:text-4xl italic text-gray-300 font-serif font-light -mt-1 sm:-mt-2">
                            Bersama Hadirat Tuhan
                        </span>
                    </div>

                    <!-- Year Theme Highlight Tag -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-white/10 border border-white/20 rounded-full text-xs text-gray-200 mb-6 backdrop-blur-xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                        <span class="font-light">Tema 2026: <strong class="font-normal text-white">Tahun Pemulihan bagi Kemuliaan Tuhan</strong></span>
                    </div>

                    <!-- Portrait Graphic Representation / Sanctuary Visual -->
                    <div class="relative w-48 sm:w-60 lg:w-72 mx-auto my-2 group">
                        <div class="aspect-[3/4] rounded-2xl bg-gradient-to-b from-[#282828] to-[#181818] border border-white/15 shadow-2xl overflow-hidden relative flex items-end justify-center">
                            <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?q=80&w=800&auto=format&fit=crop" 
                                 alt="Pastor Juan Anthony Sam & Ps Samuel" 
                                 class="w-full h-full object-cover grayscale brightness-90 contrast-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#111111] via-transparent to-transparent"></div>
                            <div class="absolute bottom-3 inset-x-0 px-2 text-center">
                                <span class="text-[11px] font-normal text-white tracking-wider uppercase bg-black/70 px-3 py-1 rounded-md border border-white/10 backdrop-blur-xs">
                                    Pastoral Ekklesia
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ribbon 1: Service Schedule Strip (Direct reference layout match) -->
                <div class="relative z-10 w-full bg-[#181818] border-y border-white/10 py-3 px-4">
                    <div class="max-w-4xl mx-auto flex flex-wrap items-center justify-around gap-4 text-center">
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-normal">SETIAP</span>
                            <span class="text-sm sm:text-base font-normal text-white font-['Stack_Sans_Notch',sans-serif]">
                                SENIN & JUMAT
                            </span>
                        </div>
                        <div class="h-8 w-px bg-white/10 hidden sm:block"></div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-normal">WAKTU</span>
                            <span class="text-sm sm:text-base font-normal text-white">
                                19.00 <span class="text-xs text-gray-400">WIB</span>
                            </span>
                        </div>
                        <div class="h-8 w-px bg-white/10 hidden sm:block"></div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-normal">TEMPAT & BROADCAST</span>
                            <span class="text-xs sm:text-sm font-normal text-gray-200">
                                Sanctuary & YouTube Live
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Ribbon 2: Social Media Channel Links Bar (Direct reference layout match) -->
                <div class="relative z-10 w-full bg-[#111111] py-2.5 px-4 text-xs text-gray-400 border-b border-white/10">
                    <div class="max-w-5xl mx-auto flex flex-wrap items-center justify-center gap-x-6 gap-y-2">
                        <a href="{{ route('media') }}" class="flex items-center gap-1.5 hover:text-white transition-colors">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span>Ekklesia Ministry</span>
                        </a>
                        <span class="text-white/20 hidden sm:inline">•</span>
                        <a href="{{ route('media') }}" class="flex items-center gap-1.5 hover:text-white transition-colors">
                            <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span>Ekklesia Worship</span>
                        </a>
                        <span class="text-white/20 hidden sm:inline">•</span>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1.5 hover:text-white transition-colors">
                            <svg class="w-3.5 h-3.5 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <span>@ekklesiasurabaya</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2: Tema Tahun 2026 -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col justify-between" data-slide="1">
                <div class="absolute inset-0 bg-gradient-to-b from-[#222222] via-[#141414] to-[#0A0A0A] z-0"></div>
                
                <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 flex-1 flex flex-col justify-center items-center text-center">
                    <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-400 mb-3">
                        DEKLARASI PROFETIK TAHUN 2026
                    </span>
                    <h2 class="text-3xl sm:text-5xl lg:text-6xl font-light text-white font-['Stack_Sans_Notch',sans-serif] max-w-2xl leading-tight mb-6">
                        Tahun Pemulihan bagi Kemuliaan Tuhan
                    </h2>
                    <blockquote class="text-sm sm:text-base lg:text-lg text-gray-300 max-w-2xl italic leading-relaxed mb-6 font-serif font-light">
                        {{ $theme_2026['verse'] }}
                    </blockquote>
                    <span class="text-xs font-normal text-white tracking-wider px-3 py-1 bg-white/10 border border-white/20 rounded">
                        — {{ $theme_2026['reference'] }}
                    </span>
                    <div class="mt-8 flex gap-3">
                        <a href="{{ route('profile') }}" class="px-5 py-2.5 bg-white text-gray-900 font-medium text-xs rounded-md hover:bg-gray-100 transition-all">
                            Baca Visi & Misi Gereja
                        </a>
                        <a href="{{ route('events') }}" class="px-5 py-2.5 bg-white/10 border border-white/20 text-white font-medium text-xs rounded-md hover:bg-white/20 transition-all">
                            Jadwal Ibadah
                        </a>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3: Ibadah Keluarga (Sunday Service) -->
            <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col justify-between" data-slide="2">
                <div class="absolute inset-0 bg-gradient-to-b from-[#222222] via-[#141414] to-[#0A0A0A] z-0"></div>
                
                <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 flex-1 flex flex-col justify-center items-center text-center">
                    <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-400 mb-3">
                        SUNDAY FAMILY WORSHIP
                    </span>
                    <h2 class="text-3xl sm:text-5xl lg:text-6xl font-light text-white font-['Stack_Sans_Notch',sans-serif] mb-4">
                        Gereja Keluarga Yang Sehat
                    </h2>
                    <p class="text-sm sm:text-base text-gray-300 max-w-xl mb-8 leading-relaxed font-light">
                        Bergabunglah bersama kami setiap hari Minggu. Ruang ibadah yang hangat bagi seluruh anggota keluarga dari anak-anak, remaja, hingga dewasa.
                    </p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 w-full max-w-lg mb-8 text-left">
                        <div class="p-3 bg-white/10 border border-white/15 rounded-lg backdrop-blur-xs">
                            <div class="text-[11px] text-gray-300">Sunday Service</div>
                            <div class="text-sm font-medium text-white">09.00 WIB</div>
                        </div>
                        <div class="p-3 bg-white/10 border border-white/15 rounded-lg backdrop-blur-xs">
                            <div class="text-[11px] text-gray-300">Ekidz (Anak)</div>
                            <div class="text-sm font-medium text-white">09.30 WIB</div>
                        </div>
                        <div class="p-3 bg-white/10 border border-white/15 rounded-lg col-span-2 sm:col-span-1 backdrop-blur-xs">
                            <div class="text-[11px] text-gray-300">E-Teens (Remaja)</div>
                            <div class="text-sm font-medium text-white">11.00 WIB</div>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-gray-900 font-medium text-xs rounded-md hover:bg-gray-100 transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>Petunjuk Arah ke Lokasi</span>
                    </a>
                </div>
            </div>

            <!-- Carousel Mobile Left & Right Arrows -->
            <button type="button" 
                    id="carouselPrev" 
                    aria-label="Slide Sebelumnya" 
                    class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/40 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 focus:outline-none backdrop-blur-sm shadow-lg cursor-pointer">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button type="button" 
                    id="carouselNext" 
                    aria-label="Slide Berikutnya" 
                    class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/40 hover:bg-white hover:text-black text-white border border-white/20 flex items-center justify-center transition-all duration-200 focus:outline-none backdrop-blur-sm shadow-lg cursor-pointer">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Carousel Slide Dots Indicator -->
            <div class="absolute bottom-20 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
                <button type="button" class="carousel-dot w-6 h-1.5 rounded-full bg-white transition-all duration-300 cursor-pointer" data-index="0" aria-label="Slide 1"></button>
                <button type="button" class="carousel-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" data-index="1" aria-label="Slide 2"></button>
                <button type="button" class="carousel-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" data-index="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <!-- =========================================================
         2. SEKILAS PROFIL & VISI MISI SECTION (With Scroll Reveal)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column: Vision Statement -->
                <div class="lg:col-span-7 space-y-6 reveal-on-scroll">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-px bg-gray-950 dark:bg-white"></span>
                        <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400">
                            TENTANG EKKLESIA SURABAYA
                        </span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-gray-950 dark:text-white tracking-tight leading-tight font-['Stack_Sans_Notch',sans-serif]">
                        Menjadi Gereja Keluarga yang Sehat dan Memuridkan
                    </h2>

                    <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Ekklesia Surabaya bertumbuh di bawah kepemimpinan gembala <strong class="text-gray-950 dark:text-white font-medium">Pastor Juan Anthony Sam</strong> dan <strong class="text-gray-950 dark:text-white font-medium">Ps Samuel</strong>. Kami rindu melihat setiap pribadi dan keluarga dipulihkan, mengalami kepenuhan kasih Kristus, serta memancarkan kemuliaan Tuhan dalam panggilan hidup sehari-hari.
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
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                                Tempat bertumbuh yang hangat dan aman bagi setiap generasi dari anak hingga lanjut usia.
                            </p>
                        </div>

                        <div class="p-5 rounded-xl bg-gray-50 dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2B2B2B] theme-card">
                            <div class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-[#252525] flex items-center justify-center text-gray-900 dark:text-white mb-3">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-normal text-gray-950 dark:text-white mb-1">Pemuridan Nyata</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                                Membentuk pribadi unggul, berkarakter Kristus, dan profesional dalam masyarakat.
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
                                <p class="text-xs text-gray-300 mt-0.5">
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
         3. RINGKASAN JADWAL IBADAH SECTION (With Scroll Reveal)
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
                    Kami menantikan kehadiran Anda dan keluarga dalam persekutuan tubuh Kristus
                </p>
            </div>

            <!-- Schedule Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($schedules as $index => $schedule)
                    <div class="p-6 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-normal uppercase tracking-wider px-2.5 py-1 rounded bg-gray-100 dark:bg-[#242424] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#333333]">
                                    {{ $schedule['badge'] }}
                                </span>
                                <span class="text-xs text-gray-500 font-normal">
                                    {{ $schedule['day'] }}
                                </span>
                            </div>
                            <h3 class="text-lg font-normal text-gray-950 dark:text-white mb-1">
                                {{ $schedule['name'] }}
                            </h3>
                            <div class="text-2xl font-light text-gray-900 dark:text-white font-['Stack_Sans_Notch',sans-serif] my-3">
                                {{ $schedule['time'] }}
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-light">
                                Diperuntukkan bagi: <span class="text-gray-900 dark:text-gray-200 font-normal">{{ $schedule['target'] }}</span>
                            </p>
                        </div>
                        
                        <div class="pt-6 mt-4 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between">
                            <span class="text-[11px] text-gray-400">Sanctuary Lt. 2</span>
                            <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-xs text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white font-normal flex items-center gap-1 transition-colors">
                                <span>Lokasi</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
         4. GIVING / PERSEMBAHAN SECTION (With Scroll Reveal)
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300" id="giving">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Intro -->
                <div class="lg:col-span-5 space-y-4 reveal-on-scroll">
                    <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block">
                        GIVING & TITHES
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] leading-tight">
                        Persembahan & Persepuluhan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Memberi dengan sukacita dan kerelaan hati demi mendukung pekerjaan pelayanan pekerjaan Tuhan, penjangkauan jiwa-jiwa, dan misi keluarga Allah melalui Ekklesia Surabaya.
                    </p>
                    <blockquote class="text-xs italic text-gray-500 dark:text-gray-400 border-l-2 border-gray-300 dark:border-[#333333] pl-3 py-1 font-serif font-light">
                        "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita." — 2 Korintus 9:7
                    </blockquote>
                </div>

                <!-- Right Giving Cards -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 reveal-on-scroll delay-200">
                    <!-- Bank Danamon M3 Card -->
                    <div class="p-6 bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-900 dark:text-white tracking-wider">BANK DANAMON</span>
                                <span class="text-[10px] font-normal uppercase bg-white dark:bg-[#252525] text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded border border-gray-200 dark:border-[#333333]">
                                    M3 Account
                                </span>
                            </div>
                            <div class="text-xs text-gray-500">Nomor Rekening Resmi:</div>
                            <div class="font-mono text-xl sm:text-2xl font-light text-gray-950 dark:text-white tracking-widest bg-white dark:bg-[#121212] p-3 rounded-lg border border-gray-200 dark:border-[#252525] flex items-center justify-between shadow-2xs">
                                <span id="accountNumberText">{{ $giving['account_number'] }}</span>
                                <button type="button" 
                                        onclick="navigator.clipboard.writeText('{{ preg_replace('/\s+/', '', $giving['account_number']) }}'); alert('Nomor rekening disalin!');" 
                                        class="text-xs p-1 text-gray-400 hover:text-black dark:hover:text-white transition-colors cursor-pointer"
                                        title="Salin Nomor Rekening">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="text-xs text-gray-600 dark:text-gray-300 font-light">
                                a.n. <strong class="text-gray-900 dark:text-white font-medium">{{ $giving['account_holder'] }}</strong>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-200 dark:border-[#222222] text-[11px] text-gray-400 font-light">
                            Gunakan keterangan: Persembahan / Persepuluhan
                        </div>
                    </div>

                    <!-- QRIS Card Presentation -->
                    <div class="p-6 bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-900 dark:text-white tracking-wider">QRIS NASIONAL</span>
                                <span class="text-[10px] font-normal uppercase bg-white dark:bg-[#252525] text-gray-700 dark:text-gray-300 px-2 py-0.5 rounded border border-gray-200 dark:border-[#333333]">
                                    Semua E-Wallet
                                </span>
                            </div>
                            <div class="aspect-square w-32 mx-auto bg-white p-2.5 rounded-lg border border-gray-200 flex items-center justify-center shadow-xs">
                                <div class="w-full h-full border border-gray-950 flex flex-col items-center justify-center text-center text-[10px] text-black font-mono font-normal leading-tight">
                                    <span class="text-base font-light font-['Stack_Sans_Notch',sans-serif]">QRIS</span>
                                    <span>EKKLESIA</span>
                                    <span>SURABAYA</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="text-xs font-medium text-gray-900 dark:text-white block">{{ $giving['account_holder'] }}</span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $giving['qris_info'] }}</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-200 dark:border-[#222222] text-center text-[11px] text-gray-400 font-light">
                            BCA, Mandiri, BNI, GoPay, OVO, Dana, ShopeePay
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
         5. FORM PERMOHONAN DOA & WHATSAPP COUNSELING CTA
         ========================================================= -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#101010] transition-colors duration-300" id="doa">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left Column: Pastoral Care & WhatsApp Direct -->
                <div class="lg:col-span-5 space-y-6 reveal-on-scroll">
                    <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block">
                        PASTORAL CARE & LAYANAN JEMAAT
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] leading-tight">
                        Kami Rindu Berdoa & Berjalan Bersama Anda
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Apapun beban pergumulan, kesehatan, keluarga, pekerjaan, atau kebutuhan rohani yang sedang Anda hadapi, ketahuilah bahwa Anda tidak sendirian. Tim pendoa dan pastoral Ekklesia Surabaya siap menopang Anda dalam doa.
                    </p>

                    <!-- Direct WhatsApp CTA Box -->
                    <div class="p-5 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-950 border border-emerald-300 dark:border-emerald-700 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-950 dark:text-white">Konseling & WhatsApp Pastoral</h3>
                                <p class="text-xs text-gray-500 font-light">Layanan responsif tim pastoral Ekklesia</p>
                            </div>
                        </div>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '6281234567890')) }}?text=Halo%20Pastoral%20Ekklesia%20Surabaya,%20saya%20ingin%20berkonsultasi%20/%20didokan" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full flex items-center justify-center gap-2 py-3 px-4 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm">
                            <span>Hubungi via WhatsApp Sekarang</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Prayer Request Form -->
                <div class="lg:col-span-7 reveal-on-scroll delay-200">
                    <div class="p-6 sm:p-8 bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] rounded-2xl theme-card shadow-sm">
                        <div class="mb-6">
                            <h3 class="text-xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                                Kirimkan Permohonan Doa Anda
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 font-light">
                                Setiap pokok doa akan dijaga kerahasiaannya dan didoakan dalam doa fajar serta mezbah doa pastoral.
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
                                       placeholder="Contoh: Budi Santoso"
                                       class="w-full px-3.5 py-2.5 bg-gray-50 dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
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
                                           class="w-full px-3.5 py-2.5 bg-gray-50 dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
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
                                           class="w-full px-3.5 py-2.5 bg-gray-50 dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">
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
                                          class="w-full px-3.5 py-2.5 bg-gray-50 dark:bg-[#121212] border border-gray-200 dark:border-[#333333] rounded-lg text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-gray-900 dark:focus:border-white transition-colors">{{ old('request_text') }}</textarea>
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
                                       class="rounded bg-gray-50 dark:bg-[#121212] border-gray-300 dark:border-[#333333] text-gray-900 dark:text-white focus:ring-0">
                                <label for="is_anonymous" class="text-xs text-gray-500 font-light">
                                    Kirimkan sebagai permohonan anonim (nama tidak diumumkan saat doa)
                                </label>
                            </div>

                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full py-3 px-6 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm cursor-pointer">
                                    Kirim Permohonan Doa
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Carousel Logic (Touch swipe & controls) -->
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
