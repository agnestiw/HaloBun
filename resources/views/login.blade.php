@extends('app')

@section('content')
<main class="min-h-[70vh] py-10">
  <div class="container mx-auto px-4 max-w-5xl">
     {{-- Hero  --}}
    <header class="text-center mb-8">
      <h1 class="mt-3 text-3xl md:text-4xl font-bold text-balance">
        <span class="bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">Masuk ke HaloBun</span>
      </h1>
      <p class="mt-3 text-sm md:text-base text-gray-600 max-w-2xl mx-auto leading-relaxed">
        Akses informasi kehamilan yang tepercaya, panduan mingguan, dan fitur pelacak kehamilan dalam satu tempat.
      </p>
    </header>

     {{-- Auth card  --}}
    <section class="mx-auto max-w-md">
      <div class="rounded-2xl border border-pink-100 bg-white/90 shadow-sm p-6 md:p-7">
        @if (session('status'))
          <div class="mb-4 rounded-lg border border-pink-200 bg-pink-50 text-pink-700 px-4 py-3 text-sm">
            {{ session('status') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-4 rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3 text-sm">
            <ul class="list-disc ps-5 space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="/login" class="space-y-5" novalidate>
          @csrf

           {{-- Email  --}}
          <div>
            <label for="email" class="block text-sm font-medium text-gray-800 mb-1">
              {{-- Email --}}
            </label>
            <div class="relative">
              <input
                type="email"
                id="email"
                name="email"
                required
                autocomplete="email"
                value="{{ old('email') }}"
                class="w-full rounded-xl border border-pink-200/70 focus:border-pink-300 focus:ring-4 focus:ring-pink-100 px-4 py-3 text-sm text-gray-900 placeholder:text-gray-400"
                placeholder="contoh@halo.bun" />
              <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-pink-400">
                 {{-- mail icon  --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M1.5 5.25A2.25 2.25 0 0 1 3.75 3h16.5A2.25 2.25 0 0 1 22.5 5.25v13.5A2.25 2.25 0 0 1 20.25 21H3.75A2.25 2.25 0 0 1 1.5 18.75V5.25ZM3 6l9 6 9-6v-.75A.75.75 0 0 0 20.25 4.5H3.75A.75.75 0 0 0 3 5.25V6Z"/>
                </svg>
              </div>
            </div>
          </div>

           {{-- Password  --}}
          <div>
            <label for="password" class="block text-sm font-medium text-gray-800 mb-1">
              Kata Sandi
            </label>
            <div class="relative">
              <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
                class="w-full rounded-xl border border-pink-200/70 focus:border-pink-300 focus:ring-4 focus:ring-pink-100 px-4 py-3 text-sm text-gray-900 placeholder:text-gray-400"
                placeholder="••••••••" />
              <button
                type="button"
                id="togglePassword"
                class="absolute inset-y-0 right-2.5 my-1.5 inline-flex items-center justify-center rounded-lg px-2.5 text-pink-500 hover:text-pink-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-pink-300"
                aria-label="Tampilkan kata sandi">
                 {{-- eye icon  --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M12 5C7 5 2.73 8.11 1 12c1.73 3.89 6 7 11 7s9.27-3.11 11-7c-1.73-3.89-6-7-11-7Zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10Z"/>
                </svg>
              </button>
            </div>
          </div>

           {{-- Options  --}}
          <div class="flex items-center justify-between gap-3">
            <label class="inline-flex items-center gap-2 text-sm text-gray-700">
              <input type="checkbox" name="remember" class="h-4 w-4 rounded border-pink-300 text-pink-600 focus:ring-pink-400" />
              {{-- Ingat saya --}}
            </label>
            <a href="#" class="text-sm font-medium text-pink-600 hover:text-pink-700 underline underline-offset-4">
              Lupa kata sandi?
            </a>
          </div>

           {{-- Submit  --}}
          <button
            type="submit"
            class="w-full inline-flex items-center justify-center rounded-full bg-gradient-to-r from-pink-500 to-purple-500 px-5 py-3 text-white text-sm font-semibold shadow-sm hover:opacity-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-pink-200">
            Masuk
          </button>
        </form>

         {{-- Divider  --}}
        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <span class="w-full border-t border-pink-100"></span>
          </div>
          <div class="relative flex justify-center">
            <span class="bg-white px-3 text-xs text-gray-500">atau</span>
          </div>
        </div>

         {{-- Secondary actions  --}}
        <div class="space-y-3">
          {{-- <a
            href="#"
            class="w-full inline-flex items-center justify-center rounded-full border border-pink-200 bg-pink-50/60 text-pink-700 px-5 py-3 text-sm font-semibold hover:bg-pink-50 focus:outline-none focus-visible:ring-4 focus-visible:ring-pink-200">
            Buat Akun Baru
          </a> --}}
          <a
            href="/"
            class="w-full inline-flex items-center justify-center rounded-full border border-pink-200 bg-white text-gray-700 px-5 py-3 text-sm font-medium hover:bg-gray-50 focus:outline-none focus-visible:ring-4 focus-visible:ring-pink-200">
            Kembali ke Beranda
          </a>
        </div>
      </div>

       {{-- Small reassurance  --}}
      <p class="text-center text-xs text-gray-500 mt-4">
        Dengan masuk, Anda menyetujui <a href="#" class="text-pink-600 underline">Ketentuan</a> dan <a href="#" class="text-pink-600 underline">Kebijakan Privasi</a> HaloBun.
      </p>
    </section>
  </div>
</main>
@endsection

@push('scripts')
<script>
  (function () {
    const pw = document.getElementById('password');
    const toggle = document.getElementById('togglePassword');
    if (pw && toggle) {
      toggle.addEventListener('click', () => {
        const isPassword = pw.getAttribute('type') === 'password';
        pw.setAttribute('type', isPassword ? 'text' : 'password');
        toggle.setAttribute('aria-label', isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
      });
    }
  })();
</script>
@endpush
