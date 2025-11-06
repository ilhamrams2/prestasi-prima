<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasiprima\Kegiatan;

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
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'tempat' => 'required|string|max:255',
        ]);

        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
        ]);

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
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'tempat' => 'required|string|max:255',
        ]);

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'tempat' => $request->tempat,
        ]);

        return redirect()->route('prestasiprima.admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('prestasiprima.admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}
