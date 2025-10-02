@extends('layouts.admin')

@section('title', 'Manajemen Artikel - HaloBun')

@section('content')
    @php
        // Dummy data tidak lagi diperlukan
        $categories = ['Semua', ...\App\Models\Article::distinct()->pluck('category')->toArray()];
        $statuses = ['Semua', 'Published', 'Draft'];
        $trimesters = ['Semua', '1', '2', '3'];
    @endphp

    <header class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-balance">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">
                    Manajemen Artikel
                </span>
            </h1>
            <p class="mt-1 text-sm text-gray-600">Cari, filter, tambah, dan kelola artikel.</p>
        </div>
        <a href="{{ route('admin.artikel.create') }}"
            class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
            + Tambah Artikel
        </a>
    </header>

    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
        {{-- Form filter biarkan saja, script JS akan tetap bekerja --}}
        <form class="grid gap-3 md:grid-cols-4" onsubmit="return false;">
            {{-- ... form filter Anda ... --}}
        </form>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
        <table class="min-w-full text-sm">
            <thead class="text-left text-gray-600">
                <tr class="border-b border-pink-100">
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Trimester</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Diubah</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="articles-body">
                @forelse ($articles as $a)
                    <tr class="border-b border-pink-50 hover:bg-pink-50/30" data-title="{{ Str::lower($a->title) }}"
                        data-category="{{ $a->category }}" data-trimester="{{ $a->trimester }}"
                        data-status="{{ $a->status }}">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $a->title }}</td>
                        <td class="px-4 py-3">{{ $a->category }}</td>
                        <td class="px-4 py-3">{{ $a->trimester }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
              @if ($a->status === 'Published') bg-green-50 text-green-700 border border-green-200
              @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">
                                {{ $a->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $a->updated_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2 flex-wrap">

                                <a href="{{ route('article.show', $a->slug) }}" target="_blank"
                                    class="px-3 py-1 rounded-full border border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 text-xs">
                                    Lihat
                                </a>

                                <a href="{{ route('admin.artikel.edit', $a) }}"
                                    class="px-3 py-1 rounded-full border border-pink-200 text-pink-700 bg-pink-50 hover:bg-pink-100 text-xs">
                                    Edit
                                </a>

                                <form action="{{ route('admin.artikel.destroy', $a) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 text-xs">
                                        Hapus
                                    </button>
                                </form>

                                @if ($a->status === 'Draft')
                                    <form action="{{ route('admin.artikel.toggleStatus', $a) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin mempublikasikan artikel ini?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 text-xs">
                                            Publikasikan
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.artikel.toggleStatus', $a) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin mengubah artikel ini kembali menjadi draft?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100 text-xs">
                                            Jadikan Draft
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{-- Script JS Anda tidak perlu diubah --}}
    <script>
        (function() {
            // ... script filter Anda ...
        })();
    </script>
@endpush
