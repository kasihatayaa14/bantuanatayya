<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\UserAuthController;

/*
|--------------------------------------------------------------------------
| TEST ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return 'TEST BERHASIL';
});

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/

Route::get('/loginuser', [UserAuthController::class, 'login'])
    ->name('login.user');

Route::post('/loginuser', [UserAuthController::class, 'prosesLogin'])
    ->name('login.user.process');

/*
|--------------------------------------------------------------------------
| LANDING PAGE (AMAN TANPA DATABASE)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.home');
});

Route::get('/berita', function () {
    return view('landing.daftarisi');
});

Route::get('/detail-berita/{slug}', function ($slug) {
    return view('landing.detailartikel', compact('slug'));
});

Route::get('/kategori/{id}', function ($id) {
    return view('landing.kategori', compact('id'));
});

Route::get('/tentang', function () {
    return view('landing.tentang');
});

Route::get('/kontak', function () {
    return view('landing.kontak');
});

Route::get('/daftar-kategori', function () {
    return view('landing.daftarkategori');
});

Route::get('/tag', function () {
    return view('landing.tag');
});