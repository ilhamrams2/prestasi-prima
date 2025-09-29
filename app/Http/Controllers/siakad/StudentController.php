<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadClass;
use App\Models\siakad\SiakadStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{

public function index()
    {
        $students = SiakadStudent::with('class')->get(); // Ambil data siswa beserta relasi kelas

        $students = SiakadStudent::with('class')->get(); // Mengambil data siswa beserta kelasnya

        // return view('siakad.students.index', compact('students'));
    }

    /**
     * Simpan siswa baru
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|unique:siakad_students|numeric',
            'name'       => 'required|string|max:255',
            'gender'     => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'class_id'   => 'required|exists:siakad_classes,id',
            'year_entry' => 'required|numeric',
        ]);

        try {
            SiakadStudent::create($validatedData);

            return redirect()->route('siakad.students.index')
                             ->with('success', 'Siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Form edit siswa
     */
    public function edit(string $id)
    {
        $student = SiakadStudent::findOrFail($id);
        $classes = SiakadClass::all();

        return view('siakad.pages.student.edit', compact('student', 'classes'));
    }

    /**
     * Update data siswa
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|numeric|unique:siakad_students,student_id,' . $id,
            'name'       => 'required|string|max:255',
            'gender'     => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'class_id'   => 'required|exists:siakad_classes,id',
            'year_entry' => 'required|numeric',
        ]);

        try {
            $student = SiakadStudent::findOrFail($id);
            $student->update($validatedData);

            return redirect()->route('siakad.students.index')
                             ->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data siswa
     */
    public function destroy(string $id)
    {
        try {
            $student = SiakadStudent::findOrFail($id);
            $student->delete();

            return redirect()->route('siakad.students.index')
                             ->with('success', 'Siswa berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}