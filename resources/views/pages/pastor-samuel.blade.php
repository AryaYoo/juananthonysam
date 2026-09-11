@extends('layouts.app')

@section('title', $pastor['name'] . ' — Profil Pastor Ekklesia Surabaya')
@section('meta_description', 'Profil lengkap ' . $pastor['name'] . ' (' . $pastor['role'] . '). Perjalanan spiritual, latar belakang, pelayanan, serta visi dan misi bagi kemuliaan Kristus.')

@section('content')
    <!-- =========================================================
         SUB-NAVIGATION BAR (philipmantofa.com reference style)
         Sticky beneath main navbar with fast anchor jump
         ========================================================= -->
    <div class="sticky top-20 z-30 bg-[#0E0E0E] text-white border-b border-white/10 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between py-3 gap-2 sm:gap-4">
                <!-- Left: Profile Title -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('profile') }}" class="text-gray-400 hover:text-white text-xs transition-colors flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Profil</span>
                    </a>
                    <span class="text-gray-600">•</span>
                    <span class="font-['Stack_Sans_Notch',sans-serif] text-sm sm:text-base font-light tracking-wide text-white">
                        {{ $pastor['title_display'] }}
                    </span>
                </div>

                <!-- Right: In-Page Anchor Links -->
                <nav class="flex flex-wrap items-center justify-center gap-x-4 sm:gap-x-6 gap-y-1 text-xs">
                    <a href="#overview" class="text-gray-300 hover:text-white transition-colors py-1 hover:underline underline-offset-4">
                        Overview
                    </a>
                    <a href="#spiritual-journey" class="text-gray-300 hover:text-white transition-colors py-1 hover:underline underline-offset-4">
                        My Spiritual Journey
                    </a>
                    <a href="#background" class="text-gray-300 hover:text-white transition-colors py-1 hover:underline underline-offset-4">
                        My Background
                    </a>
                    <a href="#ministry" class="text-gray-300 hover:text-white transition-colors py-1 hover:underline underline-offset-4">
                        My Ministry
                    </a>
                    <a href="#vision-mission" class="text-gray-300 hover:text-white transition-colors py-1 hover:underline underline-offset-4">
                        My Vision & Mission
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- =========================================================
         1. OVERVIEW (Light Section)
         ========================================================= -->
    <section id="overview" class="py-16 sm:py-24 bg-white dark:bg-[#141414] text-gray-900 dark:text-gray-100 transition-colors duration-300 scroll-mt-36">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light uppercase tracking-widest font-['Stack_Sans_Notch',sans-serif] text-gray-950 dark:text-white">
                OVERVIEW
            </h2>
            <div class="w-12 h-0.5 bg-gray-400 dark:bg-gray-600 mx-auto my-4"></div>

            <div class="space-y-5 text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed font-light text-justify sm:text-center mt-8">
                @foreach($pastor['overview'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================
         2. MY SPIRITUAL JOURNEY (Dark Section)
         ========================================================= -->
    <section id="spiritual-journey" class="py-16 sm:py-24 bg-[#181818] dark:bg-[#0A0A0A] text-white border-y border-white/10 transition-colors duration-300 scroll-mt-36">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light uppercase tracking-widest font-['Stack_Sans_Notch',sans-serif] text-white">
                MY SPIRITUAL JOURNEY
            </h2>
            <div class="w-12 h-0.5 bg-white/40 mx-auto my-4"></div>

            <div class="space-y-5 text-sm sm:text-base text-white leading-relaxed font-normal text-justify sm:text-center mt-8">
                @foreach($pastor['spiritual_journey'] as $paragraph)
                    <p class="text-white">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================
         3. MY BACKGROUND (Light Section)
         ========================================================= -->
    <section id="background" class="py-16 sm:py-24 bg-white dark:bg-[#141414] text-gray-900 dark:text-gray-100 transition-colors duration-300 scroll-mt-36">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light uppercase tracking-widest font-['Stack_Sans_Notch',sans-serif] text-gray-950 dark:text-white">
                MY BACKGROUND
            </h2>
            <div class="w-12 h-0.5 bg-gray-400 dark:bg-gray-600 mx-auto my-4"></div>

            <div class="space-y-5 text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed font-light text-justify sm:text-center mt-8">
                @foreach($pastor['background'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================
         4. MY MINISTRY (Dark Section)
         ========================================================= -->
    <section id="ministry" class="py-16 sm:py-24 bg-[#181818] dark:bg-[#0A0A0A] text-white border-y border-white/10 transition-colors duration-300 scroll-mt-36">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light uppercase tracking-widest font-['Stack_Sans_Notch',sans-serif] text-white">
                MY MINISTRY
            </h2>
            <div class="w-12 h-0.5 bg-white/40 mx-auto my-4"></div>

            <div class="space-y-5 text-sm sm:text-base text-white leading-relaxed font-normal text-justify sm:text-center mt-8">
                @foreach($pastor['ministry'] as $paragraph)
                    <p class="text-white">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =========================================================
         5. MY VISION & MISSION (Light Section)
         ========================================================= -->
    <section id="vision-mission" class="py-16 sm:py-24 bg-white dark:bg-[#141414] text-gray-900 dark:text-gray-100 transition-colors duration-300 scroll-mt-36">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-light uppercase tracking-widest font-['Stack_Sans_Notch',sans-serif] text-gray-950 dark:text-white">
                MY VISION & MISSION
            </h2>
            <div class="w-12 h-0.5 bg-gray-400 dark:bg-gray-600 mx-auto my-4"></div>

            <div class="space-y-5 text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed font-light text-justify sm:text-center mt-8">
                @foreach($pastor['vision_mission'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <!-- Pastoral Quote -->
            <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-gray-50 dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2C2C2C] text-center max-w-xl mx-auto">
                <blockquote class="text-sm sm:text-base italic text-gray-800 dark:text-gray-200 font-serif font-light leading-relaxed">
                    "{{ $pastor['quote'] }}"
                </blockquote>
                <span class="block text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 font-normal mt-3">
                    — {{ $pastor['name'] }}
                </span>
            </div>

            <!-- Fast Contact & Back to Church Profile -->
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia%20Surabaya,%20saya%20ingin%20berbicara%20dengan%20Ps%20Samuel" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm">
                    <svg class="w-4 h-4 text-emerald-400 dark:text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                    </svg>
                    <span>Hubungi Pastoral Care</span>
                </a>
                <a href="{{ route('profile') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-[#1E1E1E] hover:bg-gray-50 dark:hover:bg-[#282828] text-gray-900 dark:text-white font-normal text-xs rounded-lg transition-all border border-gray-200 dark:border-[#353535]">
                    <span>Kembali ke Profil Ekklesia</span>
                </a>
            </div>
        </div>
    </section>
@endsection
