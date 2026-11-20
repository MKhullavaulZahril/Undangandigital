<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UndanganController;
use App\Http\Controllers\Frontend\RsvpController;
use App\Http\Controllers\Frontend\UcapanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LinkTamuController;
use App\Http\Middleware\AdminBasicAuth;

/*
|--------------------------------------------------------------------------
| Route Halaman Utama Undangan
|--------------------------------------------------------------------------
*/
Route::get('/', [UndanganController::class, 'index'])->name('undangan.index');

/*
|--------------------------------------------------------------------------
| Route RSVP & Ucapan (API untuk Alpine.js Fetch)
|--------------------------------------------------------------------------
*/
Route::post('/rsvp', [RsvpController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('rsvp.store');

Route::get('/ucapan', [UcapanController::class, 'index'])->name('ucapan.index');

Route::post('/ucapan', [UcapanController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('ucapan.store');

/*
|--------------------------------------------------------------------------
| Route Admin (Dilindungi Basic Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(AdminBasicAuth::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/link', [LinkTamuController::class, 'form'])->name('admin.link');
    Route::post('/admin/link', [LinkTamuController::class, 'generate'])->name('admin.link.generate');
});

// Paling bawah: nama tamu di akhir link.
Route::get('/{slug}', [UndanganController::class, 'index'])
    ->where('slug', '(?!.*\.(ico|txt|xml|png|jpe?g|webp|svg|gif|css|js|map|json|mp3)$)[^/]+');
