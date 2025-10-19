<?php

namespace App\Http\Controllers\presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardAchievement;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    function index()
    {
        $student_count = PresmaboardStudent::count();
        $achievement_count = PresmaboardAchievement::count();
        $project_count = PresmaboardProject::count();

        $average_major_score = PresmaboardStudent::withAvg('scores', 'score')
            ->get()
            ->groupBy('jurusan')
            ->map(function ($student) {
                return number_format($student->avg('scores_avg_score'), 2);
            });

        $largest_year = PresmaboardAchievement::selectRaw('MAX(YEAR(tanggal)) as tahun')
            ->value('tahun');

        $achievement_average = PresmaboardAchievement::select('id', 'judul', 'tanggal')
            ->whereYear('tanggal', $largest_year)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->tanggal)->format('M');
            })
            ->map(function ($achievement) {
                return [
                    'count' => $achievement->count(),
                    'desc' => $achievement[0]->judul
                ];
            });

        return view('presmaboard.dashboard', [
            'student_count' => $student_count,
            'achievement_count' => $achievement_count,
            'project_count' => $project_count,
            'average_major_score' => $average_major_score,
            'achievement_average' => $achievement_average
        ]);
    }
}
