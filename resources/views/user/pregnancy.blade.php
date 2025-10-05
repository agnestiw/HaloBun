@extends('layouts.app')

@section('content')
    {{-- Bagian utama dari halaman kalkulator --}}
    <section class="py-10 md:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Mengganti .kalkulator-kehamilan dengan style kartu dari home.blade.php --}}
            <div class="rounded-2xl border border-pink-100 bg-white p-6 md:p-8 shadow-sm">

                {{-- Judul Utama --}}
                <h1 class="text-3xl md:text-4xl font-semibold text-center text-gray-900 border-b border-pink-100 pb-4">
                    Kalkulator Kehamilan
                </h1>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                    {{-- Kolom Input --}}
                    <div class="space-y-4">
                        {{-- Input HPHT --}}
                        <div class="form-group">
                            <label for="hpht" class="block text-sm font-medium text-gray-700 mb-1">Hari Pertama Haid
                                Terakhir (HPHT)</label>
                            <input type="date" id="hpht" name="hpht"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 px-4 py-2 text-base">
                        </div>

                        {{-- Input Siklus --}}
                        <div class="form-group">
                            <label for="siklus" class="block text-sm font-medium text-gray-700 mb-1">Lama Siklus
                                Menstruasi (Hari)</label>
                            <select id="siklus" name="siklus"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 px-4 py-2 text-base">
                                <option value="21">21 hari</option>
                                <option value="22">22 hari</option>
                                <option value="23">23 hari</option>
                                <option value="24">24 hari</option>
                                <option value="25">25 hari</option>
                                <option value="26">26 hari</option>
                                <option value="27">27 hari</option>
                                <option value="28" selected>28 hari (Normal)</option>
                                <option value="29">29 hari</option>
                                <option value="30">30 hari</option>
                                <option value="31">31 hari</option>
                                <option value="32">32 hari</option>
                                <option value="33">33 hari</option>
                                <option value="34">34 hari</option>
                                <option value="35">35 hari</option>
                            </select>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="button-group flex flex-col sm:flex-row gap-3">
                            <button
                                class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 text-white font-medium hover:opacity-95 transition"
                                onclick="hitungKehamilan()">Hitung Kehamilan</button>
                            <button
                                class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-pink-100 text-pink-700 hover:bg-pink-200 transition"
                                onclick="resetForm()">Reset</button>
                        </div>
                    </div>

                    {{-- Kolom Hasil --}}
                    <div id="hasil"
                        class="result-container mt-6 md:mt-0 rounded-xl border border-pink-100 bg-pink-50/60 p-5"
                        style="display: none;">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Hasil Perhitungan</h2>
                        <div id="hasil-detail" class="space-y-3">
                            {{-- Hasil akan dimasukkan oleh JavaScript di sini --}}
                        </div>
                    </div>
                </div>

                {{-- Semua konten informasi lainnya --}}
                <div class="mt-10 space-y-8">
                    <div class="info-section bg-white p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Tentang Kalkulator Kehamilan</h3>
                        <p class="text-gray-600">Kalkulator kehamilan adalah alat yang membantu menghitung usia kehamilan
                            dan memperkirakan Hari Perkiraan Lahir (HPL) berdasarkan Hari Pertama Haid Terakhir (HPHT) dan
                            lama siklus menstruasi. Perhitungan ini menggunakan metode Naegele yang telah terbukti akurat
                            untuk sebagian besar kehamilan.</p>
                        <ul class="info-list mt-4 space-y-2">
                            <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                    class="text-gray-700">Menghitung usia kehamilan dalam minggu dan hari</span></li>
                            <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                    class="text-gray-700">Memperkirakan Hari Perkiraan Lahir (HPL)</span></li>
                            <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                    class="text-gray-700">Menentukan trimester kehamilan saat ini</span></li>
                            <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                    class="text-gray-700">Memberikan perkiraan tanggal konsepsi</span></li>
                            <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                    class="text-gray-700">Menampilkan informasi perkembangan janin</span></li>
                        </ul>
                    </div>

                    <div class="tips-grid grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="tip-card bg-white p-6 rounded-xl border border-gray-200">
                            <h4 class="font-semibold text-pink-600 mb-3">Tips Trimester Pertama</h4>
                            <ul class="info-list space-y-2 text-sm">
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Konsumsi asam folat 400-600 mcg per hari</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Hindari alkohol dan merokok</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Perbanyak istirahat</span></li>
                            </ul>
                        </div>
                        <div class="tip-card bg-white p-6 rounded-xl border border-gray-200">
                            <h4 class="font-semibold text-pink-600 mb-3">Tips Trimester Kedua</h4>
                            <ul class="info-list space-y-2 text-sm">
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Mulai olahraga ringan</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Lakukan USG detail</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Jaga kenaikan berat badan</span></li>
                            </ul>
                        </div>
                        <div class="tip-card bg-white p-6 rounded-xl border border-gray-200">
                            <h4 class="font-semibold text-pink-600 mb-3">Tips Trimester Ketiga</h4>
                            <ul class="info-list space-y-2 text-sm">
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Siapkan tas persalinan</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Ikuti kelas laktasi</span></li>
                                <li class="flex items-start"><span class="text-pink-500 mr-2">✓</span><span
                                        class="text-gray-700">Pantau gerakan janin</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="warning bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-r-lg">
                        <h4 class="font-bold">Penting untuk Diingat</h4>
                        <p>Hasil perhitungan ini hanya berupa perkiraan. Selalu konsultasikan dengan dokter kandungan untuk
                            pemantauan kehamilan yang lebih akurat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section aria-labelledby="weekly-guide" class="py-10 md:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <header class="text-center max-w-3xl mx-auto">
                <h2 id="weekly-guide" class="text-3xl md:text-4xl font-semibold text-gray-900">
                    Panduan Perkembangan Janin per Minggu
                </h2>
                <p class="mt-3 text-gray-600">
                    Ikuti perjalanan menakjubkan si kecil dari minggu ke minggu, mulai dari pembuahan hingga menjelang
                    persalinan.
                </p>
            </header>

            <div class="mt-10 space-y-12">
                {{-- Loop untuk setiap Trimester --}}
                @foreach ($pregnancyData as $trimesterName => $trimesterData)
                    <div class="trimester-section">
                        <div class="sticky top-0  backdrop-blur-sm py-4 z-10 border-b-2 border-pink-200">
                            <h3 class="text-2xl font-bold text-pink-700">{{ $trimesterName }}</h3>
                            <p class="text-sm text-gray-600">{{ $trimesterData['range'] }}</p>
                        </div>

                        <div class="mt-6 space-y-8">
                            {{-- Loop untuk setiap Minggu di dalam Trimester --}}
                            @foreach ($trimesterData['weeks'] as $weekNumber => $weekData)
                                <div id="minggu-{{ $weekNumber }}"
                                    class="week-card grid grid-cols-1 md:grid-cols-3 gap-6 items-start bg-white p-5 rounded-2xl border border-pink-100 shadow-sm">

                                    {{-- Kolom Gambar --}}
                                    <div class="md:col-span-1 text-center">
                                        <h4 class="text-xl font-semibold text-gray-800">{{ $weekData['title'] }}</h4>
                                        <img src="{{ asset($weekData['image']) }}" alt="{{ $weekData['title'] }}"
                                            class="w-full h-auto max-w-[200px] mx-auto my-4">
                                        <div class="text-center">
                                            <p class="text-base font-medium text-gray-700">Bayi Bunda Seukuran
                                                {{ $weekData['size'] }}</p>
                                            <div class="mt-2 flex justify-center divide-x text-sm">
                                                <div class="px-3">
                                                    <p class="font-semibold text-pink-600">{{ $weekData['weight'] }}</p>
                                                    <p class="text-gray-500">Berat</p>
                                                </div>
                                                <div class="px-3">
                                                    <p class="font-semibold text-pink-600">{{ $weekData['height'] }}</p>
                                                    <p class="text-gray-500">Tinggi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Kolom Penjelasan --}}
                                    <div
                                        class="md:col-span-2 prose max-w-none prose-p:text-gray-600 prose-headings:text-gray-900 prose-strong:text-pink-600">
                                        {!! $weekData['content'] !!}

                                        @if (!empty($weekData['mom_tips']))
                                            <div class="mt-4 p-4 bg-pink-50 rounded-lg">
                                                <strong>Bunda Jangan Lupa</strong>
                                                <ul class="list-disc pl-5 mt-2 space-y-1">
                                                    @foreach ($weekData['mom_tips'] as $tip)
                                                        <li>{{ $tip }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if (!empty($weekData['dad_tips']))
                                            <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                                <strong class="text-blue-600">Ayah Hebat</strong>
                                                <ul class="list-disc pl-5 mt-2 space-y-1">
                                                    @foreach ($weekData['dad_tips'] as $tip)
                                                        <li>{{ $tip }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Script tidak diubah, hanya memastikan ID elemen HTML sesuai --}}
    <script>
        function hitungKehamilan() {
            const hphtInput = document.getElementById('hpht').value;
            const siklusInput = parseInt(document.getElementById('siklus').value);

            if (!hphtInput) {
                alert('Silakan masukkan tanggal HPHT terlebih dahulu.');
                return;
            }

            const hpht = new Date(hphtInput);
            const hariIni = new Date();

            const adjustmentDays = siklusInput - 28;
            const hpl = new Date(hpht);
            hpl.setDate(hpl.getDate() + 280 + adjustmentDays);

            const selisihHari = Math.floor((hariIni - hpht) / (1000 * 60 * 60 * 24));
            const usiaKehamilan = Math.max(0, selisihHari);
            const usiaMinggu = Math.floor(usiaKehamilan / 7);
            const usiaHari = usiaKehamilan % 7;

            let trimester = '';
            let infoTrimester = '';
            if (usiaMinggu <= 12) {
                trimester = 'Trimester Pertama';
                infoTrimester =
                    'Periode pembentukan organ-organ vital bayi. Penting untuk mengonsumsi asam folat dan menjaga pola makan yang sehat.';
            } else if (usiaMinggu <= 27) {
                trimester = 'Trimester Kedua';
                infoTrimester =
                    'Periode yang paling nyaman. Anda mulai dapat merasakan gerakan janin dan melakukan USG untuk mengetahui jenis kelamin bayi.';
            } else {
                trimester = 'Trimester Ketiga';
                infoTrimester =
                    'Periode persiapan persalinan. Pastikan Anda sudah menyiapkan tas persalinan dan rencana melahirkan.';
            }

            const konsepsi = new Date(hpht);
            konsepsi.setDate(konsepsi.getDate() + (siklusInput - 14));

            const sisaHari = Math.ceil((hpl - hariIni) / (1000 * 60 * 60 * 24));

            const formatTanggal = (tanggal) => {
                const bulanIndonesia = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                return `${tanggal.getDate()} ${bulanIndonesia[tanggal.getMonth()]} ${tanggal.getFullYear()}`;
            };

            let beratJanin = '';
            if (usiaMinggu >= 20) {
                const beratEstimasi = Math.pow(usiaMinggu - 5.6, 3) / 100;
                beratJanin = `Perkiraan berat janin: ${Math.round(beratEstimasi)} gram`;
            }

            // Menggunakan style dari Tailwind untuk hasil
            let hasilHTML = `
            <div class="flex justify-between py-2 border-b border-pink-200">
                <span class="text-sm font-medium text-gray-600">Usia Kehamilan:</span>
                <span class="text-sm font-semibold text-pink-600">${usiaMinggu} minggu ${usiaHari} hari</span>
            </div>
            <div class="flex justify-between py-2 border-b border-pink-200">
                <span class="text-sm font-medium text-gray-600">HPL:</span>
                <span class="text-sm font-semibold text-pink-600">${formatTanggal(hpl)}</span>
            </div>
            <div class="flex justify-between py-2 border-b border-pink-200">
                <span class="text-sm font-medium text-gray-600">Trimester:</span>
                <span class="text-sm font-semibold text-pink-600">${trimester}</span>
            </div>
            <div class="flex justify-between py-2">
                <span class="text-sm font-medium text-gray-600">Sisa Waktu:</span>
                <span class="text-sm font-semibold text-pink-600">${sisaHari > 0 ? sisaHari + ' hari lagi' : 'Sudah melewati HPL'}</span>
            </div>
        `;

            if (beratJanin) {
                hasilHTML += `
                <div class="flex justify-between py-2 border-t border-pink-200 mt-2">
                    <span class="text-sm font-medium text-gray-600">Estimasi Berat Janin:</span>
                    <span class="text-sm font-semibold text-pink-600">${Math.round(Math.pow(usiaMinggu - 5.6, 3) / 100)} gram</span>
                </div>
            `;
            }

            document.getElementById('hasil-detail').innerHTML = hasilHTML;
            document.getElementById('hasil').style.display = 'block';

            document.getElementById('hasil').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function resetForm() {
            document.getElementById('hpht').value = '';
            document.getElementById('siklus').value = '28';
            document.getElementById('hasil').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const hariIni = new Date().toISOString().split('T')[0];
            document.getElementById('hpht').max = hariIni;
        });
    </script>
@endpush
