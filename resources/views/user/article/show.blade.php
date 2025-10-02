@extends('layouts.app')

@section('title', $article->title . ' - HaloBun')

@section('content')
    <main class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kolom Utama: Isi Artikel --}}
                <div class="lg:col-span-2">
                    <article class="prose prose-lg max-w-none">
                        {{-- Tag Kategori & Trimester --}}
                        <div class="flex items-center gap-2 flex-wrap mb-4">
                            <span
                                class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700 font-medium">{{ $article->category }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 font-medium">Trimester
                                {{ $article->trimester }}</span>
                        </div>

                        {{-- Judul Artikel --}}
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 text-balance">
                            {{ $article->title }}
                        </h1>

                        {{-- Info Tanggal --}}
                        <p class="mt-2 text-sm text-gray-500">
                            Dipublikasikan pada {{ $article->created_at->translatedFormat('d F Y') }}
                        </p>

                        {{-- Penulis --}}
                        <div class="mt-2 text-sm text-gray-600 not-prose">
                            <span class="font-semibold text-gray-800">Penulis:</span>
                            <span>{{ $article->author1 }}</span>
                            @if ($article->author2)
                                <span>, {{ $article->author2 }}</span>
                            @endif
                            @if ($article->author3)
                                <span>, {{ $article->author3 }}</span>
                            @endif
                        </div>

                        {{-- Gambar Thumbnail --}}
                        @if ($article->thumbnail)
                            <figure class="mt-8">
                                <div
                                    class="relative w-full overflow-hidden rounded-2xl bg-gray-100 aspect-[16/9] lg:aspect-[3/2] xl:aspect-[16/9]">
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                        class="absolute inset-0 h-full w-full object-cover">
                                </div>
                            </figure>
                        @endif

                        {{-- Konten Artikel --}}
                        <div class="mt-8">
                            {!! $article->content !!}
                        </div>
                    </article>
                </div>

                {{-- Sidebar: Artikel Lainnya --}}
                <aside class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6">
                        <h2 class="text-xl font-semibold text-gray-900">Artikel Terbaru</h2>
                        <div class="space-y-4">
                            @forelse($latestArticles as $latest)
                                <a href="{{ route('article.show', $latest->slug) }}" class="block group">
                                    <div class="flex items-start gap-4">
                                        @if ($latest->thumbnail)
                                            <img src="{{ asset('storage/' . $latest->thumbnail) }}"
                                                alt="{{ $latest->title }}"
                                                class="w-24 h-16 rounded-lg object-cover flex-shrink-0">
                                        @else
                                            <div class="w-24 h-16 rounded-lg bg-pink-50 flex-shrink-0"></div>
                                        @endif
                                        <div>
                                            <h3 class="font-medium text-gray-900 group-hover:text-pink-600 line-clamp-2">
                                                {{ $latest->title }}</h3>
                                            <p class="text-xs text-gray-500 mt-1">
                                                {{ $latest->created_at->translatedFormat('d M Y') }}</p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-gray-500">Tidak ada artikel lain.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </main>
@endsection
