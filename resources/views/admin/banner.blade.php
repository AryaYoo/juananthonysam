<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Banner Iklan Kemitraan — Ekklesia Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Anti-FOUC Theme Script -->
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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-50 dark:bg-[#121212] text-gray-900 dark:text-gray-100 antialiased font-['Plus_Jakarta_Sans',sans-serif] selection:bg-gray-400/20">

    @include('admin.partials.sidebar', ['activePage' => 'banner'])

    <!-- Main Content -->
    <main class="lg:pl-56 pt-14 lg:pt-0">
    <div class="max-w-4xl mx-auto px-3 sm:px-6 py-4 sm:py-8 space-y-4">

        <!-- Banner Manager Card -->
        <div class="p-4 sm:p-7 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm sm:text-base font-medium text-gray-950 dark:text-white flex items-center gap-2">
                    <span class="inline-flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-amber-100 dark:bg-amber-900/30 shrink-0">
                        <svg class="w-3.5 h-3.5 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span>
                    Banner Iklan Kemitraan
                </h2>

                <!-- Status Badge -->
                <span id="bannerStatusBadge"
                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium shrink-0
                             {{ $bannerData['enabled'] ? 'bg-emerald-50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-900/40' : 'bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-[#333333]' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $bannerData['enabled'] ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                    {{ $bannerData['enabled'] ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>

            @if(session('banner_success'))
                <div class="mb-5 p-3.5 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/40 text-emerald-800 dark:text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('banner_success') }}
                </div>
            @endif

            <form action="{{ route('admin.banner.save') }}" method="POST" id="bannerForm">
                @csrf

                <!-- Enable Toggle -->
                <div class="flex items-center justify-between p-3 sm:p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-100 dark:border-[#252525] mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-900 dark:text-white">Tampilkan Banner</p>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-0.5 hidden sm:block">Aktifkan untuk menampilkan banner di semua halaman website publik</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-3">
                        <input type="checkbox"
                               id="bannerEnabledToggle"
                               name="banner_enabled"
                               value="1"
                               {{ $bannerData['enabled'] ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 dark:bg-[#333333] peer-focus:outline-none rounded-full peer
                                    peer-checked:after:translate-x-full peer-checked:after:border-white peer-checked:bg-gray-900 dark:peer-checked:bg-white
                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                    after:bg-white dark:after:bg-[#121212] after:rounded-full after:h-5 after:w-5
                                    after:transition-all"></div>
                    </label>
                </div>

                <!-- HTML Editor -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <label for="bannerHtmlInput" class="text-xs font-medium text-gray-700 dark:text-gray-300">
                            Konten HTML Banner
                        </label>
                        <div class="flex items-center gap-3">
                            <button type="button"
                                    onclick="toggleBannerPreview()"
                                    class="text-xs text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Preview
                            </button>
                            <button type="button"
                                    onclick="clearBannerHtml()"
                                    class="text-xs text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>

                    <textarea id="bannerHtmlInput"
                              name="banner_html"
                              rows="7"
                              placeholder="Masukkan HTML untuk banner iklan..."
                              class="w-full px-3 py-2.5 text-xs leading-relaxed font-mono rounded-xl bg-gray-50 dark:bg-[#0E0E0E] border border-gray-200 dark:border-[#2E2E2E] text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900/20 dark:focus:ring-white/10 focus:border-gray-400 dark:focus:border-gray-600 resize-y transition">{{ $bannerData['html'] }}</textarea>

                    <div class="flex items-center justify-between text-[11px] text-gray-400 dark:text-gray-500 mt-1.5">
                        <span>Maks. 10.000 karakter</span>
                        @if($bannerData['updated_at'])
                            <span class="hidden sm:inline">Diperbarui: {{ $bannerData['updated_at'] }}</span>
                        @endif
                    </div>
                </div>

                <!-- Live Preview Box -->
                <div id="bannerPreviewBox" class="hidden mb-5">
                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mb-2 uppercase tracking-widest font-medium">Tampilan Pratinjau (Preview)</p>
                    <div class="relative rounded-xl overflow-hidden border border-dashed border-gray-300 dark:border-[#333333] bg-gray-900/5 dark:bg-white/5 p-4 min-h-[90px] flex items-center justify-center">
                        <div id="bannerPreviewContent" class="w-full text-center"></div>
                    </div>
                </div>

                <!-- Quick Template Buttons -->
                <div class="mb-4">
                    <p class="text-[11px] text-gray-400 dark:text-gray-500 mb-1.5 font-medium uppercase tracking-wide">Template:</p>
                    <div class="flex flex-wrap gap-1.5">
                        <button type="button"
                                onclick="insertTemplate('image-link')"
                                class="px-2.5 py-1 text-[11px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333] cursor-pointer">
                            Gambar + Link
                        </button>
                        <button type="button"
                                onclick="insertTemplate('text-cta')"
                                class="px-2.5 py-1 text-[11px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333] cursor-pointer">
                            Teks + CTA
                        </button>
                        <button type="button"
                                onclick="insertTemplate('gradient-card')"
                                class="px-2.5 py-1 text-[11px] rounded-lg bg-gray-100 dark:bg-[#252525] text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-[#333333] transition border border-gray-200 dark:border-[#333333] cursor-pointer">
                            Gradient
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-3 border-t border-gray-100 dark:border-[#252525]">
                    <span class="text-[11px] text-gray-400 dark:text-gray-500" id="bannerCharCount">0 / 10.000</span>
                    <button type="submit"
                            class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-medium bg-gray-950 dark:bg-white text-white dark:text-gray-950 rounded-xl hover:bg-gray-800 dark:hover:bg-gray-200 transition active:scale-95 cursor-pointer shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
    </main>

    <!-- Banner Editor Scripts -->
    <script>
        const bannerInput = document.getElementById('bannerHtmlInput');
        const charCount   = document.getElementById('bannerCharCount');

        function updateCharCount() {
            const len = bannerInput ? bannerInput.value.length : 0;
            if (charCount) charCount.textContent = len.toLocaleString('id-ID') + ' / 10.000 karakter';
        }
        if (bannerInput) {
            bannerInput.addEventListener('input', updateCharCount);
            updateCharCount();
        }

        function toggleBannerPreview() {
            const box  = document.getElementById('bannerPreviewBox');
            const cont = document.getElementById('bannerPreviewContent');
            if (!box || !cont) return;
            if (box.classList.contains('hidden')) {
                cont.innerHTML = bannerInput ? bannerInput.value : '';
                box.classList.remove('hidden');
            } else {
                box.classList.add('hidden');
                cont.innerHTML = '';
            }
        }

        function clearBannerHtml() {
            if (!bannerInput) return;
            if (confirm('Hapus seluruh konten HTML banner?')) {
                bannerInput.value = '';
                updateCharCount();
                const box = document.getElementById('bannerPreviewBox');
                if (box && !box.classList.contains('hidden')) {
                    box.classList.add('hidden');
                    const cont = document.getElementById('bannerPreviewContent');
                    if (cont) cont.innerHTML = '';
                }
            }
        }

        const templates = {
            'image-link': `<div style="display:flex;align-items:center;justify-content:center;gap:12px;padding:8px 16px;">
  <a href="https://mitra-anda.com" target="_blank" rel="noopener" style="display:inline-block;text-decoration:none;">
    <img src="https://via.placeholder.com/200x50?text=Logo+Mitra" alt="Mitra Iklan" style="height:50px;width:auto;display:block;">
  </a>
  <span style="font-size:12px;color:#888;">| Mitra Kemitraan Ekklesia</span>
</div>`,
            'text-cta': `<div style="display:flex;align-items:center;justify-content:center;gap:12px;padding:10px 20px;font-family:inherit;">
  <span style="font-size:13px;color:#555;">Ingin bermitra dengan kami?</span>
  <a href="https://wa.me/628XXXXXXXXXX" target="_blank" rel="noopener"
     style="display:inline-flex;align-items:center;gap:6px;padding:6px 14px;background:#111;color:#fff;border-radius:20px;font-size:12px;font-weight:500;text-decoration:none;">
    Hubungi Kami
  </a>
</div>`,
            'gradient-card': `<div style="background:linear-gradient(135deg,#667eea,#764ba2);padding:12px 24px;border-radius:12px;display:inline-flex;align-items:center;gap:12px;">
  <div style="text-align:left;">
    <div style="color:#fff;font-size:13px;font-weight:600;line-height:1.2;">Nama Mitra / Sponsor</div>
    <div style="color:rgba(255,255,255,0.75);font-size:11px;">Deskripsi singkat layanan atau produk mitra</div>
  </div>
  <a href="https://mitra.com" target="_blank" rel="noopener"
     style="padding:5px 12px;background:rgba(255,255,255,0.2);border:1px solid rgba(255,255,255,0.4);color:#fff;border-radius:8px;font-size:11px;text-decoration:none;white-space:nowrap;">
    Kunjungi →
  </a>
</div>`
        };

        function insertTemplate(key) {
            if (!bannerInput || !templates[key]) return;
            bannerInput.value = templates[key];
            updateCharCount();
        }

        // Theme toggle
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
