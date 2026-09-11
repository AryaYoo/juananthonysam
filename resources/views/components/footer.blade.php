@php
    $churchLogoFooter = null;
    foreach(['images/logo.png', 'images/logo.svg', 'images/logo.webp', 'images/logo.jpg'] as $imgCand) {
        if (file_exists(public_path($imgCand))) {
            $churchLogoFooter = $imgCand;
            break;
        }
    }
@endphp

<footer class="bg-[#0D0D0D] border-t border-[#222222] text-gray-400 transition-colors duration-300">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-8 divide-y divide-[#1E1E1E] md:divide-y-0">
            <!-- Col 1: Church Identity -->
            <div class="space-y-4 pb-8 md:pb-0">
                <div class="flex items-center gap-3">
                    <div class="{{ $churchLogoFooter ? 'w-12 h-12 bg-transparent' : 'w-10 h-10 rounded-full bg-[#222222] border border-[#383838] text-white' }} flex items-center justify-center shrink-0">
                        @if($churchLogoFooter)
                            <img src="{{ asset_v($churchLogoFooter) }}" alt="Logo Ekklesia Surabaya" class="w-full h-full object-contain">
                        @else
                            <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M7 8h10"/>
                            </svg>
                        @endif
                    </div>
                    <div>
                        <span class="font-['Stack_Sans_Notch',sans-serif] text-base font-light text-white tracking-wider block">
                            EKKLESIA SURABAYA
                        </span>
                        <span class="text-[10px] tracking-[0.2em] text-gray-400 uppercase block font-normal">
                            Gereja Keluarga
                        </span>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-gray-400 font-light">
                    Gereja keluarga di bawah pimpinan <strong class="text-white font-medium">Pastor Juan Anthony Sam</strong> & <strong class="text-white font-medium">Ps Samuel</strong>. Bertekad menjadi gereja yang sehat, memuridkan, dan berdampak bagi kemuliaan Kristus di kota Surabaya.
                </p>
                <div class="pt-2">
                    <span class="inline-block px-3 py-1 bg-[#181818] border border-[#2C2C2C] rounded text-[11px] text-gray-300 font-light shadow-2xs">
                        Tema 2026: Tahun Pemulihan bagi Kemuliaan Tuhan
                    </span>
                </div>
            </div>

            <!-- Col 2: Service Schedules -->
            <div class="hidden md:block space-y-4">
                <h4 class="font-['Stack_Sans_Notch',sans-serif] text-sm font-normal uppercase tracking-wider text-white border-l-2 border-white pl-2.5">
                    Jadwal Ibadah
                </h4>
                <ul class="space-y-2.5 text-xs">
                    <li class="flex justify-between items-center pb-2 border-b border-[#222222]">
                        <span class="text-gray-400">Sunday Service</span>
                        <span class="font-medium text-white">09:00 WIB</span>
                    </li>
                    <li class="flex justify-between items-center pb-2 border-b border-[#222222]">
                        <span class="text-gray-400">Ekidz (Anak-anak)</span>
                        <span class="font-medium text-white">09:30 WIB</span>
                    </li>
                    <li class="flex justify-between items-center pb-2 border-b border-[#222222]">
                        <span class="text-gray-400">E-Teens (Remaja)</span>
                        <span class="font-medium text-white">11:00 WIB</span>
                    </li>
                    <li class="flex justify-between items-center pb-2 border-b border-[#222222]">
                        <span class="text-gray-400">Doa Senin</span>
                        <span class="font-medium text-white">19:00 WIB</span>
                    </li>
                    <li class="flex justify-between items-center pb-2 border-b border-[#222222]">
                        <span class="text-gray-400">Doa Jumat</span>
                        <span class="font-medium text-white">19:00 WIB</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-400">Worship Night</span>
                        <span class="font-medium text-white">Jumat ke-4</span>
                    </li>
                </ul>
            </div>


            <!-- Col 4: Lokasi & Kontak -->
            <div class="space-y-4 pt-8 md:pt-0">
                <h4 class="font-['Stack_Sans_Notch',sans-serif] text-sm font-normal uppercase tracking-wider text-white border-l-2 border-white pl-2.5">
                    Lokasi & Kontak
                </h4>
                <div class="space-y-2 text-xs">
                    <p class="text-gray-400 flex items-start gap-2 font-light">
                        <svg class="w-4 h-4 text-gray-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Jln Ruko Ngaglik 2 No 15, Surabaya, Jawa Timur</span>
                    </p>
                    <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center gap-1.5 text-xs text-white hover:underline pt-1 font-medium">
                        <span>Buka di Google Maps</span>
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>

                    <!-- Email & TikTok Links -->
                    <div class="pt-2 space-y-1.5">
                        <a href="mailto:gkri.ekklesia@gmail.com" 
                           class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 font-light">
                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>gkri.ekklesia@gmail.com</span>
                        </a>
                        <a href="https://www.tiktok.com/@ekklesiaministry_?_r=1&_t=ZS-99cXKPhkPXJ" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 font-light">
                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-1-.08A6.34 6.34 0 003 15.66a6.34 6.34 0 0010.82 4.47v-7.37a8.16 8.16 0 005.77 2.27v-3.45a4.85 4.85 0 010-4.89z"/>
                            </svg>
                            <span>TikTok: @ekklesiaministry_</span>
                        </a>
                    </div>
                </div>

                <!-- Fast WhatsApp CTA -->
                <div class="pt-2">
                    <a href="https://wa.me/6281213131060?text=Halo%20Pastoral%20Ekklesia%20Surabaya" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 bg-white hover:bg-gray-100 text-[#111111] text-xs font-normal rounded-lg transition-all shadow-sm">
                        <svg class="w-4 h-4 text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                        </svg>
                        <span>WhatsApp: +62 812-1313-1060</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- YouTube Channels Ribbon -->
        <div class="mt-10 pt-7 border-t border-[#222222]">
            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                <span class="text-[10px] uppercase tracking-[0.2em] text-gray-500 font-normal shrink-0">Official YouTube</span>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="https://youtube.com/@ekklesiaministrysurabaya174?si=86xQ7dVvr-20WdTj" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#1A1A1A] border border-[#2A2A2A] text-gray-300 hover:text-white hover:border-red-600/50 transition-all text-xs font-light">
                        <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <span>Ekklesia Ministry</span>
                    </a>
                    <a href="https://youtube.com/@ekklesiaworship92?si=Shxy7Z3c8AMA4Eeq" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#1A1A1A] border border-[#2A2A2A] text-gray-300 hover:text-white hover:border-red-600/50 transition-all text-xs font-light">
                        <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <span>Ekklesia Worship</span>
                    </a>
                    <a href="https://youtube.com/@ekklesiaworld?si=aRE0kFO2YaNY2VSY" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#1A1A1A] border border-[#2A2A2A] text-gray-300 hover:text-white hover:border-red-600/50 transition-all text-xs font-light">
                        <svg class="w-3.5 h-3.5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <span>Ekklesia World</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="mt-8 pt-6 border-t border-[#222222] flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-400 font-light">
            <div>
                &copy; {{ date('Y') }} Gereja Ekklesia Surabaya (GKRI Jemaat Ekklesia). Seluruh hak cipta dilindungi.
            </div>
            <div class="flex items-center space-x-6 text-[11px]">
                <span>Dipimpin oleh Pastor Juan Anthony Sam & Ps Samuel</span>
            </div>
        </div>
    </div>
</footer>
