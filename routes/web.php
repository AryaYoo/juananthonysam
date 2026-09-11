<?php

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
