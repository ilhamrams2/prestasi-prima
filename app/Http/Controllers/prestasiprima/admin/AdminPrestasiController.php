<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Prestasi;
use Illuminate\Support\Facades\File;

class AdminPrestasiController extends Controller
{
    /**
     * Tampilkan semua data prestasi.
     */
    public function index()
    {
        $prestasis = Prestasi::latest()->get();
        return view('prestasiprima.admin.prestasi.index', compact('prestasis'));
    }

    /**
     * Form tambah prestasi.
     */
    public function create()
    {
        return view('prestasiprima.admin.prestasi.create');
    }

    /**
     * Simpan data prestasi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('storage/prestasi'), $namaFile);
            $validated['gambar'] = 'prestasi/' . $namaFile;
        }

        Prestasi::create($validated);

        return redirect()
            ->route('prestasiprima.admin.prestasi.index')
            ->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Form edit data prestasi.
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasiprima.admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Update data prestasi.
     */
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari folder publik
            $pathLama = public_path('storage/' . $prestasi->gambar);
            if (File::exists($pathLama)) {
                File::delete($pathLama);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('storage/prestasi'), $namaFile);
            $validated['gambar'] = 'prestasi/' . $namaFile;
        }

        $prestasi->update($validated);

        return redirect()
            ->route('prestasiprima.admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil diperbarui!');
    }

    /**
     * Hapus data prestasi.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file gambar dari public/storage/
        $path = public_path('storage/' . $prestasi->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasiprima.admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus!');
    }

    /**
     * Tampilkan detail prestasi (fungsi show).
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasiprima.admin.prestasi.show', compact('prestasi'));
    }
}
