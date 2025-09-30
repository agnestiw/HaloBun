@extends('layouts.app')

@section('content')
@php
  $categories = $categories ?? ['Nutrisi', 'Persalinan', 'Kondisi Darurat'];
  if (empty($faqs) || !is_array($faqs)) {
      $faqs = [
          [
              'question' => 'Apa saja sumber nutrisi penting selama trimester pertama?',
              'answer' => 'Fokus pada asam folat, zat besi, protein, dan cairan yang cukup. Makan dalam porsi kecil tapi sering untuk membantu mual.',
              'category' => 'Nutrisi',
              'tags' => ['trimester 1', 'mual', 'asam folat']
          ],
          [
              'question' => 'Kapan saya perlu ke fasilitas kesehatan jika kontraksi mulai terasa?',
              'answer' => 'Jika kontraksi teratur setiap 5 menit selama 1 jam, atau ada perdarahan/ketuban pecah, segera ke fasilitas kesehatan terdekat.',
              'category' => 'Persalinan',
              'tags' => ['kontraksi', 'ketuban', 'tanda persalinan']
          ],
          [
              'question' => 'Apa tanda kondisi darurat pada kehamilan?',
              'answer' => 'Sakit kepala berat, pandangan kabur, bengkak mendadak pada wajah/tangan, perdarahan, nyeri hebat perut, atau gerak janin berkurang.',
              'category' => 'Kondisi Darurat',
              'tags' => ['darurat', 'preeklamsia', 'perdarahan']
          ],
          [
              'question' => 'Bagaimana cara mengatur pola makan saat trimester kedua?',
              'answer' => 'Tambahkan asupan protein, kalsium, dan serat. Tetap hidrasi. Pilih camilan sehat seperti buah, yogurt, dan kacang.',
              'category' => 'Nutrisi',
              'tags' => ['trimester 2', 'kalsium', 'protein']
          ],
          [
              'question' => 'Apa yang perlu dipersiapkan untuk persalinan?',
              'answer' => 'Siapkan tas persalinan (dokumen, pakaian ibu & bayi), rencana transportasi, serta nomor darurat bidan/dokter.',
              'category' => 'Persalinan',
              'tags' => ['persiapan', 'tas persalinan', 'dokumen']
          ],
          [
              'question' => 'Kapan harus segera ke IGD saat hamil?',
              'answer' => 'Jika ada perdarahan banyak, nyeri perut hebat, demam tinggi, pingsan, atau gerak janin tidak terasa.',
              'category' => 'Kondisi Darurat',
              'tags' => ['igd', 'darurat', 'demam']
          ],
      ];
  }
@endphp

