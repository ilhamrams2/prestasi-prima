<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekskuls = Ekstrakurikuler::latest()->paginate(10);
        return view('prestasiprima.admin.ekstrakurikuler.index', compact('ekskuls'));
    }

    public function create()
    {
        return view('prestasiprima.admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ekstrakurikuler', 'public');
            $gambar = basename($gambarPath);
        }

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('prestasiprima.admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('prestasiprima.admin.ekstrakurikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar && Storage::disk('public')->exists('ekstrakurikuler/' . $ekskul->gambar)) {
                Storage::disk('public')->delete('ekstrakurikuler/' . $ekskul->gambar);
            }
            $gambarPath = $request->file('gambar')->store('ekstrakurikuler', 'public');
            $ekskul->gambar = basename($gambarPath);
        }

        $ekskul->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('prestasiprima.admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        if ($ekskul->gambar && Storage::disk('public')->exists('ekstrakurikuler/' . $ekskul->gambar)) {
            Storage::disk('public')->delete('ekstrakurikuler/' . $ekskul->gambar);
        }
        $ekskul->delete();

        return redirect()->route('prestasiprima.admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
