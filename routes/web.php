<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('user.home'))->name('home');
Route::get('/artikel', [ArticleController::class, 'publicIndex'])->name('article');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'publicShow'])->name('article.show');

Route::get('/video', fn () => view('user.video'))->name('video');
Route::get('/fasilitas', fn () => view('user.fasilitas'))->name('fasilitas');
Route::get('/faq', fn () => view('user.faq'))->name('faq');
Route::get('/contact', fn () => view('user.contact'))->name('contact');
Route::get('/pregnancy-track', fn () => view('user.pregnancy'))->name('pregnancy.track');

Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    // Route::get('/artikel', fn () => view('admin.article'))->name('artikel');
    
    Route::patch('artikel/{artikel}/toggle-status', [ArticleController::class, 'toggleStatus'])->name('artikel.toggleStatus');
    Route::resource('artikel', ArticleController::class);
    
    Route::get('/video', fn () => view('admin.video'))->name('video');
    Route::get('/fasilitas', fn () => view('admin.fasilitas'))->name('fasilitas');
    Route::get('/faq', fn () => view('admin.faq'))->name('faq');
});