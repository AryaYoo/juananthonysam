<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Profil Gembala — Ekklesia Admin</title>
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

    @include('admin.partials.sidebar', ['activePage' => 'cms-pastors'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Profil Gembala</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Biografi lengkap, kutipan, pelayanan, dan perjalanan rohani hamba Tuhan</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('pastor.juan') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020]">
                        <span>Web Ps Juan</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <a href="{{ route('pastor.samuel') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020]">
                        <span>Web Ps Samuel</span>
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

            <!-- Tabs: Ps Juan vs Ps Samuel -->
            <div class="flex items-center gap-2 p-1 rounded-xl bg-gray-200/70 dark:bg-[#1E1E1E] w-fit">
                <a href="{{ route('admin.cms.pastors', ['tab' => 'juan']) }}"
                   class="px-4 py-2 text-xs font-semibold rounded-lg transition {{ $activeTab === 'juan' ? 'bg-white dark:bg-[#121212] text-gray-950 dark:text-white shadow-2xs' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white' }}">
                    Pastor Juan Anthony Sam
                </a>
                <a href="{{ route('admin.cms.pastors', ['tab' => 'samuel']) }}"
                   class="px-4 py-2 text-xs font-semibold rounded-lg transition {{ $activeTab === 'samuel' ? 'bg-white dark:bg-[#121212] text-gray-950 dark:text-white shadow-2xs' : 'text-gray-600 dark:text-gray-400 hover:text-gray-950 dark:hover:text-white' }}">
                    Ps Samuel
                </a>
            </div>

            @php
                $currentPastor = ($activeTab === 'samuel') ? $pastorSamuel : $pastorJuan;
            @endphp

            <form action="{{ route('admin.cms.pastors.save') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="tab" value="{{ $activeTab }}">

                <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap & Gelar</label>
                            <input type="text" name="name" value="{{ $currentPastor['name'] ?? '' }}" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Jabatan / Peran Pastoral</label>
                            <input type="text" name="role" value="{{ $currentPastor['role'] ?? '' }}" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Tampilan Halaman (Page Title)</label>
                        <input type="text" name="title_display" value="{{ $currentPastor['title_display'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Kutipan / Quote Favorit</label>
                        <textarea name="quote" rows="2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ $currentPastor['quote'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Ringkasan Profil (Overview) — Pisahkan paragraf dengan baris baru</label>
                        <textarea name="overview" rows="5" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $currentPastor['overview'] ?? []) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Perjalanan Rohani (Spiritual Journey) — Pisahkan paragraf dengan baris baru</label>
                        <textarea name="spiritual_journey" rows="4" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $currentPastor['spiritual_journey'] ?? []) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Latar Belakang & Pembinaan (Background) — Pisahkan paragraf dengan baris baru</label>
                        <textarea name="background" rows="4" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $currentPastor['background'] ?? []) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Fokus Pelayanan & Penggembalaan (Ministry) — Pisahkan paragraf dengan baris baru</label>
                        <textarea name="ministry" rows="4" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $currentPastor['ministry'] ?? []) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Visi & Misi Pribadi — Pisahkan paragraf dengan baris baru</label>
                        <textarea name="vision_mission" rows="4" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-gray-950 dark:focus:ring-white">{{ implode("\n\n", $currentPastor['vision_mission'] ?? []) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Profil {{ $currentPastor['name'] ?? 'Pastor' }}
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

