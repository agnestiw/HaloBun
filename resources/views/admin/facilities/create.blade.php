@extends('layouts.admin')
@section('title', 'Tambah Fasilitas Baru')
@section('content')
<header class="mb-6"><h1 class="text-2xl md:text-3xl font-bold">Tambah Fasilitas Baru</h1></header>
<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.fasilitas.store') }}" method="POST">
    @csrf
    @include('admin.facilities._form')
  </form>
</div>
@endsection