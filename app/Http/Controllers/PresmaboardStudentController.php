<?php

namespace App\Http\Controllers;

use App\Models\presmaboard_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresmaboardStudentController extends Controller
{
    public function index(Request $request)
    {
        $query = presmaboard_student::query();

        // Filter (jurusan, kelas, pencarian)
        if ($request->filled('jurusan') && $request->jurusan !== 'all') {
            $query->where('jurusan', $request->jurusan);
        }
        if ($request->filled('kelas') && $request->kelas !== 'all') {
            $query->where('kelas', $request->kelas);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%');
            });
        }

        $siswas = $query->latest()->paginate(10);
        $total = presmaboard_student::count();
        $kelasCount = presmaboard_student::where('is_active', 1)->count();
        $male = presmaboard_student::where('is_active', 1)->count(); // misal pakai data gender nanti
        $female = $total - $male;

        return view('presmaboard.siswa.index', compact('siswas', 'total', 'kelasCount', 'male', 'female'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'email' => 'required|email|unique:presmaboard_students,email',
            'nis' => 'required|unique:presmaboard_students,nis',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('siswas', 'public');
        }

        presmaboard_student::create($validated);

        return response()->json(['success' => true, 'message' => 'Siswa berhasil ditambahkan!']);
    }

    public function show($id)
    {
        $siswa = presmaboard_student::with(['scores', 'projects', 'achievements', 'currentLeaderboard'])->findOrFail($id);
        return response()->json($siswa);
    }

    public function update(Request $request, $id)
    {
        $siswa = presmaboard_student::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'email' => 'required|email|unique:presmaboard_students,email,' . $siswa->id,
            'nis' => 'required|unique:presmaboard_students,nis,' . $siswa->id,
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('siswas', 'public');
        }

        $siswa->update($validated);

        return response()->json(['success' => true, 'message' => 'Data siswa berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $siswa = presmaboard_student::findOrFail($id);

        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return response()->json(['success' => true, 'message' => 'Data siswa berhasil dihapus!']);
    }
}
