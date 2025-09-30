@extends('app')

@section('title', 'Artikel')

@section('content')
@php
  $categories = [
    'Perkembangan Janin',
    'Nutrisi',
    'Persiapan Persalinan',
  ];

  if (empty($articles)) {
    $articles = [
      [
        'title' => 'Minggu 8-12: Tonggak Perkembangan Janin Awal',
        'excerpt' => 'Kenali perkembangan organ vital dan perubahan yang umum terjadi pada trimester pertama.',
        'category' => 'Perkembangan Janin',
        'trimester' => 1,
        'date' => now()->subDays(1)->format('d M Y'),
        'read_time' => '6 menit baca',
        'url' => url('/artikel/minggu-8-12'),
        'thumbnail' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Menu Harian: Nutrisi Seimbang Trimester 1',
        'excerpt' => 'Contoh sarapan, makan siang, dan makan malam untuk bantu atasi mual dan penuhi gizi.',
        'category' => 'Nutrisi',
        'trimester' => 1,
        'date' => now()->subDays(2)->format('d M Y'),
        'read_time' => '5 menit baca',
        'url' => url('/artikel/menu-nutrisi-tri1'),
        'thumbnail' => 'https://images.unsplash.com/photo-1484980972926-edee96e0960d?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Checklist Persiapan Persalinan: Mulai dari Sekarang',
        'excerpt' => 'Buat daftar barang ibu & bayi, dokumen, dan kontak darurat sejak trimester kedua.',
        'category' => 'Persiapan Persalinan',
        'trimester' => 2,
        'date' => now()->subDays(3)->format('d M Y'),
        'read_time' => '7 menit baca',
        'url' => url('/artikel/checklist-persalinan'),
        'thumbnail' => 'https://images.unsplash.com/photo-1546968590-68ee0367b8f1?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Gerak Janin: Apa yang Normal di Trimester 2?',
        'excerpt' => 'Pelajari pola gerak dan kapan perlu konsultasi.',
        'category' => 'Perkembangan Janin',
        'trimester' => 2,
        'date' => now()->subDays(5)->format('d M Y'),
        'read_time' => '4 menit baca',
        'url' => url('/artikel/gerak-janin-tri2'),
        'thumbnail' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Sumber Zat Besi: Kurangi Risiko Anemia',
        'excerpt' => 'Rekomendasi bahan makanan kaya zat besi dan cara maksimalkan penyerapannya.',
        'category' => 'Nutrisi',
        'trimester' => 2,
        'date' => now()->subDays(6)->format('d M Y'),
        'read_time' => '6 menit baca',
        'url' => url('/artikel/zat-besi-ibu-hamil'),
        'thumbnail' => 'https://images.unsplash.com/photo-1505575972945-2804b8ddf0f9?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Latihan Napas untuk Persalinan Nyaman',
        'excerpt' => 'Teknik pernapasan sederhana yang membantu saat kontraksi.',
        'category' => 'Persiapan Persalinan',
        'trimester' => 3,
        'date' => now()->subDays(7)->format('d M Y'),
        'read_time' => '5 menit baca',
        'url' => url('/artikel/latihan-nafas-persalinan'),
        'thumbnail' => 'https://images.unsplash.com/photo-1518310383802-640c2de311b2?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Trimester 3: Persiapan Menyusui',
        'excerpt' => 'Peralatan dasar dan teknik pelekatan yang baik.',
        'category' => 'Persiapan Persalinan',
        'trimester' => 3,
        'date' => now()->subDays(8)->format('d M Y'),
        'read_time' => '6 menit baca',
        'url' => url('/artikel/persiapan-menyusui'),
        'thumbnail' => 'https://images.unsplash.com/photo-1542736667-069246bdbc74?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'Kalsium & Vitamin D: Tulang Janin Kuat',
        'excerpt' => 'Sumber kalsium aman dan cara penuhi kebutuhan harian.',
        'category' => 'Nutrisi',
        'trimester' => 3,
        'date' => now()->subDays(9)->format('d M Y'),
        'read_time' => '4 menit baca',
        'url' => url('/artikel/kalsium-vitd'),
        'thumbnail' => 'https://images.unsplash.com/photo-1514512364185-4c2b3c7b1b7b?q=80&w=1600&auto=format&fit=crop'
      ],
      [
        'title' => 'USG Akhir Kehamilan: Yang Perlu Diketahui',
        'excerpt' => 'Pantau posisi janin dan perkiraan berat lahir.',
        'category' => 'Perkembangan Janin',
        'trimester' => 3,
        'date' => now()->subDays(10)->format('d M Y'),
        'read_time' => '5 menit baca',
        'url' => url('/artikel/usg-akhir'),
        'thumbnail' => 'https://images.unsplash.com/photo-1540479859555-17af45c78602?q=80&w=1600&auto=format&fit=crop'
      ],
    ];
  }
