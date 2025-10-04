<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
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

        $latestVideos = Video::where('status', 'Published')
            ->latest() // Mengurutkan berdasarkan created_at terbaru
            ->take(3)
            ->get();

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
