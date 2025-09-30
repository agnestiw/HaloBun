<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/artikel', function () {
    return view('article');
});

Route::get('/video', function () {
    return view('video');
});

Route::get('/fasilitas', function () {
    return view('fasilitas');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/pregnancy-track', function () {
    return view('pregnancy');
});