@endphp

<section aria-labelledby="hero-artikel" class="relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
    <div class="flex flex-col gap-3">
      <h1 id="hero-artikel" class="text-3xl sm:text-4xl font-semibold text-gray-900 text-balance">
        Artikel Kehamilan
      </h1>
      <p class="text-gray-600 leading-relaxed">
        Jelajahi kategori Perkembangan Janin, Nutrisi, dan Persiapan Persalinan. Gunakan filter untuk menemukan konten sesuai trimester.
      </p>
    </div>
  </div>
</section>

{{-- Toolbar Filter --}}
<section aria-labelledby="filter" class="mt-0">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl border border-pink-100 bg-white/80 backdrop-blur p-4 sm:p-5">
      <div class="flex flex-col md:flex-row md:items-center gap-4 justify-between">
         Filter Trimester 
        <div class="flex flex-col gap-2">
          <span class="text-sm font-medium text-gray-800">Trimester</span>
          <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter Trimester">
            <button type="button" data-trimester="all" aria-pressed="true"
              class="trimester-btn px-3 py-1.5 rounded-full text-sm bg-pink-100 text-pink-700 hover:bg-pink-200 transition">
              Semua
            </button>
            <button type="button" data-trimester="1" aria-pressed="false"
              class="trimester-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 1
            </button>
            <button type="button" data-trimester="2" aria-pressed="false"
              class="trimester-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 2
            </button>
            <button type="button" data-trimester="3" aria-pressed="false"
              class="trimester-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
              Trimester 3
            </button>
          </div>
        </div>

         Filter Kategori 
        <div class="flex flex-col gap-2">
          <span class="text-sm font-medium text-gray-800">Kategori</span>
          <div class="flex flex-wrap items-center gap-2" role="group" aria-label="Filter Kategori">
            <button type="button" data-category="all" aria-pressed="true"
              class="category-btn px-3 py-1.5 rounded-full text-sm bg-pink-100 text-pink-700 hover:bg-pink-200 transition">
              Semua
            </button>
            @foreach ($categories as $cat)
              <button type="button" data-category="{{ $cat }}" aria-pressed="false"
                class="category-btn px-3 py-1.5 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-pink-100 hover:text-pink-700 transition">
                {{ $cat }}
              </button>
            @endforeach
          </div>
        </div>

         Reset 
        <div class="md:self-end">
          <button type="button" id="resetFilters"
            class="px-4 py-2 rounded-full text-sm bg-white text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition">
            Reset Filter
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Kategori Singkat --}}
<section aria-labelledby="kategori" class="mt-8 sm:mt-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 id="kategori" class="text-lg font-semibold text-gray-900">Kategori Artikel</h2>
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
      @foreach ($categories as $cat)
        <button type="button" data-category="{{ $cat }}"
          class="category-btn block w-full rounded-xl border border-pink-100 bg-white hover:bg-pink-50 transition p-4 text-left">
          <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </span>
            <span class="font-medium text-gray-900">{{ $cat }}</span>
          </div>
          <p class="mt-2 text-sm text-gray-600">
            {{ $cat === 'Perkembangan Janin' ? 'Pantau pertumbuhan dan tonggak perkembangan janin.' : ($cat === 'Nutrisi' ? 'Penuhi kebutuhan gizi ibu & janin dengan menu seimbang.' : 'Siapkan persalinan nyaman dan aman.') }}
          </p>
        </button>
      @endforeach
    </div>
  </div>
