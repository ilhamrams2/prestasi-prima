<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresmalanceController extends Controller
{
    public function presmalance()
    {
        return view('pressmalancer.presmalance');
    }

    public function login()
    {
        return view('pressmalancer.login');
    }

     public function forum()
    {
        return view('pressmalancer.forum');
    }
}
