@extends('layouts.admin')
@section('title', 'Edit FAQ')
@section('content')
<header class="mb-6"><h1 class="text-2xl md:text-3xl font-bold">Edit FAQ</h1></header>
<div class="rounded-2xl border border-pink-100 bg-white/80 p-4 sm:p-6">
  <form action="{{ route('admin.faq.update', $faq) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.faqs._form', ['faq' => $faq])
  </form>
</div>
@endsection