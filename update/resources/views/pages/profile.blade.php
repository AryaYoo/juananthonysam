@extends('layouts.app')

@section('title', 'Profil & Visi Misi — Ekklesia Surabaya')
@section('meta_description', 'Profil lengkap Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Visi gereja keluarga yang sehat dan memuridkan.')

@section('content')
    <!-- =========================================================
         HERO SECTION: Welcome Home (Hero2.jpg)
         ========================================================= -->
    @php
        $hero2Img = file_exists(public_path('images/Hero2.jpg'))
            ? asset_v('images/Hero2.jpg')
            : (file_exists(public_path('images/hero2.jpg')) ? asset_v('images/hero2.jpg') : asset_v('images/Hero2.jpg'));
    @endphp
    <section class="relative bg-black text-white overflow-hidden select-none border-b border-gray-200 dark:border-[#242424]" id="profileHeroSection">
        <div class="relative w-full min-h-[360px] sm:min-h-[500px] lg:min-h-[640px] flex items-center justify-center bg-black"
             style="height: calc(100vw * 10 / 16); max-height: 720px; min-height: 360px;">
            <img src="{{ $hero2Img }}" 
                 alt="Welcome Home — Gereja Ekklesia Surabaya" 
                 class="w-full h-full object-cover object-center select-none">
        </div>
    </section>

    <!-- =========================================================
         TEMA GEREJA BERGERAK (Infinite Running Marquee Ticker)
         "Tahun Pemulihan bagi Kemuliaan Tuhan"
         ========================================================= -->
    <div class="relative w-full bg-[#0A0A0A] text-white border-b border-white/10 py-3 sm:py-3.5 overflow-hidden select-none group"
         style="mask-image: linear-gradient(to right, transparent, black 3%, black 97%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, black 3%, black 97%, transparent);"
         aria-label="Tema Gereja: Tahun Pemulihan bagi Kemuliaan Tuhan">
        <div class="flex items-center gap-6 whitespace-nowrap animate-theme-marquee group-hover:[animation-play-state:paused]">
            <!-- Set 1 -->
            <div class="flex items-center gap-8 shrink-0">
                @for ($i = 0; $i < 6; $i++)
                    <div class="inline-flex items-center gap-3">
                        <span class="text-amber-400 text-xs">✦</span>
                        <span class="text-xs sm:text-sm font-light uppercase tracking-[0.25em] text-gray-200 font-['Stack_Sans_Notch',sans-serif]">
                            TAHUN PEMULIHAN BAGI KEMULIAAN TUHAN
                        </span>
                    </div>
                @endfor
            </div>
            <!-- Set 2 (Duplicate for smooth infinite scroll) -->
            <div class="flex items-center gap-8 shrink-0" aria-hidden="true">
                @for ($i = 0; $i < 6; $i++)
                    <div class="inline-flex items-center gap-3">
                        <span class="text-amber-400 text-xs">✦</span>
                        <span class="text-xs sm:text-sm font-light uppercase tracking-[0.25em] text-gray-200 font-['Stack_Sans_Notch',sans-serif]">
                            TAHUN PEMULIHAN BAGI KEMULIAAN TUHAN
                        </span>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- 1. Visi & Misi Section (EKKLESIA) -->
    <section id="ekklesia" class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-500 dark:text-gray-400 block mb-3">
                    TENTANG KAMI
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif] tracking-tight leading-tight">
                    MEMBANGUN KELUARGA ALLAH DI KOTA SURABAYA
                </h1>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mt-4 leading-relaxed font-light">
                    Ekklesia Surabaya hadir sebagai rumah rohani yang hangat, tempat setiap jiwa bertumbuh dalam pengenalan akan Kristus, saling melayani dalam kasih, dan memuridkan generasi.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <!-- Visi Card -->
                <div class="p-8 rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-[#222222] border border-gray-200 dark:border-[#333333] rounded text-xs font-normal text-gray-900 dark:text-white uppercase tracking-wider mb-6">
                            <span>Visi Gereja</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] leading-snug mb-4">
                            "Menjadi Gereja Keluarga yang sehat dan memuridkan dalam Yesus Kristus."
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                            Kami percaya bahwa kebangunan rohani sejati bermula dari keluarga. Ekklesia Surabaya berkomitmen menghadirkan keluarga rohani yang bertumbuh sehat, saling menopang dalam kasih karunia, dan aktif memuridkan generasi bagi kemuliaan Kristus.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-200 dark:border-[#222222] text-xs text-gray-400 font-light">
                        Matius 28:19–20 • Efesus 4:15–16
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="p-8 rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-200">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-[#222222] border border-gray-200 dark:border-[#333333] rounded text-xs font-normal text-gray-900 dark:text-white uppercase tracking-wider mb-6">
                            <span>Misi Gereja</span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] leading-snug mb-4">
                            "Menjadi pribadi-pribadi yang unggul dan profesional, membangun setiap generasi di segala usia, serta membangun keluarga yang kuat, sehat, dan berpusat pada Kristus."
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                            Melalui bimbingan Roh Kudus, kami rindu membina kepribadian jemaat yang unggul dan profesional di dunia kerja, memperlengkapi seluruh generasi usia, serta menegakkan mezbah keluarga yang berpusat pada Kristus.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-gray-200 dark:border-[#222222] text-xs text-gray-400 font-light">
                        Kolose 3:23–24 • Yosua 24:15
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Profil Pastors -->
    <section id="pastors" class="py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    KEPEMIMPINAN GEREJA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    PASTORS & PELAYANAN
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-4 font-light">
                    Dipimpin oleh Pastor Juan Anthony Sam & Ps Samuel bersama seluruh tim pelayan jemaat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($pastors as $index => $pastor)
                    <div id="{{ str_contains($pastor['name'], 'Samuel') ? 'ps-samuel' : 'pastor-juan' }}" class="p-6 sm:p-8 rounded-2xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 150 }} scroll-mt-28">
                        <div class="space-y-4">
                            <div>
                                <span class="text-xs uppercase tracking-widest text-gray-400 font-normal">
                                    {{ $pastor['role'] }}
                                </span>
                                <h3 class="text-xl sm:text-2xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] mt-0.5">
                                    {{ $pastor['name'] }}
                                </h3>
                            </div>
                            <blockquote class="text-xs sm:text-sm italic text-gray-600 dark:text-gray-300 font-serif font-light border-l-2 border-gray-300 dark:border-[#383838] pl-3 py-1">
                                "{{ $pastor['quote'] }}"
                            </blockquote>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-light">
                                {{ $pastor['bio'] }}
                            </p>
                        </div>
                        <div class="pt-6 mt-6 border-t border-gray-100 dark:border-[#222222] flex flex-wrap items-center justify-between gap-3 text-xs">
                            <a href="{{ str_contains($pastor['name'], 'Samuel') ? route('pastor.samuel') : route('pastor.juan') }}" 
                               class="inline-flex items-center gap-1.5 font-medium text-gray-950 dark:text-white hover:underline">
                                <span>Lihat Profil Lengkap</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <a href="https://wa.me/6281213131060?text=Halo%20Pastor,%20salam%20dalam%20kasih%20kristus" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-gray-500 dark:text-gray-400 hover:text-black dark:hover:text-white flex items-center gap-1 font-light">
                                <span>Hubungi Pastoral</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. Divisi Pelayanan -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300 relative overflow-hidden">
        {{-- Subtle background decoration glow --}}
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-gray-200/40 dark:bg-white/[0.02] rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    MELAYANI BERSAMA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                    MINISTRY OF SERVICE
                </h2>
                <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-4 mx-auto"></div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-4 font-light max-w-md mx-auto">
                    Creative, Usher, dan Ministry of Service siap melayani dan saling memperlengkapi tubuh Kristus.
                </p>
            </div>

            {{-- Kartu Divisi Interaktif & Modern (Responsif Mobile & Desktop) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6">
                @foreach($divisions as $index => $div)
                    <div class="group relative p-6 sm:p-7 rounded-2xl bg-gray-50/90 dark:bg-[#161616] border border-gray-200 dark:border-[#282828] hover:border-gray-400 dark:hover:border-gray-500 transition-all duration-300 hover:shadow-xl dark:hover:shadow-2xl dark:hover:shadow-black/50 flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        
                        {{-- Top Accent Line on Hover --}}
                        <div class="absolute inset-x-6 top-0 h-0.5 bg-gradient-to-r from-transparent via-gray-900 dark:via-white to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></div>

                        <div>
                            {{-- Header: Icon + Tag --}}
                            <div class="flex items-center justify-between gap-3 mb-5">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#202020] border border-gray-200 dark:border-[#303030] flex items-center justify-center text-gray-900 dark:text-white shadow-sm group-hover:scale-105 group-hover:bg-gray-950 group-hover:text-white dark:group-hover:bg-white dark:group-hover:text-black transition-all duration-300">
                                    @if(($div['icon'] ?? '') === 'camera')
                                        {{-- Camera & Media Icon --}}
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                    @elseif(($div['icon'] ?? '') === 'heart-handshake')
                                        {{-- Usher & Hospitality Icon --}}
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    @else
                                        {{-- Volunteer Hands / Community Icon --}}
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    @endif
                                </div>

                                <span class="text-[10px] tracking-wider uppercase px-2.5 py-1 rounded-full bg-white dark:bg-[#202020] text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-[#303030] font-medium">
                                    {{ $div['tag'] ?? 'Pelayanan' }}
                                </span>
                            </div>

                            <h3 class="text-base sm:text-lg font-normal text-gray-950 dark:text-white mb-2 group-hover:text-black dark:group-hover:text-white transition-colors">
                                {{ $div['name'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed font-light mb-5">
                                {{ $div['desc'] }}
                            </p>

                            {{-- Scope / Highlights Pills --}}
                            @if(!empty($div['highlights']))
                                <div class="pt-4 border-t border-gray-200/80 dark:border-[#252525] space-y-2">
                                    @foreach($div['highlights'] as $item)
                                        <div class="flex items-center gap-2 text-xs text-gray-600 dark:text-gray-300 font-light">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 dark:bg-gray-500 shrink-0 group-hover:bg-gray-900 dark:group-hover:bg-white transition-colors"></span>
                                            <span>{{ $item }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Quick WA Action per Divisi --}}
                        <div class="mt-6 pt-4 border-t border-gray-200/60 dark:border-[#222222]">
                            <a href="https://wa.me/6281213131060?text={{ urlencode('Halo Pastoral Ekklesia, saya rindu bergabung dan melayani di divisi ' . $div['name']) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 text-xs text-gray-700 dark:text-gray-300 font-medium hover:text-black dark:hover:text-white transition-colors">
                                <span>Gabung Divisi Ini</span>
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ministry of Service Callout (Clean, Elegant & High Contrast CTA) -->
            <div class="mt-14 sm:mt-16 p-8 sm:p-10 rounded-3xl bg-gradient-to-b from-gray-50 to-white dark:from-[#181818] dark:to-[#121212] border border-gray-200 dark:border-[#2C2C2C] text-center max-w-2xl mx-auto shadow-sm relative overflow-hidden reveal-on-scroll">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gray-900 dark:bg-white text-white dark:text-black mb-4 shadow-md">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h4 class="text-xl sm:text-2xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] tracking-wide">
                    Rindu Mengambil Bagian dalam Ministry of Service?
                </h4>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 mb-6 font-light max-w-md mx-auto leading-relaxed">
                    Bergabunglah melayani dan kembangkan talenta Anda bersama keluarga rohani di Ekklesia Surabaya.
                </p>
                <a href="https://wa.me/6281213131060?text={{ urlencode('Halo Pastoral Ekklesia, saya tertarik bergabung melayani di Ministry of Service') }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2.5 px-6 py-3 bg-[#111111] hover:bg-black dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-medium text-xs sm:text-sm rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 duration-200">
                    <svg class="w-4 h-4 text-emerald-400 dark:text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824z"/>
                    </svg>
                    <span>Daftar Ministry of Service via WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 4. Alamat & Peta Lokasi -->
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Location Details -->
                <div class="lg:col-span-5 space-y-4 reveal-on-scroll">
                    <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block">
                        LOKASI GEREJA
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white uppercase tracking-wider font-['Stack_Sans_Notch',sans-serif]">
                        KUNJUNGI KAMI DI SURABAYA
                    </h2>
                    <div class="w-16 h-0.5 bg-gray-900 dark:bg-white mt-3 mb-4"></div>
                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-light">
                        Kami berlokasi strategis di pusat kota Surabaya. Akses mudah dengan area parkir yang nyaman dan ruang ibadah yang ramah keluarga.
                    </p>

                    <div class="p-4 bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#2B2B2B] rounded-xl space-y-2 theme-card">
                        <div class="text-xs font-medium text-gray-900 dark:text-white">Alamat Resmi:</div>
                        <div class="text-sm text-gray-600 dark:text-gray-300 font-light">
                            {{ $location['address'] }}
                        </div>
                    </div>

                    <div class="pt-2 flex flex-wrap gap-3">
                        <a href="{{ $location['google_maps_url'] }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Buka Petunjuk Arah Google Maps</span>
                        </a>
                    </div>
                </div>

                <!-- Google Maps Interactive Frame -->
                <div class="lg:col-span-7 reveal-on-scroll delay-200">
                    <div class="rounded-2xl overflow-hidden border border-gray-200 dark:border-[#2B2B2B] bg-white dark:bg-[#181818] shadow-lg theme-card">
                        <div class="relative w-full aspect-[16/9] min-h-[300px]">
                            <iframe 
                                title="Peta Lokasi Ekklesia Surabaya"
                                src="https://maps.google.com/maps?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                                class="absolute inset-0 w-full h-full border-0 grayscale opacity-90 hover:grayscale-0 transition-all duration-500"
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="p-3 bg-gray-50 dark:bg-[#111111] border-t border-gray-200 dark:border-[#262626] flex items-center justify-between text-[11px] text-gray-500">
                            <span>Jln Ruko Ngaglik 2 No 15, Surabaya</span>
                            <span class="text-gray-900 dark:text-white font-medium">Gereja Ekklesia Surabaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal Ibadah Ekklesia -->
    <x-jadwal-ibadah />

    {{-- Running Marquee Animation for Church Theme --}}
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
            display: flex;
            width: max-content;
            animation: themeMarquee 26s linear infinite;
        }
        .animate-theme-marquee:hover {
            animation-play-state: paused;
        }
        @media (prefers-reduced-motion: reduce) {
            .animate-theme-marquee {
                animation-duration: 60s;
            }
        }
    </style>
@endsection
