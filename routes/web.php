<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/artikel', fn () => view('article'))->name('article');
Route::get('/video', fn () => view('video'))->name('video');
Route::get('/fasilitas', fn () => view('fasilitas'))->name('fasilitas');
Route::get('/faq', fn () => view('faq'))->name('faq');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/pregnancy-track', fn () => view('pregnancy'))->name('pregnancy.track');

Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/admin-test', fn () => 'Admin Masuk')->middleware(['auth', 'admin']);