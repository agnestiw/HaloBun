{{-- resources/views/admin/videos/_form.blade.php --}}

@php
  $video = $video ?? null;
  $topics = $topics ?? \App\Enums\VideoTopic::cases();
  $platforms = $platforms ?? \App\Enums\VideoPlatform::cases();
  $trimesters = $trimesters ?? [1, 2, 3];
  $statuses = $statuses ?? ['Published', 'Draft'];
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

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <div class="md:col-span-2 space-y-4">
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700">Judul Video</label>
      <input type="text" name="title" id="title" value="{{ old('title', $video?->title) }}" required
        class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
    </div>
    
    {{-- Input URL/ID Video berdasarkan Platform --}}
    <div>
      <label for="platform" class="block text-sm font-medium text-gray-700">Platform Video</label>
      <select name="platform" id="platform" required
        class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
        @foreach ($platforms as $pf)
          <option value="{{ $pf->value }}" @selected(old('platform', $video?->platform->value) == $pf->value)>
            {{ $pf->value }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Field dinamis berdasarkan platform yang dipilih --}}
    <div id="platform-specific-fields" class="space-y-4 mt-4">
        {{-- YouTube --}}
        <div class="platform-field platform-youtube" @if(old('platform', $video?->platform->value) !== \App\Enums\VideoPlatform::YOUTUBE->value) style="display:none;" @endif>
            <label for="video_id" class="block text-sm font-medium text-gray-700">YouTube Video ID</label>
            <input type="text" name="video_id" id="video_id" value="{{ old('video_id', $video?->video_id) }}"
                   placeholder="Contoh: gC_L9qAHVJ8"
                   class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
            <p class="mt-1 text-xs text-gray-500">
                Temukan ini di URL YouTube: `https://www.youtube.com/watch?v=**gC_L9qAHVJ8**`
            </p>
        </div>

        {{-- TikTok --}}
        <div class="platform-field platform-tiktok" @if(old('platform', $video?->platform->value) !== \App\Enums\VideoPlatform::TIKTOK->value) style="display:none;" @endif>
            <label for="url" class="block text-sm font-medium text-gray-700">TikTok Video URL</label>
            <input type="url" name="url" id="url" value="{{ old('url', $video?->url) }}"
                   placeholder="Contoh: https://www.tiktok.com/@user/video/..."
                   class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
            <p class="mt-1 text-xs text-gray-500">
                URL lengkap video TikTok.
            </p>
        </div>
    </div>
  </div>

  <div class="space-y-4">
    <div>
      <label for="topic" class="block text-sm font-medium text-gray-700">Topik Video</label>
      <select name="topic" id="topic" required
        class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
        @foreach ($topics as $tp)
          <option value="{{ $tp->value }}" @selected(old('topic', $video?->topic->value) == $tp->value)>
            {{ $tp->value }}
          </option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="trimester" class="block text-sm font-medium text-gray-700">Trimester</label>
      <select name="trimester" id="trimester" required
        class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
        @foreach ($trimesters as $tri)
          <option value="{{ $tri }}" @selected(old('trimester', $video?->trimester) == $tri)>
            Trimester {{ $tri }}
          </option>
        @endforeach
      </select>
    </div>
    
    @if(isset($video))
     <div>
      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
      <select name="status" id="status" required
        class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
        @foreach ($statuses as $stat)
          <option value="{{ $stat }}" @selected(old('status', $video?->status) == $stat)>
            {{ $stat }}
          </option>
        @endforeach
      </select>
    </div>
    @endif

    <div>
      <label for="duration" class="block text-sm font-medium text-gray-700">Durasi Video (Contoh: 08:21)</label>
      <input type="text" name="duration" id="duration" value="{{ old('duration', $video?->duration) }}"
             placeholder="HH:MM atau MM:SS"
             class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
    </div>

    <div>
      <label for="author" class="block text-sm font-medium text-gray-700">Author/Uploader (Opsional)</label>
      <input type="text" name="author" id="author" value="{{ old('author', $video?->author) }}"
             placeholder="Nama Uploader"
             class="mt-1 block w-full rounded-xl border-pink-200 shadow-sm focus:border-pink-300 focus:ring focus:ring-2 focus:ring-pink-200 focus:ring-opacity-50 px-4 py-2 text-base">
    </div>
    
  </div>
</div>

<div class="mt-6 flex justify-end gap-3">
  <a href="{{ route('admin.video.index') }}"
     class="rounded-full border border-pink-200 text-pink-700 px-4 py-2 text-sm hover:bg-pink-50">
    Batal
  </a>
  <button type="submit"
    class="inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white px-4 py-2 text-sm font-medium shadow hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-pink-300">
    Simpan Video
  </button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const platformSelect = document.getElementById('platform');
        const youtubeField = document.querySelector('.platform-field.platform-youtube');
        const tiktokField = document.querySelector('.platform-field.platform-tiktok');

        function togglePlatformFields() {
            const selectedPlatform = platformSelect.value;
            
            youtubeField.style.display = 'none';
            tiktokField.style.display = 'none';

            if (selectedPlatform === 'YouTube') {
                youtubeField.style.display = 'block';
            } else if (selectedPlatform === 'TikTok') {
                tiktokField.style.display = 'block';
            }
        }

        platformSelect.addEventListener('change', togglePlatformFields);

        // Initial call to set correct visibility on page load
        togglePlatformFields();
    });
</script>
@endpush