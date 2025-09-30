@extends('app')

@section('title', 'Kontak | HaloBun')

@push('styles')
<style>
  .soft-card {
    background: linear-gradient(180deg, rgba(255,240,245,0.6), rgba(255,255,255,0.9));
  }
</style>
@endpush

@section('content')
{{-- Hero section dengan gradient text dan styling konsisten home.blade --}}
<section aria-labelledby="hero-contact" class="relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <div class="grid md:grid-cols-2 gap-8 items-center">
      <div>
        <h1 id="hero-contact" class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-900 text-balance">
          Kontak
          <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">HaloBun</span>
        </h1>
        <p class="mt-4 text-gray-600 leading-relaxed">
          HaloBun adalah aplikasi informasi kesehatan untuk ibu hamil dengan navigasi mudah,
          konten terstruktur, dan desain yang ramah digunakan di semua perangkat.
        </p>
      </div>
      {{-- Soft-card deskripsi dengan border & ikon bulat pink --}}
      <div class="soft-card rounded-2xl p-6 border border-pink-100">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-purple-400 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M4 4h16v6H4zM4 14h7v6H4zM13 14h7v6h-7z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-semibold text-gray-900">Tentang HaloBun</h2>
            <p class="mt-2 text-gray-600 text-sm leading-relaxed">
              Kami menyediakan artikel, video edukasi, FAQ, dan fasilitas kesehatan
              untuk mendukung perjalanan kehamilan Anda. Tampilan bersih, informasi mudah dipahami,
              dan pengalaman yang nyaman untuk ibu hamil.
            </p>
            <ul class="mt-3 text-sm text-gray-700 space-y-1">
              <li class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Panduan nutrisi & perkembangan janin
              </li>
              <li class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Tips persiapan persalinan
              </li>
              <li class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-pink-400"></span> Akses di semua perangkat
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Kontak card dengan rounded-2xl, border-pink-100, ikon lingkar pink --}}
<section aria-labelledby="hubungi-kami" class="mt-6 sm:mt-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 id="hubungi-kami" class="text-xl font-semibold text-gray-900">Hubungi Kami</h2>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      {{-- Email Card --}}
      <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
        <div class="p-5 flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0" aria-hidden="true">
            <svg class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 8l-9 6-9-6 M3 19h18"/>
            </svg>
          </div>
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold text-gray-900">Email</h3>
            <p class="mt-1 text-sm text-gray-600">Tanyakan apa pun seputar kehamilan Anda.</p>
            <div class="mt-3 flex flex-wrap items-center gap-2">
              <a href="mailto:hello@halobun.id" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                Kirim Email
              </a>
              <button type="button" onclick="copyText('hello@halobun.id','toast-email')" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                Salin
              </button>
            </div>
            <div id="toast-email" role="status" aria-live="polite" class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
              <span class="text-sm">Alamat email tersalin</span>
            </div>
          </div>
        </div>
        <p class="sr-only">Email: hello@halobun.id</p>
      </article>

      {{-- YouTube Card --}}
      <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
        <div class="p-5 flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0" aria-hidden="true">
            <svg class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" fill="currentColor">
              <path d="M8 5v14l11-7-11-7z"/>
            </svg>
          </div>
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold text-gray-900">YouTube</h3>
            <p class="mt-1 text-sm text-gray-600">Video edukasi singkat dan mudah diikuti.</p>
            <div class="mt-3 flex flex-wrap items-center gap-2">
              <a href="https://youtube.com/@HaloBun" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                Buka Channel
              </a>
              <button type="button" onclick="copyText('https://youtube.com/@HaloBun','toast-yt')" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                Salin
              </button>
            </div>
            <div id="toast-yt" role="status" aria-live="polite" class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
              <span class="text-sm">Link YouTube tersalin</span>
            </div>
          </div>
        </div>
        <p class="sr-only">YouTube: https://youtube.com/@HaloBun</p>
      </article>

      {{-- Phone Card --}}
      <article class="rounded-2xl border border-pink-100 bg-white hover:shadow-md transition overflow-hidden">
        <div class="p-5 flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center shrink-0" aria-hidden="true">
            <svg class="w-6 h-6 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 01-2.18 2 19.86 19.86 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.86 19.86 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
            </svg>
          </div>
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold text-gray-900">Telepon</h3>
            <p class="mt-1 text-sm text-gray-600">Hubungi kami pada jam kerja.</p>
            <div class="mt-3 flex flex-wrap items-center gap-2">
              <a href="tel:+6281234567890" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium hover:shadow-lg transition-all hover:scale-[1.02]">
                Panggil
              </a>
              <button type="button" onclick="copyText('+6281234567890','toast-phone')" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/90 text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 text-sm transition">
                Salin
              </button>
            </div>
            <div id="toast-phone" role="status" aria-live="polite" class="mt-2 hidden items-center gap-2 rounded-md bg-pink-100 px-3 py-2 text-pink-800">
              <span class="text-sm">Nomor telepon tersalin</span>
            </div>
          </div>
        </div>
        <p class="sr-only">Nomor telepon: +62 812-3456-7890</p>
      </article>
    </div>
  </div>
</section>

{{-- CTA section dengan border-pink-100 dan gradient background --}}
<section aria-labelledby="cta-faq" class="mt-12 sm:mt-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl border border-pink-100 bg-gradient-to-r from-pink-50 to-purple-50 p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
      <div>
        <h2 id="cta-faq" class="text-lg sm:text-xl font-semibold text-gray-900">Punya pertanyaan lain?</h2>
        <p class="mt-1 text-gray-700 text-sm">
          Silakan kunjungi halaman FAQ kami untuk jawaban cepat mengenai topik kehamilan.
        </p>
      </div>
      <a href="{{ url('/faq') }}"
         class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-white text-pink-600 ring-1 ring-pink-200 hover:bg-pink-50 transition font-medium">
        Buka FAQ
      </a>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  function copyText(text, toastId) {
    if (!navigator.clipboard) {
      // fallback seleksi manual
      const ta = document.createElement('textarea');
      ta.value = text;
      document.body.appendChild(ta);
      ta.select();
      try { document.execCommand('copy'); } catch (e) {}
      document.body.removeChild(ta);
      showToast(toastId);
      return;
    }
    navigator.clipboard.writeText(text).then(function() {
      showToast(toastId);
    }).catch(function() {
      showToast(toastId);
    });
  }

  function showToast(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.classList.remove('hidden');
    el.classList.add('flex');
    setTimeout(() => {
      el.classList.add('hidden');
      el.classList.remove('flex');
    }, 1800);
  }
</script>
@endpush
