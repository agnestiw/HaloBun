<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PregnancyController extends Controller
{
    public function index()
    {
        $pregnancyData = [
            'Trimester 1' => [
                'range' => 'Minggu 1-12',
                'weeks' => [
                    1 => [
                        'title' => 'Minggu 1: Awal Perjalanan',
                        'image' => 'img/weeks/week1.svg',
                        'size' => 'Seukuran Biji Poppy',
                        'weight' => '~1 gr',
                        'height' => '~0.1 cm',
                        'content' => '<p>Pada minggu pertama, tubuh Anda bersiap untuk ovulasi. Meskipun pembuahan belum terjadi, minggu ini dihitung sebagai bagian dari 40 minggu kehamilan Anda.</p>',
                        'mom_tips' => [
                            'Mulai konsumsi vitamin prenatal, terutama asam folat.',
                            'Jaga pola makan sehat dan seimbang.',
                            'Hindari alkohol dan merokok.',
                        ],
                        'dad_tips' => [
                            'Berikan dukungan emosional pada pasangan.',
                            'Ikut serta dalam gaya hidup sehat bersama.',
                        ],
                    ],
                    2 => [
                        'title' => 'Minggu 2: Ovulasi & Pembuahan',
                        'image' => 'img/weeks/week2.svg',
                        'size' => 'Seukuran Biji Apel',
                        'weight' => '~2 gr',
                        'height' => '~0.2 cm',
                        'content' => '<p>Ovulasi terjadi, dan jika sel telur bertemu dengan sperma, pembuahan akan dimulai. Zigot akan terbentuk dan mulai membelah diri sambil bergerak menuju rahim.</p>',
                        'mom_tips' => [
                            'Perhatikan tanda-tanda ovulasi.',
                            'Lanjutkan gaya hidup sehat.',
                        ],
                        'dad_tips' => [
                            'Pahami siklus kesuburan pasangan.',
                            'Jaga komunikasi yang baik.',
                        ],
                    ],
                    // ... Tambahkan data untuk Minggu 3 sampai 12 di sini ...
                ],
            ],
            'Trimester 2' => [
                'range' => 'Minggu 13-27',
                'weeks' => [
                    13 => [
                        'title' => 'Minggu 13: Awal Trimester Kedua',
                        'image' => 'img/weeks/week13.svg',
                        'size' => 'Seukuran Buah Plum',
                        'weight' => '~25 gr',
                        'height' => '~7.4 cm',
                        'content' => '<p>Risiko keguguran menurun drastis. Janin kini memiliki sidik jari dan mulai bisa merespons rangsangan dari luar. Mual di pagi hari biasanya mulai mereda.</p>',
                        'mom_tips' => [
                            'Mulai lakukan olahraga ringan yang aman.',
                            'Fokus pada asupan kalsium untuk tulang janin.',
                        ],
                        'dad_tips' => [
                            'Ajak pasangan untuk berjalan-jalan santai.',
                            'Mulai pikirkan nama bayi bersama.',
                        ],
                    ],
                    // ... Tambahkan data untuk Minggu 14 sampai 27 di sini ...
                ],
            ],
            'Trimester 3' => [
                'range' => 'Minggu 28-40',
                'weeks' => [
                    28 => [
                        'title' => 'Minggu 28: Memasuki Trimester Akhir',
                        'image' => 'img/weeks/week28.svg',
                        'size' => 'Seukuran Terong',
                        'weight' => '~1 kg',
                        'height' => '~37.6 cm',
                        'content' => '<p>Mata janin sudah bisa terbuka dan berkedip. Sistem saraf pusatnya berkembang pesat. Bunda mungkin akan mulai merasakan kontraksi palsu (Braxton Hicks).</p>',
                        'mom_tips' => [
                            'Hitung gerakan janin setiap hari.',
                            'Mulai ikuti kelas persiapan persalinan.',
                        ],
                        'dad_tips' => [
                            'Bantu pasangan menyiapkan perlengkapan bayi.',
                            'Pelajari tanda-tanda persalinan.',
                        ],
                    ],
                    // ... Tambahkan data untuk Minggu 29 sampai 40 di sini ...
                ],
            ],
        ];

        return view('user.pregnancy', compact('pregnancyData'));
    }
}
