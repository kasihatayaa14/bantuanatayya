<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PenerimaDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.penerima');
    }
}