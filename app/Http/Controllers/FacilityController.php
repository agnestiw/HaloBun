<?php

namespace App\Http\Controllers;

use App\Enums\FacilityType;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    // Method untuk halaman fasilitas publik (user)
    public function publicIndex(Request $request)
    {
        $types = FacilityType::cases();
        $query = Facility::where('status', 'Published');

        // Filter Standar: Pencarian & Tipe
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter Spesial: Berdasarkan Lokasi Pengguna
        if ($request->has(['lat', 'lng'])) {
            $request->validate([
                'lat' => 'required|numeric|between:-90,90',
                'lng' => 'required|numeric|between:-180,180',
            ]);
            $userLat = $request->lat;
            $userLng = $request->lng;

            // Tambahkan kolom 'distance' virtual dan urutkan berdasarkan itu
            $query->selectRaw("*, 
            ( 6371 * acos( cos( radians(?) ) *
              cos( radians( lat ) )
              * cos( radians( lng ) - radians(?)
              ) + sin( radians(?) ) *
              sin( radians( lat ) ) )
            ) AS distance", [$userLat, $userLng, $userLat])
                ->orderBy('distance', 'asc');
        } else {
            // Urutan default jika tidak ada filter lokasi
            $query->latest();
        }

        $facilities = $query->paginate(9);

        return view('user.fasilitas', compact('facilities', 'types'));
    }

    // Method untuk halaman daftar fasilitas di admin
    public function index(Request $request)
    {
        $types = FacilityType::cases();
        $statuses = ['Published', 'Draft'];
        $query = Facility::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $facilities = $query->latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities', 'types', 'statuses'));
    }

    public function create()
    {
        $types = FacilityType::cases();
        return view('admin.facilities.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => ['required', Rule::enum(FacilityType::class)],
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'hours' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
        ]);

        $validated['status'] = 'Draft';

        Facility::create($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        $types = FacilityType::cases();
        return view('admin.facilities.edit', compact('facility', 'types'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => ['required', Rule::enum(FacilityType::class)],
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'hours' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'status' => 'required|in:Published,Draft',
        ]);

        $facility->update($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function fetchNearby(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
        ]);

        $userLat = $request->lat;
        $userLng = $request->lng;

        // Rumus Haversine untuk menghitung jarak dalam kilometer
        $facilities = Facility::selectRaw("*, 
        ( 6371 * acos( cos( radians(?) ) *
          cos( radians( lat ) )
          * cos( radians( lng ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( lat ) ) )
        ) AS distance", [$userLat, $userLng, $userLat])
            ->orderBy('distance', 'asc') // Urutkan berdasarkan jarak terdekat
            ->take(15) // Batasi hasilnya, misal 15 terdekat
            ->get();

        // Kita perlu mengubah Enum menjadi string agar bisa dikirim sebagai JSON
        $facilities->transform(function ($facility) {
            $facility->type_label = Str::ucfirst(str_replace('_', ' ', $facility->type->value));
            return $facility;
        });

        return response()->json($facilities);
    }

    public function toggleStatus(Facility $facility)
    {
        if ($facility->status === 'Published') {
            $facility->status = 'Draft';
            $message = 'Fasilitas berhasil diubah menjadi draft.';
        } else {
            $facility->status = 'Published';
            $message = 'Fasilitas berhasil dipublikasikan.';
        }
        $facility->save();
        return redirect()->route('admin.fasilitas.index')->with('success', $message);
    }
}
