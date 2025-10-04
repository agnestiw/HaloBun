<?php

namespace App\Http\Controllers;

use App\Enums\FaqCategory;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    // Method untuk halaman FAQ publik (user)
    public function publicIndex(Request $request)
    {
        $categories = FaqCategory::cases();
        $query = Faq::where('status', 'Published');

        // Filter berdasarkan pencarian (search)
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Cari di kolom pertanyaan, jawaban, dan tags
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%")
                    ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Ambil hasil dengan urutan terbaru dan pagination
        $faqs = $query->latest()->paginate(10); // Menampilkan 10 FAQ per halaman

        return view('user.faq', compact('faqs', 'categories'));
    }

    // Method untuk halaman daftar FAQ di admin
    public function index(Request $request)
    {
        $categories = FaqCategory::cases();
        $statuses = ['Published', 'Draft'];
        $query = Faq::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $faqs = $query->latest()->paginate(10);
        return view('admin.faqs.index', compact('faqs', 'categories', 'statuses'));
    }

    public function create()
    {
        $categories = FaqCategory::cases();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => ['required', Rule::enum(FaqCategory::class)],
            'tags' => 'nullable|string|max:255',
        ]);
        $validated['status'] = 'Draft';

        Faq::create($validated);
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan sebagai draft.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::cases();
        $statuses = ['Published', 'Draft'];
        return view('admin.faqs.edit', compact('faq', 'categories', 'statuses'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => ['required', Rule::enum(FaqCategory::class)],
            'status' => 'required|in:Published,Draft',
            'tags' => 'nullable|string|max:255',
        ]);

        $faq->update($validated);
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }

    public function toggleStatus(Faq $faq)
    {
        if ($faq->status === 'Published') {
            $faq->status = 'Draft';
            $message = 'FAQ berhasil diubah menjadi draft.';
        } else {
            $faq->status = 'Published';
            $message = 'FAQ berhasil dipublikasikan.';
        }
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', $message);
    }
}
