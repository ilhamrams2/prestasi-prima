<?php

namespace App\Http\Controllers\Prestasiprima\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasiprima\PrestasiprimaGallery;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = PrestasiprimaGallery::latest()->paginate(10);
        return view('prestasiprima.admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('prestasiprima.admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'thumbnail' => 'nullable|string',
            'video_url' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        PrestasiprimaGallery::create($request->all());
        return redirect()->route('prestasiprima.admin.gallery.index')->with('success', 'Item galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        return view('prestasiprima.admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        $gallery->update($request->all());
        return redirect()->route('prestasiprima.admin.gallery.index')->with('success', 'Item galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        $gallery->delete();
        return back()->with('success', 'Item galeri berhasil dihapus!');
    }
}
