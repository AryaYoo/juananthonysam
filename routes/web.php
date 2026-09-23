<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Ekklesia Surabaya
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/permohonan-doa', [HomeController::class, 'prayerRequest'])->name('prayer.store');

Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
Route::get('/profil/ps-juan-anthony-sam', [ProfileController::class, 'juan'])->name('pastor.juan');
Route::get('/profil/ps-samuel', [ProfileController::class, 'samuel'])->name('pastor.samuel');

Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/acara', [EventController::class, 'index'])->name('events');

// Pelacakan klik link publik
Route::post('/track-click', [AdminAuthController::class, 'trackClick'])->name('track.click');

// Area Administrasi (/manage-admin)
Route::prefix('manage-admin')->name('admin.')->group(function () {
    Route::match(['get', 'head'], '/', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::match(['get', 'head'], '/login', [AdminAuthController::class, 'showLogin']);
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    });
});

// Fallback langsung tanpa trailing slash untuk server web tertentu
Route::get('/manage-admin', [AdminAuthController::class, 'showLogin']);

