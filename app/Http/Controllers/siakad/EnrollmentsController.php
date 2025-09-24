<?php

namespace App\Http\Controllers\siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadEnrollment;
use App\Models\siakad\SiakadStudent;
use App\Models\siakad\SiakadSubject;
use App\Models\siakad\SiakadTeacher;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = SiakadEnrollment::with(['student', 'subject', 'teacher'])
            ->latest()->paginate(10);

        return view('siakad.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = SiakadStudent::all();
        $subjects = SiakadSubject::all();
        $teachers = SiakadTeacher::all();

        return view('siakad.enrollments.create', compact('students', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:siakad_students,id',
            'subject_id' => 'required|exists:siakad_subjects,id',
            'teacher_id' => 'required|exists:siakad_teachers,id',
            'semester'   => 'required|string|max:20',
        ]);

        try {
            SiakadEnrollment::create($validatedData);
            return redirect()->route('siakad.enrollments.index')
                ->with('success', 'Data enroll berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $enrollment = SiakadEnrollment::findOrFail($id);
        $students = SiakadStudent::all();
        $subjects = SiakadSubject::all();
        $teachers = SiakadTeacher::all();

        return view('siakad.enrollments.edit', compact('enrollment', 'students', 'subjects', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $enrollment = SiakadEnrollment::findOrFail($id);

        $validatedData = $request->validate([
            'student_id' => 'required|exists:siakad_students,id',
            'subject_id' => 'required|exists:siakad_subjects,id',
            'teacher_id' => 'required|exists:siakad_teachers,id',
            'semester'   => 'required|string|max:20',
        ]);

        try {
            $enrollment->update($validatedData);
            return redirect()->route('siakad.enrollments.index')
                ->with('success', 'Data enroll berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $enrollment = SiakadEnrollment::findOrFail($id);
            $enrollment->delete();

            return redirect()->route('siakad.enrollments.index')
                ->with('success', 'Data enroll berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
