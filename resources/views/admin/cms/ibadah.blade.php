<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelayanan Ibadah — Ekklesia Admin</title>
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

    @include('admin.partials.sidebar', ['activePage' => 'cms-ibadah'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Pelayanan Ibadah</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ubah konten halaman khusus My Home, Ekidz, dan Ekklesia Teens</p>
                </div>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <a href="{{ route('ibadah.my-home') }}" target="_blank" class="px-2.5 py-1 text-[11px] rounded-lg border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#222]">
                        Web My Home ↗
                    </a>
                    <a href="{{ route('ibadah.ekidz') }}" target="_blank" class="px-2.5 py-1 text-[11px] rounded-lg border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#222]">
                        Web Ekidz ↗
                    </a>
                    <a href="{{ route('ibadah.teens') }}" target="_blank" class="px-2.5 py-1 text-[11px] rounded-lg border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#222]">
                        Web Teens ↗
                    </a>
                </div>
            </div>

            <!-- Tabs: My Home vs Ekidz vs Teens -->
            <div class="flex items-center gap-2 p-1 rounded-xl bg-gray-200/70 dark:bg-[#1E1E1E] w-fit">
                <a href="{{ route('admin.cms.ibadah', ['tab' => 'my-home']) }}"
                   class="px-4 py-2 text-xs font-semibold rounded-lg transition {{ $activeTab === 'my-home' ? 'bg-white dark:bg-[#121212] text-gray-950 dark:text-white shadow-2xs' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white' }}">
                    My Home (Komunitas Sel)
                </a>
                <a href="{{ route('admin.cms.ibadah', ['tab' => 'ekidz']) }}"
                   class="px-4 py-2 text-xs font-semibold rounded-lg transition {{ $activeTab === 'ekidz' ? 'bg-white dark:bg-[#121212] text-gray-950 dark:text-white shadow-2xs' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white' }}">
                    Ekidz (Pelayanan Anak)
                </a>
                <a href="{{ route('admin.cms.ibadah', ['tab' => 'teens']) }}"
                   class="px-4 py-2 text-xs font-semibold rounded-lg transition {{ $activeTab === 'teens' ? 'bg-white dark:bg-[#121212] text-gray-950 dark:text-white shadow-2xs' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white' }}">
                    Ekklesia Teens (Remaja)
                </a>
            </div>

            @php
                $item = $allIbadah[$activeTab] ?? [];
            @endphp

            <form action="{{ route('admin.cms.ibadah.save') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="tab" value="{{ $activeTab }}">

                <!-- Detail Halaman -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <h2 class="text-sm font-semibold text-gray-950 dark:text-white pb-3 border-b border-gray-100 dark:border-[#262626]">
                        Informasi Halaman: {{ $item['pageName'] ?? '' }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Halaman (Browser Title)</label>
                            <input type="text" name="title" value="{{ $item['title'] ?? '' }}" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Teks Berjalan (Marquee Text)</label>
                            <input type="text" name="marqueeText" value="{{ $item['marqueeText'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Meta Description (SEO)</label>
                        <textarea name="metaDescription" rows="2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ $item['metaDescription'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi & Pengantar Pelayanan (Pisahkan paragraf dengan baris baru)</label>
                        <textarea name="descriptionParagraphs" rows="5" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $item['descriptionParagraphs'] ?? []) }}</textarea>
                    </div>
                </div>

                <!-- Detail Jadwal & Lokasi Khusus -->
                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <h2 class="text-sm font-semibold text-gray-950 dark:text-white pb-3 border-b border-gray-100 dark:border-[#262626]">
                        Jadwal & Narahubung: {{ $item['pageName'] ?? '' }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Sesi Jadwal</label>
                            <input type="text" name="schedule_name" value="{{ $item['schedule']['name'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Hari Pelaksanaan</label>
                            <input type="text" name="schedule_day" value="{{ $item['schedule']['day'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Waktu / Jam</label>
                            <input type="text" name="schedule_time" value="{{ $item['schedule']['time'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Ruangan / Lokasi</label>
                            <input type="text" name="schedule_location" value="{{ $item['schedule']['location'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Sasaran Peserta</label>
                            <input type="text" name="schedule_target" value="{{ $item['schedule']['target'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Kategori</label>
                            <input type="text" name="schedule_badge" value="{{ $item['schedule']['badge'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Template Pesan WhatsApp Saat Jemaat Klik Tombol Gabung</label>
                        <input type="text" name="schedule_whatsappMessage" value="{{ $item['schedule']['whatsappMessage'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Konten {{ $item['pageName'] ?? '' }}
                    </button>
                </div>
            </form>

        </div>
    </main>

    <script>
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

