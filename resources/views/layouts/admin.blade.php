<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo-halobun.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HaloBun Admin')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/7anaxwtgdd45f7faj9kruuwjncc5xjkflmwl6jxw06lbr46c/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-['Poppins'] antialiased bg-gradient-to-b from-pink-50 to-white">
    <div class="min-h-screen">
        <nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-pink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ url('/admin') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('img/logo-halobun.png') }}" alt="Logo HaloBun" class="h-8 w-auto">
                            <span
                                class="text-xl font-semibold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                                HaloBun Admin
                            </span>
                        </a>
                    </div>

                    <div class="hidden md:flex items-center space-x-8">
                        <a href="{{ url('/admin/dashboard') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Dashboard</a>
                        <a href="{{ url('/admin/artikel') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Artikel</a>
                        <a href="{{ url('/admin/video') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Video</a>
                        <a href="{{ url('/admin/fasilitas') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Fasilitas</a>
                        <a href="{{ url('/admin/faq') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">FAQ</a>
                    </div>

                    <div class="flex items-center space-x-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-full hover:shadow-lg transition-all transform hover:scale-105">
                                Logout
                            </button>
                        </form>
                        <button class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-pink-50 transition-colors"
                            onclick="toggleAdminMobileMenu()" aria-label="Toggle navigation">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div id="adminMobileMenu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-pink-100">
                    <a href="{{ url('/admin/dashboard') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Dashboard</a>
                    <a href="{{ url('/admin/artikel') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Artikel</a>
                    <a href="{{ url('/admin/video') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Video</a>
                    <a href="{{ url('/admin/faq') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">FAQ</a>
                    <a href="{{ url('/admin/fasilitas') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Fasilitas</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>

        <footer class="bg-white border-t border-pink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo-halobun.png') }}" alt="Logo HaloBun" class="h-6 w-auto">
                        <span
                            class="text-base font-semibold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                            HaloBun Admin
                        </span>
                    </div>
                    <p class="text-sm text-gray-600">© 2025 HaloBun • Panel Admin</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleAdminMobileMenu() {
            const menu = document.getElementById('adminMobileMenu');
            if (menu) menu.classList.toggle('hidden');
        }
    </script>
    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
