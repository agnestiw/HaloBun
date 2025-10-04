<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Facility;
use App\Models\Faq;
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

        $latestFaqs = Faq::where('status', 'Published')
            ->latest()
            ->take(3)
            ->get();

        return view('user.home', compact('latestArticles', 'latestVideos', 'latestFacilities', 'latestFaqs'));
    }
}
