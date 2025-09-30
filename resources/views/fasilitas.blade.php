@extends('app')

@section('title', 'Fasilitas Kesehatan')

@section('content')
@php
    $facilities = $facilities ?? [
        [
            'id' => 'seed-1',
            'name' => 'Puskesmas Kemayoran',
            'type' => 'puskesmas',
            'address' => 'Jl. Bungur Besar No.1, Jakarta Pusat',
            'phone' => '021-1234567',
            'hours' => 'Senin–Jumat 08.00–16.00',
            'lat' => -6.1683,
            'lng' => 106.8474,
        ],
        [
            'id' => 'seed-2',
            'name' => 'RS Ibu dan Anak Bunda Sehat',
            'type' => 'rumah_sakit',
            'address' => 'Jl. Sudirman No. 88, Jakarta',
            'phone' => '021-7654321',
            'hours' => '24 Jam',
            'lat' => -6.2146,
            'lng' => 106.8451,
        ],
        [
            'id' => 'seed-3',
            'name' => 'Klinik Ibu & Anak Harapan',
            'type' => 'klinik',
            'address' => 'Jl. Melati No. 12, Depok',
            'phone' => '021-9988776',
            'hours' => 'Senin–Sabtu 09.00–20.00',
            'lat' => -6.3870,
            'lng' => 106.8230,
        ],
    ];
