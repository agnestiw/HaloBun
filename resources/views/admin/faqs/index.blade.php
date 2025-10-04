@extends('layouts.admin')
@section('title', 'Manajemen FAQ - HaloBun')
@section('content')

    <div x-data="{
        modalOpen: false,
        modalQuestion: '',
        modalAnswer: ''
    }">
        <header class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold"><span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen
                        FAQ</span>
                </h1>
                <p class="mt-1 text-sm text-gray-600">Kelola pertanyaan umum tentang kehamilan.</p>
            </div>
            <a href="{{ route('admin.faq.create') }}"
                class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">+
                Tambah FAQ</a>
        </header>

        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
        @endif

        <div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
            <form action="{{ route('admin.faq.index') }}" method="GET" class="grid gap-3 md:grid-cols-5 items-end">
                <div class="md:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <input id="search" name="search" type="search" placeholder="Cari pertanyaan..."
                        value="{{ request('search') }}"
                        class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm" />
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category" name="category"
                        class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->value }}" @selected(request('category') == $c->value)>{{ $c->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status"
                        class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm">
                        <option value="">Semua Status</option>
                        @foreach ($statuses as $s)
                            <option value="{{ $s }}" @selected(request('status') == $s)>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <button type="submit"
                        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow">Filter</button>
                    <a href="{{ route('admin.faq.index') }}"
                        class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</a>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
            <table class="min-w-full text-sm">
                <thead class="text-left text-gray-600">
                    <tr class="border-b border-pink-100">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Pertanyaan</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Diubah</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faqs as $f)
                        <tr class="border-b border-pink-50 hover:bg-pink-50/30">
                            <td class="px-4 py-3 text-gray-600">{{ $f->id }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ Str::limit($f->question, 60) }}</td>
                            <td class="px-4 py-3">{{ $f->category->value }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center rounded-full px-2 py-0.5 text-xs @if ($f->status === 'Published') bg-green-50 text-green-700 border border-green-200 @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">{{ $f->status }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $f->updated_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2 items-center flex-wrap">
                                    <button type="button"
                                        @click="modalOpen = true; modalQuestion = '{{ e($f->question) }}'; modalAnswer = `{!! e(nl2br($f->answer)) !!}`"
                                        class="px-3 py-1 rounded-full border border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 text-xs">
                                        Lihat
                                    </button>
                                    <a href="{{ route('admin.faq.edit', $f) }}"
                                        class="px-3 py-1 rounded-full border border-pink-200 text-pink-700 hover:bg-pink-50 text-xs">Edit</a>
                                    <form action="{{ route('admin.faq.destroy', $f) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus FAQ ini?');">@csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 text-xs">Hapus</button>
                                    </form>
                                    @if ($f->status === 'Draft')
                                        <form action="{{ route('admin.faq.toggleStatus', $f) }}" method="POST"> @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 text-xs">Publikasikan</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.faq.toggleStatus', $f) }}" method="POST"> @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100 text-xs">Jadikan
                                                Draft</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">Tidak ada data FAQ.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $faqs->appends(request()->query())->links() }}</div>
        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-50" style="display: none;"
            {{-- Mencegah FOUC (flash of unstyled content) --}}>
            <div @click.outside="modalOpen = false" x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-6">
                <div class="flex items-center justify-between pb-3 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Detail FAQ</h3>
                    <button @click="modalOpen = false" class="p-1 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4 space-y-4">
                    <div>
                        <h4 class="font-semibold text-gray-800">Pertanyaan:</h4>
                        <p class="mt-1 text-gray-700" x-text="modalQuestion"></p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Jawaban:</h4>
                        <div class="mt-1 text-gray-700 leading-relaxed prose max-w-none" x-html="modalAnswer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
