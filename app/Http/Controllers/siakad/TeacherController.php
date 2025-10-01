<?php
namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use App\Models\Siakad\SiakadTeacher;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TeacherController extends Controller
{
    /**
     * Show teacher list.
     */
    public function index()
    {
        // Pagination biar rapi (10 per halaman)
        $teachers = SiakadTeacher::orderBy('name')->paginate(10);

        // Statistics
        $totalTeachers    = SiakadTeacher::count();
        $activeTeachers   = SiakadTeacher::where('status', 'Active')->count();
        $headOfDepartment = SiakadTeacher::where('position', 'Head of Department')->count();
        $homeroomTeachers = SiakadTeacher::where('position', 'Homeroom Teacher')->count();

        return view('siakad.pages.teacher.index', compact(
            'teachers',
            'totalTeachers',
            'activeTeachers',
            'headOfDepartment',
            'homeroomTeachers'
        ));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('siakad.pages.teacher.create');
    }

    /**
     * Store teacher.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required|string|max:50|unique:siakad_teachers,teacher_id',
            'name'       => 'required|string|max:100',
            'subject'    => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'status'     => 'required|in:Active,Inactive',
            'email'      => 'nullable|email|max:100',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            SiakadTeacher::create($validatedData);
            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Teacher added successfully!');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database error: '.$e->getMessage());
        }
    }

    /**
     * Show edit form.
     */
    public function edit(int $id)
    {
        $teacher = SiakadTeacher::findOrFail($id);
        return view('siakad.pages.teacher.edit', compact('teacher'));
    }

    /**
     * Update teacher.
     */
    public function update(Request $request, int $id)
    {
        $teacher = SiakadTeacher::findOrFail($id);

        $validatedData = $request->validate([
            'teacher_id' => 'required|string|max:50|unique:siakad_teachers,teacher_id,'.$teacher->id,
            'name'       => 'required|string|max:100',
            'subject'    => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'status'     => 'required|in:Active,Inactive',
            'email'      => 'nullable|email|max:100',
            'phone'      => 'nullable|string|max:20',
        ]);

        try {
            $teacher->update($validatedData);
            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Teacher updated successfully!');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database error: '.$e->getMessage());
        }
    }

    /**
     * Delete teacher.
     */
    public function destroy(int $id)
    {
        try {
            $teacher = SiakadTeacher::findOrFail($id);
            $teacher->delete();
            return redirect()->route('siakad.teacher.index')
                ->with('success', 'Teacher deleted successfully!');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error: '.$e->getMessage());
        }
    }

public function show($id)
{
    $teacher = SiakadTeacher::find($id);
    if (!$teacher) {
        return response()->json(['error' => 'Teacher not found'], 404);
    }

    // Jika mata pelajaran disimpan dalam relasi atau json
    $teacher->subjects = $teacher->subjects ? explode(',', $teacher->subjects) : [];

    return response()->json($teacher);
}






}
