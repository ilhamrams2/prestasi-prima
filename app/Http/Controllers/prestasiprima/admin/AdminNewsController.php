<?php

namespace App\Http\Controllers\Prestasiprima\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasiprima\News;
use App\Models\Prestasiprima\Category;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->paginate(10);
        return view('prestasiprima.admin.berita.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('prestasiprima.admin.berita.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|string',
        ]);

        News::create($request->all());
        return redirect()->route('prestasiprima.admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('prestasiprima.admin.berita.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return redirect()->route('prestasiprima.admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return back()->with('success', 'Berita berhasil dihapus!');
    }
}
