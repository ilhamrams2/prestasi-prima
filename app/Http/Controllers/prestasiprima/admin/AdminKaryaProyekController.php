<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\KaryaProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKaryaProyekController extends Controller
{
    public function index()
    {
        $projects = KaryaProyek::latest()->paginate(10);
        return view('prestasiprima.admin.karya.index', compact('projects'));
    }

    public function create()
    {
        return view('prestasiprima.admin.karya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15360',
            'tags' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/karya-proyek'), $filename);
            $gambar = $filename;
        }

        KaryaProyek::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'tags' => $request->tags,
            'link' => $request->link,
        ]);

        return redirect()->route('prestasiprima.admin.karya.index')->with('success', 'Karya berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $project = KaryaProyek::findOrFail($id);
        return view('prestasiprima.admin.karya.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = KaryaProyek::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15360',
            'tags' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            if ($project->gambar && file_exists(public_path('assets/images/karya-proyek/' . $project->gambar))) {
                unlink(public_path('assets/images/karya-proyek/' . $project->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/karya-proyek'), $filename);
            $project->gambar = $filename;
        }

        $project->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tags' => $request->tags,
            'link' => $request->link,
        ]);

        return redirect()->route('prestasiprima.admin.karya.index')->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $project = KaryaProyek::findOrFail($id);
        if ($project->gambar && file_exists(public_path('assets/images/karya-proyek/' . $project->gambar))) {
            unlink(public_path('assets/images/karya-proyek/' . $project->gambar));
        }
        $project->delete();

        return redirect()->route('prestasiprima.admin.karya.index')->with('success', 'Karya berhasil dihapus.');
    }
}
