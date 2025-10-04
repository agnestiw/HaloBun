{{-- resources/views/user.video.blade.php --}}
@extends('layouts.app')

@section('content')
    <section aria-labelledby="hero-video" class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="flex flex-col gap-3">
                <h1 id="hero-video" class="text-3xl sm:text-4xl font-semibold text-gray-900 text-balance">
                    Video Edukasi Kehamilan
                </h1>
                <p class="text-gray-600 leading-relaxed">
                    Tonton video edukasi terpercaya. Gunakan pencarian dan filter untuk menemukan video sesuai trimester dan
                    topik.
                </p>
            </div>
        </div>
    </section>

    <section aria-labelledby="toolbar-video" class="mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 sm:p-5">

                {{-- Mulai Form Filter --}}
                <form action="{{ route('video') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">

                    {{-- Kolom Pencarian --}}
                    <div class="md:col-span-2">
                        <label for="videoSearch" class="block text-sm font-medium text-gray-800 mb-1">Cari Video</label>
                        <input type="search" name="search" id="videoSearch"
                            placeholder="Cari video (misal: napas, nutrisi, tidur)..." value="{{ request('search') }}"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                    </div>

                    {{-- Kolom Topik --}}
                    <div>
                        <label for="filter-topic" class="block text-sm font-medium text-gray-800 mb-1">Topik</label>
                        <select name="topic" id="filter-topic"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                            <option value="">Semua Topik</option>
                            @foreach ($topics as $tp)
                                <option value="{{ $tp->value }}" @selected(request('topic') == $tp->value)>
                                    {{ $tp->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kolom Trimester --}}
                    <div>
                        <label for="filter-trimester" class="block text-sm font-medium text-gray-800 mb-1">Trimester</label>
                        <select name="trimester" id="filter-trimester"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                            <option value="">Semua Trimester</option>
                            @foreach ($trimesters as $tri)
                                <option value="{{ $tri }}" @selected(request('trimester') == $tri)>
                                    Trimester {{ $tri }}
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
                        <a href="{{ route('video') }}"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Reset
                        </a>
                    </div>
                </form>
                {{-- Akhir Form Filter --}}

            </div>
        </div>
    </section>

    <section aria-labelledby="daftar-video" class="mt-8 sm:mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="daftar-video" class="text-xl font-semibold text-gray-900">Semua Video</h2>

            <div id="videosGrid" class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($videos as $v)
                    @php
                        $ttl = $v->title ?? 'Video Edukasi';
                        // Tentukan sumber thumbnail (dari database atau placeholder)
                        $thumbnailSrc = $v->thumbnail ?? asset('img/placeholder-video.svg'); // Siapkan gambar placeholder jika perlu
                    @endphp

                    <article
                        class="video-card group rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                        <a href="{{ $v->url ?? '#' }}" target="_blank" rel="noopener"
                            class="relative block aspect-[16/9] bg-pink-50">
                            <img class="w-full h-full object-cover" src="{{ $thumbnailSrc }}"
                                alt="Thumbnail {{ $ttl }}" />

                            {{-- Ikon Play di tengah untuk menandakan video --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity">
                                <div
                                    class="w-14 h-14 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path d="M8 5v14l11-7-11-7z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Menampilkan durasi jika ada --}}
                            @if (!empty($v->duration))
                                <span class="absolute bottom-2 right-2 text-xs bg-black/60 text-white px-2 py-0.5 rounded">
                                    {{ $v->duration }}
                                </span>
                            @endif
                        </a>

                        <div class="p-4">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700">Trimester
                                    {{ $v->trimester }}</span>
                                <span
                                    class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">{{ $v->topic->value }}</span>
                                <span
                                    class="text-xs px-2 py-0.5 rounded-full 
                                    @if ($v->platform->value == 'YouTube') bg-red-100 text-red-700 @else bg-blue-100 text-blue-700 @endif">
                                    {{ $v->platform->value }}
                                </span>
                            </div>

                            {{-- JUDUL YANG BISA DIKLIK --}}
                            <h3 class="mt-2 font-medium text-gray-900 group-hover:text-pink-600 line-clamp-2">
                                <a href="{{ $v->url ?? '#' }}" target="_blank" rel="noopener">
                                    {{ $ttl }}
                                </a>
                            </h3>

                            <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
                                @if ($v->author)
                                    <span class="font-medium text-gray-700 truncate">{{ $v->author }}</span>
                                    {{-- <span aria-hidden="true">•</span> --}}
                                @endif
                                {{-- <span>{{ $v->created_at->format('d M Y') }}</span> --}}
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="text-sm text-gray-600 sm:col-span-3 text-center py-8">
                        Tidak ada video yang cocok dengan pencarian Anda.
                    </p>
                @endforelse
            </div>


            <div class="mt-8">
                {{ $videos->appends(request()->query())->links() }}
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    @if ($videos->contains('platform', \App\Enums\VideoPlatform::TIKTOK))
        <script async src="https://www.tiktok.com/embed.js"></script>
    @endif
@endpush
