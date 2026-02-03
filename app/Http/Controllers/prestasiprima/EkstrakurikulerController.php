<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    /**
     * Menampilkan halaman utama ekstrakurikuler
     */
    public function index()
    {
        $ekskulList = Ekstrakurikuler::all();

        // Kirim data ke view
        return view('prestasiprima.pages.ekstrakurikuler', compact('ekskulList'));
    }

    /**
     * (Optional) Menampilkan detail tiap ekstrakurikuler.
     * Misalnya /ekstrakurikuler/pramuka
     */
    public function show($slug)
    {
        // Ini bisa dikembangkan nanti jika kamu ingin halaman detail
        return view('prestasiprima.ekskul-detail', compact('slug'));
    }
}
