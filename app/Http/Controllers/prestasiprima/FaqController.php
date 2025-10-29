<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * ==============================
     * HALAMAN FAQ
     * ==============================
     */
    public function index()
    {
        // Mengarahkan ke view FAQ di folder resources/views/prestasiprima/pages/faq.blade.php
        return view('prestasiprima.pages.faq');
    }
}
