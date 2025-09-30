@extends('layouts.app')

@section('content')
@php
  $topics = [
    'Olahraga Prenatal',
    'Nutrisi',
    'Persiapan Persalinan',
    'Kesehatan Mental',
  ];

  if (empty($videos)) {
    $videos = [
      [
        'title' => 'Gerakan Ringan Trimester 1 untuk Mengurangi Mual',
        'topic' => 'Olahraga Prenatal',
        'trimester' => 1,
        'provider' => 'youtube',
        'video_id' => 'gC_L9qAHVJ8', // contoh ID; ganti sesuai kebutuhan
        'url' => 'https://www.youtube.com/watch?v=gC_L9qAHVJ8',
        'duration' => '8:21',
        'published' => now()->subDays(2)->format('d M Y'),
      ],
      [
        'title' => 'Menu Sehari-hari: Nutrisi Ibu Hamil Trimester 2',
        'topic' => 'Nutrisi',
        'trimester' => 2,
        'provider' => 'youtube',
        'video_id' => '4qz7cP3qZ0Y',
        'url' => 'https://www.youtube.com/watch?v=4qz7cP3qZ0Y',
        'duration' => '10:05',
        'published' => now()->subDays(4)->format('d M Y'),
      ],
      [
        'title' => 'Teknik Napas Saat Kontraksi Menjelang Persalinan',
        'topic' => 'Persiapan Persalinan',
        'trimester' => 3,
        'provider' => 'youtube',
        'video_id' => 'eA3G5nNfJHQ',
        'url' => 'https://www.youtube.com/watch?v=eA3G5nNfJHQ',
        'duration' => '7:12',
        'published' => now()->subDays(7)->format('d M Y'),
      ],
      [
        'title' => 'Kelola Stres & Tidur Nyenyak Saat Hamil',
        'topic' => 'Kesehatan Mental',
        'trimester' => 2,
        'provider' => 'youtube',
        'video_id' => 'in2Ea9Jb1o8',
        'url' => 'https://www.youtube.com/watch?v=in2Ea9Jb1o8',
        'duration' => '9:34',
        'published' => now()->subDays(9)->format('d M Y'),
      ],
      // Contoh TikTok (opsional). Embed akan aktif jika script TikTok dimuat.
      [
        'title' => 'Tips Memilih Posisi Tidur yang Nyaman',
        'topic' => 'Kesehatan Mental',
        'trimester' => 2,
        'provider' => 'tiktok',
        'tiktok_url' => 'https://www.tiktok.com/@scout2015/video/6718335390845095173',
        'url' => 'https://www.tiktok.com/@scout2015/video/6718335390845095173',
        'duration' => '—',
        'published' => now()->subDays(11)->format('d M Y'),
      ],
    ];
  }
@endphp

<section aria-labelledby="hero-video" class="relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
    <div class="flex flex-col gap-3">
      <h1 id="hero-video" class="text-3xl sm:text-4xl font-semibold text-gray-900 text-balance">
        Video Edukasi Kehamilan
      </h1>
      <p class="text-gray-600 leading-relaxed">
        Tonton video edukasi terpercaya. Gunakan pencarian dan filter untuk menemukan video sesuai trimester dan topik.
      </p>
    </div>
  </div>
</section>

