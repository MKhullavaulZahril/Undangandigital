<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\UcapanController;
use App\Http\Controllers\AdminController;

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
| Route Admin Dashboard
|--------------------------------------------------------------------------
| Sementara gunakan string 'admin.auth' dulu, middleware-nya akan kita buat setelah ini.
*/
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('admin.auth') // String biasa, bukan Closure
    ->name('admin.index');