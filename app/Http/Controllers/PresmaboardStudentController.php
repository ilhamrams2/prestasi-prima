<?php

namespace App\Http\Controllers;

use App\Models\presmaboard_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class PresmaboardStudentController extends Controller
{

   public function index()
    {
        $siswas = Presmaboard_Student::all();
        $stats = [
            'total' => $siswas->count(),
            'kelasCount' => $siswas->where('is_active', 1)->count(),
            'male' => 10,  // contoh data statis, sesuaikan bila ada kolom gender
            'female' => 12,
        ];

        return view('presmaboard.siswa.index', compact('siswas', 'stats'));
    }

    /**
     * Simpan data siswa baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:presmaboard_students,nis',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'angkatan' => 'required|numeric',
            'email' => 'required|email',
            'is_active' => 'required|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('uploads/siswa', 'public');
        }

        $student = Presmaboard_Student::create($validated);

        return response()->json(['success' => true, 'data' => $student]);
    }

    /**
     * Tampilkan detail siswa.
     */
    public function show($id)
    {
        $student = Presmaboard_Student::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update data siswa.
     */
    public function update(Request $request, $id)
    {
        $student = Presmaboard_Student::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:presmaboard_students,nis,' . $student->id,
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'angkatan' => 'required|numeric',
            'email' => 'required|email',
            'is_active' => 'required|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($student->foto) {
                Storage::disk('public')->delete($student->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/siswa', 'public');
        }

        $student->update($validated);

        return response()->json(['success' => true, 'data' => $student]);
    }

    /**
     * Hapus data siswa.
     */
    public function destroy($id)
    {
        $student = Presmaboard_Student::findOrFail($id);

        if ($student->foto) {
            Storage::disk('public')->delete($student->foto);
        }

        $student->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Statistik tambahan (opsional untuk grafik atau ringkasan).
     */
    public function getStatistics()
    {
        $total = Presmaboard_Student::count();
        $aktif = Presmaboard_Student::where('is_active', 1)->count();
        $nonaktif = $total - $aktif;

        return response()->json([
            'total' => $total,
            'aktif' => $aktif,
            'nonaktif' => $nonaktif,
        ]);
    }
}