<section aria-labelledby="toolbar-video" class="mt-0">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 sm:p-5">
      <div class="flex flex-col gap-5">
        <div class="flex flex-col md:flex-row md:items-center gap-4 justify-between">
          {{-- Pencarian --}}
          <div class="w-full md:max-w-md">
            <label for="videoSearch" class="sr-only">Cari Video</label>
            <div class="relative">
              <input id="videoSearch" type="text" placeholder="Cari video (misal: napas, nutrisi, tidur)..."
                class="w-full rounded-full border border-pink-200 bg-white/90 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300" />
              <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-pink-500">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path>
                </svg>
              </span>
            </div>
          </div>

          {{-- Reset --}}
          <div class="md:self-start">
            <button type="button" id="resetVideoFilters"
              class="px-4 py-2 rounded-full text-sm bg-white text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition">
              Reset
            </button>
          </div>
        </div>

        {{-- Filter Trimester --}}
        <div class="flex flex-col gap-2">
          <span class="text-sm font-medium text-gray-800">Trimester</span>
          <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter Trimester">
            <button type="button" data-trimester="all" aria-pressed="true"
              class="tri-btn px-3 py-1.5 rounded-full text-sm bg-pink-100 text-pink-700 hover:bg-pink-200 transition">
              Semua
            </button>
            <button type="button" data-trimester="1" aria-pressed="false"
              class="tri-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 1
            </button>
            <button type="button" data-trimester="2" aria-pressed="false"
              class="tri-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 2
            </button>
            <button type="button" data-trimester="3" aria-pressed="false"
              class="tri-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 3
            </button>
          </div>
        </div>

        {{-- Filter Topik --}}
        <div class="flex flex-col gap-2">
          <span class="text-sm font-medium text-gray-800">Tema/Topik</span>
          <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter Topik">
            <button type="button" data-topic="all" aria-pressed="true"
              class="topic-btn px-3 py-1.5 rounded-full text-sm bg-pink-100 text-pink-700 hover:bg-pink-200 transition">
              Semua
            </button>
            @foreach ($topics as $tp)
              <button type="button" data-topic="{{ $tp }}" aria-pressed="false"
                class="topic-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
                {{ $tp }}
              </button>
            @endforeach
          </div>
        </div>

        {{-- Info hasil --}}
        <div class="text-sm text-gray-600">
          Menampilkan <span id="videoCount" class="font-medium text-gray-900">0</span> video
        </div>
      </div>
    </div>
  </div>
</section>

<section aria-labelledby="daftar-video" class="mt-8 sm:mt-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 id="daftar-video" class="text-xl font-semibold text-gray-900">Semua Video</h2>

    <div id="videosGrid" class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse($videos as $v)
        @php
          $tri = (string)($v['trimester'] ?? '1');
          $tp  = $v['topic'] ?? 'Nutrisi';
          $ttl = $v['title'] ?? 'Video Edukasi';
        @endphp
        <article
          class="video-card group rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden"
          data-trimester="{{ $tri }}"
          data-topic="{{ $tp }}"
          data-title="{{ Str::lower($ttl) }}"
        >
          <div class="aspect-[16/9] bg-pink-50">
            @if(($v['provider'] ?? 'youtube') === 'youtube' && !empty($v['video_id']))
              <iframe
                class="w-full h-full"
                src="https://www.youtube.com/embed/{{ $v['video_id'] }}?rel=0"
                title="YouTube video player: {{ $ttl }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
              ></iframe>
            @elseif(($v['provider'] ?? '') === 'tiktok' && !empty($v['tiktok_url']))
              {{-- TikTok embed --}}
              <blockquote class="tiktok-embed" cite="{{ $v['tiktok_url'] }}" data-video-id="" style="max-width: 605px;min-width: 325px;">
                <section><a href="{{ $v['tiktok_url'] }}" target="_blank" rel="noopener" class="text-pink-600 underline">Lihat di TikTok</a></section>
              </blockquote>
            @else
              <div class="w-full h-full flex items-center justify-center text-sm text-gray-500">Video tidak tersedia</div>
            @endif
          </div>
          <div class="p-4">
            <div class="flex items-center gap-2 flex-wrap">
              <span class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700">Trimester {{ $tri }}</span>
              <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">{{ $tp }}</span>
            </div>
            <h3 class="mt-2 font-medium text-gray-900 group-hover:text-pink-600 line-clamp-2">
              <a href="{{ $v['url'] ?? '#' }}" target="_blank" rel="noopener">
                {{ $ttl }}
              </a>
            </h3>
            <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
              @if(!empty($v['published'])) <span>{{ $v['published'] }}</span>@endif
              @if(!empty($v['duration'])) <span>•</span><span>{{ $v['duration'] }}</span>@endif
              <span class="ml-auto flex items-center gap-1 text-pink-600">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M10 8l6 4-6 4V8z"></path>
                </svg>
                Tonton
              </span>
            </div>
          </div>
        </article>
      @empty
        <p class="text-sm text-gray-600">Belum ada video untuk ditampilkan.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection

