{{-- resources/views/admin/video.blade.php --}}
@extends('layouts.admin')
{{-- 
@section('title', 'Manajemen Video - HaloBun') --}}

@section('content')
    <header class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-balance">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen
                    Video</span>
            </h1>
            <p class="mt-1 text-sm text-gray-600">Kelola konten video edukasi untuk HaloBun.</p>
        </div>
        <a href="{{ route('admin.video.create') }}"
            class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
            + Tambah Video
        </a>
    </header>

    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
        {{-- Form ini sekarang akan mengirim data ke URL dengan method GET --}}
        <form action="{{ route('admin.video.index') }}" method="GET" class="grid gap-3 md:grid-cols-6 items-end">

            {{-- Input Pencarian --}}
            <div class="md:col-span-2">
                <label for="search-videos" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                <input id="search-videos" name="search" type="search" placeholder="Cari judul atau topik..."
                    value="{{ request('search') }}"
                    class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300" />
            </div>

            {{-- Filter Platform --}}
            <div>
                <label for="filter-platform" class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
                <select id="filter-platform" name="platform"
                    class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua</option>
                    @foreach ($platforms as $p)
                        <option value="{{ $p->value }}" @selected(request('platform') == $p->value)>{{ $p->value }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Topik --}}
            <div>
                <label for="filter-topic" class="block text-sm font-medium text-gray-700 mb-1">Topik</label>
                <select id="filter-topic" name="topic"
                    class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua</option>
                    @foreach ($topics as $t)
                        <option value="{{ $t->value }}" @selected(request('topic') == $t->value)>{{ $t->value }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Trimester --}}
            <div>
                <label for="filter-trimester" class="block text-sm font-medium text-gray-700 mb-1">Trimester</label>
                <select id="filter-trimester" name="trimester"
                    class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua</option>
                    @foreach ($trimesters as $t)
                        <option value="{{ $t }}" @selected(request('trimester') == $t)>{{ $t }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Status --}}
            <div>
                <label for="filter-status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="filter-status" name="status"
                    class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua</option>
                    @foreach ($statuses as $s)
                        <option value="{{ $s }}" @selected(request('status') == $s)>{{ $s }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol Filter dan Reset --}}
            <div class="md:col-span-1 flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
                    Filter
                </button>
                <a href="{{ route('admin.video.index') }}"
                    class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</a>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
        <table class="min-w-full text-sm">
            <thead class="text-left text-gray-600">
                <tr class="border-b border-pink-100">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Platform</th>
                    <th class="px-4 py-3">Topik</th>
                    <th class="px-4 py-3">Trimester</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>

            </thead>
            <tbody id="videos-body">
                @forelse ($videos as $v)
                    <tr class="border-b border-pink-50 hover:bg-pink-50/30">
                        <td class="px-4 py-3 text-gray-600">{{ $v->id }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $v->title }}</td>
                        <td class="px-4 py-3">{{ $v->platform->value }}</td>
                        <td class="px-4 py-3">{{ $v->topic->value }}</td>
                        <td class="px-4 py-3">{{ $v->trimester }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
              @if ($v->status === 'Published') bg-green-50 text-green-700 border border-green-200
              @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">
                                {{ $v->status }}
                            </span>
                        </td>
                        {{-- <td class="px-4 py-3 text-gray-600">
            {{ $v->published_at?->format('Y-m-d') ?? 'Belum' }}
          </td> --}}
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2 flex-wrap">
                                <a href="{{ $v->url }}" target="_blank"
                                    class="px-3 py-1 rounded-full border border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 text-xs">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.video.edit', $v) }}"
                                    class="px-3 py-1 rounded-full border border-pink-200 text-pink-700 bg-pink-50 hover:bg-pink-100 text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('admin.video.destroy', $v) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 text-xs">
                                        Hapus
                                    </button>
                                </form>
                                @if ($v->status === 'Draft')
                                    <form action="{{ route('admin.video.toggleStatus', $v) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin mempublikasikan video ini?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 text-xs">
                                            Publikasikan
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.video.toggleStatus', $v) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin mengubah video ini kembali menjadi draft?');">
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
                        <td colspan="7" class="text-center p-4 text-gray-500">Belum ada video.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $videos->appends(request()->query())->links() }}
    </div>
@endsection
