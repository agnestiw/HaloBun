@extends('layouts.admin')

@section('content')
@php
  $videos = $videos ?? [
    ['id'=>1,'title'=>'Tips Mual Trimester 1','platform'=>'YouTube','topic'=>'Gejala Hamil','trimester'=>'1','status'=>'Published','updated_at'=>'2025-09-08'],
    ['id'=>2,'title'=>'Senam Hamil','platform'=>'TikTok','topic'=>'Olahraga','trimester'=>'2','status'=>'Draft','updated_at'=>'2025-09-05'],
    ['id'=>3,'title'=>'Persiapan Persalinan','platform'=>'YouTube','topic'=>'Persalinan','trimester'=>'3','status'=>'Published','updated_at'=>'2025-09-03'],
  ];
  $platforms = $platforms ?? ['Semua','YouTube','TikTok'];
  $topics = $topics ?? ['Semua','Gejala Hamil','Nutrisi','Olahraga','Persalinan'];
  $statuses = $statuses ?? ['Semua','Published','Draft'];
  $trimesters = ['Semua','1','2','3'];
@endphp

<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold text-balance">
    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-purple-600">Manajemen Video</span>
  </h1>
  <p class="mt-1 text-sm text-gray-600">Kelola konten video edukasi untuk HaloBun.</p>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 mb-4">
  <form class="grid gap-3 md:grid-cols-6" onsubmit="return false;">
    <label class="md:col-span-2">
      <span class="sr-only">Cari video</span>
      <input id="search-videos" type="search" placeholder="Cari judul atau topik..."
             class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300"/>
    </label>
    <label>
      <span class="sr-only">Platform</span>
      <select id="filter-platform" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($platforms as $p) <option value="{{ $p }}">{{ $p }}</option> @endforeach
      </select>
    </label>
    <label>
      <span class="sr-only">Topik</span>
      <select id="filter-topic" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($topics as $t) <option value="{{ $t }}">{{ $t }}</option> @endforeach
      </select>
    </label>
    <label>
      <span class="sr-only">Trimester</span>
      <select id="filter-trimester" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($trimesters as $t) <option value="{{ $t }}">{{ $t }}</option> @endforeach
      </select>
    </label>
    <label>
      <span class="sr-only">Status</span>
      <select id="filter-status" class="w-full rounded-xl border border-pink-100 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
        @foreach ($statuses as $s) <option value="{{ $s }}">{{ $s }}</option> @endforeach
      </select>
    </label>
    <div class="md:col-span-1 flex items-center gap-3">
      <button type="button"
        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
        + Tambah Video
      </button>
      <button type="button" id="reset-videos" class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Reset</button>
    </div>
  </form>
</div>

<div class="overflow-x-auto rounded-2xl border border-pink-100 bg-white/80">
  <table class="min-w-full text-sm">
    <thead class="text-left text-gray-600">
      <tr class="border-b border-pink-100">
        <th class="px-4 py-3">Judul</th>
        <th class="px-4 py-3">Platform</th>
        <th class="px-4 py-3">Topik</th>
        <th class="px-4 py-3">Trimester</th>
        <th class="px-4 py-3">Status</th>
        <th class="px-4 py-3">Diubah</th>
        <th class="px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody id="videos-body">
      @foreach ($videos as $v)
        <tr class="border-b border-pink-50 hover:bg-pink-50/30"
            data-title="{{ Str::lower($v['title']) }}"
            data-platform="{{ $v['platform'] }}"
            data-topic="{{ $v['topic'] }}"
            data-trimester="{{ $v['trimester'] }}"
            data-status="{{ $v['status'] }}">
          <td class="px-4 py-3 font-medium text-gray-900">{{ $v['title'] }}</td>
          <td class="px-4 py-3">{{ $v['platform'] }}</td>
          <td class="px-4 py-3">{{ $v['topic'] }}</td>
          <td class="px-4 py-3">{{ $v['trimester'] }}</td>
          <td class="px-4 py-3">
            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs
              @if($v['status'] === 'Published') bg-green-50 text-green-700 border border-green-200
              @else bg-yellow-50 text-yellow-700 border border-yellow-200 @endif">
              {{ $v['status'] }}
            </span>
          </td>
          <td class="px-4 py-3 text-gray-600">{{ $v['updated_at'] }}</td>
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
    const search = document.getElementById('search-videos');
    const pf = document.getElementById('filter-platform');
    const tp = document.getElementById('filter-topic');
    const tr = document.getElementById('filter-trimester');
    const st = document.getElementById('filter-status');
    const reset = document.getElementById('reset-videos');
    const rows = Array.from(document.querySelectorAll('#videos-body tr'));

    function apply() {
      const q = (search.value || '').trim().toLowerCase();
      const vpf = pf.value, vtp = tp.value, vtr = tr.value, vst = st.value;
      rows.forEach(r => {
        const ok =
          ((q === '') || r.dataset.title.includes(q)) &&
          ((vpf === 'Semua') || r.dataset.platform === vpf) &&
          ((vtp === 'Semua') || r.dataset.topic === vtp) &&
          ((vtr === 'Semua') || r.dataset.trimester === vtr) &&
          ((vst === 'Semua') || r.dataset.status === vst);
        r.style.display = ok ? '' : 'none';
      });
    }
    [search, pf, tp, tr, st].forEach(el => el && el.addEventListener('input', apply));
    [pf, tp, tr, st].forEach(el => el && el.addEventListener('change', apply));
    reset && reset.addEventListener('click', ()=>{ search.value=''; pf.selectedIndex=0; tp.selectedIndex=0; tr.selectedIndex=0; st.selectedIndex=0; apply(); });
    apply();
  })();
</script>
@endpush