@push('scripts')
{{-- logika filter dan pencarian video --}}
<script>
  (function() {
    const triBtns = Array.from(document.querySelectorAll('.tri-btn'));
    const topicBtns = Array.from(document.querySelectorAll('.topic-btn'));
    const resetBtn = document.getElementById('resetVideoFilters');
    const searchInput = document.getElementById('videoSearch');
    const cards = Array.from(document.querySelectorAll('.video-card'));
    const countEl = document.getElementById('videoCount');

    let activeTrimester = 'all';
    let activeTopic = 'all';
    let query = '';

    function setPressed(list, target) {
      list.forEach(btn => btn.setAttribute('aria-pressed', String(btn === target)));
      list.forEach(btn => {
        const on = btn.getAttribute('aria-pressed') === 'true';
        if (on) {
          btn.classList.remove('bg-gray-100','text-gray-700');
          btn.classList.add('bg-pink-100','text-pink-700');
        } else {
          btn.classList.remove('bg-pink-100','text-pink-700');
          btn.classList.add('bg-gray-100','text-gray-700');
        }
      });
    }

    function applyFilters() {
      let visible = 0;
      const q = query.trim().toLowerCase();
      cards.forEach(card => {
        const tri = card.getAttribute('data-trimester');
        const tp  = card.getAttribute('data-topic');
        const ttl = card.getAttribute('data-title') || '';
        const passTri = (activeTrimester === 'all') || (tri === String(activeTrimester));
        const passTp  = (activeTopic === 'all') || (tp === activeTopic);
        const passQ   = !q || ttl.includes(q);
        const show = passTri && passTp && passQ;
        card.classList.toggle('hidden', !show);
        if (show) visible++;
      });
      if (countEl) countEl.textContent = String(visible);
    }

    function debounce(fn, delay = 250) {
      let t;
      return (...args) => {
        clearTimeout(t);
        t = setTimeout(() => fn(...args), delay);
      };
    }

    triBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        activeTrimester = btn.dataset.trimester || 'all';
        setPressed(triBtns, btn);
        applyFilters();
      });
    });

    topicBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        activeTopic = btn.dataset.topic || 'all';
        setPressed(topicBtns, btn);
        applyFilters();
      });
    });

    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        const triAll = triBtns.find(b => b.dataset.trimester === 'all');
        const tpAll  = topicBtns.find(b => b.dataset.topic === 'all');
        activeTrimester = 'all';
        activeTopic = 'all';
        query = '';
        if (searchInput) searchInput.value = '';
        if (triAll) setPressed(triBtns, triAll);
        if (tpAll) setPressed(topicBtns, tpAll);
        applyFilters();
      });
    }

    if (searchInput) {
      searchInput.addEventListener('input', debounce((e) => {
        query = e.target.value || '';
        applyFilters();
      }, 200));
    }

    // Init
    const triAll = triBtns.find(b => b.dataset.trimester === 'all');
    const tpAll  = topicBtns.find(b => b.dataset.topic === 'all');
    if (triAll) setPressed(triBtns, triAll);
    if (tpAll) setPressed(topicBtns, tpAll);
    applyFilters();

    const hasTikTok = !!document.querySelector('.tiktok-embed');
    if (hasTikTok) {
      const s = document.createElement('script');
      s.src = 'https://www.tiktok.com/embed.js';
      s.async = true;
      document.body.appendChild(s);
    }
  })();
</script>
@endpush
