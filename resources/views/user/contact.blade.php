@extends('layouts.app')

@push('styles')
    <style>
        .soft-card {
            background: linear-gradient(180deg, rgba(255, 240, 245, 0.6), rgba(255, 255, 255, 0.9));
        }
    </style>
@endpush

@section('content')
    <section aria-labelledby="hero-contact" class="relative">
        {{-- Bagian Atas: Grid 2 Kolom --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
            <div class="grid md:grid-cols-2 gap-8 items-start">

                {{-- Kolom Kiri: Judul dan Paragraf Awal --}}
                <div>
                    <h1 id="hero-contact" class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-900 text-balance">
                        Selamat datang di
                        <span
                            class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">HaloBun</span>
                    </h1>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        <strong>HaloBun</strong> adalah sebuah website yang berfokus pada penyediaan informasi kesehatan
                        terkini yang ditujukan secara khusus bagi para ibu hamil sepanjang perjalanan kehamilan mereka.
                        Dengan menitikberatkan pada kebutuhan unik para calon ibu, HaloBun bertujuan untuk memberikan
                        panduan yang komprehensif dan akurat agar mereka dapat menjalani masa kehamilan dengan sehat dan
                        percaya diri.
                    </p>
                </div>

                {{-- Kolom Kanan: Kartu "Tentang HaloBun" --}}
                <div class="soft-card rounded-2xl p-6 border border-pink-100 top-8">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-purple-400 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M4 4h16v6H4zM4 14h7v6H4zM13 14h7v6h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Tentang HaloBun</h2>
                            <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                                Kami menyediakan artikel, video edukasi, FAQ, dan fasilitas kesehatan untuk mendukung
                                perjalanan kehamilan Anda. Tampilan bersih, informasi mudah dipahami, dan pengalaman yang
                                nyaman untuk ibu hamil.
                            </p>
                            <ul class="mt-3 text-sm text-gray-700 space-y-1">
                                <li class="flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Panduan nutrisi & perkembangan
                                    janin</li>
                                <li class="flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Tips persiapan persalinan</li>
                                <li class="flex items-center gap-2"><span
                                        class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Akses di semua perangkat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Bawah: Teks Lanjutan (Lebar Penuh) --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 md:-mt-8">
            {{-- Menggunakan class 'prose' untuk styling otomatis paragraf panjang --}}
            <div class="prose max-w-none prose-p:text-gray-600 prose-p:leading-relaxed prose-strong:text-gray-800">
                <p>
                    Melalui website ini, ibu hamil dapat mengakses berbagai artikel, panduan, dan sumber informasi
                    seputar kehamilan. Informasi tersebut mencakup topik-topik seperti perubahan fisik dan emosional
                    selama kehamilan, perawatan prenatal, nutrisi yang tepat, olahraga yang aman, persiapan persalinan,
                    hingga perawatan pascapersalinan.
                </p>
                <p>
                    HaloBun memastikan bahwa seluruh konten yang disajikan selalu diperbarui dan didasarkan pada penelitian
                    serta pedoman medis terbaru. Website ini bekerja sama dengan para profesional medis dan pakar kesehatan
                    yang berfokus pada bidang kehamilan dan persalinan untuk menghadirkan informasi yang andal dan dapat
                    dipercaya.
                </p>
                <p>
                    Selain artikel dan panduan, HaloBun juga menyediakan forum atau komunitas daring tempat para ibu hamil
                    dapat berbagi pengalaman, saling mendukung, dan bertanya kepada sesama calon ibu. Forum ini memberikan
                    dukungan sosial dan membantu pengunjung terhubung dengan orang lain yang sedang menjalani perjalanan
                    yang sama.
                </p>
                <p>
                    Dengan fokus yang kuat pada informasi kesehatan ibu, <strong>HaloBun</strong> telah menjadi sumber
                    terpercaya bagi para calon ibu yang mencari pengetahuan dan pemahaman yang akurat selama masa kehamilan.
                    Website ini berupaya memberikan rasa aman, wawasan yang mendalam, serta dukungan yang dibutuhkan untuk
                    menjalani kehamilan dengan penuh keyakinan.
                </p>
            </div>
        </div>
    </section>

    <section aria-labelledby="hubungi-kami" class="mt-6 sm:mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="hubungi-kami" class="text-xl font-semibold text-gray-900">Hubungi Kami</h2>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Email Card --}}
                <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                    <div class="p-5 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0"
                            aria-hidden="true">
                            <svg class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 8l-9 6-9-6 M3 19h18" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                            <p class="mt-1 text-sm text-gray-600">Tanyakan apa pun seputar kehamilan Anda.</p>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                <a href="mailto:halobunofficial@gmail.com"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                                    Kirim Email
                                </a>
                                <button type="button" onclick="copyText('halobunofficial@gmail.com','toast-email')"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                                    Salin
                                </button>
                            </div>
                            <div id="toast-email" role="status" aria-live="polite"
                                class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
                                <span class="text-sm">Alamat email tersalin</span>
                            </div>
                        </div>
                    </div>
                    <p class="sr-only">Email: halobunofficial@gmail.com</p>
                </article>

                {{-- YouTube Card --}}
                <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                    <div class="p-5 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0"
                            aria-hidden="true">
                            <svg class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7-11-7z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900">YouTube</h3>
                            <p class="mt-1 text-sm text-gray-600">Video edukasi singkat dan mudah diikuti.</p>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                <a href="https://www.youtube.com/@HalloBun" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                                    Buka Channel
                                </a>
                                <button type="button" onclick="copyText('https://www.youtube.com/@HalloBun','toast-yt')"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                                    Salin
                                </button>
                            </div>
                            <div id="toast-yt" role="status" aria-live="polite"
                                class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
                                <span class="text-sm">Link YouTube tersalin</span>
                            </div>
                        </div>
                    </div>
                    <p class="sr-only">YouTube: https://www.youtube.com/@HalloBun</p>
                </article>

                {{-- Instagram Card --}}
                <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                    <div class="p-5 flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0"
                            aria-hidden="true">
                            {{-- Ganti ikon telepon dengan ikon Instagram --}}
                            <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900">Instagram</h3>
                            <p class="mt-1 text-sm text-gray-600">Ikuti kami untuk update terbaru.</p>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                {{-- Tombol "Buka" mengarah ke profil Instagram --}}
                                <a href="https://www.instagram.com/hallobun.official/" target="_blank" rel="noopener"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                                    Buka
                                </a>
                                {{-- Tombol "Salin" untuk menyalin username --}}
                                <button type="button" onclick="copyText('hallobun.official','toast-instagram')"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                                    Salin Username
                                </button>
                            </div>
                            {{-- Notifikasi "tersalin" --}}
                            <div id="toast-instagram" role="status" aria-live="polite"
                                class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
                                <span class="text-sm">Username Instagram tersalin</span>
                            </div>
                        </div>
                    </div>
                    <p class="sr-only">Username Instagram: @hallobun.official</p>
                </article>
            </div>
        </div>
    </section>

    {{-- CTA section dengan border-pink-100 dan gradient background --}}
    <section aria-labelledby="cta-faq" class="mt-12 sm:mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="rounded-2xl border border-pink-100 bg-gradient-to-r from-pink-50 to-purple-50 p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div>
                    <h2 id="cta-faq" class="text-lg sm:text-xl font-semibold text-gray-900">Punya pertanyaan lain?</h2>
                    <p class="mt-1 text-gray-700 text-sm">
                        Silakan kunjungi halaman FAQ kami untuk jawaban cepat mengenai topik kehamilan.
                    </p>
                </div>
                <a href="{{ url('/faq') }}"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-white text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition font-medium">
                    Buka FAQ
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function copyText(text, toastId) {
            if (!navigator.clipboard) {
                // fallback seleksi manual
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                try {
                    document.execCommand('copy');
                } catch (e) {}
                document.body.removeChild(ta);
                showToast(toastId);
                return;
            }
            navigator.clipboard.writeText(text).then(function() {
                showToast(toastId);
            }).catch(function() {
                showToast(toastId);
            });
        }

        function showToast(id) {
            const el = document.getElementById(id);
            if (!el) return;
            el.classList.remove('hidden');
            el.classList.add('flex');
            setTimeout(() => {
                el.classList.add('hidden');
                el.classList.remove('flex');
            }, 1800);
        }
    </script>
@endpush
