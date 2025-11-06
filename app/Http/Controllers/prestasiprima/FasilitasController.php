<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Menampilkan halaman fasilitas sekolah.
     */
    public function index()
    {
        return view('prestasiprima.pages.fasilitas');
    }
}
