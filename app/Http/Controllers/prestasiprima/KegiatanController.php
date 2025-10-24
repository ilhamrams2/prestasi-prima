<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Menampilkan halaman kegiatan SMK Prestasi Prima
     */
    public function index()
    {
        // Kirim data ke view
        return view('prestasiprima.pages.kegiatan');
    }
}
