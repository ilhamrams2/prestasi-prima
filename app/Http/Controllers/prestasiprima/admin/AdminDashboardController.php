<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model dengan namespace yang benar
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Kegiatan;
use App\Models\prestasiprima\Prestasi; // <== perbaiki namespace
use App\Models\prestasiprima\Staff;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBerita = News::count();
        $totalKegiatan = Kegiatan::count();
        $totalPrestasi = Prestasi::count();

        $latestNews = News::latest()->take(5)->get();
        $latestPrestasi = Prestasi::latest()->take(5)->get();

        return view('prestasiprima.admin.dashboard', compact(
            'totalBerita',
            'totalKegiatan',
            'totalPrestasi',
            'latestNews',
            'latestPrestasi'
        ));
    }
}
