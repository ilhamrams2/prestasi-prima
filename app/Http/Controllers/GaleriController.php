<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        // ambil semua kategori
        $categories = Category::all();

        // ambil galeri dengan relasi kategori
        $galeris = Galeri::with('category')->latest()->get();

        // kirim ke view
        return view('prestasiprima.pages.galeri', compact('galeris', 'categories'));
    }
}
