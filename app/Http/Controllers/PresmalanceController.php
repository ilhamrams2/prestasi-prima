<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresmalanceController extends Controller
{
    public function login()
    {
        return view('pressmalancer.login');
    }
}
