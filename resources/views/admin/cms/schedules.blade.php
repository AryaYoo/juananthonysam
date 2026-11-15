<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal Ibadah — Ekklesia Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <script>
        (function() {
            try {
                if (localStorage.getItem('theme') === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-50 dark:bg-[#121212] text-gray-900 dark:text-gray-100 antialiased font-['Plus_Jakarta_Sans',sans-serif]">

    @include('admin.partials.sidebar', ['activePage' => 'cms-schedules'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Jadwal Ibadah</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Perubahan jadwal di sini otomatis diperbarui pada seluruh halaman website publik dan footer</p>
                </div>
                <button type="button" onclick="addNewScheduleRow()" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer self-start sm:self-auto">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Jadwal Baru</span>
                </button>
            </div>

            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('admin.cms.schedules.save') }}" method="POST" id="schedulesForm" class="space-y-4">
                @csrf

                <div id="scheduleItemsContainer" class="space-y-4">
                    @foreach($schedules as $idx => $item)
                        <div class="schedule-card p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4 relative">
                            <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gray-100 dark:bg-[#252525] text-xs font-bold text-gray-700 dark:text-gray-300 schedule-index-badge">
                                        {{ $idx + 1 }}
                                    </span>
                                    <span class="text-xs font-semibold text-gray-950 dark:text-white">Jadwal Sesi</span>
                                </div>
                                <button type="button" onclick="removeScheduleRow(this)" class="p-1.5 text-xs text-red-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 rounded-lg transition" title="Hapus jadwal ini">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>

                            <input type="hidden" name="schedules[{{ $idx }}][id]" value="{{ $item['id'] ?? '' }}">

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Ibadah / Acara</label>
                                    <input type="text" name="schedules[{{ $idx }}][name]" value="{{ $item['name'] ?? '' }}" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Hari Pelaksanaan</label>
                                    <input type="text" name="schedules[{{ $idx }}][day]" value="{{ $item['day'] ?? '' }}" placeholder="Setiap Minggu" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Waktu / Jam (WIB)</label>
                                    <input type="text" name="schedules[{{ $idx }}][time]" value="{{ $item['time'] ?? '' }}" placeholder="09:00 WIB" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Ruangan / Tempat</label>
                                    <input type="text" name="schedules[{{ $idx }}][location]" value="{{ $item['location'] ?? '' }}" placeholder="Sanctuary Lt. 2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Sasaran / Jemaat</label>
                                    <input type="text" name="schedules[{{ $idx }}][target]" value="{{ $item['target'] ?? '' }}" placeholder="Ibadah Umum & Keluarga" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Kategori</label>
                                    <input type="text" name="schedules[{{ $idx }}][badge]" value="{{ $item['badge'] ?? '' }}" placeholder="Main Service" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                                </div>
                            </div>

                            <div class="pt-1">
                                <label class="inline-flex items-center gap-2 cursor-pointer text-xs text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" name="schedules[{{ $idx }}][is_online]" value="1" {{ !empty($item['is_online']) ? 'checked' : '' }} class="rounded border-gray-300 text-gray-900 focus:ring-gray-950">
                                    <span>Ibadah Online (via Zoom / Live Stream)</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-4">
                    <button type="button" onclick="addNewScheduleRow()" class="text-xs text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white underline">
                        + Tambah jadwal lainnya
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Semua Jadwal
                    </button>
                </div>
            </form>

        </div>
    </main>

    <script>
        function removeScheduleRow(btn) {
            const container = document.getElementById('scheduleItemsContainer');
            if (container.children.length <= 1) {
                alert('Minimal harus ada 1 jadwal.');
                return;
            }
            if (confirm('Yakin ingin menghapus jadwal ini?')) {
                btn.closest('.schedule-card').remove();
                renumberSchedules();
            }
        }

        function renumberSchedules() {
            document.querySelectorAll('.schedule-card').forEach((card, i) => {
                const badge = card.querySelector('.schedule-index-badge');
                if (badge) badge.textContent = i + 1;
            });
        }

        function addNewScheduleRow() {
            const container = document.getElementById('scheduleItemsContainer');
            const nextIdx = Date.now();
            const count = container.children.length + 1;

            const html = `
                <div class="schedule-card p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4 relative">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gray-100 dark:bg-[#252525] text-xs font-bold text-gray-700 dark:text-gray-300 schedule-index-badge">
                                ${count}
                            </span>
                            <span class="text-xs font-semibold text-gray-950 dark:text-white">Jadwal Sesi Baru</span>
                        </div>
                        <button type="button" onclick="removeScheduleRow(this)" class="p-1.5 text-xs text-red-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 rounded-lg transition" title="Hapus jadwal ini">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Ibadah / Acara</label>
                            <input type="text" name="schedules[${nextIdx}][name]" placeholder="Nama Ibadah" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Hari Pelaksanaan</label>
                            <input type="text" name="schedules[${nextIdx}][day]" placeholder="Setiap Minggu" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Waktu / Jam (WIB)</label>
                            <input type="text" name="schedules[${nextIdx}][time]" placeholder="09:00 WIB" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Ruangan / Tempat</label>
                            <input type="text" name="schedules[${nextIdx}][location]" placeholder="Sanctuary Lt. 2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Sasaran / Jemaat</label>
                            <input type="text" name="schedules[${nextIdx}][target]" placeholder="Ibadah Umum & Keluarga" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Kategori</label>
                            <input type="text" name="schedules[${nextIdx}][badge]" placeholder="Main Service" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div class="pt-1">
                        <label class="inline-flex items-center gap-2 cursor-pointer text-xs text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="schedules[${nextIdx}][is_online]" value="1" class="rounded border-gray-300 text-gray-900 focus:ring-gray-950">
                            <span>Ibadah Online (via Zoom / Live Stream)</span>
                        </label>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            const sun = document.getElementById('sunIcon');
            const moon = document.getElementById('moonIcon');
            const label = document.getElementById('themeLabel');
            if (sun && moon) {
                isDark ? sun.classList.remove('hidden') : sun.classList.add('hidden');
                isDark ? moon.classList.add('hidden') : moon.classList.remove('hidden');
            }
            if (label) label.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';
        }
        function toggleAdminTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            updateThemeIcons();
        }
        updateThemeIcons();
    </script>
</body>
</html>
