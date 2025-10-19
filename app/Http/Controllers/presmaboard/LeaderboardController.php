<?php

namespace App\Http\Controllers\presmaboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        return view('presmaboard.leaderboard');
    }
}
