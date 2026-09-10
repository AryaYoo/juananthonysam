@extends('layouts.app')

@section('title', 'Media & Galeri — Ekklesia Surabaya')
@section('meta_description', 'Konten media digital, khotbah, pujian penyembahan di channel YouTube Ekklesia Ministry, Ekklesia Worship, Ekklesia World, dan dokumentasi foto kegiatan.')

@section('content')
    <!-- Header Banner -->
    <section class="relative py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] overflow-hidden transition-colors duration-300">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-500 dark:text-gray-400 block mb-3">
                KONTEN DIGITAL & DOKUMENTASI
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] tracking-tight max-w-3xl mx-auto leading-tight">
                Media & Galeri Jemaat
            </h1>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mt-4 leading-relaxed font-light">
                Akses video khotbah, atmosfer pujian penyembahan, serta momen-momen indah persekutuan keluarga Allah di Ekklesia Surabaya.
            </p>
        </div>
    </section>

    <!-- 1. YouTube Channels Showcase -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    OFFICIAL YOUTUBE
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Channel YouTube Ekklesia
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
                    Saksikan khotbah mingguan, live streaming ibadah, dan lagu-lagu penyembahan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($channels as $index => $channel)
                    <div class="p-6 rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 150 }}">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] uppercase font-normal tracking-wider px-2.5 py-0.5 rounded bg-white dark:bg-[#222222] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#333333]">
                                    {{ $channel['badge'] }}
                                </span>
                                <div class="flex items-center gap-1.5 text-red-600 text-xs font-medium">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    <span>YouTube</span>
                                </div>
                            </div>

                            <h3 class="text-xl font-normal text-gray-950 dark:text-white mb-2">
                                {{ $channel['name'] }}
                            </h3>
                            <div class="text-xs text-gray-500 mb-3 font-light">
                                {{ $channel['handle'] }} • {{ $channel['subscribers'] }}
                            </div>
                            <p class="text-xs text-gray-600 dark:text-gray-300 leading-relaxed mb-6 font-light">
                                {{ $channel['description'] }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-[#242424]">
                            <a href="{{ $channel['link'] }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 bg-white dark:bg-[#242424] hover:bg-gray-100 dark:hover:bg-[#2C2C2C] text-gray-900 dark:text-white text-xs font-normal rounded-lg transition-all border border-gray-200 dark:border-[#383838]">
                                <svg class="w-3.5 h-3.5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 15l5-3-5-3v6z"/>
                                </svg>
                                <span>Kunjungi Channel</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 2. Galeri Foto Dokumentasi (Filterable) -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] transition-colors duration-300" id="galeri">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    DOKUMENTASI FOTO
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Galeri Pelayanan & Jemaat
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
                    Momen kebersamaan, hadirat Tuhan dalam ibadah, pembinaan anak, dan persekutuan
                </p>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-10 reveal-on-scroll">
                @foreach($categories as $cat)
                    <a href="{{ route('media', ['category' => $cat]) }}#galeri" 
                       class="px-4 py-2 text-xs font-normal rounded-full transition-all {{ $selectedCategory === $cat ? 'bg-[#111111] dark:bg-white text-white dark:text-black font-medium shadow-xs' : 'bg-white dark:bg-[#1C1C1C] text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#2B2B2B]' }}">
                        {{ $cat === 'all' ? 'Semua Foto' : $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($galleries as $index => $gallery)
                    <div class="group relative rounded-xl overflow-hidden bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#2B2B2B] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index % 4 + 1) * 100 }}">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ $gallery->image_url }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                            <span class="absolute top-3 left-3 text-[10px] font-normal tracking-wider uppercase px-2 py-0.5 rounded bg-black/70 text-white backdrop-blur-xs border border-white/10">
                                {{ $gallery->category }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-normal text-gray-950 dark:text-white leading-snug">
                                {{ $gallery->title }}
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-2 font-light">
                                {{ $gallery->caption }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-sm text-gray-400 font-light">
                        Belum ada foto dalam kategori ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
