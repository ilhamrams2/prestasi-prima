<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        // Ambil semua data kegiatan dari database, urutkan berdasarkan tanggal terbaru
        $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->get();

        // Kirim ke view
        return view('prestasiprima.pages.kegiatan', compact('kegiatan'));
    }
}

