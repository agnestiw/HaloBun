<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil Statistik Total
        $stats = [
            'articles' => Article::count(),
            'videos' => Video::count(),
            'faqs' => Faq::count(),
            'facilities' => Facility::count(),
        ];

        // 2. Ambil Konten Terbaru (misalnya 5 terakhir yang diupdate)
        $recentArticles = Article::latest('updated_at')->take(5)->get();
        $recentVideos = Video::latest('updated_at')->take(5)->get();
        $recentFaqs = Faq::latest('updated_at')->take(5)->get();
        $recentFacilities = Facility::latest('updated_at')->take(5)->get();


        return view('admin.dashboard', compact(
            'stats',
            'recentArticles',
            'recentVideos',
            'recentFaqs',
            'recentFacilities'
        ));
    }
}
