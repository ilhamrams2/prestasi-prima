<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Tampilkan semua berita (halaman utama)
     */
    public function index()
    {
        $news = News::with('category')
            ->latest()
            ->paginate(9); // 9 berita per halaman

        return view('prestasiprima.pages.berita.index', compact('news'));
    }

    /**
     * Tampilkan berita berdasarkan kategori
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $news = News::where('category_id', $category->id)
            ->latest()
            ->paginate(9);

        return view('prestasiprima.pages.berita.category', compact('category', 'news'));
    }

    /**
     * Tampilkan detail berita
     * (nama method lama: detail)
     */
    public function detail($slug)
    {
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        return view('prestasiprima.pages.berita.detail', compact('news'));
    }

    /**
     * Compatibility wrapper
     * Jika route memanggil 'show', arahkan ke 'detail'
     */
    public function show($slug)
    {
        return $this->detail($slug);
    }
}
