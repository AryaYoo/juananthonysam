@php
    $defaultSchedules = [
        [
            'name' => 'Sunday Service',
            'time' => '09:00 WIB',
            'day' => 'Setiap Minggu',
            'target' => 'Ibadah Umum & Keluarga',
            'badge' => 'Main Service',
            'location' => 'Sanctuary Lt. 2',
        ],
        [
            'name' => 'Ekidz',
            'time' => '09:30 WIB',
            'day' => 'Setiap Minggu',
            'target' => 'Anak-anak (Preschool - SD)',
            'badge' => 'Kids Ministry',
            'location' => 'Sanctuary Lt. 1',
        ],
        [
            'name' => 'E-Teens',
            'time' => '11:00 WIB',
            'day' => 'Setiap Minggu',
            'target' => 'Remaja & Pemuda (SMP - SMA)',
            'badge' => 'Youth Ministry',
            'location' => 'Sanctuary Lt. 3',
        ],
        [
            'name' => 'Doa Senin',
            'time' => '19:00 WIB',
            'day' => 'Setiap Senin Malam',
            'target' => 'Doa Syafaat & Pengurapan',
            'badge' => 'Monday Prayer',
            'location' => 'Zoom Meeting',
            'is_online' => true,
        ],
        [
            'name' => 'Doa Jumat',
            'time' => '19:00 WIB',
            'day' => 'Setiap Jumat Malam',
            'target' => 'Mezbah Doa & Hadirat Tuhan',
            'badge' => 'Friday Prayer',
            'location' => 'Sanctuary Lt. 2',
        ],
    ];

    $items = $schedules ?? $defaultSchedules;
    $sliderId = 'scheduleSlider_' . uniqid();
    $trackId = 'scheduleTrack_' . uniqid();
    $dotsId = 'scheduleDots_' . uniqid();
@endphp

<!-- =========================================================
     JADWAL IBADAH EKKLESIA
     Sunday Service (09.00), Ekidz (09.30), E-Teens (11.00), Doa Senin (19.00), Doa Jumat (19.00)
     ========================================================= -->
<section id="ibadah" style="scroll-margin-top: 80px;" class="py-16 sm:py-24 bg-gray-50 dark:bg-[#101010] border-b border-gray-200 dark:border-[#242424] transition-colors duration-300">
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

        <!-- Schedule Cards: MOBILE = Auto Slider, DESKTOP = Grid -->

        {{-- MOBILE SLIDER (< sm) --}}
        <div class="block sm:hidden relative" id="{{ $sliderId }}">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="{{ $trackId }}">
                    @foreach($items as $index => $schedule)
                        <div class="min-w-full px-1">
                            <div class="p-5 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-[10px] font-normal uppercase tracking-wider px-2 py-0.5 rounded bg-gray-100 dark:bg-[#242424] text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-[#333333]">
                                            {{ $schedule['badge'] }}
                                        </span>
                                        <span class="text-[10px] text-gray-400">{{ $index + 1 }}/{{ count($items) }}</span>
                                    </div>
                                    <h3 class="text-base font-normal text-gray-950 dark:text-white mb-1">
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
                                    <span class="text-[10px] text-gray-400">{{ $schedule['location'] ?? 'Sanctuary Lt. 2' }}</span>
                                    @if(empty($schedule['is_online']))
                                        <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya"
                                           target="_blank" rel="noopener noreferrer"
                                           class="text-xs text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white font-normal flex items-center gap-1 transition-colors">
                                            <span>Peta</span>
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    @else
                                        <span class="text-[10px] text-gray-500 dark:text-gray-400 font-normal flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                                            <span>Online</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Dot Indicators --}}
            <div class="flex justify-center items-center gap-2 mt-5" id="{{ $dotsId }}">
                @foreach($items as $index => $schedule)
                    <button type="button"
                            data-slide="{{ $index }}"
                            class="schedule-dot-btn h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-6 bg-gray-800 dark:bg-white' : 'w-2 bg-gray-300 dark:bg-gray-600' }}"
                            aria-label="Jadwal {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>
        </div>

        {{-- DESKTOP GRID (>= sm) --}}
        <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
            @foreach($items as $index => $schedule)
                @php
                    $targetId = '';
                    if (str_contains(strtolower($schedule['name']), 'ekidz')) {
                        $targetId = 'ekidz';
                    } elseif (str_contains(strtolower($schedule['name']), 'teens')) {
                        $targetId = 'ekklesia-teens';
                    }
                @endphp
                <div @if($targetId) id="{{ $targetId }}" style="scroll-margin-top: 100px;" @endif class="p-5 sm:p-6 rounded-xl bg-white dark:bg-[#181818] border border-gray-200 dark:border-[#282828] theme-card flex flex-col justify-between reveal-on-scroll delay-{{ ($index + 1) * 100 }}">
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
                        <span class="text-[10px] text-gray-400">{{ $schedule['location'] ?? 'Sanctuary Lt. 2' }}</span>
                        @if(empty($schedule['is_online']))
                            <a href="https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="text-xs text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white font-normal flex items-center gap-1 transition-colors">
                                <span>Peta</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="text-[10px] text-gray-500 dark:text-gray-400 font-normal flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                                <span>Online</span>
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.getElementById('{{ $sliderId }}');
        if (!slider) return;

        const track = document.getElementById('{{ $trackId }}');
        const dotsContainer = document.getElementById('{{ $dotsId }}');
        if (!track || !dotsContainer) return;

        const dots = dotsContainer.querySelectorAll('.schedule-dot-btn');
        const total = {{ count($items) }};
        if (total <= 1) return;

        let current = 0;
        let timer = null;

        function goTo(index) {
            if (index >= total) index = 0;
            if (index < 0) index = total - 1;
            current = index;
            track.style.transform = `translateX(-${current * 100}%)`;
            dots.forEach((dot, i) => {
                if (i === current) {
                    dot.classList.remove('w-2', 'bg-gray-300', 'dark:bg-gray-600');
                    dot.classList.add('w-6', 'bg-gray-800', 'dark:bg-white');
                } else {
                    dot.classList.remove('w-6', 'bg-gray-800', 'dark:bg-white');
                    dot.classList.add('w-2', 'bg-gray-300', 'dark:bg-gray-600');
                }
            });
        }

        function startAuto() {
            stopAuto();
            timer = setInterval(() => goTo(current + 1), 3500);
        }

        function stopAuto() {
            if (timer) clearInterval(timer);
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                goTo(parseInt(dot.dataset.slide));
                startAuto();
            });
        });

        // Touch swipe support
        let touchStartX = 0;
        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', e => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 40) {
                goTo(diff > 0 ? current + 1 : current - 1);
                startAuto();
            }
        }, { passive: true });

        startAuto();
    });
</script>

