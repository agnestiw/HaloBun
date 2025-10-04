@extends('layouts.admin')
@section('title', 'Edit Fasilitas')
@section('content')
<header class="mb-6"><h1 class="text-2xl md:text-3xl font-bold">Edit Fasilitas</h1></header>
<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.fasilitas.update', $facility->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.facilities._form', ['facility' => $facility])
  </form>
</div>
@endsection