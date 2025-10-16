<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\Prestasiprima\PrestasiprimaGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Tampilkan halaman galeri kegiatan sekolah
     */
    public function index(Request $request)
    {
        // Ambil kategori aktif dari query (opsional)
        $activeCategory = $request->query('category', 'ALL');

        // Ambil semua galeri, urutkan terbaru
        $galleries = PrestasiprimaGallery::latest()->get();

        // Ambil daftar kategori unik dari kolom `category`
        $categories = $galleries->pluck('category')
            ->filter() // buang null / kosong
            ->unique()
            ->sort()
            ->values(); // reset index biar rapi di loop Blade

        // Jika kategori tertentu dipilih, filter datanya
        if ($activeCategory !== 'ALL') {
            $galleries = $galleries->where('category', $activeCategory);
        }

        return view('prestasiprima.pages.gallery', compact('galleries', 'categories', 'activeCategory'));
    }
}
