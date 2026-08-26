<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Prestasi;
use App\Models\prestasiprima\ActivityLog;
use App\Services\prestasiprima\MediaService;

class AdminPrestasiController extends Controller
{
    /**
     * Tampilkan semua data prestasi.
     */
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(12);
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
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:15360',
            'tanggal' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            $path = MediaService::upload($request->file('gambar'), 'prestasi', 800);
            $validated['gambar'] = $path;
        }

        $prestasi = Prestasi::create($validated);

        ActivityLog::log('create', "Menambahkan prestasi baru: '{$prestasi->judul}'", $prestasi);

        return redirect()
            ->route('prestasiprima.admin.prestasi.index')
            ->with('success', 'Prestasi baru berhasil ditambahkan dan otomatis tampil di landing page!');
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
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15360',
            'tanggal' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                MediaService::delete($prestasi->gambar);
            }
            $path = MediaService::upload($request->file('gambar'), 'prestasi', 800);
            $validated['gambar'] = $path;
        }

        $prestasi->update($validated);

        ActivityLog::log('update', "Memperbarui data prestasi: '{$prestasi->judul}'", $prestasi);

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
        $judul = $prestasi->judul;

        if ($prestasi->gambar) {
            MediaService::delete($prestasi->gambar);
        }

        $prestasi->delete();

        ActivityLog::log('delete', "Menghapus data prestasi: '{$judul}'");

        return redirect()
            ->route('prestasiprima.admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus!');
    }

    /**
     * Tampilkan detail prestasi.
     */
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasiprima.admin.prestasi.show', compact('prestasi'));
    }
}
