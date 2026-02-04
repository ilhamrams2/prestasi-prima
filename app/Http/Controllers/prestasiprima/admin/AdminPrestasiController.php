<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Prestasi;
use App\Services\prestasiprima\MediaService;

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
            $path = MediaService::upload($request->file('gambar'), 'prestasi', 800);
            $validated['gambar'] = 'storage/' . $path; // Add storage prefix only for external access if needed, but usually just path
            // Note: MediaService returns 'folder/filename.webp'. Prestasi Controller seems to use 'prestasi/filename' logic manually. 
            // Let's stick to MediaService convention.
            $validated['gambar'] = $path; 
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
            // Hapus gambar lama
            if ($prestasi->gambar) {
                MediaService::delete($prestasi->gambar);
            }

            // Upload gambar baru
            $path = MediaService::upload($request->file('gambar'), 'prestasi', 800);
            $validated['gambar'] = $path;
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

        // Hapus file gambar
        if ($prestasi->gambar) {
            MediaService::delete($prestasi->gambar);
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
