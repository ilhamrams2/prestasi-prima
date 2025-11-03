<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    /**
     * Menampilkan halaman Traffic Tracker.
     */
    public function index()
    {
        // Langsung arahkan ke halaman blade
        return view('prestasiprima.pages.traffic');
    }

    /**
     * (Opsional) Proses perhitungan jarak antara rumah dan sekolah.
     * Jika nanti kamu mau fitur interaktif jarak otomatis, bisa dikembangkan di sini.
     */
    public function calculateDistance(Request $request)
    {
        $validated = $request->validate([
            'alamat_rumah' => 'required|string|max:255',
        ]);

        // Lokasi sekolah (contoh koordinat SMK Prestasi Prima)
        $schoolLat = -6.225927; 
        $schoolLng = 106.912501;

        // Untuk sekarang, kita belum pakai API Maps, jadi hanya placeholder.
        // Jika mau pakai Google Maps API atau OpenStreetMap, logika bisa ditambahkan di sini.

        $jarak = "Belum dihitung (fitur dalam pengembangan)";

        return view('prestasiprima.pages.traffic', [
            'alamat_rumah' => $validated['alamat_rumah'],
            'jarak' => $jarak,
        ]);
    }
}
