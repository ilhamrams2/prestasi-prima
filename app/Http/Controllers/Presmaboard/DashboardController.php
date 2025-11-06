<?php

namespace App\Http\Controllers\Presmaboard;

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
                return (float) number_format($student->avg('scores_avg_score') ?? 0, 2);
            });

        // Ensure known jurusan keys exist for the chart (lowercase keys)
        $average_major_score = collect([
            'bcf' => $average_major_score->get('BCF', 0) ?: $average_major_score->get('bcf', 0),
            'pplg' => $average_major_score->get('PPLG', 0) ?: $average_major_score->get('pplg', 0),
            'dkv' => $average_major_score->get('DKV', 0) ?: $average_major_score->get('dkv', 0),
            'tkj' => $average_major_score->get('TKJ', 0) ?: $average_major_score->get('tkj', 0),
        ]);

        // Build simple monthly trends (last 6 months) for sparklines in the stat cards
        $months = collect(range(5, 0))->map(function ($i) {
            return \Illuminate\Support\Carbon::now()->subMonths($i);
        })->values();

        $student_trend = [];
        $project_trend = [];
        $achievement_trend = [];

        foreach ($months as $m) {
            $student_trend[] = PresmaboardStudent::whereYear('created_at', $m->year)
                ->whereMonth('created_at', $m->month)
                ->count();

            $project_trend[] = PresmaboardProject::whereYear('created_at', $m->year)
                ->whereMonth('created_at', $m->month)
                ->count();

            $achievement_trend[] = PresmaboardAchievement::whereYear('tanggal', $m->year)
                ->whereMonth('tanggal', $m->month)
                ->count();
        }

        $months_labels = $months->map(fn($d) => $d->format('M'))->toArray();

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
            'achievement_average' => $achievement_average,
            'student_trend' => $student_trend,
            'project_trend' => $project_trend,
            'achievement_trend' => $achievement_trend,
            'months_labels' => $months_labels,
        ]);
    }
}
