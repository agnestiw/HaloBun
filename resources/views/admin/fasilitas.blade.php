@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas Kesehatan - HaloBun')

@section('content')
@php
  $facilities = $facilities ?? [
    ['id'=>1,'name'=>'Puskesmas Sehat Ibu','type'=>'Puskesmas','city'=>'Jakarta','phone'=>'021-123456','updated_at'=>'2025-09-04'],
    ['id'=>2,'name'=>'RS Bunda Harmoni','type'=>'Rumah Sakit','city'=>'Bandung','phone'=>'022-987654','updated_at'=>'2025-09-03'],
    ['id'=>3,'name'=>'Klinik Ibu Bahagia','type'=>'Klinik','city'=>'Surabaya','phone'=>'031-555666','updated_at'=>'2025-09-01'],
  ];
  $types = $types ?? ['Semua','Puskesmas','Rumah Sakit','Klinik'];
@endphp

<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold">
    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen Fasilitas Kesehatan</span>
  </h1>
  <p class="mt-1 text-sm text-gray-600">Kelola data Puskesmas, Rumah Sakit, dan Klinik.</p>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
  <form class="grid gap-3 md:grid-cols-5" onsubmit="return false;">
    <label class="md:col-span-2">
      <span class="sr-only">Cari fasilitas</span>
      <input id="search-fac" type="search" placeholder="Cari nama atau kota..."
             class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300"/>
    </label>
    <label>
      <span class="sr-only">Tipe</span>
      <select id="filter-type" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($types as $t) <option value="{{ $t }}">{{ $t }}</option> @endforeach
      </select>
    </label>
    <div class="flex items-center gap-3">
      <button type="button"
        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
        + Tambah Faskes
      </button>
      <button type="button" id="reset-fac" class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</button>
    </div>
  </form>
</div>

<div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
  <table class="min-w-full text-sm">
    <thead class="text-left text-gray-600">
      <tr class="border-b border-pink-100">
        <th class="px-4 py-3">Nama</th>
        <th class="px-4 py-3">Tipe</th>
        <th class="px-4 py-3">Kota</th>
        <th class="px-4 py-3">Telepon</th>
        <th class="px-4 py-3">Diubah</th>
        <th class="px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody id="fac-body">
      @foreach ($facilities as $f)
        <tr class="border-b border-pink-50 hover:bg-pink-50/30"
            data-name="{{ Str::lower($f['name']) }}"
            data-city="{{ Str::lower($f['city']) }}"
            data-type="{{ $f['type'] }}">
          <td class="px-4 py-3 font-medium text-gray-900">{{ $f['name'] }}</td>
          <td class="px-4 py-3">{{ $f['type'] }}</td>
          <td class="px-4 py-3">{{ $f['city'] }}</td>
          <td class="px-4 py-3"><a href="tel:{{ $f['phone'] }}" class="text-pink-700 hover:underline">{{ $f['phone'] }}</a></td>
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
    const search = document.getElementById('search-fac');
    const type = document.getElementById('filter-type');
    const reset = document.getElementById('reset-fac');
    const rows = Array.from(document.querySelectorAll('#fac-body tr'));

    function apply() {
      const q = (search.value || '').trim().toLowerCase();
      const t = type.value;
      rows.forEach(r => {
        const ok =
          ((q === '') || r.dataset.name.includes(q) || r.dataset.city.includes(q)) &&
          ((t === 'Semua') || r.dataset.type === t);
        r.style.display = ok ? '' : 'none';
      });
    }
    [search, type].forEach(el => el && el.addEventListener('input', apply));
    type && type.addEventListener('change', apply);
    reset && reset.addEventListener('click', ()=>{ search.value=''; type.selectedIndex=0; apply(); });
    apply();
  })();
</script>
@endpush
