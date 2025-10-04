@extends('layouts.app')

@push('styles')
    <style>
        .soft-card {
            background: linear-gradient(180deg, rgba(255, 240, 245, 0.6), rgba(255, 255, 255, 0.9));
        }
    </style>
@endpush

@section('content')
    <section aria-labelledby="hero" class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h1 id="hero" class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-900 text-balance">
                        Selamat datang di
                        <span
                            class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">HaloBun</span>
                    </h1>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        Informasi kesehatan terpercaya untuk ibu hamil: panduan mingguan, artikel, video edukasi, dan
                        jawaban FAQ—
                        semua dalam satu tempat, mudah dinavigasi, dan ramah untuk semua perangkat.
                    </p>
                    <div class="mt-6 flex flex-col sm:flex-row gap-3">
                        <a href="{{ url('/pregnancy-track') }}"
                            class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                            Mulai Pregnancy Track
                        </a>
                        <a href="{{ url('/artikel') }}"
                            class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition">
                            Baca Artikel
                        </a>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div>
                        <img src="{{ asset('img/hero.svg') }}" alt="ibu hamil memegang perut"
                            class="w-full h-auto max-w-xs sm:max-w-sm lg:max-w-md">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Notifikasi / Info Penting: Tips Mingguan --}}
    <section aria-labelledby="weekly-tip" class="mt-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="weeklyTipBanner" class="relative overflow-hidden rounded-xl border border-pink-200 bg-pink-50/70">
                {{-- Notifikasi ramah & bisa di-dismiss --}}
                <div class="p-4 sm:p-5 flex items-start gap-3">
                    <div class="mt-0.5 shrink-0">
                        <svg class="w-6 h-6 text-pink-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4m0 4h.01" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 id="weekly-tip" class="font-semibold text-gray-900">Tips Mingguan Kehamilan</h3>
                        <p class="mt-1 text-sm text-gray-700">
                            {{ $weeklyTip ?? 'Minum air putih yang cukup dan konsumsi camilan sehat kaya serat untuk membantu pencernaan, Bun.' }}
                        </p>
                    </div>
                    <button type="button" aria-label="Tutup notifikasi" onclick="dismissTipBanner()"
                        class="p-2 rounded-full text-pink-600 hover:bg-pink-100 transition">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M6.225 4.811L4.811 6.225 10.586 12l-5.775 5.775 1.414 1.414L12 13.414l5.775 5.775 1.414-1.414L13.414 12l5.775-5.775-1.414-1.414L12 10.586 6.225 4.811z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Menu navigasi ke halaman utama --}}
    <section aria-labelledby="main-nav" class="mt-10 sm:mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="main-nav" class="text-xl font-semibold text-gray-900">Jelajah HaloBun</h2>
            <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                @php
                    $menus = [
                        ['label' => 'Artikel', 'url' => url('/artikel'), 'icon' => 'M4 6h16M4 12h16M4 18h16'],
                        ['label' => 'Video', 'url' => url('/video'), 'icon' => 'M8 5v14l11-7-11-7z'],
                        [
                            'label' => 'Fasilitas',
                            'url' => url('/fasilitas'),
                            'icon' => 'M4 4h16v6H4zM4 14h7v6H4zM13 14h7v6h-7z',
                        ],
                        [
                            'label' => 'Konsultasi',
                            'url' => url('/konsultasi'),
                            'icon' => 'M12 20l9-5-9-5-9 5 9 5z M12 12V4',
                        ],
                        [
                            'label' => 'FAQ',
                            'url' => url('/faq'),
                            'icon' => 'M8 10h8M8 14h5 M12 19a7 7 0 100-14 7 7 0 000 14z',
                        ],
                        ['label' => 'Kontak', 'url' => url('/contact'), 'icon' => 'M21 8l-9 6-9-6 M3 19h18'],
                    ];
                @endphp
                @foreach ($menus as $m)
                    <a href="{{ $m['url'] }}"
                        class="group rounded-xl border border-pink-100 bg-white hover:bg-pink-50/50 transition p-4 flex flex-col items-center text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center group-hover:scale-105 transition">
                            <svg class="w-5 h-5 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="{{ $m['icon'] }}" />
                            </svg>
                        </div>
                        <span class="mt-2 text-sm font-medium text-gray-800">{{ $m['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Ringkasan informasi terbaru --}}
    <section aria-labelledby="latest" class="mt-12 sm:mt-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 id="latest" class="text-xl font-semibold text-gray-900">Rekomendasi untuk Ibu</h2>
            </div>

            {{-- Artikel Terbaru (Cards) --}}
            <div class="mt-6">
                <div class="flex items-center gap-2 justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-pink-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M19 2H8a2 2 0 00-2 2v14l4-2 4 2 4-2 4 2V4a2 2 0 00-2-2z" />
                            </svg>
                        </span>
                        <h3 class="font-semibold text-gray-900">Artikel Terbaru</h3>
                    </div>
                    <a href="{{ url('/artikel') }}"
                        class="hidden sm:inline-flex items-center text-sm text-pink-600 hover:underline">
                        Lihat semua Artikel
                    </a>
                </div>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse(($latestArticles ?? []) as $a)
                        <a href="{{ route('article.show', $a->slug) }}"
                            aria-label="Baca artikel: {{ $a->title ?? 'Artikel' }}"
                            class="group rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                            @if (!empty($a->thumbnail))
                                {{-- Gunakan -> untuk objek --}}
                                <div class="aspect-[16/9] bg-pink-50">
                                    <img src="{{ asset('storage/' . $a->thumbnail) }}"
                                        alt="Gambar {{ $a->title ?? 'Artikel' }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="p-4">
                                <h4 class="line-clamp-2 font-medium text-gray-900 group-hover:text-pink-600">
                                    {{ $a->title ?? 'Judul artikel' }} {{-- Gunakan -> untuk objek --}}
                                </h4>
                                <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                    {{ \Illuminate\Support\Str::words(strip_tags($a->content), 20, '...') }}
                                    {{-- Ringkasan otomatis --}}
                                </p>
                                <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
                                    {{-- Tampilkan penulis utama --}}
                                    <span class="font-medium text-gray-700 truncate">{{ $a->author1 }}</span>
                                    <span aria-hidden="true">•</span>
                                    {{-- Tampilkan tanggal publikasi --}}
                                    @if ($a->published_at)
                                        <span>{{ $a->published_at->format('d M Y') }}</span>
                                    @endif
                                    {{-- Hapus read_time jika tidak ada lagi di database --}}
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-gray-600">Belum ada artikel terbaru saat ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- Video Terbaru (Cards) --}}
            <div class="mt-10">
                <div class="flex items-center gap-2 justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-pink-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M8 5v14l11-7-11-7z" />
                            </svg>
                        </span>
                        <h3 class="font-semibold text-gray-900">Video Terbaru</h3>
                    </div>
                    <a href="{{ url('/fasilitas') }}"
                        class="hidden sm:inline-flex items-center text-sm text-pink-600 hover:underline">
                        Lihat semua video
                    </a>
                </div>
                {{-- Kode Baru dengan Data dari Database --}}
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($latestVideos as $v)
                        <a href="{{ $v->url }}" target="_blank" rel="noopener"
                            aria-label="Tonton video: {{ $v->title }}"
                            class="group rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">

                            <div class="relative aspect-video bg-pink-50">
                                @if ($v->thumbnail)
                                    <img src="{{ $v->thumbnail }}" alt="Thumbnail {{ $v->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    {{-- Placeholder jika tidak ada thumbnail --}}
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg class="w-10 h-10 text-pink-400" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true">
                                            <path d="M8 5v14l11-7-11-7z" />
                                        </svg>
                                    </div>
                                @endif

                                @if ($v->duration)
                                    <span
                                        class="absolute bottom-2 right-2 text-xs bg-black/60 text-white px-2 py-0.5 rounded">
                                        {{ $v->duration }}
                                    </span>
                                @endif
                            </div>

                            <div class="p-4">
                                {{-- Menampilkan judul video --}}
                                <div class="line-clamp-2 text-sm font-medium text-gray-900 group-hover:text-pink-600">
                                    {{ $v->title }}
                                </div>
                                {{-- Menampilkan platform video --}}
                                <div
                                    class="mt-2 text-xs font-medium 
                    @if ($v->platform->value == 'YouTube') text-red-600 @else text-blue-600 @endif">
                                    {{ $v->platform->value }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-gray-600">Belum ada video terbaru saat ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- FAQ Terbaru (Cards + details) --}}
            <div class="mt-10">
                <div class="flex items-center gap-2 justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-pink-600" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 15h-2v-2h2v2zm1.07-7.75l-.9.92A3.5 3.5 0 0011 14h-2v-.5a5.5 5.5 0 011.61-3.9l1.2-1.2a1.5 1.5 0 10-2.12-2.12l-.69.7-1.42-1.42.7-.7a3.5 3.5 0 014.95 4.95z" />
                            </svg>
                        </span>
                        <h3 class="font-semibold text-gray-900">FAQ Terbaru</h3>
                    </div>
                    <a href="{{ url('/fasilitas') }}"
                        class="hidden sm:inline-flex items-center text-sm text-pink-600 hover:underline">
                        Lihat semua FAQ
                    </a>
                </div>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse(($latestFaqs ?? []) as $f)
                        <div class="rounded-2xl border border-pink-100 bg-white p-4">
                            <details class="group">
                                <summary class="list-none cursor-pointer flex items-center justify-between gap-3">
                                    <span class="font-medium text-gray-900 line-clamp-2">
                                        {{ $f['question'] ?? 'Pertanyaan umum' }}
                                    </span>
                                    <svg class="w-4 h-4 text-pink-600 group-open:rotate-180 transition"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M7 10l5 5 5-5z" />
                                    </svg>
                                </summary>
                                <div class="mt-2 text-sm text-gray-700 leading-relaxed">
                                    {!! $f['answer'] ?? 'Jawaban singkat untuk pertanyaan umum.' !!}
                                </div>
                            </details>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">Belum ada FAQ terbaru saat ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- Fasilitas Terdekat (Cards) --}}
            <div class="mt-10">
                <div class="flex items-center gap-2 justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="#E60076" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11.5" cy="8.5" r="5.5" />
                                <path d="M11.5 14v7" />
                            </svg>
                        </span>
                        <h3 class="font-semibold text-gray-900">Fasilitas Terdekat</h3>
                    </div>
                    <a href="{{ url('/fasilitas') }}"
                        class="hidden sm:inline-flex items-center text-sm text-pink-600 hover:underline">
                        Lihat semua Lokasi Fasilitas
                    </a>
                </div>
                @php
                    $facList = $latestFacilities ?? ($facilities ?? []);
                @endphp
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($facList as $f)
                        <div
                            class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                            <div class="p-4 flex items-start gap-3">
                                <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-pink-500" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center flex-wrap gap-2">
                                        <h3 class="font-semibold text-gray-900 truncate">
                                            {{ $f['name'] ?? 'Nama Fasilitas' }}
                                        </h3>
                                        @if (!empty($f['type']))
                                            <span class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700">
                                                {{ $f['type'] }}
                                            </span>
                                        @endif
                                        @if (isset($f['open_now']))
                                            <span
                                                class="text-xs px-2 py-0.5 rounded-full {{ $f['open_now'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                                {{ $f['open_now'] ? 'Buka' : 'Tutup' }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="mt-1 text-sm text-gray-700 line-clamp-2">
                                        {{ $f['address'] ?? 'Alamat fasilitas kesehatan' }}
                                    </div>
                                    <div class="mt-1 text-xs text-gray-500">
                                        @if (!empty($f['distance_km']))
                                            ± {{ number_format($f['distance_km'], 1) }} km
                                        @endif
                                    </div>

                                    <div class="mt-3 flex items-center gap-3">
                                        @if (!empty($f['url']))
                                            <a href="{{ $f['url'] }}"
                                                class="text-sm text-pink-600 hover:underline">Detail</a>
                                        @endif
                                        @if (!empty($f['map_url']))
                                            <a href="{{ $f['map_url'] }}"
                                                class="text-sm text-pink-600 hover:underline">Lihat
                                                Peta</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">Belum ada data fasilitas kesehatan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- CTA tambahan --}}
    <section aria-labelledby="cta" class="mt-12 sm:mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="rounded-2xl border border-pink-100 bg-gradient-to-r from-pink-50 to-purple-50 p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div>
                    <h2 id="cta" class="text-lg sm:text-xl font-semibold text-gray-900">Butuh saran cepat?</h2>
                    <p class="mt-1 text-gray-700 text-sm">Kunjungi halaman Konsultasi untuk terhubung dengan tenaga
                        kesehatan.</p>
                </div>
                <a href="{{ url('/konsultasi') }}"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-white text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition font-medium">
                    Buka Konsultasi
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Interaksi kecil: dismiss banner tips --}}
    <script>
        function dismissTipBanner() {
            const el = document.getElementById('weeklyTipBanner');
            if (el) el.style.display = 'none';
        }
    </script>
@endpush
