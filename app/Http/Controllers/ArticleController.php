<?php

namespace App\Http\Controllers;

use App\Enums\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function publicIndex(Request $request)
    {
        // Mulai query untuk artikel yang sudah 'Published'
        $query = Article::where('status', 'Published');

        // 1. Filter berdasarkan pencarian (search)
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Mencari di kolom 'title' DAN 'content'
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // 2. Filter berdasarkan Kategori Artikel
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // 3. Filter berdasarkan Trimester
        if ($request->filled('trimester')) {
            $query->where('trimester', $request->input('trimester'));
        }

        // Ambil hasil query dengan urutan terbaru dan pagination
        // Menampilkan 9 artikel per halaman
        $articles = $query->latest()->paginate(9);

        // Ambil semua Enum kategori untuk ditampilkan di dropdown filter
        $categories = ArticleCategory::cases();
        
        // Data trimester untuk dropdown filter
        $trimesters = [1, 2, 3];

        return view('user.article.index', compact('articles', 'categories', 'trimesters'));
    }

    public function publicShow(Article $article)
    {
        if ($article->status !== 'Published' && !(Auth::check() && Auth::user()->role === 'admin')) {
            abort(404);
        }

        // Ambil beberapa artikel terbaru lainnya untuk ditampilkan sebagai "Baca Juga"
        $latestArticles = Article::where('status', 'Published')
            ->where('id', '!=', $article->id) // Kecualikan artikel yang sedang dibaca
            ->latest()
            ->take(4) // Ambil 4 artikel
            ->get();

        return view('user.article.show', compact('article', 'latestArticles'));
    }

    // Method untuk halaman daftar artikel di admin
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        return view('admin.articles.create');
    }

    // Menyimpan artikel baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => ['required', Rule::enum(ArticleCategory::class)],
            'trimester' => 'required|integer|in:1,2,3',
            // 'status' => 'required|string|in:Published,Draft',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author1' => 'required|string|max:255',
            'author2' => 'nullable|string|max:255',
            'author3' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $validated['status'] = 'Draft';

        Article::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit artikel
    public function edit(Article $artikel) // Menggunakan route model binding
    {
        return view('admin.articles.edit', compact('artikel'));
    }

    // Memperbarui artikel di database
    public function update(Request $request, Article $artikel)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => ['required', Rule::enum(ArticleCategory::class)],
            'trimester' => 'required|integer|in:1,2,3',
            'status' => 'required|string|in:Published,Draft',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author1' => 'required|string|max:255',
            'author2' => 'nullable|string|max:255',
            'author3' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($artikel->thumbnail) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Menghapus artikel dari database
    public function destroy(Article $artikel)
    {
        if ($artikel->thumbnail) {
            Storage::disk('public')->delete($artikel->thumbnail);
        }
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function toggleStatus(Article $artikel)
    {
        // Logika untuk membalik status
        if ($artikel->status === 'Published') {
            $artikel->status = 'Draft';
            $message = 'Artikel berhasil diubah menjadi draft.';
        } else {
            $artikel->status = 'Published';
            $message = 'Artikel berhasil dipublikasikan.';
        }

        $artikel->save();

        return redirect()->route('admin.artikel.index')->with('success', $message);
    }
}
