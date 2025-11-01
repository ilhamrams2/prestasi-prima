<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Category;
use Illuminate\Support\Str;

class AdminNewsController extends Controller
{
    // Menampilkan daftar berita
    public function index()
    {
        $news = News::with('category')->latest()->paginate(10);
        return view('prestasiprima.admin.berita.index', compact('news'));
    }

    // Menampilkan form tambah berita
    public function create()
    {
        $categories = Category::all();
        return view('prestasiprima.admin.berita.create', compact('categories'));
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:prestasiprima_categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category_id']);
        $data['slug'] = Str::slug($request->title);

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
            $data['thumbnail'] = 'uploads/thumbnails/' . $filename;
        }

        News::create($data);

        return redirect()->route('prestasiprima.admin.berita.index')
                         ->with('success', 'Berita berhasil ditambahkan!');
    }

    // Menampilkan form edit berita
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('prestasiprima.admin.berita.edit', compact('news', 'categories'));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:prestasiprima_categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $news = News::findOrFail($id);
        $data = $request->only(['title', 'content', 'category_id']);
        $data['slug'] = Str::slug($request->title);

        // Upload thumbnail baru dan hapus yang lama
        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && file_exists(public_path($news->thumbnail))) {
                unlink(public_path($news->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/thumbnails'), $filename);
            $data['thumbnail'] = 'uploads/thumbnails/' . $filename;
        }

        $news->update($data);

        return redirect()->route('prestasiprima.admin.berita.index')
                         ->with('success', 'Berita berhasil diperbarui!');
    }

    // Hapus berita
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->thumbnail && file_exists(public_path($news->thumbnail))) {
            unlink(public_path($news->thumbnail));
        }

        $news->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }

    // === SHOW DETAIL BERITA ===
    public function show($id)
    {
        $news = News::with('category')->findOrFail($id);
        return view('prestasiprima.admin.berita.show', compact('news'));
    }
}
