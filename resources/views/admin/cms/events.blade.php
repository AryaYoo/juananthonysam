<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Acara & Agenda — Ekklesia Admin</title>
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

    @include('admin.partials.sidebar', ['activePage' => 'cms-events'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Acara & Agenda</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Kelola agenda kegiatan spesial gereja dan jadwal program rutin</p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="openAddEventModal()" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Acara Baru</span>
                    </button>
                    <a href="{{ route('events') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020]">
                        <span>Lihat Web Acara</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 1. DAFTAR ACARA SPESIAL -->
            <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                    <div>
                        <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Daftar Acara & Agenda</h2>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400">Total: {{ count($events) }} acara</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($events as $ev)
                        <div class="p-4 rounded-xl border border-gray-200 dark:border-[#2B2B2B] bg-gray-50/50 dark:bg-[#141414] flex flex-col justify-between space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0 bg-gray-200 dark:bg-[#252525]">
                                    @php
                                        $evImg = $ev['image_url'] ?? '/images/WorshipNight3.png';
                                        if ($evImg && str_starts_with($evImg, '/')) $evImg = asset(ltrim($evImg, '/'));
                                    @endphp
                                    <img src="{{ $evImg }}" alt="{{ $ev['title'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-900 text-white dark:bg-white dark:text-black">
                                            {{ $ev['category'] ?? 'Event' }}
                                        </span>
                                        @if(!empty($ev['badge']))
                                            <span class="px-1.5 py-0.5 rounded text-[10px] bg-amber-100 text-amber-800 dark:bg-amber-950/40 dark:text-amber-400">
                                                {{ $ev['badge'] }}
                                            </span>
                                        @endif
                                        @if(!empty($ev['is_featured']))
                                            <span class="px-1.5 py-0.5 rounded text-[10px] bg-blue-100 text-blue-800 dark:bg-blue-950/40 dark:text-blue-400">
                                                Unggulan
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-xs font-semibold text-gray-950 dark:text-white mt-1.5 line-clamp-1">
                                        {{ $ev['title'] }}
                                    </h3>
                                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5">
                                        {{ $ev['schedule_info'] ?? '' }} • {{ $ev['time_info'] ?? '' }}
                                    </p>
                                    <p class="text-[11px] text-gray-400 dark:text-gray-500 truncate mt-0.5">
                                        {{ $ev['location'] ?? '' }}
                                    </p>
                                </div>
                            </div>

                            <p class="text-[11px] text-gray-600 dark:text-gray-400 line-clamp-2">
                                {{ $ev['description'] ?? '' }}
                            </p>

                            <div class="flex items-center justify-end gap-2 pt-2 border-t border-gray-200 dark:border-[#222]">
                                <button type="button" onclick='editEventModal(@json($ev))' class="px-3 py-1 text-xs font-medium rounded-lg bg-white dark:bg-[#1E1E1E] border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#282828] text-gray-700 dark:text-gray-300 transition">
                                    Edit
                                </button>
                                <form action="{{ route('admin.cms.events.delete', $ev['id']) }}" method="POST" onsubmit="return confirm('Hapus acara ini?')">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 text-xs font-medium rounded-lg text-red-600 hover:bg-red-50 dark:hover:bg-red-950/30 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 py-8 text-center text-xs text-gray-400">Belum ada acara.</div>
                    @endforelse
                </div>
            </div>

            <!-- 2. PROGRAM RUTIN (RECURRING PROGRAMS) -->
            <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                <div class="pb-3 border-b border-gray-100 dark:border-[#262626]">
                    <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Program Rutin Berkala</h2>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Worship Night bulanan, EFF, Retreat tahunan, dan persekutuan cabang</p>
                </div>

                <form action="{{ route('admin.cms.events.recurring.save') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-4">
                        @foreach($recurring as $rIdx => $prog)
                            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-100 dark:border-[#252525] space-y-3">
                                <input type="hidden" name="recurring[{{ $rIdx }}][id]" value="{{ $prog['id'] ?? '' }}">
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Program</label>
                                        <input type="text" name="recurring[{{ $rIdx }}][name]" value="{{ $prog['name'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Jadwal Pelaksanaan</label>
                                        <input type="text" name="recurring[{{ $rIdx }}][schedule]" value="{{ $prog['schedule'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Waktu / Jam</label>
                                        <input type="text" name="recurring[{{ $rIdx }}][time]" value="{{ $prog['time'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Lokasi</label>
                                        <input type="text" name="recurring[{{ $rIdx }}][location]" value="{{ $prog['location'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Kategori</label>
                                        <input type="text" name="recurring[{{ $rIdx }}][badge]" value="{{ $prog['badge'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi Program</label>
                                    <input type="text" name="recurring[{{ $rIdx }}][description]" value="{{ $prog['description'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                            Simpan Program Rutin
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <!-- Modal Form Tambah / Edit Event -->
    <div id="eventModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden">
        <div class="bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2D2D2D] rounded-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto p-6 space-y-4 shadow-xl">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                <h3 class="text-sm font-semibold text-gray-950 dark:text-white" id="modalEventTitle">Tambah Acara Baru</h3>
                <button type="button" onclick="closeEventModal()" class="text-gray-400 hover:text-gray-700 dark:hover:text-white text-lg">&times;</button>
            </div>

            <form action="{{ route('admin.cms.events.save') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="id" id="eventFormId">

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Acara *</label>
                    <input type="text" name="title" id="eventFormTitle" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                        <select name="category" id="eventFormCategory" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                            <option value="Worship">Worship</option>
                            <option value="Fellowship">Fellowship</option>
                            <option value="Family">Family</option>
                            <option value="Retreat">Retreat</option>
                            <option value="Ibadah">Ibadah</option>
                            <option value="Special">Special Event</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Teks</label>
                        <input type="text" name="badge" id="eventFormBadge" placeholder="Monthly Highlight" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Jadwal / Tanggal</label>
                        <input type="text" name="schedule_info" id="eventFormSchedule" placeholder="Jumat, Minggu ke-4 Tiap Bulan" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Waktu / Jam</label>
                        <input type="text" name="time_info" id="eventFormTime" placeholder="19:00 WIB" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Lokasi Tempat</label>
                    <input type="text" name="location" id="eventFormLocation" placeholder="Sanctuary Ekklesia Surabaya" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi Acara</label>
                    <textarea name="description" id="eventFormDesc" rows="3" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Upload Poster / Gambar (Opsional)</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full px-3 py-1.5 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white">
                    <p class="text-[10px] text-gray-400 mt-1">Atau masukkan URL / path gambar di bawah jika tidak upload file baru</p>
                    <input type="text" name="image_url" id="eventFormImageUrl" placeholder="/images/WorshipNight3.png atau /uploads/nama-file.jpg" class="w-full mt-1.5 px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                </div>

                <div class="flex items-center gap-6 pt-1">
                    <label class="inline-flex items-center gap-2 cursor-pointer text-xs">
                        <input type="checkbox" name="is_featured" id="eventFormFeatured" value="1" class="rounded border-gray-300 text-gray-900">
                        <span>Tampilkan sebagai Acara Unggulan</span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer text-xs">
                        <input type="checkbox" name="is_active" id="eventFormActive" value="1" checked class="rounded border-gray-300 text-gray-900">
                        <span>Aktif (Ditampilkan)</span>
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-gray-100 dark:border-[#262626]">
                    <button type="button" onclick="closeEventModal()" class="px-4 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#222]">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 shadow-sm">
                        Simpan Acara
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddEventModal() {
            document.getElementById('modalEventTitle').textContent = 'Tambah Acara Baru';
            document.getElementById('eventFormId').value = '';
            document.getElementById('eventFormTitle').value = '';
            document.getElementById('eventFormCategory').value = 'Worship';
            document.getElementById('eventFormBadge').value = '';
            document.getElementById('eventFormSchedule').value = '';
            document.getElementById('eventFormTime').value = '';
            document.getElementById('eventFormLocation').value = '';
            document.getElementById('eventFormDesc').value = '';
            document.getElementById('eventFormImageUrl').value = '';
            document.getElementById('eventFormFeatured').checked = false;
            document.getElementById('eventFormActive').checked = true;
            document.getElementById('eventModal').classList.remove('hidden');
        }

        function editEventModal(ev) {
            document.getElementById('modalEventTitle').textContent = 'Edit Acara';
            document.getElementById('eventFormId').value = ev.id || '';
            document.getElementById('eventFormTitle').value = ev.title || '';
            document.getElementById('eventFormCategory').value = ev.category || 'Worship';
            document.getElementById('eventFormBadge').value = ev.badge || '';
            document.getElementById('eventFormSchedule').value = ev.schedule_info || '';
            document.getElementById('eventFormTime').value = ev.time_info || '';
            document.getElementById('eventFormLocation').value = ev.location || '';
            document.getElementById('eventFormDesc').value = ev.description || '';
            document.getElementById('eventFormImageUrl').value = ev.image_url || '';
            document.getElementById('eventFormFeatured').checked = !!ev.is_featured;
            document.getElementById('eventFormActive').checked = ev.is_active !== false && ev.is_active !== 0;
            document.getElementById('eventModal').classList.remove('hidden');
        }

        function closeEventModal() {
            document.getElementById('eventModal').classList.add('hidden');
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

