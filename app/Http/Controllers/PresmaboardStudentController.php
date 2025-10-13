<?php

namespace App\Http\Controllers;

use App\Models\presmaboard_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresmaboardStudentController extends Controller
{
    public function index()
    {
        $students = presmaboard_student::latest()->get();
        return view('presmaboard.siswa', compact('students'));
    }

    public function create()
    {
        return view('presmaboard.siswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:presmaboard_students',
            'no_induk' => 'required|unique:presmaboard_students',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        presmaboard_student::create($data);

        return redirect()->route('presmaboard.students.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit(presmaboard_student $student)
    {
        return view('presmaboard.siswa.edit', compact('student'));
    }

    public function update(Request $request, presmaboard_student $student)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:presmaboard_students,email,' . $student->id,
            'no_induk' => 'required|unique:presmaboard_students,no_induk,' . $student->id,
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            if ($student->foto) {
                Storage::disk('public')->delete($student->foto);
            }
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $student->update($data);

        return redirect()->route('presmaboard.students.index')->with('success', 'Data siswa diperbarui!');
    }

    public function destroy(presmaboard_student $student)
    {
        if ($student->foto) {
            Storage::disk('public')->delete($student->foto);
        }

        $student->delete();

        return redirect()->route('presmaboard.students.index')->with('success', 'Siswa dihapus!');
    }
}