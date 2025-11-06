<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(Request $request)
    {
        $students = PresmaboardStudent::with('achievements')
            ->withCount('projects')
            ->withAvg('scores', 'score')
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama', 'like', "%$request->search%")
                    ->orWhere('nis', 'like', "%$request->search%");
            })
            ->when($request->jurusan, fn($query) => $query->where('jurusan', $request->jurusan))
            ->when($request->kelas, fn($query) => $query->where('kelas', $request->kelas))
            ->get();

        $students_statistics = PresmaboardStudent::select('id', 'gender')->withCount('achievements')->get();

        return view('presmaboard.student', [
            'students' => $students,
            'statistics' => [
                'student_count' => $students_statistics->count(),
                'student_has_achievement' => $students_statistics->where('achievements_count', '>', 0)->count(),
                'male' => $students_statistics->where('gender', 'l')->count(),
                'female' => $students_statistics->where('gender', 'p')->count(),
            ],

        ]);
    }

    function store(Request $request)
    {
        try {
            if ($file = $request->file('foto')) {
                $filename = 'student-' . time() . '.' . $file->getClientOriginalExtension();
                $request->file('foto')->storePubliclyAs('presmaboard/students', $filename, 'public');
            }

            PresmaboardStudent::create([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'email' => $request->email,
                'nis' => $request->nis,
                'is_active' => $request->is_active,
                'foto' => $filename ?? null
            ]);

            return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function update(PresmaboardStudent $student, Request $request)
    {
        try {
            if ($file = $request->file('foto')) {
                $filename = 'student-' . time() . '.' . $file->getClientOriginalExtension();
                $request->file('foto')->storePubliclyAs('presmaboard/students', $filename, 'public');
            }

            $student->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'email' => $request->email,
                'nis' => $request->nis,
                'is_active' => $request->is_active,
                'foto' => $filename ?? null
            ]);

            return redirect()->back()->with('success', 'Siswa berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function destroy(PresmaboardStudent $student)
    {
        try {
            $student->delete();
            return back()->with('success', 'Siswa berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}