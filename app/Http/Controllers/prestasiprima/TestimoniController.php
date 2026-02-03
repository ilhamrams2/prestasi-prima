<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Testimoni;

class TestimoniController extends Controller
{
    /**
     * Tampilkan halaman Testimoni Siswa & Alumni.
     */
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('prestasiprima.pages.testimoni', compact('testimonis'));
    }
}
