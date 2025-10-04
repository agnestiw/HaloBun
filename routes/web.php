<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// article for user
Route::get('/artikel', [ArticleController::class, 'publicIndex'])->name('article');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'publicShow'])->name('article.show');

// video for user
Route::get('/video', [VideoController::class, 'publicIndex'])->name('video');

// fasilitas for user
Route::get('/fasilitas', [FacilityController::class, 'publicIndex'])->name('fasilitas');
Route::get('/api/fasilitas/terdekat', [FacilityController::class, 'fetchNearby'])->name('api.fasilitas.terdekat');

Route::get('/faq', fn() => view('user.faq'))->name('faq');
Route::get('/contact', fn() => view('user.contact'))->name('contact');
Route::get('/pregnancy-track', fn() => view('user.pregnancy'))->name('pregnancy.track');


// authentication
Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // article for admin
    Route::patch('artikel/{artikel}/toggle-status', [ArticleController::class, 'toggleStatus'])->name('artikel.toggleStatus');
    Route::resource('artikel', ArticleController::class);

    // video for admin
    Route::patch('video/{video}/toggle-status', [VideoController::class, 'toggleStatus'])->name('video.toggleStatus');
    Route::resource('video', VideoController::class);

    // fasilitas for admin
    Route::patch('fasilitas/{facility}/toggle-status', [FacilityController::class, 'toggleStatus'])->name('fasilitas.toggleStatus');
    Route::resource('fasilitas', FacilityController::class)->parameters([
        'fasilitas' => 'facility',
    ]);


    Route::get('/faq', fn() => view('admin.faq'))->name('faq');
});
