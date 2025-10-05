@extends('layouts.admin')

@section('title', 'Admin Dashboard - HaloBun')

@section('content')
{{-- HAPUS SELURUH BLOK @php DENGAN DATA DUMMY --}}

<header class="mb-8 text-center">
  <h1 class="text-3xl md:text-4xl font-bold text-balance">
    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">
      HaloBun Admin Dashboard
    </span>
  </h1>
  <p class="mt-2 text-sm md:text-base text-gray-600">Kelola konten dan fasilitas HaloBun dengan mudah.</p>
</header>

{{-- Statistik --}}
<section aria-labelledby="stats-title" class="mb-8">
  <h2 id="stats-title" class="sr-only">Ringkasan Statistik</h2>
  <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @foreach ([
      ['label' => 'Artikel', 'key' => 'articles', 'icon' => '📝', 'url' => route('admin.artikel.index')],
      ['label' => 'Video', 'key' => 'videos', 'icon' => '🎬', 'url' => route('admin.video.index')],
      ['label' => 'FAQ', 'key' => 'faqs', 'icon' => '❓', 'url' => route('admin.faq.index')],
      ['label' => 'Faskes', 'key' => 'facilities', 'icon' => '🏥', 'url' => route('admin.fasilitas.index')],
    ] as $card)
      <a href="{{ $card['url'] }}" class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 flex items-center gap-4 hover:shadow-md transition">
        <div class="h-10 w-10 rounded-full bg-pink-50 flex items-center justify-center text-pink-600 text-xl shrink-0" aria-hidden="true">
          {{ $card['icon'] }}
        </div>
        <div>
          <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
          <p class="text-2xl font-semibold text-gray-900">{{ $stats[$card['key']] ?? 0 }}</p>
        </div>
      </a>
    @endforeach
  </div>
</section>

{{-- Aksi Cepat (Tombol-tombol) --}}
<section aria-labelledby="quick-actions-title" class="mb-10">
  <h2 id="quick-actions-title" class="sr-only">Aksi Cepat</h2>
  <div class="flex flex-wrap justify-center gap-3">
    <a href="{{ route('admin.artikel.create') }}" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">+ Tambah Artikel</a>
    <a href="{{ route('admin.video.create') }}" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">+ Tambah Video</a>
    <a href="{{ route('admin.faq.create') }}" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">+ Tambah FAQ</a>
    <a href="{{ route('admin.fasilitas.create') }}" class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95">+ Tambah Faskes</a>
  </div>
</section>

{{-- Daftar Konten Terbaru --}}
<section class="grid gap-6 lg:grid-cols-2">
  
  {{-- Artikel Terbaru --}}
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Artikel Terakhir Diubah</h3>
    <ul class="space-y-3">
      @forelse ($recentArticles as $a)
        <li class="flex items-center justify-between gap-4">
          <div>
            <p class="font-medium text-gray-800">{{ Str::limit($a->title, 40) }}</p>
            <p class="text-xs text-gray-500">{{ $a->category->value }}</p>
          </div>
          <a href="{{ route('admin.artikel.edit', $a) }}" class="text-xs text-pink-600 hover:underline">Edit</a>
        </li>
      @empty
        <li class="text-sm text-gray-500">Belum ada artikel.</li>
      @endforelse
    </ul>
  </div>

  {{-- Video Terbaru --}}
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Video Terakhir Diubah</h3>
    <ul class="space-y-3">
      @forelse ($recentVideos as $v)
        <li class="flex items-center justify-between gap-4">
          <div>
            <p class="font-medium text-gray-800">{{ Str::limit($v->title, 40) }}</p>
            <p class="text-xs text-gray-500">{{ $v->platform->value }}</p>
          </div>
          <a href="{{ route('admin.video.edit', $v) }}" class="text-xs text-pink-600 hover:underline">Edit</a>
        </li>
      @empty
        <li class="text-sm text-gray-500">Belum ada video.</li>
      @endforelse
    </ul>
  </div>

  {{-- FAQ Terbaru --}}
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">FAQ Terakhir Diubah</h3>
    <ul class="space-y-3">
      @forelse ($recentFaqs as $f)
        <li class="flex items-center justify-between gap-4">
          <div>
            <p class="font-medium text-gray-800">{{ Str::limit($f->question, 40) }}</p>
            <p class="text-xs text-gray-500">{{ $f->category->value }}</p>
          </div>
          <a href="{{ route('admin.faq.edit', $f) }}" class="text-xs text-pink-600 hover:underline">Edit</a>
        </li>
      @empty
        <li class="text-sm text-gray-500">Belum ada FAQ.</li>
      @endforelse
    </ul>
  </div>

  {{-- Fasilitas Terbaru --}}
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Fasilitas Terakhir Diubah</h3>
    <ul class="space-y-3">
      @forelse ($recentFacilities as $f)
        <li class="flex items-center justify-between gap-4">
          <div>
            <p class="font-medium text-gray-800">{{ Str::limit($f->name, 40) }}</p>
            <p class="text-xs text-gray-500">{{ Str::ucfirst(str_replace('_',' ', $f->type->value)) }}</p>
          </div>
          <a href="{{ route('admin.fasilitas.edit', $f) }}" class="text-xs text-pink-600 hover:underline">Edit</a>
        </li>
      @empty
        <li class="text-sm text-gray-500">Belum ada fasilitas.</li>
      @endforelse
    </ul>
  </div>
</section>
@endsection