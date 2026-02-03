<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\KaryaProyek;

class KaryaProyekController extends Controller
{
    /**
     * Menampilkan halaman utama Karya & Proyek Siswa
     */
    public function index()
    {
        $projects = KaryaProyek::latest()->get();

        return view('prestasiprima.pages.karya-proyek', compact('projects'));
    }


    /**
     * Menampilkan detail dari proyek tertentu
     */
    public function show($id)
    {
        $project = KaryaProyek::findOrFail($id);

        return view('prestasiprima.pages.karya-proyek-detail', compact('project'));
    }
}
