<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresmaboardBackofficeController extends Controller
{
    public function index()
    {
        return view('backoffice.presmaboard.index');
    }
}
