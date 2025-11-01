<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Prestasi;

class PrestasiController extends Controller
{
    /**
     * Tampilkan halaman daftar prestasi siswa.
     */
    public function index()
    {
        // Ambil semua data prestasi terbaru
        $prestasis = Prestasi::latest()->get();

        // Kirim data ke view
        return view('prestasiprima.pages.prestasi', compact('prestasis'));
    }

    /**
     * Simpan data prestasi baru (jika nanti ada form input).
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        // Simpan data ke database
        Prestasi::create($validated);

        return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan!');
    }
}
