@extends('layouts.app')

@section('content')
@php
  if (!isset($weeklyGuides) || empty($weeklyGuides)) {
      $weeklyGuides = [
          // Trimester 1 (0–13)
          ['week' => 4,  'trimester' => 1, 'title' => 'Minggu 4 — Awal Perkembangan', 'desc' => 'Sel embrio mulai berkembang, penting menjaga nutrisi dan istirahat.'],
          ['week' => 8,  'trimester' => 1, 'title' => 'Minggu 8 — Organ Awal', 'desc' => 'Organ-organ dasar mulai terbentuk. Hindari paparan bahan berisiko.'],
          ['week' => 12, 'trimester' => 1, 'title' => 'Minggu 12 — Risiko Menurun', 'desc' => 'Trimester pertama menuju akhir, risiko keguguran menurun.'],
          // Trimester 2 (14–27)
          ['week' => 16, 'trimester' => 2, 'title' => 'Minggu 16 — Gerakan Awal', 'desc' => 'Beberapa ibu mulai merasakan gerakan halus (quickening).'],
          ['week' => 20, 'trimester' => 2, 'title' => 'Minggu 20 — USG Detail', 'desc' => 'Waktu yang baik untuk USG anatomi bayi yang lebih detail.'],
          ['week' => 24, 'trimester' => 2, 'title' => 'Minggu 24 — Pertumbuhan Stabil', 'desc' => 'Pertumbuhan cepat, tetap pantau nutrisi dan hidrasi.'],
          // Trimester 3 (28–40+)
          ['week' => 30, 'trimester' => 3, 'title' => 'Minggu 30 — Posisi Janin', 'desc' => 'Perhatikan posisi janin, jaga keluhan punggung dan tidur.'],
          ['week' => 34, 'trimester' => 3, 'title' => 'Minggu 34 — Persiapan Persalinan', 'desc' => 'Mulai siapkan tas persalinan dan rencana kelahiran.'],
          ['week' => 38, 'trimester' => 3, 'title' => 'Minggu 38 — Menjelang Lahir', 'desc' => 'Pantau tanda persalinan, tetap tenang dan siap ke faskes.'],
      ];
  }

  $calendarEmbedUrl = $calendarEmbedUrl ?? null;
@endphp

<section class="py-10 md:py-14">
  <div class="max-w-6xl mx-auto px-4">
    <div class="rounded-2xl border border-pink-100 bg-white/80 shadow-sm overflow-hidden">
      <div class="p-6 md:p-10 bg-gradient-to-br from-pink-50 to-purple-50">
        <h1 class="text-3xl md:text-4xl font-semibold text-balance">
          <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">Pregnancy Track</span>
        </h1>
        <p class="mt-3 text-slate-600 leading-relaxed">
          Pantau usia kehamilan, perkiraan tanggal lahir, dan panduan mingguan dalam satu tempat. Dirancang dengan tampilan lembut, sederhana, dan ramah untuk ibu hamil.
        </p>
        <div class="mt-5 flex items-center gap-3">
          <a href="#calc" class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
            <svg width="18" height="18" viewBox="0 0 24 24" class="opacity-90" fill="currentColor" aria-hidden="true"><path d="M12 2a1 1 0 0 1 1 1v8h8a1 1 0 1 1 0 2h-8v8a1 1 0 1 1-2 0v-8H3a1 1 0 1 1 0-2h8V3a1 1 0 0 1 1-1z"/></svg>
            Mulai Menghitung
          </a>
          <a href="#guide" class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-300">
            Panduan Mingguan
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

 {{-- Kalkulator Kehamilan  --}}
