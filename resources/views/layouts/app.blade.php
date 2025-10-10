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
                            <li><a href="{{ url('/konsultasi') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Konsultasi Online</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Sumber Daya</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ url('/panduan') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Panduan Kehamilan</a>
                            </li>
                            <li><a href="{{ url('/nutrisi') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Nutrisi & Diet</a></li>
                            <li><a href="{{ url('/olahraga') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Olahraga Prenatal</a>
                            </li>
                            <li><a href="{{ url('/checklist') }}"
                                    class="text-gray-600 hover:text-pink-500 transition-colors">Checklist
                                    Persalinan</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Hubungi Kami</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>info@halobun.id</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>0800-1234-5678</span>
                            </li>
                        </ul>
                        <div class="flex space-x-3 mt-4">
                            <a href="#"
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center hover:bg-pink-200 transition-colors">
                                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
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
