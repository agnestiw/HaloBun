@extends('layouts.admin')

@section('title', 'Edit Artikel - HaloBun')

@section('content')
<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold">Edit Artikel</h1>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.articles._form', ['article' => $artikel])
  </form>
</div>
@endsection