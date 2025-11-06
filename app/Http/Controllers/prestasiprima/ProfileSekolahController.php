<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    /**
     * =====================
     * HALAMAN PROFIL SEKOLAH
     * =====================
     * Menampilkan profil sekolah SMK Prestasi Prima.
     */
    public function index()
    {
        return view('prestasiprima.pages.profile-sekolah');
    }
}
