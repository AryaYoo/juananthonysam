@extends('layouts.app')

@section('title', 'Acara & Ibadah — Ekklesia Surabaya')
@section('meta_description', 'Jadwal ibadah dan acara khusus Ekklesia Surabaya: Worship Night setiap Jumat Minggu ke-4, My Home komunitas sel, EFF Family Fellowship, dan Retreat 2026.')

@section('content')
    <!-- Header Banner -->
    <section class="relative py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] overflow-hidden transition-colors duration-300">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-500 dark:text-gray-400 block mb-3">
                AGENDA & PROGRAM
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif] tracking-tight max-w-3xl mx-auto leading-tight">
                ACARA & KEGIATAN JEMAAT
            </h1>
            <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mt-4 leading-relaxed font-light">
                Temukan jadwal ibadah rutin, malam penyembahan, persekutuan keluarga, dan acara khusus tahun 2026.
            </p>
        </div>
    </section>

    <!-- 1. Featured Highlight Events -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    PROGRAM UTAMA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    ACARA KHUSUS EKKLESIA
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-4 font-light">
                    Kegiatan yang dirancang untuk memperkuat iman, relasi keluarga, dan atmosfer hadirat Tuhan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($events as $index => $event)
                    <div class="rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card overflow-hidden flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 150 }}">
                        <div class="relative aspect-[16/9] overflow-hidden">
                            <img src="{{ $event->image_url }}" 
                                 alt="{{ $event->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <span class="absolute top-4 left-4 text-xs font-normal tracking-wider uppercase px-3 py-1 rounded bg-black/70 text-white backdrop-blur-xs border border-white/10">
                                {{ $event->badge ?? $event->category }}
                            </span>
                        </div>

                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="text-xl sm:text-2xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 mt-2 leading-relaxed font-light">
                                    {{ $event->description }}
                                </p>
                            </div>

                            <div class="space-y-2 pt-4 border-t border-gray-200 dark:border-[#242424] text-xs">
                                <div class="flex items-center gap-2 text-gray-700 dark:text-gray-200">
                                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="font-medium text-gray-950 dark:text-white">{{ $event->schedule_info }}</span>
                                    <span>•</span>
                                    <span>{{ $event->time_info }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 font-light">
                                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $event->location }}</span>
                                </div>
                            </div>

                            <div class="pt-2">
                                <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia,%20saya%20ingin%20informasi%20acara%20{{ urlencode($event->title) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black text-xs font-normal rounded-lg transition-all border border-black dark:border-white shadow-xs">
                                    <span>Info Pendaftaran / Pertanyaan</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 2. Recurring Programs -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    JADWAL BERKALA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    PROGRAM BERKALA JEMAAT
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-4 font-light">
                    Kegiatan mingguan dan bulanan yang dapat Anda ikuti secara rutin
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                @foreach($recurringPrograms as $index => $prog)
                    <div class="p-6 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-[10px] uppercase font-normal tracking-wider px-2.5 py-0.5 rounded bg-gray-100 dark:bg-[#222222] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#333333]">
                                    {{ $prog['badge'] }}
                                </span>
                                <span class="text-xs text-gray-500 font-normal">
                                    {{ $prog['schedule'] }}
                                </span>
                            </div>
                            <h3 class="text-xl font-light text-gray-950 dark:text-white mb-2">
                                {{ $prog['name'] }}
                            </h3>
                            <p class="text-xs text-gray-600 dark:text-gray-300 leading-relaxed mb-4 font-light">
                                {{ $prog['description'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between text-xs">
                            <span class="text-gray-400 font-light">{{ $prog['time'] }}</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $prog['location'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
