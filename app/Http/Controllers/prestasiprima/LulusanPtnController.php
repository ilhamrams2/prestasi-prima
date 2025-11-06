<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LulusanPtnController extends Controller
{
    /**
     * Menampilkan halaman Lulusan PTN.
     */
    public function index()
    {
        // Jika nanti kamu ingin ambil data dari database, bisa lewat sini.
        // Contoh: $lulusan = Lulusan::all();

        return view('prestasiprima.pages.lulusanPTN');
    }
}