<section id="calc" class="py-6 md:py-10">
  <div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
       {{-- Input  --}}
      <div class="rounded-2xl border border-pink-100 bg-white p-6 md:p-8">
        <h2 class="text-xl md:text-2xl font-semibold text-slate-800">Kalkulator Kehamilan</h2>
        <p class="mt-2 text-slate-600 leading-relaxed">
          Masukkan tanggal Hari Pertama Haid Terakhir (HPHT) untuk menghitung usia kehamilan dan perkiraan tanggal lahir (ETD).
        </p>
        <div class="mt-4 space-y-4">
          <label class="block">
            <span class="block text-sm text-slate-700 mb-1">Tanggal HPHT</span>
            <input id="lmpDate" type="date" class="w-full rounded-xl border-slate-200 focus:border-pink-400 focus:ring-pink-300" />
          </label>
          <div class="flex items-center gap-3">
            <button id="btnHitung" type="button" class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
              Hitung
            </button>
            <button id="btnReset" type="button" class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-300">
              Reset
            </button>
          </div>
        </div>

        <div class="mt-6">
          <div class="rounded-xl border border-pink-100 bg-pink-50/60 p-4">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4 text-center">
              <div>
                <p class="text-xs text-slate-500">Usia Kehamilan</p>
                <p id="usia" class="mt-1 font-semibold text-slate-800">-</p>
              </div>
              <div>
                <p class="text-xs text-slate-500">Trimester</p>
                <p id="trimester" class="mt-1 font-semibold text-slate-800">-</p>
              </div>
              <div>
                <p class="text-xs text-slate-500">ETD (HPL)</p>
                <p id="etd" class="mt-1 font-semibold text-slate-800">-</p>
              </div>
              <div>
                <p class="text-xs text-slate-500">Progres</p>
                <p id="progressText" class="mt-1 font-semibold text-slate-800">-</p>
              </div>
            </div>

             {{-- Progress bar  --}}
            <div class="mt-4">
              <div class="w-full h-2 rounded-full bg-slate-200 overflow-hidden">
                <div id="progressBar" class="h-2 bg-gradient-to-r from-pink-500 to-purple-500" style="width:0%"></div>
              </div>
              <p id="calcStatus" class="sr-only" aria-live="polite"></p>
            </div>
          </div>
        </div>
      </div>

       {{-- Kalender (Embed)  --}}
      <div class="rounded-2xl border border-pink-100 bg-white p-0 overflow-hidden">
        <div class="p-6 md:p-8">
          <h2 class="text-xl md:text-2xl font-semibold text-slate-800">Kalender Kehamilan</h2>
          <p class="mt-2 text-slate-600 leading-relaxed">
            Lihat kalender kehamilan untuk memahami perubahan tiap minggu. Anda dapat menyematkan tautan kalender kehamilan pilihan Anda.
          </p>
        </div>
        <div class="px-6 md:px-8 pb-6">
          @if($calendarEmbedUrl)
            <div class="aspect-video w-full rounded-xl overflow-hidden border border-pink-100">
              <iframe
                src="{{ $calendarEmbedUrl }}"
                class="w-full h-full"
                title="Kalender Kehamilan"
                loading="lazy"
                referrerpolicy="no-referrer"
                allowfullscreen
              ></iframe>
            </div>
            <div class="mt-3 text-right">
              <a href="{{ $calendarEmbedUrl }}" target="_blank" rel="noopener" class="text-sm text-pink-700 hover:underline">Buka di tab baru</a>
            </div>
          @else
            <div class="rounded-xl border border-pink-100 bg-pink-50/60 p-4">
              <p class="text-sm text-slate-700">
                Belum ada tautan kalender yang disematkan. Minta admin untuk menambahkan variabel <span class="font-mono bg-white px-1 rounded">calendarEmbedUrl</span> dari controller.
              </p>
              <p class="mt-2 text-xs text-slate-500">
                Contoh: halaman kalender publik atau tools kalkulator kehamilan yang mendukung embed.
              </p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

 {{-- Panduan Mingguan (berdasarkan Trimester)  --}}
<section id="guide" class="py-6 md:py-10">
  <div class="max-w-6xl mx-auto px-4">
    <div class="rounded-2xl border border-pink-100 bg-white p-6 md:p-8">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <h2 class="text-xl md:text-2xl font-semibold text-slate-800">Panduan Mingguan</h2>
          <p class="mt-1 text-slate-600 leading-relaxed">Materi detail tersedia di Notion. Gunakan filter untuk melihat per trimester dan cari berdasarkan kata kunci.</p>
        </div>
        <div class="flex items-center gap-2">
          <button data-tri="all" class="tri-btn rounded-full px-4 py-2 text-sm bg-pink-100 text-pink-700 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-300">Semua</button>
          <button data-tri="1" class="tri-btn rounded-full px-4 py-2 text-sm bg-slate-100 text-slate-700 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-300">Trimester 1</button>
          <button data-tri="2" class="tri-btn rounded-full px-4 py-2 text-sm bg-slate-100 text-slate-700 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-300">Trimester 2</button>
          <button data-tri="3" class="tri-btn rounded-full px-4 py-2 text-sm bg-slate-100 text-slate-700 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-300">Trimester 3</button>
        </div>
      </div>

      <div class="mt-4 grid grid-cols-1 md:grid-cols-5 gap-4">
        <div class="md:col-span-2">
          <label class="block">
            <span class="block text-sm text-slate-700 mb-1">Cari materi</span>
            <input id="searchGuide" type="text" placeholder="Ketik kata kunci..." class="w-full rounded-xl border-slate-200 focus:border-pink-400 focus:ring-pink-300" />
          </label>
          @isset($notionEmbedUrl)
            <div class="mt-4 rounded-xl border border-pink-100 bg-pink-50/60 p-3">
              <p class="text-xs text-slate-700">Lihat materi lengkap di Notion:</p>
              <a href="{{ $notionEmbedUrl }}" target="_blank" rel="noopener" class="text-sm text-pink-700 hover:underline break-all">{{ $notionEmbedUrl }}</a>
            </div>
          @endisset
        </div>
        <div class="md:col-span-3">
          <ul id="guideList" class="space-y-3">
            @foreach(collect($weeklyGuides)->sortBy('week') as $item)
              <li class="guide-item" data-trimester="{{ $item['trimester'] }}" data-title="{{ strtolower($item['title']) }} {{ strtolower($item['desc']) }}">
                <details class="rounded-xl border border-pink-100 bg-white overflow-hidden">
                  <summary class="cursor-pointer select-none list-none px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                      <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-pink-100 text-pink-700 text-sm font-semibold">{{ $item['week'] }}</span>
                      <div>
                        <p class="font-semibold text-slate-800">{{ $item['title'] }}</p>
                        <p class="text-xs text-slate-500">Trimester {{ $item['trimester'] }} • Minggu {{ $item['week'] }}</p>
                      </div>
                    </div>
                    <svg width="18" height="18" viewBox="0 0 24 24" class="text-slate-400" fill="currentColor" aria-hidden="true"><path d="M12 15.5 5 8.5l1.4-1.4 5.6 5.59 5.6-5.6L19 8.5z"/></svg>
                  </summary>
                  <div class="px-4 pb-4 text-slate-700">
                    <p class="leading-relaxed">{{ $item['desc'] }}</p>
                    <p class="mt-2 text-xs text-slate-500">Catatan: Materi lengkap dapat ditautkan dari Notion.</p>
                  </div>
                </details>
              </li>
            @endforeach
          </ul>
          <p id="guideCount" class="mt-2 text-xs text-slate-500" aria-live="polite"></p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
