@php
    $article = $article ?? null;
    $categories = ['Perkembangan Janin', 'Nutrisi', 'Persiapan Persalinan'];
    $trimesters = [1, 2, 3];
    $statuses = ['Published', 'Draft'];
@endphp

@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article?->title) }}" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm 
               focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50
               px-4 py-2 text-base">
        </div>
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
            {{-- Untuk hasil terbaik, gunakan editor WYSIWYG seperti TinyMCE atau Trix Editor di sini --}}
            <textarea name="content" id="content" rows="10" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">{{ old('content', $article?->content) }}</textarea>
        </div>
    </div>
    <div class="space-y-4">
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="category" id="category" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                @foreach (\App\Enums\ArticleCategory::cases() as $category)
                    <option value="{{ $category->value }}" @selected(old('category', $article?->category->value) == $category->value)>
                        {{ $category->value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="trimester" class="block text-sm font-medium text-gray-700">Trimester</label>
            <select name="trimester" id="trimester" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                @foreach ($trimesters as $tri)
                    <option value="{{ $tri }}" @selected(old('trimester', $article?->trimester) == $tri)>
                        Trimester {{ $tri }}
                    </option>
                @endforeach
            </select>
        </div>
        @if (isset($article))
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
                    @foreach (['Published', 'Draft'] as $stat)
                        <option value="{{ $stat }}" @selected(old('status', $article?->status) == $stat)>
                            {{ $stat }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="space-y-2 rounded-lg border border-pink-100 p-3">
            <h3 class="text-sm font-medium text-gray-800">Penulis</h3>
            <div>
                <label for="author1" class="sr-only">Penulis 1 (Wajib)</label>
                <input type="text" name="author1" id="author1" value="{{ old('author1', $article?->author1) }}"
                    required placeholder="Penulis 1 (Wajib)"
                    class="block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base text-sm">
            </div>
            <div>
                <label for="author2" class="sr-only">Penulis 2 (Opsional)</label>
                <input type="text" name="author2" id="author2" value="{{ old('author2', $article?->author2) }}"
                    placeholder="Penulis 2 (Opsional)"
                    class="block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base text-sm">
            </div>
            <div>
                <label for="author3" class="sr-only">Penulis 3 (Opsional)</label>
                <input type="text" name="author3" id="author3" value="{{ old('author3', $article?->author3) }}"
                    placeholder="Penulis 3 (Opsional)"
                    class="block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base text-sm">
            </div>
        </div>
        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Gambar Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
            @if ($article?->thumbnail)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Current thumbnail"
                        class="w-full h-auto rounded-lg">
                </div>
            @endif
        </div>
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.artikel.index') }}"
        class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">
        Batal
    </a>
    <button type="submit"
        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
        Simpan Artikel
    </button>
</div>
