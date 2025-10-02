@extends('layouts.admin')

@section('title', 'Tambah Artikel Baru - HaloBun')

@section('content')
<header class="mb-6">
  <h1 class="text-2xl md:text-3xl font-bold">Tambah Artikel Baru</h1>
</header>

<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.articles._form')
  </form>
</div>
@endsection