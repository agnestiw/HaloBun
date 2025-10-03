@extends('layouts.app')

@section('content')
    {{-- GANTI SELURUH SECTION FILTER LAMA ANDA DENGAN INI --}}
    <section aria-labelledby="filter" class="mt-10 sm:mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 sm:p-5">

                {{-- Mulai Form Filter --}}
                <form action="{{ route('article') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">

                    {{-- Kolom Pencarian --}}
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-800 mb-1">Cari
                            Artikel</label>
                        <input type="search" name="search" id="search" placeholder="Contoh: Nutrisi, Persalinan..."
                            value="{{ request('search') }}"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                    </div>

                    {{-- Kolom Kategori --}}
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-800 mb-1">Kategori</label>
                        <select name="category" id="category"
                            class="w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->value }}" @selected(request('category') == $cat->value)>
                                    {{ $cat->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kolom Trimester --}}
                    <div>
                        <label for="trimester" class="block text-sm font-medium text-gray-800 mb-1">Trimester</label>
                        <select name="trimester" id="trimester"
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
                    <div class="flex items-end gap-2">
                        <button type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Cari
                        </button>
                        <a href="{{ route('article') }}"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Reset
                        </a>
                    </div>
                </form>
                {{-- Akhir Form Filter --}}

            </div>
        </div>
    </section>
    {{-- Daftar Artikel --}}
    <section aria-labelledby="daftar-artikel" class="mt-10 sm:mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 id="daftar-artikel" class="text-xl font-semibold text-gray-900">Semua Artikel</h2>
            </div>

            <div id="articlesGrid" class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($articles as $a)
                    {{-- Bungkus semuanya dengan tag <a> dan pindahkan class 'group' ke tag <a> --}}
                    <a href="{{ route('article.show', $a->slug) }}"
                        class="group block rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
                        <article class="article-card" data-trimester="{{ $a->trimester }}"
                            data-category="{{ $a->category->value }}">
                            @if ($a->thumbnail)
                                <div class="aspect-[16/9] bg-pink-50">
                                    <img src="{{ asset('storage/' . $a->thumbnail) }}" alt="Gambar {{ $a->title }}"
                                        class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="p-4">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700">
                                        {{ $a->category->value }}
                                    </span>
                                    <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                        Trimester {{ $a->trimester }}
                                    </span>
                                </div>
                                {{-- Hapus tag <a> dari sini karena sudah dibungkus di luar --}}
                                <h3 class="mt-2 font-medium text-gray-900 group-hover:text-pink-600 line-clamp-2">
                                    {{ $a->title }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                    {{ \Illuminate\Support\Str::words(strip_tags($a->content), 20, '...') }}
                                </p>
                                <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
                                    @if ($a->published_at)
                                        <span>{{ $a->published_at->format('d M Y') }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </a>
                @empty
                    <p class="text-sm text-gray-600 sm:col-span-2 lg:col-span-3 text-center py-8">
                        Tidak ada artikel yang cocok dengan pencarian Anda.
                    </p>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $articles->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Script JS Anda tidak perlu diubah --}}
    <script>
        (function() {
            // ... script filter Anda ...
        })();
    </script>
@endpush
