<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo-halobun.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HaloBun')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>

<body class="font-['Poppins'] antialiased bg-gradient-to-br from-pink-50 via-white to-purple-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-pink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo & Brand -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('img/logo-halobun.png') }}" alt="Logo HaloBun" class="h-8 w-auto">
                            <span
                                class="text-xl font-semibold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
                                HaloBun
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-12">
                        <a href="{{ url('/pregnancy-track') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Pregnancy Track</a>
                        <a href="{{ url('/artikel') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Artikel</a>
                        <a href="{{ url('/video') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Video</a>
                        <a href="{{ url('/fasilitas') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Fasilitas</a>
                        <a href="{{ url('/faq') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">FAQ</a>
                        <a href="{{ url('/contact') }}"
                            class="text-gray-700 hover:text-pink-500 transition-colors font-medium">Contact</a>
                    </div>
                    <div class="flex items-center space-x-4">

                        <!-- Mobile menu button -->
                        <button class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-pink-50 transition-colors"
                            onclick="toggleMobileMenu()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-pink-100">
                    <a href="{{ url('/pregnancy-track') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Pregnancy
                        Track</a>
                    <a href="{{ url('/artikel') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Artikel</a>
                    <a href="{{ url('/video') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Video</a>
                    <a href="{{ url('/fasilitas') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Fasilitas</a>
                    <a href="{{ url('/faq') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">FAQ</a>
                    <a href="{{ url('/contact') }}"
                        class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-pink-500 transition-colors">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-pink-100 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- About -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <img src="{{ asset('img/logo-halobun.png') }}" alt="Logo HaloBun" class="h-8 w-auto">
                            <span
                                class="text-xl font-semibold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">HaloBun</span>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Platform informasi kesehatan terpercaya untuk ibu hamil di Indonesia.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Menu Cepat</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ url('/artikel') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Artikel Kesehatan</a>
                            </li>
                            <li><a href="{{ url('/video') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Video Edukasi</a></li>
                            <li><a href="{{ url('/fasilitas') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Fasilitas Kesehatan</a>
                            </li>
                            <li><a href="{{ url('/pregnancy-track') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Kalkulator Kehamilan</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Topik Populer</h3>
                        <ul class="space-y-2 text-sm">
                            {{-- Mengarah ke halaman Panduan Mingguan --}}
                            <li><a href="{{ route('pregnancy-track') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Panduan Mingguan</a>
                            </li>
                            {{-- Mengarah ke halaman Artikel dengan filter Nutrisi --}}
                            <li><a href="{{ route('article', ['category' => 'Nutrisi']) }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Nutrisi & Diet</a>
                            </li>
                            {{-- Mengarah ke halaman Video dengan filter Olahraga --}}
                            <li><a href="{{ route('video', ['topic' => 'Olahraga Prenatal']) }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Olahraga Prenatal</a>
                            </li>
                            {{-- Mengarah ke halaman Artikel dengan filter Persiapan Persalinan --}}
                            <li><a href="{{ route('article', ['category' => 'Persiapan Persalinan']) }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Persiapan Persalinan</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Hubungi Kami</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            {{-- Email yang bisa diklik --}}
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:halobunofficial@gmail.com"
                                    class="hover:text-pink-500 transition-colors">halobunofficial@gmail.com</a>
                            </li>
                        </ul>

                        {{-- Ikon Media Sosial --}}
                        <div class="flex space-x-3 mt-4">
                            {{-- Ikon Instagram --}}
                            <a href="https://www.instagram.com/hallobun.official/" target="_blank" rel="noopener"
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors"
                                aria-label="Instagram HaloBun">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z" />
                                </svg>
                            </a>
                            {{-- Ikon YouTube --}}
                            <a href="https://www.youtube.com/@HalloBun" target="_blank" rel="noopener"
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors"
                                aria-label="YouTube HaloBun">
                                <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 5v14l11-7-11-7z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-pink-100 text-center">
                    <p class="text-sm text-gray-600">
                        © 2024 HaloBun. Made
                        <span class="text-pink-500">♥</span> for Indonesian Moms
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
    @stack('scripts')
</body>

</html>
