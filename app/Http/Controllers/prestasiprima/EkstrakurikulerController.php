<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Menampilkan halaman utama ekstrakurikuler
     */
    public function index()
    {
        // Daftar ekstrakurikuler yang dimiliki sekolah
        $ekskulList = [
            ['name' => 'Pramuka', 'img' => 'pramuka.jpg'],
            ['name' => 'Paskibra', 'img' => 'paskibra.jpg'],
            ['name' => 'Futsal', 'img' => 'futsal.jpg'],
            ['name' => 'Basket', 'img' => 'basket.jpg'],
            ['name' => 'Volly', 'img' => 'volly.jpg'],
            ['name' => 'Badminton', 'img' => 'badminton.jpg'],
            ['name' => 'Paduan Suara', 'img' => 'padus.jpg'],
            ['name' => 'Band Sekolah', 'img' => 'band.jpg'],
            ['name' => 'Tari Tradisional', 'img' => 'tari.jpg'],
            ['name' => 'Modern Dance', 'img' => 'dance.jpg'],
            ['name' => 'Rohis', 'img' => 'rohis.jpg'],
            ['name' => 'Karya Ilmiah Remaja', 'img' => 'kir.jpg'],
            ['name' => 'PMR (Palang Merah Remaja)', 'img' => 'pmr.jpg'],
            ['name' => 'English Club', 'img' => 'english.jpg'],
            ['name' => 'Jurnalistik', 'img' => 'jurnalistik.jpg'],
            ['name' => 'Desain Grafis', 'img' => 'design.jpg'],
            ['name' => 'Robotik', 'img' => 'robotik.jpg'],
            ['name' => 'IT Club', 'img' => 'itclub.jpg'],
            ['name' => 'Cinematography', 'img' => 'cinema.jpg'],
            ['name' => 'Multimedia Club', 'img' => 'multimedia.jpg'],
            ['name' => 'Kewirausahaan', 'img' => 'wirausaha.jpg'],
        ];

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