@endphp

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
   {{-- Header  --}}
  <header class="mb-8">
    <h1 class="text-3xl sm:text-4xl font-semibold text-gray-900 text-pretty">
      Fasilitas Kesehatan Terdekat
    </h1>
    <p class="mt-2 text-gray-600">
      Temukan Puskesmas, Rumah Sakit, atau Klinik terdekat untuk kebutuhan ibu hamil. Anda bisa menggunakan lokasi otomatis (GPS) atau memasukkan lokasi secara manual.
    </p>
  </header>

   {{-- Notifikasi lokasi  --}}
  <div class="mb-6 rounded-xl border border-pink-100 bg-pink-50 px-4 py-3 text-sm text-pink-800">
    Izinkan akses lokasi untuk hasil yang lebih akurat. Anda juga dapat mencari lokasi secara manual.
  </div>

   {{-- Controls: Pencarian dan Filter  --}}
  <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-4 sm:p-6 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
       Input lokasi 
      <div class="md:col-span-2">
        <label for="locationInput" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
        <div class="flex items-stretch gap-2">
          <input id="locationInput" type="text" placeholder="Cari lokasi (contoh: Jakarta, Depok)..."
                 class="w-full rounded-lg border-gray-200 focus:border-pink-400 focus:ring-pink-400"
                 aria-label="Pencarian lokasi manual">
          <button id="btnUseMyLocation" type="button"
                  class="shrink-0 inline-flex items-center gap-2 px-3 sm:px-4 py-2 rounded-lg bg-gradient-to-r from-pink-500 to-purple-500 text-white hover:shadow-md transition">
            <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 8a4 4 0 100 8 4 4 0 000-8zm9 3h-1.07A8.003 8.003 0 0013 4.07V3a1 1 0 10-2 0v1.07A8.003 8.003 0 004.07 11H3a1 1 0 100 2h1.07A8.003 8.003 0 0011 19.93V21a1 1 0 102 0v-1.07A8.003 8.003 0 0019.93 13H21a1 1 0 100-2zM12 18a6 6 0 110-12 6 6 0 010 12z"/>
            </svg>
            <span class="hidden sm:inline">Lokasi Saya</span>
          </button>
        </div>
      </div>

       Radius 
      <div>
        <label for="radiusSelect" class="block text-sm font-medium text-gray-700 mb-1">Radius</label>
        <select id="radiusSelect" class="w-full rounded-lg border-gray-200 focus:border-pink-400 focus:ring-pink-400">
          <option value="2000">2 km</option>
          <option value="5000" selected>5 km</option>
          <option value="10000">10 km</option>
          <option value="20000">20 km</option>
        </select>
      </div>

       Jenis Faskes 
      <div>
        <span class="block text-sm font-medium text-gray-700 mb-1">Tipe Faskes</span>
        <div class="flex flex-wrap gap-2">
          <label class="inline-flex items-center gap-2 px-3 py-2 rounded-full border border-pink-200 bg-pink-50 text-pink-700 cursor-pointer">
            <input type="checkbox" class="peer hidden" name="type" value="puskesmas" checked>
            <span class="text-sm">Puskesmas</span>
          </label>
          <label class="inline-flex items-center gap-2 px-3 py-2 rounded-full border border-pink-200 bg-pink-50 text-pink-700 cursor-pointer">
            <input type="checkbox" class="peer hidden" name="type" value="rumah_sakit" checked>
            <span class="text-sm">Rumah Sakit</span>
          </label>
          <label class="inline-flex items-center gap-2 px-3 py-2 rounded-full border border-pink-200 bg-pink-50 text-pink-700 cursor-pointer">
            <input type="checkbox" class="peer hidden" name="type" value="klinik" checked>
            <span class="text-sm">Klinik</span>
          </label>
        </div>
      </div>
    </div>

    <div class="mt-4 flex items-center gap-3">
      <button id="btnSearch" type="button" class="px-4 py-2 rounded-lg bg-pink-600 text-white hover:bg-pink-700 transition">Cari Fasilitas</button>
      <button id="btnReset" type="button" class="px-4 py-2 rounded-lg border border-pink-200 text-pink-700 hover:bg-pink-50 transition">Reset</button>
      <span id="resultCount" class="text-sm text-gray-500" aria-live="polite"></span>
    </div>
  </div>

   {{-- Layout: Daftar + Peta  --}}
  <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
     {{-- Daftar hasil  --}}
    <section class="lg:col-span-2 space-y-4" aria-label="Daftar fasilitas kesehatan">
      <template id="facilityCardTemplate">
        <article class="facility-card rounded-xl border border-pink-100 bg-white p-4 hover:shadow-md transition cursor-pointer" data-place-id="">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h3 class="text-lg font-semibold text-gray-900 facility-name">Nama Faskes</h3>
              <div class="mt-1 text-sm text-gray-600 facility-address">Alamat</div>
              <div class="mt-2 flex flex-wrap items-center gap-3 text-sm">
                <span class="inline-flex items-center gap-1 text-pink-700 bg-pink-50 border border-pink-200 px-2 py-1 rounded-full">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
                  <span class="facility-type">Tipe</span>
                </span>
                <span class="inline-flex items-center gap-1 text-gray-700">
                  <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684L10.7 8.177a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  <a href="#" class="facility-phone hover:text-pink-600">Telepon</a>
                </span>
                <span class="inline-flex items-center gap-1 text-gray-700">
                  <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                  <span class="facility-hours">Jam operasional</span>
                </span>
              </div>
            </div>
            <button class="inline-flex items-center gap-1 px-3 py-1 rounded-full border border-pink-200 text-pink-700 hover:bg-pink-50 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 scroll-to-map" title="Lihat di peta">
              <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M9 10l3 3L22 3l-2-2-8 8-3-3-9 9 2 2 8-8z"/></svg>
              {{-- Peta --}}
            </button>
          </div>
        </article>
      </template>

      <div id="resultsList" class="space-y-4">
        @forelse($facilities as $f)
          <article class="facility-card rounded-xl border border-pink-100 bg-white p-4 hover:shadow-md transition cursor-pointer"
                   data-place-id="{{ $f['id'] }}"
                   data-lat="{{ $f['lat'] }}" data-lng="{{ $f['lng'] }}" data-type="{{ $f['type'] }}">
            <div class="flex items-start justify-between gap-3">
              <div>
                <h3 class="text-lg font-semibold text-gray-900 facility-name">{{ $f['name'] }}</h3>
                <div class="mt-1 text-sm text-gray-600 facility-address">{{ $f['address'] }}</div>
                <div class="mt-2 flex flex-wrap items-center gap-3 text-sm">
                  <span class="inline-flex items-center gap-1 text-pink-700 bg-pink-50 border border-pink-200 px-2 py-1 rounded-full">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/></svg>
                    <span class="facility-type">{{ ucfirst(str_replace('_',' ', $f['type'])) }}</span>
                  </span>
                  @if(!empty($f['phone']))
                    <span class="inline-flex items-center gap-1 text-gray-700">
                      <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684L10.7 8.177a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                      <a href="tel:{{ $f['phone'] }}" class="facility-phone hover:text-pink-600">{{ $f['phone'] }}</a>
                    </span>
                  @endif
                  @if(!empty($f['hours']))
                    <span class="inline-flex items-center gap-1 text-gray-700">
                      <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                      <span class="facility-hours">{{ $f['hours'] }}</span>
                    </span>
                  @endif
                </div>
              </div>
              <button class="inline-flex items-center gap-1 px-3 py-1 rounded-full border border-pink-200 text-pink-700 hover:bg-pink-50 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 scroll-to-map" title="Lihat di peta">
                <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M9 10l3 3L22 3l-2-2-8 8-3-3-9 9 2 2 8-8z"/></svg>
                Peta
              </button>
            </div>
          </article>
        @empty
          <div class="text-sm text-gray-600">Belum ada data fasilitas.</div>
        @endforelse
      </div>
    </section>

     Peta 
    <section class="lg:col-span-3 space-y-2" aria-label="Peta fasilitas">
      <div id="map" class="w-full h-[320px] sm:h-[420px] lg:h-[560px] rounded-2xl border border-pink-100 bg-pink-50"></div>
      <p id="mapStatus" class="text-xs text-gray-500" aria-live="polite"></p>
      @if(!config('services.google.maps_key'))
        <div class="text-xs text-amber-700 bg-amber-50 border border-amber-200 rounded-lg p-3">
          Google Maps API key belum dikonfigurasi. Tambahkan GOOGLE_MAPS_API_KEY di .env dan
          services.google.maps_key di config/services.php untuk mengaktifkan peta dan pencarian otomatis.
        </div>
      @endif
    </section>
  </div>
