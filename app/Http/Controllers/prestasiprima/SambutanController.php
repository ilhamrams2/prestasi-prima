<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;

class SambutanController extends Controller
{
    public function index()
    {
        return view('prestasiprima.pages.sambutan');
    }
}