</section>

{{-- Daftar Artikel --}}
<section aria-labelledby="daftar-artikel" class="mt-10 sm:mt-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between">
      <h2 id="daftar-artikel" class="text-xl font-semibold text-gray-900">Semua Artikel</h2>
      <p class="text-sm text-gray-600 hidden sm:block">Filter berdasarkan trimester dan kategori di atas.</p>
    </div>

    <div id="articlesGrid" class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse($articles as $a)
        @php
          $cat = $a['category'] ?? 'Nutrisi';
          $tri = (string)($a['trimester'] ?? 1);
        @endphp
        <article
          class="article-card group rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden"
          data-trimester="{{ $tri }}"
          data-category="{{ $cat }}"
        >
          @if(!empty($a['thumbnail']))
            <div class="aspect-[16/9] bg-pink-50">
              <img src="{{ $a['thumbnail'] }}" alt="Gambar {{ $a['title'] ?? 'Artikel' }}" class="w-full h-full object-cover">
            </div>
          @endif
          <div class="p-4">
            <div class="flex items-center gap-2 flex-wrap">
              <span class="text-xs px-2 py-0.5 rounded-full bg-pink-100 text-pink-700">{{ $cat }}</span>
              <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">Trimester {{ $tri }}</span>
            </div>
            <h3 class="mt-2 font-medium text-gray-900 group-hover:text-pink-600 line-clamp-2">
              <a href="{{ $a['url'] ?? '#' }}">{{ $a['title'] ?? 'Judul artikel' }}</a>
            </h3>
            <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ $a['excerpt'] ?? 'Ringkasan artikel singkat.' }}</p>
            <div class="mt-2 flex items-center gap-2 text-xs text-gray-500">
              <span>{{ $a['date'] ?? now()->format('d M Y') }}</span>
              @if(!empty($a['read_time']))
                <span>•</span>
                <span>{{ $a['read_time'] }}</span>
              @endif
            </div>
          </div>
        </article>
      @empty
        <p class="text-sm text-gray-600">Belum ada artikel untuk ditampilkan.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  (function() {
    const trimesterBtns = Array.from(document.querySelectorAll('.trimester-btn'));
    const categoryBtns = Array.from(document.querySelectorAll('.category-btn'));
    const resetBtn = document.getElementById('resetFilters');
    const cards = Array.from(document.querySelectorAll('.article-card'));

    let activeTrimester = 'all';
    let activeCategory = 'all';

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
      cards.forEach(card => {
        const tri = card.getAttribute('data-trimester');
        const cat = card.getAttribute('data-category');
        const passTri = (activeTrimester === 'all') || (tri === String(activeTrimester));
        const passCat = (activeCategory === 'all') || (cat === activeCategory);
        card.classList.toggle('hidden', !(passTri && passCat));
      });
    }

    trimesterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        activeTrimester = btn.dataset.trimester || 'all';
        setPressed(trimesterBtns, btn);
        applyFilters();
      });
    });

    categoryBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        activeCategory = btn.dataset.category || 'all';
        setPressed(categoryBtns, btn);
        applyFilters();
        // Scroll ke grid saat pilih kategori di blok "Kategori Artikel"
        const grid = document.getElementById('articlesGrid');
        if (grid && btn.closest('section')?.getAttribute('aria-labelledby') === 'kategori') {
          grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });

    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        activeTrimester = 'all';
        activeCategory = 'all';
        const triAll = trimesterBtns.find(b => (b.dataset.trimester === 'all'));
        const catAll = categoryBtns.find(b => (b.dataset.category === 'all'));
        if (triAll) setPressed(trimesterBtns, triAll);
        if (catAll) setPressed(categoryBtns, catAll);
        applyFilters();
      });
    }

    // Init state
    const triAll = trimesterBtns.find(b => (b.dataset.trimester === 'all'));
    const catAll = categoryBtns.find(b => (b.dataset.category === 'all'));
    if (triAll) setPressed(trimesterBtns, triAll);
    if (catAll) setPressed(categoryBtns, catAll);
    applyFilters();
  })();
</script>
@endpush
