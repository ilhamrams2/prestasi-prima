<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('siakad.pages.dashboard');
    }

  
}