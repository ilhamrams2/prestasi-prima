<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardAchievement;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    function index(Request $request)
    {
        $achievements = PresmaboardAchievement::with('student')
            ->when($request->search, function ($query) use ($request) {
                $query->where('judul', 'like', "%$request->search%")
                    ->orWhereRelation('student', 'nama', 'like', "%$request->search%");
            })
            ->latest()
            ->get();

        $students = PresmaboardStudent::withCount('achievements')
            ->orderBy('nama')
            ->get();

        // Jurusan dengan jumlah prestasi terbanyak
        $topJurusan = PresmaboardAchievement::selectRaw('presmaboard_students.jurusan, COUNT(*) as total')
            ->join('presmaboard_students', 'presmaboard_achievements.student_id', '=', 'presmaboard_students.id')
            ->groupBy('presmaboard_students.jurusan')
            ->orderByDesc('total')
            ->first();

    $prestasiNasional = $topJurusan ? mb_strtoupper(trim($topJurusan->jurusan)) : '-';

        return view('presmaboard.achievement', [
            'achievements' => $achievements,
            'students' => $students,
            'statistics' => [
                'total_achievements' => PresmaboardAchievement::count(),
                'most_achievement_student' => $students->sortByDesc('achievements_count')->first()?->nama,
            ],
            'prestasiNasional' => $prestasiNasional,
        ]);
    }

    function store(Request $request)
    {
        try {
            PresmaboardAchievement::create([
                'student_id' => $request->student_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal
            ]);

            return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Prestasi gagal ditambahkan');
        }
    }

    function update(PresmaboardAchievement $achievement, Request $request)
    {
        try {
            $achievement->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal
            ]);

            return redirect()->back()->with('success', 'Prestasi berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Prestasi gagal perbarui');
        }
    }

    function destroy(PresmaboardAchievement $achievement)
    {
        try {
            $achievement->delete();
            return redirect()->back()->with('success', 'Prestasi berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Prestasi gagal dihapus');
        }
    }
}
