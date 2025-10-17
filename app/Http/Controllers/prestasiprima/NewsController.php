<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Tampilkan semua berita (halaman utama) + search + filter kategori
     */
    public function index(Request $request)
    {
        $query = News::with('category')->latest();

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('content', 'like', '%'.$request->search.'%');
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        $news = $query->paginate(9)->withQueryString();
        $categories = Category::all();

        return view('prestasiprima.pages.berita.index', compact('news', 'categories'));
    }

    /**
     * Tampilkan detail berita + related news
     */
    public function detail($slug)
    {
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        // Related news
        $related = News::where('category_id', $news->category_id)
                        ->where('id', '!=', $news->id)
                        ->latest()
                        ->take(4)
                        ->get();

        return view('prestasiprima.pages.berita.detail', compact('news', 'related'));
    }

    /**
     * Compatibility wrapper untuk route 'show'
     */
    public function show($slug)
    {
        return $this->detail($slug);
    }
}
