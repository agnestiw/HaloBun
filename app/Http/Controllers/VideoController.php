<?php

namespace App\Http\Controllers;

use App\Enums\VideoPlatform;
use App\Enums\VideoTopic;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{

    private function getTikTokThumbnail(string $videoUrl): ?string
    {
        try {
            // Buat permintaan ke oEmbed endpoint TikTok
            $response = Http::get('https://www.tiktok.com/oembed', [
                'url' => $videoUrl
            ]);

            // Periksa jika permintaan berhasil dan mendapatkan data JSON
            if ($response->successful() && $response->json()) {
                // Kembalikan URL thumbnail jika ada
                return $response->json('thumbnail_url');
            }
        } catch (\Exception $e) {
            // Jika terjadi error (misal: URL tidak valid, API down),
            // laporkan error dan kembalikan null.
            report($e);
            return null;
        }

        return null;
    }

    // Method untuk halaman daftar video publik (user)
    public function publicIndex(Request $request)
    {
        $query = Video::where('status', 'Published');

        // PERBAIKI BAGIAN INI
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Hapus pencarian pada kolom 'description' dan hanya cari di 'title'
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('topic')) {
            $query->where('topic', $request->input('topic'));
        }

        if ($request->filled('trimester')) {
            $query->where('trimester', $request->input('trimester'));
        }

        // Menggunakan latest() untuk mengurutkan berdasarkan created_at (DESC)
        $videos = $query->latest()->paginate(9);

        $topics = VideoTopic::cases();
        $trimesters = [1, 2, 3];

        return view('user.video', compact('videos', 'topics', 'trimesters'));
    }
    // Method untuk halaman daftar video di admin
    public function index(Request $request)
    {
        $query = Video::query();

        // Siapkan data untuk dropdown filter
        $topics = VideoTopic::cases();
        $platforms = VideoPlatform::cases();
        $statuses = ['Published', 'Draft'];
        $trimesters = [1, 2, 3];

        // Terapkan filter jika ada
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('topic')) {
            $query->where('topic', $request->topic);
        }
        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }
        if ($request->filled('trimester')) {
            $query->where('trimester', $request->trimester);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Default sorting
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        $sortableColumns = ['id', 'title', 'platform', 'topic', 'trimester', 'status'];

        if (in_array($sort, $sortableColumns) && in_array($direction, ['asc', 'desc'])) {
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('id', 'desc');
        }

        $videos = $query->paginate(10);

        return view('admin.videos.index', compact('videos', 'topics', 'platforms', 'statuses', 'trimesters'));
    }

    // Menampilkan form untuk membuat video baru
    public function create()
    {
        $topics = VideoTopic::cases();
        $platforms = VideoPlatform::cases();
        $trimesters = [1, 2, 3];
        return view('admin.videos.create', compact('topics', 'platforms', 'trimesters'));
    }

    // Menyimpan video baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'topic' => ['required', Rule::enum(VideoTopic::class)],
            'platform' => ['required', Rule::enum(VideoPlatform::class)],
            'trimester' => 'required|integer|in:1,2,3',
            'video_id' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'duration' => 'nullable|string|max:10',
            'author' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['status'] = 'Draft';

        // Logika thumbnail otomatis HANYA untuk YouTube
        if ($validated['platform'] === VideoPlatform::YOUTUBE->value && $validated['video_id']) {
            $validated['thumbnail'] = "https://img.youtube.com/vi/{$validated['video_id']}/hqdefault.jpg";
            // TAMBAHKAN INI: Buat URL lengkap untuk YouTube
            $validated['url'] = "https://www.youtube.com/watch?v={$validated['video_id']}";
        } elseif ($validated['platform'] === VideoPlatform::TIKTOK->value && !empty($validated['url'])) {
            $validated['thumbnail'] = $this->getTikTokThumbnail($validated['url']);
        }

        Video::create($validated);

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil ditambahkan sebagai draft.');
    }

    // Menampilkan form untuk mengedit video
    public function edit(Video $video) // Menggunakan route model binding
    {
        $topics = VideoTopic::cases();
        $platforms = VideoPlatform::cases();
        $trimesters = [1, 2, 3];
        $statuses = ['Published', 'Draft'];
        return view('admin.videos.edit', compact('video', 'topics', 'platforms', 'trimesters', 'statuses'));
    }

    // Memperbarui video di database
    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'topic' => ['required', Rule::enum(VideoTopic::class)],
            'platform' => ['required', Rule::enum(VideoPlatform::class)],
            'trimester' => 'required|integer|in:1,2,3',
            'video_id' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'duration' => 'nullable|string|max:10',
            'author' => 'nullable|string|max:255',
            'status' => 'required|string|in:Published,Draft',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Logika thumbnail otomatis HANYA untuk YouTube
        if ($validated['platform'] === VideoPlatform::YOUTUBE->value && $validated['video_id']) {
            $validated['thumbnail'] = "https://img.youtube.com/vi/{$validated['video_id']}/hqdefault.jpg";
            // TAMBAHKAN INI: Buat URL lengkap untuk YouTube
            $validated['url'] = "https://www.youtube.com/watch?v={$validated['video_id']}";
        } elseif ($validated['platform'] === VideoPlatform::TIKTOK->value && !empty($validated['url'])) {
            // Hanya ambil thumbnail baru jika URL berubah untuk efisiensi
            if ($video->isDirty('url')) {
                $validated['thumbnail'] = $this->getTikTokThumbnail($validated['url']);
            }
        } else {
            $validated['thumbnail'] = null;
        }

        $video->update($validated);

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil diperbarui.');
    }

    // Menghapus video dari database
    public function destroy(Video $video)
    {
        // Hapus thumbnail jika itu adalah file yang di-upload
        if ($video->thumbnail && Storage::disk('public')->exists($video->thumbnail) && Str::startsWith($video->thumbnail, 'video_thumbnails/')) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus.');
    }

    // Mengubah status video (Published/Draft)
    public function toggleStatus(Video $video)
    {
        if ($video->status === 'Published') {
            $video->status = 'Draft';
            $message = 'Video berhasil diubah menjadi draft.';
        } else {
            $video->status = 'Published';
            $message = 'Video berhasil dipublikasikan.';
        }

        $video->save();

        return redirect()->route('admin.video.index')->with('success', $message);
    }
}
