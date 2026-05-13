<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.petugas');
    }
}