<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCmsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IbadahController;
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

// Halaman Pelayanan & Ibadah Khusus
Route::prefix('ibadah')->name('ibadah.')->group(function () {
    Route::get('/my-home', [IbadahController::class, 'myHome'])->name('my-home');
    Route::get('/ekidz', [IbadahController::class, 'ekidz'])->name('ekidz');
    Route::get('/ekklesia-teens', [IbadahController::class, 'teens'])->name('teens');
});

Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/acara', [EventController::class, 'index'])->name('events');

// Pelacakan klik link publik
Route::post('/track-click', [AdminAuthController::class, 'trackClick'])->name('track.click');

// Area Administrasi (/manage-admin)
Route::prefix('manage-admin')->name('admin.')->group(function () {
    Route::match(['get', 'head'], '/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/banner', [AdminAuthController::class, 'banner'])->name('banner');
        Route::post('/banner/save', [AdminAuthController::class, 'saveBanner'])->name('banner.save');

        // CMS Halaman Website
        Route::prefix('cms')->name('cms.')->group(function () {
            // Beranda
            Route::get('/home', [AdminCmsController::class, 'home'])->name('home');
            Route::post('/home/save', [AdminCmsController::class, 'saveHome'])->name('home.save');

            // Jadwal Ibadah
            Route::get('/schedules', [AdminCmsController::class, 'schedules'])->name('schedules');
            Route::post('/schedules/save', [AdminCmsController::class, 'saveSchedules'])->name('schedules.save');

            // Profil Gereja
            Route::get('/profile', [AdminCmsController::class, 'profile'])->name('profile');
            Route::post('/profile/save', [AdminCmsController::class, 'saveProfile'])->name('profile.save');

            // Profil Gembala (Pastor Juan & Ps Samuel)
            Route::get('/pastors', [AdminCmsController::class, 'pastors'])->name('pastors');
            Route::post('/pastors/save', [AdminCmsController::class, 'savePastors'])->name('pastors.save');

            // Ibadah Khusus (My Home, Ekidz, Teens)
            Route::get('/ibadah', [AdminCmsController::class, 'ibadah'])->name('ibadah');
            Route::post('/ibadah/save', [AdminCmsController::class, 'saveIbadah'])->name('ibadah.save');

            // Acara & Agenda
            Route::get('/events', [AdminCmsController::class, 'events'])->name('events');
            Route::post('/events/save', [AdminCmsController::class, 'saveEvent'])->name('events.save');
            Route::post('/events/delete/{id}', [AdminCmsController::class, 'deleteEvent'])->name('events.delete');
            Route::post('/events/recurring/save', [AdminCmsController::class, 'saveRecurring'])->name('events.recurring.save');

            // Galeri & Media Digital
            Route::get('/gallery', [AdminCmsController::class, 'gallery'])->name('gallery');
            Route::post('/gallery/save', [AdminCmsController::class, 'saveGallery'])->name('gallery.save');
            Route::post('/gallery/delete/{id}', [AdminCmsController::class, 'deleteGallery'])->name('gallery.delete');
            Route::post('/gallery/channels/save', [AdminCmsController::class, 'saveChannels'])->name('gallery.channels.save');
        });

        // Kotak Permohonan Doa Jemaat
        Route::get('/prayers', [AdminCmsController::class, 'prayers'])->name('prayers');
        Route::post('/prayers/toggle/{id}', [AdminCmsController::class, 'togglePrayerContacted'])->name('prayers.toggle');
        Route::post('/prayers/delete/{id}', [AdminCmsController::class, 'deletePrayer'])->name('prayers.delete');
    });
});

// Fallback ke halaman login untuk berbagai path
Route::get('/manage-admin', [AdminAuthController::class, 'showLogin']);
Route::get('/manage-admin/', [AdminAuthController::class, 'showLogin']);

