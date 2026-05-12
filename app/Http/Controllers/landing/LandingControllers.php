<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;

class LandingControllers extends Controller
{
    public function index()
    {
        return view('landing.home');
    }
}