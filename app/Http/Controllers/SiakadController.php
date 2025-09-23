<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiakadController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('siakad.dashboard');
    }

    // Jadwal
    public function jadwal()
    {
        return view('siakad.jadwal');
    }

    // Absensi
    public function absensi()
    {
        return view('siakad.absensi');
    }

    // Nilai & Rapor
    public function nilai()
    {
        return view('siakad.nilai');
    }

    // PKL
    public function pkl()
    {
        return view('siakad.pkl');
    }

    // Pengumuman
    public function pengumuman()
    {
        return view('siakad.pengumuman');
    }

    // Pesan
    public function pesan()
    {
        return view('siakad.pesan');
    }

    // Profile
    public function profile()
    {
        return view('siakad.profile');
    }
}
