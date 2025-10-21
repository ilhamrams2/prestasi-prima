<?php

namespace App\Http\Controllers\Prestasiprima;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        // Cukup tampilkan view saja tanpa data
        return view('prestasiprima.pages.staff');
    }
}
