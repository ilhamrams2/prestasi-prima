<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenerimaanSiswaController extends Controller
{
    /**
     * Tampilkan halaman Penerimaan Siswa.
     */
    public function index()
    {
        return view('prestasiprima.pages.penerimaan-siswa');
    }
}
