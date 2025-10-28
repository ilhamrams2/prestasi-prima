<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class PresmaboardController extends Controller
{
    function index()
{
    $students = PresmaboardStudent::withAvg('scores', 'score')
        ->orderBy('scores_avg_score', 'desc')
        ->get()
        ->values(); // ✅ reset index supaya $students[0], [1], [2] valid

    // ✅ (opsional tapi disarankan)
    // kalau tidak ada data sama sekali, kirim koleksi kosong agar tidak error di Blade
    if ($students->isEmpty()) {
        $students = collect();
    }

    return view('presmaboard.leaderboard', [
        'students' => $students
    ]);
}


    function eligible(PresmaboardStudent $student)
    {
        $student
            ->load(['achievements', 'projects'])
            ->loadAvg('scores', 'score');

        $rank = PresmaboardStudent::select('id')
            ->withAvg('scores', 'score')
            ->orderBy('scores_avg_score', 'desc')
            ->get()
            ->map(function ($student, $index) {
                $student->rank = $index + 1;
                return $student;
            });

        $student->rank = $rank->where('id', $student->id)->first()->rank;

        return view('presmaboard.eligible', [
            'student' => $student
        ]);
    }
}
