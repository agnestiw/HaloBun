<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Facility;
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

        $latestFacilities = Facility::where('status', 'Published')
            ->inRandomOrder()
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


        return view('user.home', compact('latestArticles', 'latestVideos', 'latestFacilities', 'latestFaqs'));
    }
}
