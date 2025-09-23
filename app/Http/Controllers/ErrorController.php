<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notfound()
    {
        return view('prestasiprima.pages.erorpage.notfound');
    }

    public function notinternet()
    {
        return view('prestasiprima.pages.erorpage.notinternet');
    }

}