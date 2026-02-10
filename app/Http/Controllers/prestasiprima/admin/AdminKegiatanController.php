<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Kegiatan;
use Illuminate\Support\Facades\Storage;

class AdminKegiatanController extends Controller
{
    /**
     * Tampilkan semua data kegiatan
     */
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(10);
        return view('prestasiprima.admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Form tambah kegiatan baru
     */
    public function create()
    {
        return view('prestasiprima.admin.kegiatan.create');
    }

    /**
     * Simpan data kegiatan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'tempat' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        Kegiatan::create($data);

        return redirect()->route('prestasiprima.admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('prestasiprima.admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update kegiatan
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:15360',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'tempat' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($data);

        return redirect()->route('prestasiprima.admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }
        $kegiatan->delete();

        return redirect()->route('prestasiprima.admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}
