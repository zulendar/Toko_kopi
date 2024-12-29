<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function berandaBackend()
    {

        $produkCarousel = Produk::all(); 

        return view('backend.v_beranda.index', [
            'judul' => 'Halaman Beranda',
            'produkCarousel' => $produkCarousel, 
        ]);
    }
}
