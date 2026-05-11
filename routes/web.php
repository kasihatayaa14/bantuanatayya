<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORT CONTROLLER BANTUAN ATAYYA
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\ArtikelController;
use App\Http\Controllers\Landing\KategoriController;
use App\Http\Controllers\Landing\KontakController;

/*
|--------------------------------------------------------------------------
| ZONA TAMU / LANDING BANTUAN ATAYYA
|--------------------------------------------------------------------------
*/

/**
 * =========================================================
 * HALAMAN BERANDA
 * =========================================================
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('landing.home');

/**
 * =========================================================
 * HALAMAN ARTIKEL BANTUAN
 * =========================================================
 */
Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])
    ->name('artikel.show');

/**
 * =========================================================
 * HALAMAN KATEGORI BANTUAN
 * =========================================================
 */
Route::get('/kategori', [KategoriController::class, 'index'])
    ->name('kategori.index');

Route::get('/kategori/{id}', [KategoriController::class, 'show'])
    ->name('kategori.show');

/**
 * =========================================================
 * HALAMAN KONTAK BANTUAN
 * =========================================================
 */
Route::get('/kontak', [KontakController::class, 'index'])
    ->name('kontak.index');

Route::post('/kontak/kirim', [KontakController::class, 'kirim'])
    ->name('kontak.kirim');