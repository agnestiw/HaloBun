@extends('layouts.admin')

@section('title', 'Admin Dashboard - HaloBun')

@section('content')
@php
  $stats = $stats ?? [
    'articles' => 24,
    'videos' => 12,
    'faqs' => 18,
    'facilities' => 9,
  ];
  $recentArticles = $recentArticles ?? [
    ['title' => 'Nutrisi Trimester 1', 'category' => 'Nutrisi', 'updated_at' => '2025-09-10'],
    ['title' => 'Persiapan Persalinan', 'category' => 'Persalinan', 'updated_at' => '2025-09-06'],
  ];
  $recentVideos = $recentVideos ?? [
    ['title' => 'Tips Mual Trimester 1', 'platform' => 'YouTube', 'updated_at' => '2025-09-08'],
    ['title' => 'Senam Hamil', 'platform' => 'TikTok', 'updated_at' => '2025-09-05'],
  ];
@endphp

<header class="mb-8 text-center">
  <h1 class="text-3xl md:text-4xl font-bold text-balance">
    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">
      HaloBun Admin Dashboard
    </span>
  </h1>
  <p class="mt-2 text-sm md:text-base text-gray-600">Kelola konten dan fasilitas HaloBun dengan mudah.</p>
</header>

<section aria-labelledby="stats-title" class="mb-8">
  <h2 id="stats-title" class="sr-only">Ringkasan Statistik</h2>
  <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @foreach ([
      ['label' => 'Artikel', 'key' => 'articles', 'icon' => '📝'],
      ['label' => 'Video', 'key' => 'videos', 'icon' => '🎬'],
      ['label' => 'FAQ', 'key' => 'faqs', 'icon' => '❓'],
      ['label' => 'Faskes', 'key' => 'facilities', 'icon' => '🏥'],
    ] as $card)
      <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 flex items-center gap-4">
        <div class="h-10 w-10 rounded-full bg-pink-50 flex items-center justify-center text-pink-600 text-xl" aria-hidden="true">
          {{ $card['icon'] }}
        </div>
        <div>
          <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
          <p class="text-2xl font-semibold text-gray-900">{{ $stats[$card['key']] ?? 0 }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>

<section aria-labelledby="quick-actions-title" class="mb-10">
  <h2 id="quick-actions-title" class="sr-only">Aksi Cepat</h2>
  <div class="flex flex-wrap gap-3">
    <a href="{{ url('/admin/articles') }}"
       class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
      Kelola Artikel
    </a>
    <a href="{{ url('/admin/videos') }}"
       class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
      Kelola Video
    </a>
    <a href="{{ url('/admin/faqs') }}"
       class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
      Kelola FAQ
    </a>
    <a href="{{ url('/admin/facilities') }}"
       class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
      Kelola Fasilitas
    </a>
  </div>
</section>

<section class="grid gap-6 lg:grid-cols-2">
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Artikel Terbaru</h3>
    <ul class="space-y-3">
      @foreach ($recentArticles as $a)
        <li class="flex items-center justify-between">
          <div>
            <p class="font-medium text-gray-800">{{ $a['title'] }}</p>
            <p class="text-xs text-gray-500">{{ $a['category'] }}</p>
          </div>
          <span class="text-xs text-gray-500">{{ $a['updated_at'] }}</span>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Video Terbaru</h3>
    <ul class="space-y-3">
      @foreach ($recentVideos as $v)
        <li class="flex items-center justify-between">
          <div>
            <p class="font-medium text-gray-800">{{ $v['title'] }}</p>
            <p class="text-xs text-gray-500">{{ $v['platform'] }}</p>
          </div>
          <span class="text-xs text-gray-500">{{ $v['updated_at'] }}</span>
        </li>
      @endforeach
    </ul>
  </div>
    <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Artikel Terbaru</h3>
    <ul class="space-y-3">
      @foreach ($recentArticles as $a)
        <li class="flex items-center justify-between">
          <div>
            <p class="font-medium text-gray-800">{{ $a['title'] }}</p>
            <p class="text-xs text-gray-500">{{ $a['category'] }}</p>
          </div>
          <span class="text-xs text-gray-500">{{ $a['updated_at'] }}</span>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="rounded-2xl border border-pink-100 bg-white/80 p-4">
    <h3 class="font-semibold text-gray-900 mb-3">Video Terbaru</h3>
    <ul class="space-y-3">
      @foreach ($recentVideos as $v)
        <li class="flex items-center justify-between">
          <div>
            <p class="font-medium text-gray-800">{{ $v['title'] }}</p>
            <p class="text-xs text-gray-500">{{ $v['platform'] }}</p>
          </div>
          <span class="text-xs text-gray-500">{{ $v['updated_at'] }}</span>
        </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection
