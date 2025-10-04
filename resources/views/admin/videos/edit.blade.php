@extends('layouts.admin')

@section('title', 'Edit Video - HaloBun')

@section('content')
<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold">Edit Video</h1>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.video.update', $video) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.videos._form', ['video' => $video])
  </form>
</div>
@endsection