<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri & Media — Ekklesia Admin</title>
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

    @include('admin.partials.sidebar', ['activePage' => 'cms-gallery'])

    <main class="lg:pl-64 pt-14 lg:pt-0">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-8 space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-950 dark:text-white">Kelola Galeri & Media</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Upload foto dokumentasi kegiatan pelayanan dan kelola channel YouTube</p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="openAddPhotoModal()" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Foto Baru</span>
                    </button>
                    <a href="{{ route('media') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white border border-gray-200 dark:border-[#333] rounded-xl transition hover:bg-gray-100 dark:hover:bg-[#202020]">
                        <span>Lihat Web Galeri</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 1. FOTO DOKUMENTASI GALERI -->
            <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                    <div>
                        <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Foto Dokumentasi</h2>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400">Total: {{ count($galleries) }} foto aktif</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($galleries as $g)
                        <div class="group relative rounded-xl overflow-hidden border border-gray-200 dark:border-[#282828] bg-gray-50/50 dark:bg-[#141414] flex flex-col justify-between">
                            <div class="relative aspect-4/3 bg-gray-200 dark:bg-[#202020] overflow-hidden">
                                @php
                                    $gImg = $g['image_url'] ?? '';
                                    if ($gImg && str_starts_with($gImg, '/')) $gImg = asset(ltrim($gImg, '/'));
                                @endphp
                                <img src="{{ $gImg ?: asset('images/Dokumentasi1.png') }}" alt="{{ $g['title'] ?? '' }}" class="w-full h-full object-cover" onerror="this.src='{{ asset('images/Dokumentasi1.png') }}'">
                                <span class="absolute top-2 left-2 px-1.5 py-0.5 rounded text-[9px] font-semibold uppercase bg-black/75 text-white backdrop-blur-xs">
                                    {{ $g['category'] ?? 'Umum' }}
                                </span>
                                <span class="absolute top-2 right-2 px-1.5 py-0.5 rounded text-[9px] bg-white/90 dark:bg-black/90 text-gray-900 dark:text-white font-mono">
                                    #{{ $g['sort_order'] ?? 1 }}
                                </span>
                            </div>

                            <div class="p-3 space-y-1">
                                <h3 class="text-xs font-semibold text-gray-950 dark:text-white truncate" title="{{ $g['title'] ?? '' }}">
                                    {{ $g['title'] ?? '' }}
                                </h3>
                                <p class="text-[10px] text-gray-500 dark:text-gray-400 line-clamp-2">
                                    {{ $g['caption'] ?? '' }}
                                </p>
                            </div>

                            <div class="p-2 pt-0 flex items-center justify-end gap-1.5">
                                <button type="button" onclick='editPhotoModal(@json($g))' class="px-2 py-1 text-[10px] font-medium rounded-md bg-white dark:bg-[#1E1E1E] border border-gray-200 dark:border-[#333] hover:bg-gray-100 dark:hover:bg-[#282828] text-gray-700 dark:text-gray-300">
                                    Edit
                                </button>
                                <form action="{{ route('admin.cms.gallery.delete', $g['id']) }}" method="POST" onsubmit="return confirmDelete(event, 'Foto galeri ini akan dihapus secara permanen.')">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 text-[10px] font-medium rounded-md text-red-600 hover:bg-red-50 dark:hover:bg-red-950/30">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 py-8 text-center text-xs text-gray-400">Belum ada foto galeri.</div>
                    @endforelse
                </div>
            </div>

            <!-- 2. CHANNEL YOUTUBE RESMI -->
            <div class="p-5 sm:p-6 rounded-2xl bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#282828] shadow-2xs space-y-4">
                <div class="pb-3 border-b border-gray-100 dark:border-[#262626]">
                    <h2 class="text-sm font-semibold text-gray-950 dark:text-white">Saluran YouTube Resmi</h2>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Tautan channel YouTube yang tampil di halaman media</p>
                </div>

                <form action="{{ route('admin.cms.gallery.channels.save') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($channels as $cIdx => $chan)
                            <div class="p-4 rounded-xl bg-gray-50 dark:bg-[#141414] border border-gray-100 dark:border-[#252525] space-y-3">
                                <input type="hidden" name="channels[{{ $cIdx }}][image]" value="{{ $chan['image'] ?? '' }}">
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Channel</label>
                                    <input type="text" name="channels[{{ $cIdx }}][name]" value="{{ $chan['name'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Handle (@username)</label>
                                        <input type="text" name="channels[{{ $cIdx }}][handle]" value="{{ $chan['handle'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Badge Kategori</label>
                                        <input type="text" name="channels[{{ $cIdx }}][badge]" value="{{ $chan['badge'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Link URL Channel YouTube</label>
                                    <input type="text" name="channels[{{ $cIdx }}][link]" value="{{ $chan['link'] ?? '' }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi Saluran</label>
                                    <textarea name="channels[{{ $cIdx }}][description]" rows="2" class="w-full px-3 py-1.5 text-xs rounded-lg border border-gray-200 dark:border-[#333] bg-white dark:bg-[#1A1A1A] text-gray-900 dark:text-white">{{ $chan['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 transition shadow-sm cursor-pointer">
                            Simpan Channel YouTube
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <!-- Modal Form Tambah / Edit Foto Galeri -->
    <div id="photoModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden">
        <div class="bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2D2D2D] rounded-2xl w-full max-w-lg p-6 space-y-4 shadow-xl">
            <div class="flex items-center justify-between pb-3 border-b border-gray-100 dark:border-[#262626]">
                <h3 class="text-sm font-semibold text-gray-950 dark:text-white" id="modalPhotoTitle">Tambah Foto Baru</h3>
                <button type="button" onclick="closePhotoModal()" class="text-gray-400 hover:text-gray-700 dark:hover:text-white text-lg">&times;</button>
            </div>

            <form action="{{ route('admin.cms.gallery.save') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="id" id="photoFormId">

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Foto *</label>
                    <input type="text" name="title" id="photoFormTitle" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                        <select name="category" id="photoFormCategory" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                            <option value="Ibadah">Ibadah</option>
                            <option value="Retreat">Retreat</option>
                            <option value="Teen">Teen</option>
                            <option value="EFF">EFF</option>
                            <option value="Ibadah duka">Ibadah Duka</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor Urutan (Sort Order)</label>
                        <input type="number" name="sort_order" id="photoFormOrder" value="1" min="1" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Keterangan / Caption</label>
                    <textarea name="caption" id="photoFormCaption" rows="2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Upload File Gambar Baru</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full px-3 py-1.5 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white">
                    <p class="text-[10px] text-gray-400 mt-1">Atau masukkan path / URL gambar di bawah jika tidak upload file:</p>
                    <input type="text" name="image_url" id="photoFormImageUrl" placeholder="/images/Dokumentasi1.png atau /uploads/nama-file.jpg" class="w-full mt-1.5 px-3 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] bg-gray-50 dark:bg-[#141414] text-gray-900 dark:text-white focus:outline-none">
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-gray-100 dark:border-[#262626]">
                    <button type="button" onclick="closePhotoModal()" class="px-4 py-2 text-xs rounded-xl border border-gray-200 dark:border-[#333] text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#222]">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 text-xs font-semibold rounded-xl bg-gray-950 text-white dark:bg-white dark:text-gray-950 hover:opacity-90 shadow-sm">
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddPhotoModal() {
            document.getElementById('modalPhotoTitle').textContent = 'Tambah Foto Baru';
            document.getElementById('photoFormId').value = '';
            document.getElementById('photoFormTitle').value = '';
            document.getElementById('photoFormCategory').value = 'Ibadah';
            document.getElementById('photoFormOrder').value = '1';
            document.getElementById('photoFormCaption').value = '';
            document.getElementById('photoFormImageUrl').value = '';
            document.getElementById('photoModal').classList.remove('hidden');
        }

        function editPhotoModal(g) {
            document.getElementById('modalPhotoTitle').textContent = 'Edit Foto Galeri';
            document.getElementById('photoFormId').value = g.id || '';
            document.getElementById('photoFormTitle').value = g.title || '';
            document.getElementById('photoFormCategory').value = g.category || 'Ibadah';
            document.getElementById('photoFormOrder').value = g.sort_order || 1;
            document.getElementById('photoFormCaption').value = g.caption || '';
            document.getElementById('photoFormImageUrl').value = g.image_url || '';
            document.getElementById('photoModal').classList.remove('hidden');
        }

        function closePhotoModal() {
            document.getElementById('photoModal').classList.add('hidden');
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

