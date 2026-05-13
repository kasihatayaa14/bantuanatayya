<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Komentar;
use App\Models\KategoriPenerima;

class LandingController extends Controller
{
    public function home()
    {
        $beritas = Berita::where('status', 'publish')
            ->latest()
            ->take(6)
            ->get();

        $kategoriPenerimas = KategoriPenerima::latest()->get();

        return view('landing.home', compact(
            'beritas',
            'kategoriPenerimas'
        ));
    }

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

        return view('landing.detailartikel', compact(
            'berita',
            'komentars',
            'beritaLainnya'
        ));
    }

    public function daftarKategori()
    {
        $kategoriPenerimas = KategoriPenerima::latest()->get();

        return view('landing.daftarkategori', compact(
            'kategoriPenerimas'
        ));
    }

    public function kategori($id)
    {
        $kategori = KategoriPenerima::findOrFail($id);

        return view('landing.kategori', compact('kategori'));
    }

    public function tag(Request $request)
    {
        $search = $request->search;

        $beritas = Berita::where('status', 'publish')
            ->where(function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%")
                      ->orWhere('isi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('landing.tag', compact(
            'beritas',
            'search'
        ));
    }

    public function tentang()
    {
        return view('landing.tentang');
    }

    public function kontak()
    {
        return view('landing.kontak');
    }

    public function daftarIsi()
    {
        $beritas = Berita::where('status', 'publish')
            ->latest()
            ->paginate(12);

        return view('landing.daftarisi', compact('beritas'));
    }
}