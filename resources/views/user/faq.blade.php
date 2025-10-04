@extends('layouts.app')

@section('content')

    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="flex flex-col gap-3">
                <h1 class="text-3xl sm:text-4xl font-semibold text-gray-900 text-pretty">
                    Pertanyaan Umum (<span
                        class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">FAQ</span>)
                    Kehamilan
                </h1>
                <p class="mt-2 text-pretty text-gray-600">Temukan jawaban cepat. Gunakan pencarian dan kategori untuk
                    menyaring topik.</p>
            </div>

            {{-- Form Filter --}}
            <div class="mt-8 space-y-4">
                <form action="{{ route('faq') }}" method="GET" class="grid gap-4 md:grid-cols-3">
                    <div class="md:col-span-2">
                        <label for="search" class="sr-only">Cari FAQ</label>
                        <div class="flex items-center gap-2 rounded-xl border border-pink-100 bg-white px-3 py-2 shadow-sm">
                            <svg class="h-5 w-5 text-pink-500" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input id="search" name="search" type="search"
                                placeholder="Cari kata kunci (mis. mual, kontraksi)..." value="{{ request('search') }}"
                                class="w-full bg-transparent outline-none placeholder:text-gray-400 text-gray-900"
                                autocomplete="off" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">Cari</button>
                        <a href="{{ route('faq') }}"
                            class="w-full inline-flex justify-center items-center px-4 py-2 rounded-full text-sm font-medium text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">Reset</a>
                    </div>
                </form>

                {{-- Filter Kategori --}}
                <div class="mt-4 flex flex-wrap gap-2" role="group">
                    <a href="{{ route('faq', ['search' => request('search')]) }}"
                        class="inline-flex items-center rounded-full border px-3 py-1.5 text-sm transition {{ !request('category') ? 'border-pink-300 bg-pink-50 text-pink-800' : 'border-pink-100 bg-white text-gray-700 hover:bg-pink-50' }}">
                        Semua
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('faq', ['category' => $cat->value, 'search' => request('search')]) }}"
                            class="inline-flex items-center rounded-full border px-3 py-1.5 text-sm transition {{ request('category') == $cat->value ? 'border-pink-300 bg-pink-50 text-pink-800' : 'border-pink-100 bg-white text-gray-700 hover:bg-pink-50' }}">
                            {{ $cat->value }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Daftar FAQ --}}
            <div id="faqList" class="mt-8 space-y-4">
                @forelse ($faqs as $idx => $faq)
                    <details id="faq-{{ $faq->id }}"
                        class="faq-card group rounded-xl border border-pink-100 bg-white p-0 shadow-sm"
                        open="{{ $idx < 2 ? true : false }}">
                        <summary
                            class="flex cursor-pointer list-none items-start justify-between gap-3 px-4 py-3 md:px-5 md:py-4">
                            <div class="flex-1">
                                <span
                                    class="inline-block rounded-full bg-pink-50 px-2 py-0.5 text-xs font-medium text-pink-700">{{ $faq->category->value }}</span>
                                <h3 class="mt-1 text-base md:text-lg font-medium text-gray-900">{{ $faq->question }}</h3>
                            </div>
                            <svg class="mt-1 h-5 w-5 shrink-0 text-pink-600 group-open:rotate-180 transition-transform"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </summary>
                        <div class="px-4 pb-4 md:px-5 md:pb-5 border-t border-pink-100">
                            <p class="mt-3 text-gray-700 leading-relaxed">{{ $faq->answer }}</p>
                            @if ($faq->tags)
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach (explode(',', $faq->tags) as $tag)
                                        <span
                                            class="rounded-full bg-gray-100 text-gray-700 px-2.5 py-1 text-xs">#{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </details>
                @empty
                    <div class="text-center py-10">
                        <p class="text-gray-600">Tidak ada FAQ yang cocok dengan kriteria Anda.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Hapus semua script JS lama untuk filter --}}
@endpush
