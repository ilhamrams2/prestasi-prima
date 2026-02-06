<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\MikrotikTrainer;
use Illuminate\Http\Request;

class MikrotikAcademyController extends Controller
{
    public function index()
    {
        $trainers = MikrotikTrainer::with('certificates')->where('is_active', true)->get();
        return view('mikrotik', compact('trainers'));
    }
}
