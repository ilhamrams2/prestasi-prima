<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siakad\SiakadClass;
use App\Models\siakad\SiakadMajor;
use App\Models\siakad\SiakadTeacher;

class ClassesController extends Controller
{

    public function index()
    {
        $classes = SiakadClass::with('major', 'teacher')->get();
        $majors = SiakadMajor::all();
        $teachers = SiakadTeacher::all();
        return view('siakad.pages.class.index', compact('classes', 'majors', 'teachers'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'major_id' => 'required|exists:siakad_majors,id',
                'teacher_id' => 'nullable|exists:siakad_teachers,id',
                'grade' => 'nullable|string|max:10',
                'group_number' => 'nullable|numeric|min:1',
            ]);

            $major = SiakadMajor::findOrFail($request->major_id);

            // Buat nama kelas berdasarkan input yang tersedia
            $grade = $request->grade ?? '';
            $group = $request->group_number ?? '';
            $name = trim("{$grade} {$major->name} {$group}");

            // Buat kode kelas unik (huruf besar dan tanpa spasi)
            $classCode = strtoupper(str_replace(' ', '', $name)); // contoh: 10PPLG1

            SiakadClass::create([
                'major_id' => $request->major_id,
                'teacher_id' => $request->teacher_id, // bisa null
                'grade' => $grade,
                'group_number' => $group,
                'name' => $name,
                'class_code' => $classCode,
            ]);

            return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'major_id' => 'required|exists:siakad_majors,id',
                'teacher_id' => 'nullable|exists:siakad_teachers,id',
                'grade' => 'nullable|string|max:10',
                'group_number' => 'nullable|numeric|min:1',
            ]);

            $class = SiakadClass::findOrFail($id);
            $major = SiakadMajor::findOrFail($request->major_id);

            // Buat nama kelas berdasarkan input
            $grade = $request->grade ?? '';
            $group = $request->group_number ?? '';
            $name = trim("{$grade} {$major->name} {$group}");

            // Buat kode kelas unik
            $classCode = strtoupper(str_replace(' ', '', $name)); // contoh: 10PPLG1

            // Update data
            $class->update([
                'major_id' => $request->major_id,
                'teacher_id' => $request->teacher_id, // bisa null
                'grade' => $grade,
                'group_number' => $group,
                'name' => $name,
                'class_code' => $classCode,
            ]);

            return redirect()->back()->with('success', 'Kelas berhasil diperbarui!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {

            $class = SiakadClass::findOrFail($id);
            $class->delete();

            return redirect()->route('siakad.classes.index')->with('success', 'Kelas berhasil dihapus!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