</section>
@endsection

@push('scripts')
 Google Maps API (Places) 
@if(config('services.google.maps_key'))
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places&callback=initMap"></script>
@endif

<script>

(function() {
  let map, infoWindow, placesService;
  let markers = [];
  let currentCenter = { lat: -6.200000, lng: 106.816666 }; // Jakarta default
  const resultsEl = document.getElementById('resultsList');
  const template = document.getElementById('facilityCardTemplate');
  const mapStatus = document.getElementById('mapStatus');

  const locationInput = document.getElementById('locationInput');
  const btnUseMyLocation = document.getElementById('btnUseMyLocation');
  const btnSearch = document.getElementById('btnSearch');
  const btnReset = document.getElementById('btnReset');
  const radiusSelect = document.getElementById('radiusSelect');
  const resultCount = document.getElementById('resultCount');

  function setStatus(msg) {
    if (mapStatus) mapStatus.textContent = msg || '';
  }

  function getSelectedTypes() {
    return Array.from(document.querySelectorAll('input[name="type"]:checked')).map(i => i.value);
  }

  function typeToKeyword(t) {
    if (t === 'puskesmas') return 'puskesmas';
    if (t === 'rumah_sakit') return 'rumah sakit';
    if (t === 'klinik') return 'klinik';
    return 'fasilitas kesehatan';
  }

  function clearMarkers() {
    markers.forEach(m => m.setMap(null));
    markers = [];
  }

  function addMarker(place, color = '#ec4899') {
    const marker = new google.maps.Marker({
      map,
      position: place.geometry.location,
      title: place.name || 'Fasilitas',
      icon: {
        path: google.maps.SymbolPath.CIRCLE,
        fillColor: color,
        fillOpacity: 1,
        strokeColor: '#ffffff',
        strokeWeight: 2,
        scale: 8,
      }
    });

    marker.addListener('click', () => {
      const addr = place.formatted_address || place.vicinity || '';
      infoWindow.setContent(`
        <div style="font-family: Poppins, system-ui; max-width: 240px;">
          <div style="font-weight:600;color:#111827;">${place.name || 'Fasilitas'}</div>
          <div style="font-size:12px;color:#4b5563;">${addr}</div>
          ${place.international_phone_number ? `<div style="font-size:12px;color:#4b5563;">Tel: ${place.international_phone_number}</div>` : ''}
          ${place.opening_hours?.weekday_text ? `<div style="margin-top:6px;font-size:12px;color:#4b5563;">${place.opening_hours.weekday_text.join('<br/>')}</div>` : ''}
        </div>
      `);
      infoWindow.open(map, marker);
    });

    markers.push(marker);
    return marker;
  }

  function scrollToMap() {
    document.getElementById('map')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  function renderCard(place, opts = {}) {
    const { type = 'fasilitas', phone = '', hours = '', address = '' } = opts;
    const node = template.content.firstElementChild.cloneNode(true);

    node.dataset.placeId = place.place_id || place.id || '';
    node.querySelector('.facility-name').textContent = place.name || 'Fasilitas';
    node.querySelector('.facility-address').textContent = address || place.formatted_address || place.vicinity || '';
    node.querySelector('.facility-type').textContent = (type || 'Fasilitas').replace('_',' ').replace(/\b\w/g, c => c.toUpperCase());

    const phoneEl = node.querySelector('.facility-phone');
    if (phone) {
      phoneEl.textContent = phone;
      phoneEl.href = `tel:${phone}`;
    } else {
      phoneEl.parentElement.style.display = 'none';
    }

    const hoursEl = node.querySelector('.facility-hours');
    if (hours) {
      hoursEl.textContent = hours;
    } else {
      hoursEl.parentElement.style.display = 'none';
    }

    // Click handlers: buka InfoWindow dan scroll ke peta
    node.addEventListener('click', () => {
      if (place.geometry?.location) {
        map.panTo(place.geometry.location);
        map.setZoom(15);
      }
      scrollToMap();
    });
    node.querySelector('.scroll-to-map').addEventListener('click', (e) => {
      e.stopPropagation();
      scrollToMap();
    });

    return node;
  }

  function updateResultCount(n) {
    resultCount.textContent = n != null ? `${n} hasil ditemukan` : '';
  }

  function buildFromSeededList() {
    // Render dari elemen hasil server-side (seed) ke dalam markers
    const seeded = Array.from(document.querySelectorAll('#resultsList .facility-card'));
    if (!seeded.length || !window.google || !map) return;

    clearMarkers();
    seeded.forEach(card => {
      const lat = parseFloat(card.dataset.lat);
      const lng = parseFloat(card.dataset.lng);
      const type = card.dataset.type || 'fasilitas';
      const name = card.querySelector('.facility-name')?.textContent?.trim() || 'Fasilitas';
      const addr = card.querySelector('.facility-address')?.textContent?.trim() || '';
      const phone = card.querySelector('.facility-phone')?.textContent?.trim() || '';
      const hours = card.querySelector('.facility-hours')?.textContent?.trim() || '';
      const place = {
        id: card.dataset.placeId || '',
        place_id: card.dataset.placeId || '',
        name,
        formatted_address: addr,
        geometry: { location: new google.maps.LatLng(lat, lng) },
        international_phone_number: phone || null,
        opening_hours: hours ? { weekday_text: [hours] } : null,
      };
      const color = type === 'puskesmas' ? '#ec4899' : (type === 'rumah_sakit' ? '#a855f7' : '#f97316');
      addMarker(place, color);
    });

    if (markers.length) {
      const bounds = new google.maps.LatLngBounds();
      markers.forEach(m => bounds.extend(m.getPosition()));
      map.fitBounds(bounds);
    }
    updateResultCount(seeded.length);
  }

  function searchFacilities() {
    if (!placesService || !map) return;

    setStatus('Mencari fasilitas di sekitar lokasi...');
    clearMarkers();
    resultsEl.innerHTML = '';

    const radius = parseInt(radiusSelect.value || '5000', 10);
    const selected = getSelectedTypes();
    const uniqueById = new Map();
    const bounds = new google.maps.LatLngBounds();

    let pending = 0;
    let totalFound = 0;

    function handlePlaceBatch(results, status, keyword) {
      if (status !== google.maps.places.PlacesServiceStatus.OK || !results) {
        return;
      }
      results.forEach(p => {
        if (!p.geometry?.location) return;
        if (uniqueById.has(p.place_id)) return;

        uniqueById.set(p.place_id, p);
      });
    }

    // Jalankan nearbySearch per tipe (dengan keyword agar tepat di Indonesia)
    selected.forEach(t => {
      const keyword = typeToKeyword(t);
      pending++;
      placesService.nearbySearch({
        location: currentCenter,
        radius,
        keyword,
      }, (res, status) => {
        handlePlaceBatch(res, status, keyword);
        pending--;
        if (pending === 0) {
          // Setelah kumpulkan hasil, lakukan getDetails untuk sebagian agar telepon & jam terisi
          const items = Array.from(uniqueById.values()).slice(0, 20);
          totalFound = items.length;
          updateResultCount(totalFound);

          if (!items.length) {
            setStatus('Tidak ditemukan fasilitas dengan kriteria saat ini.');
            return;
          }

          const renderQueue = [...items];
          const colorByType = (name) => {
            const n = (name || '').toLowerCase();
            if (n.includes('puskesmas')) return '#ec4899';
            if (n.includes('rs') || n.includes('rumah sakit') || n.includes('hospital')) return '#a855f7';
            if (n.includes('klinik') || n.includes('clinic')) return '#f97316';
            return '#ec4899';
          };

          function nextDetail() {
            const place = renderQueue.shift();
            if (!place) {
              // selesai render
              setStatus('');
              // Fit bounds peta
              if (markers.length) {
                const b = new google.maps.LatLngBounds();
                markers.forEach(m => b.extend(m.getPosition()));
                map.fitBounds(b);
              }
              return;
            }

            placesService.getDetails({
              placeId: place.place_id,
              fields: ['place_id','name','formatted_address','international_phone_number','opening_hours','geometry']
            }, (detail, detailStatus) => {
              const p = (detailStatus === google.maps.places.PlacesServiceStatus.OK && detail) ? detail : place;

              // Tambahkan marker
              const color = colorByType(p.name);
              addMarker(p, color);
              if (p.geometry?.location) bounds.extend(p.geometry.location);

              // Render kartu
              const card = renderCard(p, {
                type: color === '#a855f7' ? 'rumah_sakit' : (color === '#f97316' ? 'klinik' : 'puskesmas'),
                phone: p.international_phone_number || '',
                hours: p.opening_hours?.weekday_text ? p.opening_hours.weekday_text.join(' | ') : '',
                address: p.formatted_address || p.vicinity || ''
              });
              resultsEl.appendChild(card);

              setTimeout(nextDetail, 50); // throttle kecil agar UI tetap halus
            });
          }
          nextDetail();
        }
      });
    });

    if (selected.length === 0) {
      setStatus('Pilih minimal satu tipe fasilitas.');
    }
  }

  // Inisialisasi Peta (dipanggil dari callback Google script)
  window.initMap = function initMap() {
    if (!window.google || !document.getElementById('map')) {
      setStatus('Gagal memuat Google Maps. Periksa API key.');
      return;
    }

    // Center awal: dari seed jika ada
    const seeded = document.querySelector('#resultsList .facility-card');
    if (seeded) {
      currentCenter = {
        lat: parseFloat(seeded.dataset.lat) || currentCenter.lat,
        lng: parseFloat(seeded.dataset.lng) || currentCenter.lng,
      };
    }

    map = new google.maps.Map(document.getElementById('map'), {
      center: currentCenter,
      zoom: 12,
      clickableIcons: true,
      mapTypeControl: false,
      fullscreenControl: true,
      streetViewControl: false,
    });

    infoWindow = new google.maps.InfoWindow();
    placesService = new google.maps.places.PlacesService(map);

    // Autocomplete untuk input lokasi
    if (window.google.maps.places) {
      const autocomplete = new google.maps.places.Autocomplete(locationInput, {
        fields: ['geometry', 'formatted_address', 'name']
      });
      autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();
        if (place?.geometry?.location) {
          currentCenter = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng(),
          };
          map.panTo(place.geometry.location);
          map.setZoom(13);
          setStatus(`Lokasi diatur ke: ${place.formatted_address || place.name || 'hasil pencarian'}.`);
        }
      });
    }

    // Render marker dari seed list terlebih dulu
    buildFromSeededList();
  };

  // Geolokasi: gunakan posisi pengguna
  btnUseMyLocation?.addEventListener('click', () => {
    if (!navigator.geolocation) {
      setStatus('Peramban tidak mendukung geolokasi.');
      return;
    }
    setStatus('Mengambil lokasi Anda...');
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        currentCenter = { lat: pos.coords.latitude, lng: pos.coords.longitude };
        if (map && window.google) {
          map.panTo(currentCenter);
          map.setZoom(14);
          // Tambahkan marker lokasi pengguna
          const you = {
            name: 'Lokasi Anda',
            formatted_address: '',
            geometry: { location: new google.maps.LatLng(currentCenter.lat, currentCenter.lng) }
          };
          addMarker(you, '#10b981'); // hijau lembut untuk posisi user
        }
        setStatus('Lokasi berhasil diperoleh.');
      },
      (err) => {
        setStatus('Gagal memperoleh lokasi: ' + (err?.message || 'unknown error'));
      },
      { enableHighAccuracy: true, timeout: 10000, maximumAge: 30000 }
    );
  });

  // Tombol cari & reset
  btnSearch?.addEventListener('click', () => {
    if (!window.google || !placesService) {
      setStatus('Google Maps belum siap. Pastikan API key sudah diatur.');
      return;
    }
    searchFacilities();
  });

  btnReset?.addEventListener('click', () => {
    locationInput.value = '';
    radiusSelect.value = '5000';
    document.querySelectorAll('input[name="type"]').forEach(cb => cb.checked = true);
    resultsEl.innerHTML = '';
    clearMarkers();
    buildFromSeededList();
    updateResultCount(null);
    setStatus('');
  });

})();
</script>
@endpush
