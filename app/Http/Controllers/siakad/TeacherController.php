<?php

namespace App\Http\Controllers\siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = SiakadTeacher::latest()->paginate(10);
        return view('siakad.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('siakad.teacher.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required|string|max:50|unique:siakad_teachers,teacher_id',
            'name'       => 'required|string|max:100',
            'subject'    => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'email'      => 'nullable|email|max:100',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            SiakadTeacher::create($validatedData);
            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Guru berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $teacher = SiakadTeacher::findOrFail($id);
        return view('siakad.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = SiakadTeacher::findOrFail($id);

        $validatedData = $request->validate([
            'teacher_id' => 'required|string|max:50|unique:siakad_teachers,teacher_id,' . $teacher->id,
            'name'       => 'required|string|max:100',
            'subject'    => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'email'      => 'nullable|email|max:100',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            $teacher->update($validatedData);
            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Guru berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $teacher = SiakadTeacher::findOrFail($id);
            $teacher->delete();

            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Guru berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
