<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Komentar;
use App\Models\KategoriPenerima;

class LandingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */

    public function home()
    {
        $beritas = Berita::where('status', 'publish')
            ->latest()
            ->take(6)
            ->get();

        $kategoriPenerimas = KategoriPenerima::latest()->get();

        return view('landing.home', [
            'beritas' => $beritas,
            'kategoriPenerimas' => $kategoriPenerimas,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL BERITA
    |--------------------------------------------------------------------------
    */

    public function detailArtikel($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        $komentars = Komentar::latest()->get();

        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->where('status', 'publish')
            ->latest()
            ->take(5)
            ->get();

        return view('landing.detailartikel', [
            'berita' => $berita,
            'komentars' => $komentars,
            'beritaLainnya' => $beritaLainnya,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR KATEGORI
    |--------------------------------------------------------------------------
    */

    public function daftarKategori()
    {
        $kategoriPenerimas = KategoriPenerima::latest()->get();

        return view('landing.daftarkategori', [
            'kategoriPenerimas' => $kategoriPenerimas,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kategori($id)
    {
        $kategori = KategoriPenerima::findOrFail($id);

        return view('landing.kategori', [
            'kategori' => $kategori,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PENCARIAN BERITA
    |--------------------------------------------------------------------------
    */

    public function tag(Request $request)
    {
        $search = $request->search;

        $beritas = Berita::where('status', 'publish')
            ->where(function ($query) use ($search) {

                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('isi', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('landing.tag', [
            'beritas' => $beritas,
            'search' => $search,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TENTANG
    |--------------------------------------------------------------------------
    */

    public function tentang()
    {
        return view('landing.tentang');
    }

    /*
    |--------------------------------------------------------------------------
    | KONTAK
    |--------------------------------------------------------------------------
    */

    public function kontak()
    {
        return view('landing.kontak');
    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR ISI
    |--------------------------------------------------------------------------
    */

    public function daftarIsi()
    {
        $beritas = Berita::where('status', 'publish')
            ->latest()
            ->paginate(12);

        return view('landing.daftarisi', [
            'beritas' => $beritas,
        ]);
    }
}