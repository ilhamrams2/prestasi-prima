<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadClass;
use App\Models\siakad\SiakadMajor;
use App\Models\siakad\SiakadStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = SiakadStudent::with('class', 'major')->get();
        $classes = SiakadClass::all();
        $majors = SiakadMajor::all();

        // Mengambil data siswa beserta kelasnya

        return view('siakad.pages.student.index', compact('students', 'classes', 'majors'));
    }

    /**
     * Simpan siswa baru
     */
    public function store(Request $request)
    {
        try {
            // Generate student number otomatis
            $lastStudent = SiakadStudent::latest('id')->first();
            $nextNumber = 'STU' . str_pad(($lastStudent?->id ?? 0) + 1, 4, '0', STR_PAD_LEFT);

            // Validasi data selain student_number
            $validatedData = $request->validate([
                'name'     => 'required|string|max:100',
                'email'    => 'required|email|unique:siakad_students,email',
                'password' => 'required|string|min:6',
                'major_id' => 'nullable|exists:siakad_majors,id',
                'class_id' => 'nullable|exists:siakad_classes,id',
            ]);

            // Tambahkan student_number hasil generate
            $validatedData['student_number'] = $nextNumber;

            // Enkripsi password
            $validatedData['password'] = bcrypt($validatedData['password']);

            // Simpan ke database
            SiakadStudent::create($validatedData);

            return redirect()->route('siakad.students.index')
                ->with('success', 'Siswa berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        try {
            $student = SiakadStudent::findOrFail($id);
            $classes = SiakadClass::all();
            $majors  = SiakadMajor::all();

            return view('siakad.pages.student.edit', compact('student', 'classes', 'majors'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Form edit siswa
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'student_number' => 'required|string|max:50|unique:siakad_students,student_number,' . $id,
                'name'           => 'required|string|max:100',
                'email'          => 'required|email|unique:siakad_students,email,' . $id,
                'major_id'       => 'nullable|exists:siakad_majors,id',
                'class_id'       => 'nullable|exists:siakad_classes,id',
                'password'       => 'nullable|string|min:6',
            ]);

            $student = SiakadStudent::findOrFail($id);

            // Hanya update password kalau diisi
            if (!empty($validatedData['password'])) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $student->update($validatedData);

            return redirect()->route('siakad.students.index')
                ->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
