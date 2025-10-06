<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresmalanceController extends Controller
{
    public function presmalance()
    {
        return view('pressmalancer.pages.presmalance');
    }

    public function login()
    {
        return view('pressmalancer.pages.login');
    }

     public function forum()
    {
        return view('pressmalancer.pages.forum');
    }

    public function profile()
    {
        return view('pressmalancer.pages.profile');
    }


}
