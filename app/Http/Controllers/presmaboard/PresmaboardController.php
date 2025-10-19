<?php

namespace App\Http\Controllers\presmaboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresmaboardController extends Controller
{
    function index()
    {
        return view('presmaboard.eligible');
    }
}
