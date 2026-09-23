<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Ekklesia Surabaya</title>
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
<body class="min-h-screen bg-gray-50 dark:bg-[#121212] text-gray-900 dark:text-gray-100 flex items-center justify-center p-4 antialiased selection:bg-gray-400/20 font-['Plus_Jakarta_Sans',sans-serif]">

    <div class="w-full max-w-sm sm:max-w-md">
        <!-- Logo / Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gray-950 dark:bg-white text-white dark:text-black mb-3 font-semibold text-lg tracking-widest shadow-xs">
                ES
            </div>
            <h1 class="text-xl sm:text-2xl font-medium tracking-tight text-gray-950 dark:text-white">
                Admin Portal
            </h1>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Ekklesia Surabaya &bull; Masuk untuk melihat dashboard
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-[#1A1A1A] border border-gray-200 dark:border-[#2C2C2C] rounded-2xl p-6 sm:p-8 shadow-xs">
            @if(session('warning'))
                <div class="mb-5 p-3 rounded-lg bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-900/60 text-amber-800 dark:text-amber-200 text-xs">
                    {{ session('warning') }}
                </div>
            @endif

            @if(session('info'))
                <div class="mb-5 p-3 rounded-lg bg-blue-50 dark:bg-blue-950/40 border border-blue-200 dark:border-blue-900/60 text-blue-800 dark:text-blue-200 text-xs">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->has('login'))
                <div class="mb-5 p-3 rounded-lg bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/60 text-red-700 dark:text-red-300 text-xs">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                        Username
                    </label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="{{ old('username', 'admin') }}" 
                           required 
                           autofocus
                           autocomplete="username"
                           placeholder="Masukkan username"
                           class="w-full px-3.5 py-2.5 rounded-lg border border-gray-300 dark:border-[#333333] bg-white dark:bg-[#141414] text-gray-900 dark:text-white text-sm focus:outline-hidden focus:ring-2 focus:ring-gray-950 dark:focus:ring-white transition">
                    @error('username')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-medium text-gray-700 dark:text-gray-300">
                            Password
                        </label>
                    </div>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               placeholder="Masukkan password"
                               class="w-full px-3.5 py-2.5 pr-10 rounded-lg border border-gray-300 dark:border-[#333333] bg-white dark:bg-[#141414] text-gray-900 dark:text-white text-sm focus:outline-hidden focus:ring-2 focus:ring-gray-950 dark:focus:ring-white transition">
                        <button type="button" 
                                onclick="togglePasswordVisibility()" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 text-xs focus:outline-hidden"
                                aria-label="Lihat password">
                            <span id="pwdToggleText">Lihat</span>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full mt-2 py-2.5 px-4 bg-gray-950 hover:bg-black dark:bg-white dark:hover:bg-gray-100 text-white dark:text-black font-medium text-xs tracking-wider uppercase rounded-lg transition-all shadow-xs cursor-pointer">
                    Masuk ke Dashboard
                </button>
            </form>
        </div>

        <!-- Back to Website Link -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-gray-900 dark:hover:text-white transition inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda Website
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const pwd = document.getElementById('password');
            const txt = document.getElementById('pwdToggleText');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                txt.textContent = 'Tutup';
            } else {
                pwd.type = 'password';
                txt.textContent = 'Lihat';
            }
        }
    </script>
</body>
</html>
