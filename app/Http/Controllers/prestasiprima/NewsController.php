<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\Prestasiprima\News;
use App\Models\Prestasiprima\Category;
use App\Models\Prestasiprima\PrestasiprimaGallery;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * ==============================
     * HALAMAN UTAMA BERITA
     * ==============================
     */
    public function index(Request $request)
    {
        // 🔹 Ambil berita terbaru + relasi kategori
        $newsQuery = News::with('category')->latest();

        // 🔍 Fitur Pencarian
        if ($search = $request->get('search')) {
            $newsQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // 🏷️ Filter berdasarkan kategori
        if ($categorySlug = $request->get('category')) {
            $newsQuery->whereHas('category', fn($q) => $q->where('slug', $categorySlug));
        }

        // 📄 Paginasi Berita
        $news = $newsQuery->paginate(9)->withQueryString();

        // 📁 Daftar kategori untuk sidebar/filter
        $categories = Category::orderBy('name')->get();

        // 🎥 Ambil video galeri — cukup berdasarkan kolom video_url yang terisi
        $videos = PrestasiprimaGallery::query()
            ->whereNotNull('video_url')
            ->where('video_url', '!=', '')
            ->latest()
            ->take(3)
            ->get(['id', 'title', 'thumbnail', 'video_url', 'description']);

        // 🔁 Kirim data ke view
        return view('prestasiprima.pages.berita.index', compact('news', 'categories', 'videos'));
    }

    /**
     * ==============================
     * HALAMAN DETAIL BERITA
     * ==============================
     */
    public function detail(string $slug)
    {
        // 🔹 Ambil berita berdasarkan slug
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        // 📰 Ambil berita terkait dari kategori yang sama
        $related = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(4)
            ->get(['id', 'title', 'slug', 'thumbnail', 'created_at']);

        return view('prestasiprima.pages.berita.detail', compact('news', 'related'));
    }

    /**
     * ==============================
     * ALIAS UNTUK ROUTE show()
     * ==============================
     */
    public function show(string $slug)
    {
        return $this->detail($slug);
    }
}
