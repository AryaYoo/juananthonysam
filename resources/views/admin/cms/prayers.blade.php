<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kotak Doa Jemaat — Ekklesia Admin</title>
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

    @include('admin.partials.sidebar', ['activePage' => 'prayers'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kotak Doa Jemaat</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Daftar permohonan doa yang dikirim oleh jemaat dan pengunjung melalui website</p>
                </div>
            </div>

            <div class="space-y-4">
                @forelse($prayers as $p)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $p['phone'] ?? '');
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '62' . substr($cleanPhone, 1);
                        }
                        $waUrl = !empty($cleanPhone) ? "https://wa.me/{$cleanPhone}?text=" . urlencode("Halo {$p['name']}, salam kasih dari Tim Pastoral Ekklesia Surabaya. Kami telah menerima pokok doa Anda dan rindu menopang Anda dalam doa.") : null;
                    @endphp

                    <div class="p-5 rounded-2xl bg-white dark:bg-[#1A1A1A] border {{ !empty($p['is_contacted']) ? 'border-gray-200 dark:border-[#282828] opacity-80' : 'border-amber-200 dark:border-amber-900/50 shadow-2xs' }} space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-2.5 border-b border-gray-100 dark:border-[#262626]">
                            <div class="flex items-center gap-2.5">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full {{ !empty($p['is_contacted']) ? 'bg-gray-100 dark:bg-[#252525] text-gray-600 dark:text-gray-400' : 'bg-amber-100 dark:bg-amber-950/40 text-amber-700 dark:text-amber-400 font-bold' }} text-xs">
                                    {{ strtoupper(substr($p['name'] ?? 'A', 0, 1)) }}
                                </span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-xs font-semibold text-gray-950 dark:text-white">
                                            {{ $p['name'] ?? 'Anonim' }}
                                        </h3>
                                        @if(!empty($p['is_anonymous']))
                                            <span class="px-1.5 py-0.5 rounded text-[9px] bg-gray-100 dark:bg-[#252525] text-gray-500">
                                                Anonim
                                            </span>
                                        @endif
                                        @if(!empty($p['is_contacted']))
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-950/40 dark:text-emerald-400">
                                                ✓ Sudah Dihubungi
                                            </span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-100 text-amber-800 dark:bg-amber-950/40 dark:text-amber-400 animate-pulse">
                                                ● Perlu Dihubungi
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-0.5">
                                        {{ $p['created_at'] ?? 'Baru saja' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 self-end sm:self-auto">
                                @if($waUrl)
                                    <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-medium transition shadow-2xs">
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.963 1.2.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                                        </svg>
                                        <span>Chat WhatsApp</span>
                                    </a>
                                @endif

                                <form action="{{ route('admin.prayers.toggle', $p['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-2.5 py-1.5 text-xs rounded-xl border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#252525] text-gray-700 dark:text-gray-300 transition">
                                        {{ !empty($p['is_contacted']) ? 'Tandai Belum' : 'Tandai Sudah' }}
                                    </button>
                                </form>

                                <form action="{{ route('admin.prayers.delete', $p['id']) }}" method="POST" onsubmit="return confirmDelete(event, 'Permohonan doa ini akan dihapus secara permanen.')">
                                    @csrf
                                    <button type="submit" class="p-1.5 text-xs text-red-500 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-950/30 rounded-lg transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Pokok Doa Content -->
                        <div class="p-3.5 rounded-xl bg-gray-50/70 dark:bg-[#141414] border border-gray-100 dark:border-[#222]">
                            <p class="text-xs text-gray-800 dark:text-gray-200 leading-relaxed whitespace-pre-line font-light">"{{ $p['request_text'] ?? '' }}"</p>
                        </div>

                        <!-- Contact Details -->
                        <div class="flex items-center gap-4 text-[11px] text-gray-500 dark:text-gray-400">
                            @if(!empty($p['phone']))
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    {{ $p['phone'] }}
                                </span>
                            @endif
                            @if(!empty($p['email']))
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $p['email'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] text-xs text-gray-400">
                        Belum ada permohonan doa yang masuk.
                    </div>
                @endforelse
            </div>

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