<section class="py-10 md:py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <div class="text-center max-w-3xl mx-auto">
      <h1 class="text-balance text-3xl md:text-4xl font-semibold text-gray-900">
        Pertanyaan Umum (<span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">FAQ</span>) Kehamilan
      </h1>
      <p class="mt-3 text-pretty text-gray-600">
        Temukan jawaban cepat tentang nutrisi, persalinan, dan kondisi darurat. Gunakan pencarian dan kategori untuk menyaring topik.
      </p>
    </div>

    <div class="mt-8 grid gap-4 md:grid-cols-3">
      <div class="md:col-span-2">
        <label for="faqSearch" class="sr-only">Cari FAQ</label>
        <div class="flex items-center gap-2 rounded-xl border border-pink-100 bg-white px-3 py-2 shadow-sm">
          <svg class="h-5 w-5 text-pink-500" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <input
            id="faqSearch"
            type="search"
            placeholder="Cari berdasarkan kata kunci (mis. mual, kontraksi, asam folat)..."
            class="w-full bg-transparent outline-none placeholder:text-gray-400 text-gray-900"
            autocomplete="off"
          />
        </div>
        <p id="faqCount" class="mt-2 text-sm text-gray-500">Menampilkan {{ count($faqs) }} pertanyaan</p>
      </div>

      <div class="md:col-span-1">
        <div class="rounded-xl border border-pink-100 bg-white p-3 shadow-sm">
          <h3 class="text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
            <svg class="h-4 w-4 text-pink-500" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M20.59 13.41 12 22 2 12l8.59-8.59A2 2 0 0 1 12.83 3H18a2 2 0 0 1 2 2v5.17a2 2 0 0 1-.59 1.41Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <circle cx="7.5" cy="7.5" r="1.5" fill="currentColor"/>
            </svg>
            Kategori
          </h3>
          <div class="flex flex-wrap gap-2" id="faqCategoryChips" role="tablist" aria-label="Filter kategori">
            <button
              type="button"
              class="faq-chip inline-flex items-center rounded-full border px-3 py-1.5 text-sm transition
                     border-pink-300 bg-pink-50 text-pink-800"
              data-category="Semua" role="tab" aria-selected="true">Semua</button>
            @foreach ($categories as $cat)
              <button
                type="button"
                class="faq-chip inline-flex items-center rounded-full border px-3 py-1.5 text-sm transition
                       border-pink-100 bg-white text-gray-700 hover:bg-pink-50 hover:border-pink-200"
                data-category="{{ $cat }}" role="tab" aria-selected="false">
                {{ $cat }}
              </button>
            @endforeach
          </div>
          <button id="resetFilters" type="button"
                  class="mt-3 w-full rounded-lg border border-pink-200 text-pink-700 hover:bg-pink-50 px-3 py-2 text-sm">
            Reset Filter
          </button>
        </div>
      </div>
    </div>

    <div id="faqList" class="mt-8 grid gap-4">
      @foreach ($faqs as $idx => $item)
        @php
          $cat = $item['category'] ?? 'Lainnya';
          $q = $item['question'] ?? '';
          $a = $item['answer'] ?? '';
          $tags = implode(' ', $item['tags'] ?? []);
          $searchBlob = strtolower(trim($q.' '.$a.' '.$cat.' '.$tags));
        @endphp

        <details
          class="faq-card group rounded-xl border border-pink-100 bg-white p-0 shadow-sm"
          data-category="{{ $cat }}"
          data-search="{{ $searchBlob }}"
          open="{{ $idx < 2 ? true : false }}"
        >
          <summary class="flex cursor-pointer list-none items-start justify-between gap-3 px-4 py-3 md:px-5 md:py-4">
            <div class="flex-1">
              <span class="inline-flex items-center gap-2">
                <span class="inline-block rounded-full bg-pink-50 px-2 py-0.5 text-xs font-medium text-pink-700">
                  {{ $cat }}
                </span>
              </span>
              <h3 class="mt-1 text-base md:text-lg font-medium text-gray-900">
                {{ $q }}
              </h3>
            </div>
            <svg class="mt-1 h-5 w-5 shrink-0 text-pink-600 group-open:rotate-180 transition-transform"
                 viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </summary>
          <div class="px-4 pb-4 md:px-5 md:pb-5">
            <p class="text-gray-700 leading-relaxed">
              {{ $a }}
            </p>
            @if(!empty($item['tags']))
              <div class="mt-3 flex flex-wrap gap-2">
                @foreach ($item['tags'] as $t)
                  <span class="rounded-full bg-gray-100 text-gray-700 px-2.5 py-1 text-xs">#{{ $t }}</span>
                @endforeach
              </div>
            @endif
          </div>
        </details>
      @endforeach
    </div>

  </div>
</section>
@endsection

@push('styles')
<style>
  .faq-chip {
    border-radius: 9999px;
    border: 1px solid #e0e7ff;
    background-color: #ffffff;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    color: #374151;
  }
  .faq-chip.active {
    border-color: #dc2626;
    background-color: #fee2e2;
    color: #b91c1c;
  }
</style>
@endpush

@push('scripts')
<script>
  (function () {
    const $search = document.getElementById('faqSearch');
    const $count = document.getElementById('faqCount');
    const $list = document.getElementById('faqList');
    const $chips = Array.from(document.querySelectorAll('#faqCategoryChips .faq-chip'));
    const $reset = document.getElementById('resetFilters');

    let state = { q: '', cat: 'Semua' };

    function normalize(s) {
      return (s || '').toString().toLowerCase().normalize('NFKD').replace(/\s+/g, ' ').trim();
    }

    function applyFilters() {
      const items = Array.from($list.querySelectorAll('.faq-card'));
      let visible = 0;

      items.forEach(el => {
        const cat = el.getAttribute('data-category') || '';
        const blob = el.getAttribute('data-search') || '';
        const matchCat = state.cat === 'Semua' || cat === state.cat;
        const matchQ = !state.q || blob.includes(state.q);

        const show = matchCat && matchQ;
        el.style.display = show ? '' : 'none';
        if (show) visible++;
      });

      if ($count) $count.textContent = `Menampilkan ${visible} pertanyaan`;
    }

    function setChipActiveStyles(btn, active) {
      btn.classList.toggle('border-pink-300', active);
      btn.classList.toggle('bg-pink-50', active);
      btn.classList.toggle('text-pink-800', active);

      btn.classList.toggle('border-pink-100', !active);
      btn.classList.toggle('bg-white', !active);
      btn.classList.toggle('text-gray-700', !active);
    }

    // Search
    if ($search) {
      $search.addEventListener('input', () => {
        state.q = normalize($search.value);
        applyFilters();
      });
    }

    // Category chips
    $chips.forEach(btn => {
      btn.addEventListener('click', () => {
        $chips.forEach(b => {
          b.setAttribute('aria-selected', 'false');
          setChipActiveStyles(b, false);
        });
        btn.setAttribute('aria-selected', 'true');
        setChipActiveStyles(btn, true);
        state.cat = btn.getAttribute('data-category') || 'Semua';
        applyFilters();
      });
    });

    // Reset
    if ($reset) {
      $reset.addEventListener('click', () => {
        state.q = '';
        state.cat = 'Semua';
        if ($search) $search.value = '';
        $chips.forEach(b => {
          const isAll = b.getAttribute('data-category') === 'Semua';
          b.setAttribute('aria-selected', isAll ? 'true' : 'false');
          setChipActiveStyles(b, isAll);
        });
        applyFilters();
      });
    }

    // Initial ensure classes reflect state
    $chips.forEach(b => {
      const isAll = b.getAttribute('data-category') === 'Semua';
      setChipActiveStyles(b, isAll);
      b.setAttribute('aria-selected', isAll ? 'true' : 'false');
    });
    applyFilters();
  })();
</script>
@endpush
