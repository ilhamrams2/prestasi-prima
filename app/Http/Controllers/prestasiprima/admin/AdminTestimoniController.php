<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->paginate(10);
        return view('prestasiprima.admin.testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('prestasiprima.admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pesan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('testimoni', 'public');
            $foto = basename($fotoPath);
        }

        Testimoni::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'pesan' => $request->pesan,
            'foto' => $foto,
        ]);

        return redirect()->route('prestasiprima.admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('prestasiprima.admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pesan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($testimoni->foto && Storage::disk('public')->exists('testimoni/' . $testimoni->foto)) {
                Storage::disk('public')->delete('testimoni/' . $testimoni->foto);
            }
            $fotoPath = $request->file('foto')->store('testimoni', 'public');
            $testimoni->foto = basename($fotoPath);
        }

        $testimoni->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('prestasiprima.admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->foto && Storage::disk('public')->exists('testimoni/' . $testimoni->foto)) {
            Storage::disk('public')->delete('testimoni/' . $testimoni->foto);
        }
        $testimoni->delete();

        return redirect()->route('prestasiprima.admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
