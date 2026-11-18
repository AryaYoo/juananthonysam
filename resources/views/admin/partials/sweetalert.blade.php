{{-- SweetAlert2 CDN & Global CRUD Alert Handlers --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .swal2-popup {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        border-radius: 1.25rem !important;
        padding: 1.5rem !important;
    }
    .swal2-title {
        font-size: 1.1rem !important;
        font-weight: 700 !important;
        letter-spacing: -0.01em !important;
    }
    .swal2-html-container {
        font-size: 0.8125rem !important;
        line-height: 1.5 !important;
    }
    .swal2-actions {
        gap: 0.5rem !important;
        margin-top: 1.25rem !important;
    }
    .swal2-confirm, .swal2-cancel {
        border-radius: 0.75rem !important;
        font-size: 0.75rem !important;
        font-weight: 600 !important;
        padding: 0.625rem 1.25rem !important;
        box-shadow: none !important;
    }
    .dark .swal2-popup {
        background-color: #1a1a1a !important;
        color: #f3f4f6 !important;
        border: 1px solid #2d2d2d !important;
    }
    .dark .swal2-title {
        color: #ffffff !important;
    }
    .dark .swal2-html-container {
        color: #9ca3af !important;
    }
</style>

<script>
    function getSwalTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        return {
            background: isDark ? '#1a1a1a' : '#ffffff',
            color: isDark ? '#f3f4f6' : '#111827',
            customClass: {
                popup: 'border border-gray-100 dark:border-[#2d2d2d] shadow-2xl'
            }
        };
    }

    // Auto-trigger alerts from Laravel session flash messages
    document.addEventListener('DOMContentLoaded', function () {
        const theme = getSwalTheme();

        @if(session('success'))
            Swal.fire({
                ...theme,
                icon: 'success',
                title: 'Berhasil!',
                text: {!! json_encode(session('success')) !!},
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if(session('banner_success'))
            Swal.fire({
                ...theme,
                icon: 'success',
                title: 'Berhasil!',
                text: {!! json_encode(session('banner_success')) !!},
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                ...theme,
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: {!! json_encode(session('error')) !!},
                confirmButtonColor: '#111827',
                confirmButtonText: 'Mengerti'
            });
        @endif

        @if(session('warning'))
            Swal.fire({
                ...theme,
                icon: 'warning',
                title: 'Perhatian',
                text: {!! json_encode(session('warning')) !!},
                confirmButtonColor: '#111827',
                confirmButtonText: 'Mengerti'
            });
        @endif

        @if(session('info'))
            Swal.fire({
                ...theme,
                icon: 'info',
                title: 'Informasi',
                text: {!! json_encode(session('info')) !!},
                confirmButtonColor: '#111827',
                confirmButtonText: 'Tutup'
            });
        @endif

        @if(isset($errors) && $errors->any())
            Swal.fire({
                ...theme,
                icon: 'error',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#111827',
                confirmButtonText: 'Periksa Kembali'
            });
        @endif
    });

    /**
     * Konfirmasi hapus untuk form DELETE (Events, Gallery, Prayers, dll)
     */
    window.confirmDelete = function (event, text = 'Data yang dihapus tidak dapat dikembalikan!', title = 'Hapus Data Ini?') {
        event.preventDefault();
        const form = event.target.closest('form') || event.target;
        const theme = getSwalTheme();
        const isDark = document.documentElement.classList.contains('dark');

        Swal.fire({
            ...theme,
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: isDark ? '#374151' : '#9ca3af',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    };

    /**
     * Konfirmasi aksi umum berbasis callback JavaScript (Hapus card banner, hapus baris jadwal, reset HTML)
     */
    window.confirmAction = function (callback, text = 'Tindakan ini tidak dapat dibatalkan.', title = 'Apakah Anda yakin?', confirmText = 'Ya, Lanjutkan') {
        const theme = getSwalTheme();
        const isDark = document.documentElement.classList.contains('dark');

        Swal.fire({
            ...theme,
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: isDark ? '#374151' : '#9ca3af',
            confirmButtonText: confirmText,
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed && typeof callback === 'function') {
                callback();
            }
        });
    };

    /**
     * Alert peringatan / info sederhana
     */
    window.swalAlert = function (text, title = 'Perhatian', icon = 'warning') {
        const theme = getSwalTheme();
        Swal.fire({
            ...theme,
            title: title,
            text: text,
            icon: icon,
            confirmButtonColor: '#111827',
            confirmButtonText: 'Mengerti'
        });
    };

    /**
     * Konfirmasi Logout Admin
     */
    window.confirmLogout = function (event) {
        event.preventDefault();
        const form = event.target.closest('form') || event.target;
        const theme = getSwalTheme();
        const isDark = document.documentElement.classList.contains('dark');

        Swal.fire({
            ...theme,
            title: 'Konfirmasi Keluar',
            text: 'Apakah Anda yakin ingin keluar dari panel admin?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: isDark ? '#374151' : '#9ca3af',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    };
</script>
