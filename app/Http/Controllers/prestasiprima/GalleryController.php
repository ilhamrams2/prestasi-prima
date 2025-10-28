<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\PrestasiprimaGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $activeCategory = $request->query('category', 'ALL');

        $galleries = PrestasiprimaGallery::latest()->get();

        // Tambahkan properti thumbnail_url untuk tiap item
        $galleries->transform(function ($item) {
            if ($item->video_url) {
                // Ambil thumbnail dari YouTube
                preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|live\/))([\w\-]+)/", $item->video_url, $matches);
                $videoId = $matches[1] ?? null;
                $item->thumbnail_url = $videoId 
                    ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" 
                    : asset('images/no-thumbnail.jpg');
            } else {
                // Gambar lokal
                $item->thumbnail_url = $item->thumbnail 
                    ? asset('storage/' . $item->thumbnail) 
                    : asset('images/no-thumbnail.jpg');
            }
            return $item;
        });

        $categories = $galleries->pluck('category')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        if ($activeCategory !== 'ALL') {
            $galleries = $galleries->where('category', $activeCategory);
        }

        return view('prestasiprima.pages.gallery', compact('galleries', 'categories', 'activeCategory'));
    }
}

