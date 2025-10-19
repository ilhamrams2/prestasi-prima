<?php

namespace App\Http\Controllers\presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardAchievement;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $student_count = PresmaboardStudent::count();
        $achievement_count = PresmaboardAchievement::count();

        return view('presmaboard.dashboard', [
            'student_count' => $student_count,
            'achievement_count' => $achievement_count
        ]);
    }
}
