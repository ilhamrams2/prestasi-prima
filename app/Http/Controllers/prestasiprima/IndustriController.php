<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;

class IndustriController extends Controller
{
    /**
     * Tampilkan halaman Mitra Industri.
     */
    public function index()
    {
        return view('prestasiprima.pages.industri');
    }
}
