@php
  $faq = $faq ?? null;
@endphp

@if ($errors->any())<div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-700"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

<div class="space-y-4">
    <div>
        <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
        <textarea name="question" id="question" rows="2" required class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">{{ old('question', $faq?->question) }}</textarea>
    </div>
    <div>
        <label for="answer" class="block text-sm font-medium text-gray-700">Jawaban</label>
        <textarea name="answer" id="answer" rows="4" required class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">{{ old('answer', $faq?->answer) }}</textarea>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="category" id="category" required class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->value }}" @selected(old('category', $faq?->category->value) == $cat->value)>{{ $cat->value }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($faq))
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" required class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
                @foreach ($statuses as $stat)
                    <option value="{{ $stat }}" @selected(old('status', $faq?->status) == $stat)>{{ $stat }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>
    <div>
        <label for="tags" class="block text-sm font-medium text-gray-700">Tags (pisahkan dengan koma)</label>
        <input type="text" name="tags" id="tags" value="{{ old('tags', $faq?->tags) }}" placeholder="Contoh: mual, trimester 1, gizi" class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
  <a href="{{ route('admin.faq.index') }}" class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Batal</a>
  <button type="submit" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow">Simpan FAQ</button>
</div>