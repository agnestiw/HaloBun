@php
    $facility = $facility ?? null;
@endphp

@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Fasilitas</label>
            <input type="text" name="name" id="name" value="{{ old('name', $facility?->name) }}" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
        </div>
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Tipe Fasilitas</label>
            <select name="type" id="type" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
                @foreach ($types as $type)
                    <option value="{{ $type->value }}" @selected(old('type', $facility?->type->value) == $type->value)>
                        {{ Str::ucfirst(str_replace('_', ' ', $type->value)) }}</option>
                @endforeach
            </select>
        </div>
        @if (isset($facility))
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm">
                    <option value="Published" @selected(old('status', $facility->status) == 'Published')>Published</option>
                    <option value="Draft" @selected(old('status', $facility->status) == 'Draft')>Draft</option>
                </select>
            </div>
        @endif
    </div>

    <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
        <textarea name="address" id="address" rows="3" required
            class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">{{ old('address', $facility?->address) }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
            <input type="text" name="city" id="city" value="{{ old('city', $facility?->city) }}" required
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Telepon (Opsional)</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $facility?->phone) }}"
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
        </div>
        <div>
            <label for="hours" class="block text-sm font-medium text-gray-700">Jam Operasional (Opsional)</label>
            <input type="text" name="hours" id="hours" value="{{ old('hours', $facility?->hours) }}"
                placeholder="Contoh: Senin-Jumat 08:00-16:00"
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="map_embed_url" class="block text-sm font-medium text-gray-700">Kode Embed Peta Google
                Maps</label>
            <textarea name="map_embed_url" id="map_embed_url" rows="4"
                placeholder='Contoh: <iframe src="https://www.google.com/maps/embed?pb=!1m18!..."></iframe>'
                class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">{{ old('map_embed_url', $facility?->map_embed_url) }}</textarea>
            <div class="mt-2 text-xs text-gray-500">
                <p class="font-medium">Cara mendapatkan kode:</p>
                <ol class="list-decimal list-inside">
                    <li>Buka Google Maps dan cari lokasi fasilitas.</li>
                    <li>Klik tombol "Share" (Bagikan).</li>
                    <li>Pilih tab "Embed a map" (Sematkan peta).</li>
                    <li>Klik "COPY HTML" dan tempel (paste) di sini.</li>
                </ol>
            </div>
        </div>
        <div>
            <div>
                <label for="lat" class="block text-sm font-medium text-gray-700">Latitude (Wajib untuk filter
                    lokasi)</label>
                <input type="number" step="any" name="lat" id="lat"
                    value="{{ old('lat', $facility?->lat) }}" required placeholder="-6.2146"
                    class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
                <p class="mt-1 text-xs text-gray-500">Dapatkan dari Google Maps. Contoh: -6.2146201</p>
            </div>
            <div class="my-2">
                <label for="lng" class="block text-sm font-medium text-gray-700">Longitude (Wajib untuk filter
                    lokasi)</label>
                <input type="number" step="any" name="lng" id="lng"
                    value="{{ old('lng', $facility?->lng) }}" required placeholder="106.8451"
                    class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm px-4 py-2 text-base">
                <p class="mt-1 text-xs text-gray-500">Dapatkan dari Google Maps. Contoh: 106.845133</p>
            </div>
        </div>
    </div>
</div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.fasilitas.index') }}"
        class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">Batal</a>
    <button type="submit"
        class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow">Simpan
        Fasilitas</button>
</div>
