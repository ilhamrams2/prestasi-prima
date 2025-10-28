<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Category;
use App\Models\prestasiprima\PrestasiprimaGallery;
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
        $newsQuery = News::with('category')->latest();

        // 🔍 Pencarian
        if ($search = $request->get('search')) {
            $newsQuery->where(fn($query) => 
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%")
            );
        }

        // 🏷️ Filter kategori
        if ($categorySlug = $request->get('category')) {
            $newsQuery->whereHas('category', fn($q) => $q->where('slug', $categorySlug));
        }

        // 🎯 Ubah dari paginate(9) menjadi get() agar semua berita muncul
        $news = $newsQuery->get();

        // Jika ingin pagination, ganti jadi:
        // $news = $newsQuery->paginate(12)->withQueryString();

        $categories = Category::orderBy('name')->get();

        $videos = PrestasiprimaGallery::query()
            ->whereNotNull('video_url')
            ->where('video_url', '!=', '')
            ->latest()
            ->take(3)
            ->get(['id', 'title', 'thumbnail', 'video_url', 'description']);

        return view('prestasiprima.pages.berita.index', compact('news', 'categories', 'videos'));
    }

    /**
     * ==============================
     * HALAMAN DETAIL BERITA
     * ==============================
     */
    public function detail(string $slug)
    {
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        $categories = Category::orderBy('name')->get();

        $hotNews = News::where('id', '!=', $news->id)
                        ->latest()
                        ->take(5)
                        ->get();

        $related = News::where('category_id', $news->category_id)
                        ->where('id', '!=', $news->id)
                        ->latest()
                        ->take(4)
                        ->get(['id','title','slug','thumbnail','created_at']);

        return view('prestasiprima.pages.berita.detail', compact('news', 'categories', 'hotNews', 'related'));
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

