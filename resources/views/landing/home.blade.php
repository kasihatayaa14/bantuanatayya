<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * =========================================================
     * HALAMAN KONTAK BANTUAN ATAYYA
     * =========================================================
     */
    public function index()
    {
        return view('landing.kontak', [
            'title'     => 'Kontak Bantuan Atayya',
            'subtitle'  => 'Hubungi Admin Bantuan Atayya'
        ]);
    }

    /**
     * =========================================================
     * PROSES KIRIM PESAN BANTUAN
     * =========================================================
     */
    public function kirim(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string|max:1000',
        ]);

        /**
         * =====================================================
         * PROSES SIMPAN PESAN
         * =====================================================
         * Bisa dikembangkan:
         * - simpan database
         * - kirim email admin
         * - notifikasi dashboard
         */

        return redirect()
            ->back()
            ->with('success', 'Pesan bantuan berhasil dikirim.');
    }
}