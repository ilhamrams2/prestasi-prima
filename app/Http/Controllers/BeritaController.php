<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * ======================
     * PUBLIK (USER WEBSITE)
     * ======================
     */

    // Halaman utama berita untuk publik
    public function publicIndex()
    {
        $beritas = Berita::latest()->paginate(6);
        return view('prestasiprima.pages.berita.home', compact('beritas'));
    }

    // Halaman detail berita untuk publik
    public function publicShow(Berita $berita)
    {
        return view('prestasiprima.pages.berita.show', compact('berita'));
    }

    /**
     * ======================
     * ADMIN (BACKOFFICE)
     * ======================
     */

    // Daftar berita untuk admin
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('prestasiprima.admin.berita.index', compact('beritas'));
    }

    // Form tambah berita
    public function create()
    {
        return view('prestasiprima.admin.berita.create');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'          => 'required|string|max:255',
            'kategori'       => 'required|string|max:100',
            'tanggal_upload' => 'required|date',
            'isi'            => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis'        => 'required|string|max:100',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul'          => $request->judul,
            'kategori'       => $request->kategori,
            'tanggal_upload' => $request->tanggal_upload,
            'isi'            => $request->isi,
            'gambar'         => $gambarPath,
            'penulis'        => $request->penulis,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    // Detail berita admin
    public function show(Berita $berita)
    {
        return view('prestasiprima.admin.berita.show', compact('berita'));
    }

    // Form edit berita
    public function edit(Berita $berita)
    {
        return view('prestasiprima.admin.berita.edit', compact('berita'));
    }

    // Update berita
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'          => 'required|string|max:255',
            'kategori'       => 'required|string|max:100',
            'tanggal_upload' => 'required|date',
            'isi'            => 'required',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis'        => 'required|string|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambarPath;
        }

        $berita->update([
            'judul'          => $request->judul,
            'kategori'       => $request->kategori,
            'tanggal_upload' => $request->tanggal_upload,
            'isi'            => $request->isi,
            'gambar'         => $berita->gambar,
            'penulis'        => $request->penulis,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate!');
    }

    // Hapus berita
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
