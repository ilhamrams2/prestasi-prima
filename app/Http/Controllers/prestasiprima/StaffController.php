<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $kepala = Staff::where('kategori', 'kepala')->first();
        $kaprog = Staff::where('kategori', 'kaprog')->get();
        $kesiswaan = Staff::where('kategori', 'kesiswaan')->get();
        $guruMapel = Staff::where('kategori', 'guru_mapel')->get();

        return view('prestasiprima.pages.staff', compact(
            'kepala', 'kaprog', 'kesiswaan', 'guruMapel'
        ));
    }
}