(function() {
  const input = document.getElementById('lmpDate');
  const btnHitung = document.getElementById('btnHitung');
  const btnReset = document.getElementById('btnReset');

  const usiaEl = document.getElementById('usia');
  const triEl = document.getElementById('trimester');
  const etdEl = document.getElementById('etd');
  const progressTextEl = document.getElementById('progressText');
  const progressBarEl = document.getElementById('progressBar');
  const statusEl = document.getElementById('calcStatus');

  function formatDate(d) {
    const pad = (n) => String(n).padStart(2, '0');
    return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;
  }

  function compute() {
    const val = input.value;
    if (!val) {
      statusEl.textContent = 'Silakan isi tanggal HPHT terlebih dahulu.';
      return;
    }
    const lmp = new Date(val + 'T00:00:00');
    const now = new Date();
    if (isNaN(lmp.getTime()) || lmp > now) {
      statusEl.textContent = 'Tanggal HPHT tidak valid.';
      return;
    }
    const msPerDay = 24 * 60 * 60 * 1000;
    const diffDays = Math.floor((now - lmp) / msPerDay);
    const weeks = Math.floor(diffDays / 7);
    const days = diffDays % 7;

    // ETD (HPL) = HPHT + 280 hari
    const etd = new Date(lmp.getTime() + (280 * msPerDay));

    // Trimester: T1 (0-13), T2 (14-27), T3 (28-42)
    let tri = 1;
    if (weeks >= 28) tri = 3;
    else if (weeks >= 14) tri = 2;

    const progress = Math.max(0, Math.min(100, Math.round((weeks / 40) * 100)));

    usiaEl.textContent = `${weeks} minggu ${days} hari`;
    triEl.textContent = `Trimester ${tri}`;
    etdEl.textContent = formatDate(etd);
    progressTextEl.textContent = `${progress}%`;
    progressBarEl.style.width = progress + '%';
    statusEl.textContent = 'Perhitungan selesai.';
  }

  function reset() {
    input.value = '';
    usiaEl.textContent = '-';
    triEl.textContent = '-';
    etdEl.textContent = '-';
    progressTextEl.textContent = '-';
    progressBarEl.style.width = '0%';
    statusEl.textContent = 'Data kalkulator direset.';
  }

  btnHitung?.addEventListener('click', compute);
  btnReset?.addEventListener('click', reset);
})();

(function() {
  const triButtons = document.querySelectorAll('.tri-btn');
  const items = Array.from(document.querySelectorAll('.guide-item'));
  const searchInput = document.getElementById('searchGuide');
  const countEl = document.getElementById('guideCount');

  let activeTri = 'all';
  let keyword = '';

  function apply() {
    let shown = 0;
    items.forEach(li => {
      const tri = li.getAttribute('data-trimester');
      const title = li.getAttribute('data-title') || '';
      const matchTri = (activeTri === 'all') || (String(tri) === String(activeTri));
      const matchKey = !keyword || title.includes(keyword.toLowerCase());
      const visible = matchTri && matchKey;
      li.style.display = visible ? '' : 'none';
      if (visible) shown++;
    });
    if (countEl) {
      countEl.textContent = `${shown} materi ditampilkan`;
    }
  }

  triButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      triButtons.forEach(b => {
        if (b === btn) {
          b.classList.remove('bg-slate-100','text-slate-700');
          b.classList.add('bg-pink-100','text-pink-700');
        } else {
          b.classList.remove('bg-pink-100','text-pink-700');
          b.classList.add('bg-slate-100','text-slate-700');
        }
      });
      activeTri = btn.getAttribute('data-tri') || 'all';
      apply();
    });
  });

  searchInput?.addEventListener('input', (e) => {
    keyword = (e.target.value || '').toLowerCase().trim();
    apply();
  });

  apply();
})();
</script>
@endpush
