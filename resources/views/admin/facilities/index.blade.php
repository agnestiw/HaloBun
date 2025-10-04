@extends('layouts.admin')
@section('title', 'Manajemen Fasilitas Kesehatan - HaloBun')
@section('content')

<header class="mb-6 flex justify-between items-center">
  <div>
    <h1 class="text-2xl md:text-3xl font-bold"><span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen Fasilitas Kesehatan</span></h1>
    <p class="mt-1 text-sm text-gray-600">Kelola data Puskesmas, Rumah Sakit, dan Klinik.</p>
  </div>
  <a href="{{ route('admin.fasilitas.create') }}" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">
    + Tambah Faskes
  </a>
</header>

@if (session('success'))
<div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
@endif

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
  <form action="{{ route('admin.fasilitas.index') }}" method="GET" class="grid gap-3 md:grid-cols-5 items-end">
    <div class="md:col-span-2">
      <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
      <input id="search" name="search" type="search" placeholder="Cari nama atau kota..." value="{{ request('search') }}"
             class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm"/>
    </div>
    <div>
      <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
      <select id="type" name="type" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm">
        <option value="">Semua Tipe</option>
        @foreach ($types as $t) <option value="{{ $t->value }}" @selected(request('type') == $t->value)>{{ Str::ucfirst(str_replace('_', ' ', $t->value)) }}</option> @endforeach
      </select>
    </div>
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select id="status" name="status" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm">
            <option value="">Semua Status</option>
            @foreach ($statuses as $s) <option value="{{ $s }}" @selected(request('status') == $s)>{{ $s }}</option> @endforeach
        </select>
    </div>
    <div class="flex items-center gap-3">
      <button type="submit" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow">Filter</button>
      <a href="{{ route('admin.fasilitas.index') }}" class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</a>
    </div>
  </form>
</div>

<div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
  <table class="min-w-full text-sm">
    <thead class="text-left text-gray-600">
      <tr class="border-b border-pink-100">
        <th class="px-4 py-3">ID</th>
        <th class="px-4 py-3">Nama</th>
        <th class="px-4 py-3">Tipe</th>
        <th class="px-4 py-3">Status</th>
        <th class="px-4 py-3">Diubah</th>
        <th class="px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($facilities as $f)
        <tr class="border-b border-pink-50 hover:bg-pink-50/30">
          <td class="px-4 py-3 text-gray-600">{{ $f->id }}</td>
          <td class="px-4 py-3 font-medium text-gray-900">{{ $f->name }}</td>
          <td class="px-4 py-3">{{ Str::ucfirst(str_replace('_', ' ', $f->type->value)) }}</td>
          <td class="px-4 py-3">
            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
              @if($f->status === 'Published') bg-green-50 text-green-700 border border-green-200
              @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">
              {{ $f->status }}
            </span>
          </td>
          <td class="px-4 py-3 text-gray-600">{{ $f->updated_at->format('Y-m-d') }}</td>
          <td class="px-4 py-3">
            <div class="flex gap-2 items-center flex-wrap">
              @php
                $mapQuery = urlencode($f->name . ', ' . $f->address);
                $mapUrl = "https://maps.google.com/?q=Klinik+Bunda+Ceria+Jakarta1{$mapQuery}";
              @endphp
              <a href="{{ $mapUrl }}" target="_blank" class="px-3 py-1 rounded-full border border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 text-xs">Lihat</a>
              <a href="{{ route('admin.fasilitas.edit', $f) }}" class="px-3 py-1 rounded-full border border-pink-200 text-pink-700 bg-pink-50 hover:bg-pink-100 text-xs">Edit</a>
              <form action="{{ route('admin.fasilitas.destroy', $f) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?');"> @csrf @method('DELETE')
                  <button type="submit" class="px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 text-xs">Hapus</button>
              </form>
              @if ($f->status === 'Draft')
                  <form action="{{ route('admin.fasilitas.toggleStatus', $f) }}" method="POST"> @csrf @method('PATCH')
                      <button type="submit" class="px-3 py-1 rounded-full bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 text-xs">Publikasikan</button>
                  </form>
              @else
                  <form action="{{ route('admin.fasilitas.toggleStatus', $f) }}" method="POST"> @csrf @method('PATCH')
                      <button type="submit" class="px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100 text-xs">Jadikan Draft</button>
                  </form>
              @endif
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center p-4 text-gray-500">Tidak ada data fasilitas.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $facilities->appends(request()->query())->links() }}</div>
@endsection