<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $latestArticles = Article::where('status', 'Published')
                                 ->where('published_at', '<=', now())
                                 ->orderBy('published_at', 'desc') // Urutkan berdasarkan tanggal publikasi terbaru
                                 ->take(3) // Ambil 3 artikel
                                 ->get();

        // Anda bisa tambahkan logika untuk latestVideos, latestFaqs, latestFacilities
        // jika Anda memiliki model dan data untuk itu.
        // Untuk sekarang, kita biarkan data dummy untuk bagian lain jika Anda belum membuatnya dinamis.
        
        // Contoh data dummy untuk bagian lain jika belum ada di database
        $latestVideos = [
            [
                'title' => 'Senam Hamil: Peregangan 10 Menit',
                'url' => '#',
                'duration' => '10:12',
                'thumbnail' => 'https://img.youtube.com/vi/ysz5S6PUM-U/hqdefault.jpg',
            ],
            [
                'title' => 'Tips Mengurangi Mual di Pagi Hari',
                'url' => '#',
                'duration' => '06:47',
                'thumbnail' => 'https://img.youtube.com/vi/jNQXAC9IVRw/hqdefault.jpg',
            ],
            [
                'title' => 'Persiapan Persalinan: Checklist untuk Ibu',
                'url' => '#',
                'duration' => '08:03',
                'thumbnail' => 'https://img.youtube.com/vi/oHg5SJYRHA0/hqdefault.jpg',
            ],
        ];

        $latestFaqs = [
            [
                'question' => 'Apakah aman minum kopi saat hamil?',
                'answer' =>
                    'Boleh dalam jumlah terbatas (sekitar 1 cangkir/hari). Konsultasikan dengan tenaga kesehatan jika memiliki kondisi tertentu.',
            ],
            [
                'question' => 'Kapan pertama kali saya perlu USG?',
                'answer' =>
                    'Biasanya pada trimester pertama (sekitar minggu ke-8–12) untuk memastikan perkembangan janin dan usia kehamilan.',
            ],
            [
                'question' => 'Bagaimana cara mengatasi kram kaki di malam hari?',
                'answer' =>
                    'Cobalah peregangan ringan sebelum tidur, jaga hidrasi, dan penuhi kebutuhan kalsium serta magnesium.',
            ],
        ];

        $latestFacilities = [
            [
                'name' => 'RSIA Sehat Ibu',
                'type' => 'Rumah Sakit Ibu & Anak',
                'address' => 'Jl. Melati No. 12, Bandung',
                'distance_km' => 2.4,
                'open_now' => true,
                'url' => url('/fasilitas/rsia-sehat-ibu'),
                'map_url' => 'https://maps.google.com/?q=RSIA+Sehat+Ibu+Bandung',
            ],
            [
                'name' => 'Klinik Bunda Ceria',
                'type' => 'Klinik',
                'address' => 'Jl. Kenanga No. 5, Jakarta Selatan',
                'distance_km' => 5.8,
                'open_now' => false,
                'url' => url('/fasilitas/klinik-bunda-ceria'),
                'map_url' => 'https://maps.google.com/?q=Klinik+Bunda+Ceria+Jakarta',
            ],
            [
                'name' => 'Puskesmas Mawar',
                'type' => 'Puskesmas',
                'address' => 'Jl. Mawar No. 20, Yogyakarta',
                'distance_km' => 1.1,
                'open_now' => true,
                'url' => url('/fasilitas/puskesmas-mawar'),
                'map_url' => 'https://maps.google.com/?q=Puskesmas+Mawar+Yogyakarta',
            ],
        ];


        return view('user.home', compact('latestArticles', 'latestVideos', 'latestFaqs', 'latestFacilities'));
    }
}
