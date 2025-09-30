@extends('layouts.admin')

@section('title', 'Manajemen FAQ - HaloBun')

@section('content')
@php
  $faqs = $faqs ?? [
    ['id'=>1,'question'=>'Apa yang harus dilakukan saat mual?','category'=>'Kondisi Darurat','status'=>'Published','updated_at'=>'2025-09-09'],
    ['id'=>2,'question'=>'Asupan nutrisi harian trimester 2?','category'=>'Nutrisi','status'=>'Draft','updated_at'=>'2025-09-07'],
    ['id'=>3,'question'=>'Tanda persalinan sudah dekat?','category'=>'Persalinan','status'=>'Published','updated_at'=>'2025-09-05'],
  ];
  $categories = $categories ?? ['Semua','Nutrisi','Persalinan','Kondisi Darurat'];
  $statuses = $statuses ?? ['Semua','Published','Draft'];
@endphp

<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold">
    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen FAQ</span>
  </h1>
  <p class="mt-1 text-sm text-gray-600">Kelola pertanyaan umum tentang kehamilan.</p>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
  <form class="grid gap-3 md:grid-cols-5" onsubmit="return false;">
    <label class="md:col-span-2">
      <span class="sr-only">Cari FAQ</span>
      <input id="search-faqs" type="search" placeholder="Cari pertanyaan..."
             class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300"/>
    </label>
    <label>
      <span class="sr-only">Kategori</span>
      <select id="filter-category" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($categories as $c) <option value="{{ $c }}">{{ $c }}</option> @endforeach
      </select>
    </label>
    <label>
      <span class="sr-only">Status</span>
      <select id="filter-status" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($statuses as $s) <option value="{{ $s }}">{{ $s }}</option> @endforeach
      </select>
    </label>
    <div class="flex items-center gap-3">
      <button type="button"
        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
        + Tambah FAQ
      </button>
      <button type="button" id="reset-faqs" class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</button>
    </div>
  </form>
</div>

<div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
  <table class="min-w-full text-sm">
    <thead class="text-left text-gray-600">
      <tr class="border-b border-pink-100">
        <th class="px-4 py-3">Pertanyaan</th>
        <th class="px-4 py-3">Kategori</th>
        <th class="px-4 py-3">Status</th>
        <th class="px-4 py-3">Diubah</th>
        <th class="px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody id="faqs-body">
      @foreach ($faqs as $f)
        <tr class="border-b border-pink-50 hover:bg-pink-50/30"
            data-question="{{ Str::lower($f['question']) }}"
            data-category="{{ $f['category'] }}"
            data-status="{{ $f['status'] }}">
          <td class="px-4 py-3 font-medium text-gray-900">{{ $f['question'] }}</td>
          <td class="px-4 py-3">{{ $f['category'] }}</td>
          <td class="px-4 py-3">
            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
              @if($f['status'] === 'Published') bg-green-50 text-green-700 border border-green-200
              @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">
              {{ $f['status'] }}
            </span>
          </td>
          <td class="px-4 py-3 text-gray-600">{{ $f['updated_at'] }}</td>
          <td class="px-4 py-3">
            <div class="flex gap-2">
              <button class="px-3 py-1 rounded-full border border-pink-200 text-pink-700 hover:bg-pink-50 text-xs">Edit</button>
              <button class="px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 text-xs">Hapus</button>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@push('scripts')
<script>
  (function(){
    const search = document.getElementById('search-faqs');
    const cat = document.getElementById('filter-category');
    const st = document.getElementById('filter-status');
    const reset = document.getElementById('reset-faqs');
    const rows = Array.from(document.querySelectorAll('#faqs-body tr'));

    function apply() {
      const q = (search.value || '').trim().toLowerCase();
      const c = cat.value, s = st.value;
      rows.forEach(r => {
        const ok =
          ((q === '') || r.dataset.question.includes(q)) &&
          ((c === 'Semua') || r.dataset.category === c) &&
          ((s === 'Semua') || r.dataset.status === s);
        r.style.display = ok ? '' : 'none';
      });
    }
    [search, cat, st].forEach(el => el && el.addEventListener('input', apply));
    [cat, st].forEach(el => el && el.addEventListener('change', apply));
    reset && reset.addEventListener('click', ()=>{ search.value=''; cat.selectedIndex=0; st.selectedIndex=0; apply(); });
    apply();
  })();
</script>
@endpush
