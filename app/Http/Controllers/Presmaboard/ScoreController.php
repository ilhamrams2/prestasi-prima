<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    function index(Request $request)
    {
        $scores = PresmaboardScore::with('student')
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('student', 'nama', 'like', "%$request->search%");
            })
            ->when($request->tahun_ajaran, fn($query) => $query->where('tahun_ajaran', $request->tahun_ajaran))
            ->when($request->semester, fn($query) => $query->where('semester', $request->semester))
            ->latest()
            ->get();

        $students = PresmaboardStudent::select('id', 'nama')->orderBy('nama')->get();
        $tahun_ajar = PresmaboardScore::select('tahun_ajaran')->distinct()->get();


        return view('presmaboard.score', [
            'scores' => $scores,
            'students' => $students,
            'tahun_ajar' => $tahun_ajar,
            'statistics' => [
                'total_scores' => PresmaboardScore::count(),
                'average_score' => PresmaboardScore::avg('score'),
                'high_score' => PresmaboardScore::max('score'),
            ]
        ]);
    }

    function store(Request $request)
    {
        try {
            PresmaboardScore::create([
                'student_id' => $request->student_id,
                'score' => $request->score,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
                'tipe_ujian' => $request->tipe_ujian
            ]);

            return redirect()->back()->with('success', 'Nilai berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function update(PresmaboardScore $score, Request $request)
    {
        try {
            $score->update([
                'score' => $request->score,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
                'tipe_ujian' => $request->tipe_ujian
            ]);

            return redirect()->back()->with('success', 'Nilai berhasil diperbaharui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function destroy(PresmaboardScore $score)
    {
        try {
            $score->delete();
            return redirect()->back()->with('success', 'Nilai berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
