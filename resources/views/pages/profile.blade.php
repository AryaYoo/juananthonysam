@extends('layouts.app')

@section('title', 'Profil & Visi Misi — Ekklesia Surabaya')
@section('meta_description', 'Profil lengkap Gereja Ekklesia Surabaya di bawah pimpinan Pastor Juan Anthony Sam & Ps Samuel. Visi gereja keluarga yang sehat dan memuridkan.')

@section('content')
    <!-- Header Banner -->
    <section class="relative py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] overflow-hidden transition-colors duration-300">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal-on-scroll">
            <span class="text-xs uppercase tracking-[0.3em] font-normal text-gray-500 dark:text-gray-400 block mb-3">
                TENTANG KAMI
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif] tracking-tight max-w-3xl mx-auto leading-tight">
                Membangun Keluarga Allah di Kota Surabaya
            </h1>
            <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mt-4 leading-relaxed font-light">
                Ekklesia Surabaya hadir sebagai rumah rohani yang hangat, tempat setiap jiwa bertumbuh dalam pengenalan akan Kristus, saling melayani dalam kasih, dan memuridkan generasi.
            </p>
        </div>
    </section>

    <!-- 1. Visi & Misi Section -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
    <section class="py-16 sm:py-24 bg-gray-50 dark:bg-[#141414] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    KEPEMIMPINAN GEREJA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Pastors & Pelayanan
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
                    Dipimpin oleh Pastor Juan Anthony Sam & Ps Samuel bersama seluruh tim pelayan jemaat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($pastors as $index => $pastor)
                    <div class="p-6 sm:p-8 rounded-2xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 150 }}">
                        <div class="space-y-4">
                            <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-[#222222] border border-gray-200 dark:border-[#3A3A3A] flex items-center justify-center text-gray-900 dark:text-white text-2xl font-light font-['Stack_Sans_Notch',sans-serif]">
                                {{ substr($pastor['name'], 3, 1) }}
                            </div>
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
                        <div class="pt-6 mt-6 border-t border-gray-100 dark:border-[#222222] flex items-center justify-between text-xs">
                            <span class="text-gray-400 font-light">Pastoral Care</span>
                            <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia%20Surabaya" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-gray-950 dark:text-white hover:underline flex items-center gap-1 font-normal">
                                <span>Hubungi Pastoral</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. Divisi Pelayanan -->
    <section class="py-16 sm:py-24 bg-white dark:bg-[#111111] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs uppercase tracking-[0.25em] font-normal text-gray-500 dark:text-gray-400 block mb-2">
                    MELAYANI BERSAMA
                </span>
                <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Divisi Pelayanan Jemaat
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-2 font-light">
                    Volunteer, Creative, dan Usher siap melayani dan memperlengkapi tubuh Kristus
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($divisions as $index => $div)
                    <div class="p-6 rounded-xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
                        <div class="w-10 h-10 rounded-lg bg-white dark:bg-[#222222] border border-gray-200 dark:border-[#333333] flex items-center justify-center text-gray-900 dark:text-white mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-normal text-gray-950 dark:text-white mb-2">
                            {{ $div['name'] }}
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed font-light">
                            {{ $div['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Volunteer Callout -->
            <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-gray-50 dark:bg-[#181818] border border-gray-200 dark:border-[#2E2E2E] text-center max-w-2xl mx-auto theme-card reveal-on-scroll">
                <h4 class="text-lg font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                    Rindu Mengambil Bagian dalam Pelayanan?
                </h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 mb-4 font-light">
                    Bergabunglah sebagai volunteer dan kembangkan talenta Anda di rumah Tuhan.
                </p>
                <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia,%20saya%20tertarik%20bergabung%20sebagai%20volunteer" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#111111] hover:bg-[#2B2B2B] dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-normal text-xs rounded-lg transition-all shadow-sm">
                    <span>Daftar Volunteer via WhatsApp</span>
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
                    <h2 class="text-3xl sm:text-4xl font-light text-gray-950 dark:text-white font-['Stack_Sans_Notch',sans-serif]">
                        Kunjungi Kami di Surabaya
                    </h2>
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
@endsection
