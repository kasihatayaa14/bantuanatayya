<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORT CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\landing\LandingControllers;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingControllers::class, 'index'])
    ->name('landing.home');