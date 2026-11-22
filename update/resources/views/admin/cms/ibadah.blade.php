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

            <form action="{{ route('admin.cms.ibadah.save') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="tab" value="{{ $activeTab }}">

                <!-- 0. Banner Slider (Hero Images) -->
                <div class="rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs overflow-hidden">
                    <div class="flex items-center justify-between p-5 sm:p-6 border-b border-gray-100 dark:border-[#262626]">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-xl bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Banner Slider (Hero Images) — {{ $item['pageName'] ?? '' }}</h2>
                                <p class="text-[11px] text-gray-500 dark:text-gray-400">Poster dan foto yang tampil di slider paling atas halaman {{ $item['pageName'] ?? '' }}</p>
                            </div>
                        </div>
                        <button type="button" onclick="addNewSlideCard()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-xl bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-900/50 hover:bg-indigo-100 dark:hover:bg-indigo-900/60 transition cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Tambah Banner</span>
                        </button>
                    </div>

                    <div class="p-5 sm:p-6 space-y-4">
                        @php
                            $slides = $item['heroSlides'] ?? [];
                        @endphp

                        <div id="slidesContainer" class="space-y-3">
                            @foreach($slides as $idx => $s)
                                @php
                                    $imgSrc = $s['image'] ?? '';
                                    if ($imgSrc && str_starts_with($imgSrc, '/')) {
                                        $imgSrc = asset(ltrim($imgSrc, '/'));
                                    } elseif ($imgSrc && !str_starts_with($imgSrc, 'http')) {
                                        $imgSrc = asset($imgSrc);
                                    }
                                @endphp
                                <div class="slide-card rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] overflow-hidden">
                                    {{-- Slide Header --}}
                                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#222]">
                                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                            </svg>
                                            <span class="slide-label">Banner #{{ $idx + 1 }}</span>
                                        </span>
                                        <button type="button" onclick="removeSlideCard(this)"
                                            class="text-xs text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium inline-flex items-center gap-1 cursor-pointer transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>

                                    {{-- Slide Body --}}
                                    <div class="p-4 flex flex-col sm:flex-row gap-4">
                                        {{-- Preview --}}
                                        <div class="sm:w-48 flex-shrink-0">
                                            <div class="w-full bg-gray-900 rounded-lg overflow-hidden border border-gray-300 dark:border-[#333]" style="aspect-ratio:16/9">
                                                <img id="preview_{{ $idx }}" src="{{ $imgSrc ?: asset('images/MyHome1.png') }}" alt="{{ $s['alt'] ?? 'Preview' }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='{{ asset('images/MyHome1.png') }}';">
                                            </div>
                                            <p class="text-[10px] text-gray-400 text-center mt-1.5">Rasio 16:9 · maks 10 MB</p>
                                        </div>

                                        {{-- Form Inputs --}}
                                        <div class="flex-1 min-w-0 space-y-3">
                                            <div>
                                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Upload Gambar Baru</label>
                                                <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-dashed border-gray-300 dark:border-[#383838] bg-white dark:bg-[#1a1a1a] cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-950/20 transition-colors group">
                                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                                    </svg>
                                                    <span class="text-xs text-gray-500 group-hover:text-indigo-600 truncate" id="filelabel_{{ $idx }}">Pilih file foto (JPG, PNG, WebP)</span>
                                                    <input type="file" name="hero_slides[{{ $idx }}][image_file]" accept="image/*" class="sr-only" onchange="previewSlideImage(this, 'preview_{{ $idx }}', 'filelabel_{{ $idx }}')">
                                                </label>
                                            </div>
                                            <div>
                                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Atau URL / Path Gambar</label>
                                                <input type="text" name="hero_slides[{{ $idx }}][image]" value="{{ $s['image'] ?? '' }}" placeholder="/uploads/... atau https://..." oninput="updatePreviewFromUrl(this, 'preview_{{ $idx }}')"
                                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                            </div>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Keterangan / Alt</label>
                                                    <input type="text" name="hero_slides[{{ $idx }}][alt]" value="{{ $s['alt'] ?? '' }}" placeholder="mis. Suasana Ibadah"
                                                        class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                                </div>
                                                <div>
                                                    <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Link Klik <span class="font-normal normal-case text-gray-400">(Opsional)</span></label>
                                                    <input type="text" name="hero_slides[{{ $idx }}][link]" value="{{ $s['link'] ?? '' }}" placeholder="https://... atau kosongkan"
                                                        class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Quick Upload Box --}}
                        <div class="p-4 rounded-xl bg-indigo-50/50 dark:bg-indigo-950/20 border border-dashed border-indigo-200 dark:border-indigo-900/40 space-y-3">
                            <p class="text-xs font-semibold text-indigo-900 dark:text-indigo-300 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                Upload Banner Baru Langsung
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih File Banner</label>
                                    <input type="file" name="new_slide_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-medium file:bg-indigo-100 dark:file:bg-indigo-900/50 file:text-indigo-800 dark:file:text-indigo-200 hover:file:bg-indigo-200 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Keterangan / Alt</label>
                                    <input type="text" name="new_slide_alt" placeholder="Contoh: Suasana Komunitas" class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Link Klik (Opsional)</label>
                                    <input type="text" name="new_slide_link" placeholder="https://..." class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
        // ── Slide Helpers ──────────────────────────────────────────────────────
        function previewSlideImage(input, previewId, labelId) {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(previewId);
                if (img) {
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
            };
            reader.readAsDataURL(file);
            const lbl = labelId ? document.getElementById(labelId) : null;
            if (lbl) lbl.textContent = file.name;
        }

        function updatePreviewFromUrl(input, previewId) {
            const img = document.getElementById(previewId);
            if (img && input.value.trim()) {
                img.src = input.value.trim();
                img.style.display = 'block';
            }
        }

        function removeSlideCard(btn) {
            const container = document.getElementById('slidesContainer');
            if (container.querySelectorAll('.slide-card').length <= 1) {
                if (typeof swalAlert === 'function') {
                    swalAlert('Minimal harus ada 1 banner slide.', 'Tidak Bisa Dihapus', 'warning');
                } else {
                    alert('Minimal harus ada 1 banner slide.');
                }
                return;
            }
            if (typeof confirmAction === 'function') {
                confirmAction(() => {
                    const card = btn.closest('.slide-card');
                    if (card) { card.remove(); renumberSlides(); }
                }, 'Banner slide ini akan dihapus dari slider.', 'Hapus Banner?');
            } else {
                if (confirm('Hapus banner slide ini?')) {
                    const card = btn.closest('.slide-card');
                    if (card) { card.remove(); renumberSlides(); }
                }
            }
        }

        function renumberSlides() {
            document.querySelectorAll('#slidesContainer .slide-card').forEach(function(card, idx) {
                const lbl = card.querySelector('.slide-label');
                if (lbl) lbl.textContent = 'Banner #' + (idx + 1);
            });
        }

        function addNewSlideCard() {
            const container = document.getElementById('slidesContainer');
            const idx   = Date.now();
            const count = container.querySelectorAll('.slide-card').length + 1;
            const div   = document.createElement('div');
            div.className = 'slide-card rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-200 dark:border-[#252525] overflow-hidden';
            div.innerHTML = `
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#222]">
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span class="slide-label">Banner #` + count + ` (Baru)</span>
                    </span>
                    <button type="button" onclick="removeSlideCard(this)" class="text-xs text-red-500 hover:text-red-700 font-medium inline-flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </div>
                <div class="p-4 flex flex-col sm:flex-row gap-4">
                    <div class="sm:w-48 flex-shrink-0">
                        <div class="w-full bg-gray-900 rounded-lg overflow-hidden border border-gray-300 dark:border-[#333]" style="aspect-ratio:16/9">
                            <img id="preview_` + idx + `" src="" alt="Preview" class="w-full h-full object-cover" onerror="this.style.display='none'">
                        </div>
                        <p class="text-[10px] text-gray-400 text-center mt-1.5">Rasio 16:9 · maks 10 MB</p>
                    </div>
                    <div class="flex-1 min-w-0 space-y-3">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Upload Gambar Baru</label>
                            <label class="flex items-center gap-2 px-3 py-2 rounded-lg border border-dashed border-gray-300 dark:border-[#383838] bg-white dark:bg-[#1a1a1a] cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition-colors group">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                <span class="text-xs text-gray-500 truncate" id="filelabel_` + idx + `">Pilih file foto (JPG, PNG, WebP)</span>
                                <input type="file" name="hero_slides[` + idx + `][image_file]" accept="image/*" class="sr-only" onchange="previewSlideImage(this,'preview_` + idx + `','filelabel_` + idx + `')">
                            </label>
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Atau URL / Path Gambar</label>
                            <input type="text" name="hero_slides[` + idx + `][image]" placeholder="/uploads/... atau https://..." oninput="updatePreviewFromUrl(this,'preview_` + idx + `')"
                                class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Keterangan / Alt</label>
                                <input type="text" name="hero_slides[` + idx + `][alt]" placeholder="mis. Suasana Ibadah"
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 dark:text-gray-400 mb-1.5 uppercase tracking-wide">Link Klik <span class="font-normal normal-case text-gray-400">(Opsional)</span></label>
                                <input type="text" name="hero_slides[` + idx + `][link]" placeholder="https://..."
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:border-indigo-400">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(div);
            renumberSlides();
            div.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
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

