@extends('layouts.app')

@section('content')
    <section aria-labelledby="hero-video" class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="flex flex-col gap-3">
                <h1 class="text-3xl sm:text-4xl font-semibold text-gray-900 text-pretty">Fasilitas Kesehatan</h1>
                <p class="mt-2 text-gray-600">
                    Temukan Puskesmas, Rumah Sakit, atau Klinik. Gunakan filter atau cari berdasarkan lokasi Anda saat ini.
                </p>
            </div>
        </div>
    </section>
    {{-- Notifikasi Status untuk Aksi Lokasi --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-0">
        <div id="status-notification" class="hidden mb-6 rounded-xl border px-4 py-3 text-sm"></div>
    </div>

    {{-- Kontrol Filter --}}
    <section aria-labelledby="toolbar-fasilitas" class="mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 sm:p-5">

                {{-- Mulai Form Filter --}}
                <form action="{{ route('fasilitas') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                    {{-- Kolom Pencarian --}}
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-800 mb-1">Cari Nama atau
                            Kota</label>
                        <input id="search" name="search" type="search" placeholder="Contoh: RS Bunda, Jakarta..."
                            value="{{ request('search') }}"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                    </div>

                    {{-- Kolom Tipe Faskes --}}
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-800 mb-1">Tipe Faskes</label>
                        <select id="type" name="type"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                            <option value="">Semua Tipe</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->value }}" @selected(request('type') == $type->value)>
                                    {{ Str::ucfirst(str_replace('_', ' ', $type->value)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-end gap-2 md:col-span-1">
                        <button type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Cari
                        </button>
                        <a href="{{ route('fasilitas') }}"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Reset
                        </a>
                    </div>
                </form>
                {{-- Akhir Form Filter --}}

                {{-- Pembatas dan Tombol Lokasi --}}
                <div class="relative flex py-4 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-sm">ATAU</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                {{-- Tombol Lokasi --}}
                <button id="btnUseMyLocation" type="button"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:shadow-md hover:scale-[1.02] transition-transform duration-150">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12 8a4 4 0 100 8 4 4 0 000-8zm9 3h-1.07A8.003 8.003 0 0013 4.07V3a1 1 0 10-2 0v1.07A8.003 8.003 0 004.07 11H3a1 1 0 100 2h1.07A8.003 8.003 0 0011 19.93V21a1 1 0 102 0v-1.07A8.003 8.003 0 0019.93 13H21a1 1 0 100-2zM12 18a6 6 0 110-12 6 6 0 010 12z" />
                    </svg>
                    Cari Berdasarkan Lokasi Terkini
                </button>

            </div>
        </div>
    </section>


    {{-- Daftar Hasil --}}
    <section aria-labelledby="list-fasilitas" class="mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($facilities as $f)
                    <article
                        class="facility-card rounded-xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden flex flex-col">
                        @if ($f->map_embed_url)
                            <div class="aspect-video w-full">{!! $f->map_embed_url !!}</div>
                        @endif

                        <div class="p-4 sm:p-5 flex-grow flex flex-col">
                            @php
                                $mapQuery = urlencode($f->name . ', ' . $f->address);
                                $mapUrl = "https://maps.google.com/?q={$mapQuery}";
                            @endphp

                            {{-- Nama Fasilitas --}}
                            <h3 class="text-lg font-semibold text-gray-900 hover:text-pink-600 transition">
                                <a href="{{ $mapUrl }}" target="_blank" rel="noopener">{{ $f->name }}</a>
                            </h3>
                            <div class="mt-1 text-sm text-gray-600">{{ $f->address }}</div>

                            {{-- Detail Fasilitas --}}
                            <div class="mt-auto pt-3 flex flex-col gap-2 text-sm">

                                {{-- Tipe Fasilitas --}}
                                <span class="inline-flex items-center gap-1.5 font-medium text-pink-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                    </svg>
                                    {{ Str::ucfirst(str_replace('_', ' ', $f->type->value)) }}
                                </span>

                                {{-- Jarak (opsional) --}}
                                @if (isset($f->distance))
                                    <span class="inline-flex items-center gap-1.5 text-gray-700 font-semibold">
                                        <svg class="w-4 h-4 text-pink-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ number_format($f->distance, 1) }} km dari Anda
                                    </span>
                                @endif

                                {{-- Telepon (opsional) --}}
                                @if ($f->phone)
                                    <span class="inline-flex items-center gap-1.5 text-gray-700">
                                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684L10.7 8.177a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <a href="tel:{{ $f->phone }}"
                                            class="hover:text-pink-600">{{ $f->phone }}</a>
                                    </span>
                                @endif

                                {{-- Jam Operasional (opsional) --}}
                                @if ($f->hours)
                                    <span class="inline-flex items-center gap-1.5 text-gray-700">
                                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $f->hours }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="sm:col-span-2 lg:col-span-3 text-center py-10">
                        <p class="text-sm text-gray-600">Tidak ditemukan fasilitas dengan kriteria saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    {{-- Pagination Links --}}
    <div class="mt-8">{{ $facilities->appends(request()->query())->links() }}</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnMyLocation = document.getElementById('btnUseMyLocation');
            const statusEl = document.getElementById('status-notification');

            function showStatus(message, type = 'info') {
                statusEl.textContent = message;
                statusEl.className = 'mb-6 rounded-xl border px-4 py-3 text-sm'; // Reset
                if (type === 'info') statusEl.classList.add('border-blue-200', 'bg-blue-50', 'text-blue-800');
                else if (type === 'success') statusEl.classList.add('border-green-200', 'bg-green-50',
                    'text-green-800');
                else if (type === 'error') statusEl.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
                statusEl.style.display = 'block';
            }

            btnMyLocation.addEventListener('click', function() {
                if (!navigator.geolocation) {
                    showStatus("Browser Anda tidak mendukung Geolocation.", 'error');
                    return;
                }

                showStatus('Meminta izin dan mengambil lokasi Anda...', 'info');
                btnMyLocation.disabled = true; // Nonaktifkan tombol saat proses berjalan
                btnMyLocation.classList.add('opacity-75', 'cursor-not-allowed');

                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const {
                            latitude,
                            longitude
                        } = position.coords;
                        // Redirect ke halaman fasilitas dengan parameter lat & lng
                        const url = `{{ route('fasilitas') }}?lat=${latitude}&lng=${longitude}`;
                        window.location.href = url;
                    },
                    (error) => {
                        let errorMessage;
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage =
                                    "Anda menolak permintaan lokasi. Fitur ini tidak dapat digunakan.";
                                break;
                            default:
                                errorMessage =
                                    "Gagal mendapatkan lokasi Anda. Silakan coba lagi atau gunakan filter manual.";
                                break;
                        }
                        showStatus(errorMessage, 'error');
                        btnMyLocation.disabled = false;
                        btnMyLocation.classList.remove('opacity-75', 'cursor-not-allowed');
                    }
                );
            });
        });
    </script>
@endpush
