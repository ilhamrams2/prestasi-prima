<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Tampilkan halaman Testimoni Siswa & Alumni.
     */
    public function index()
    {
        return view('prestasiprima.pages.testimoni');
    }
}
