<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Industri;

class IndustriController extends Controller
{
    // Halaman publik industri
    public function index()
    {
        $industris = Industri::all();
        return view('prestasiprima.pages.industri', compact('industris'));
    }

    // Opsional: detail industri
    public function show($slug)
    {
        $industri = Industri::where('slug', $slug)->firstOrFail();
        return view('prestasiprima.pages.industri_detail', compact('industri'));
    }
}
