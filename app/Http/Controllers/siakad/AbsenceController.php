<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Tampilkan halaman daftar absensi
     */
    public function index()
    {
        return view('siakad.pages.absence.index'); 
    }

    /**
     * Simpan data absensi baru
     */
    public function store(Request $request)
    {
        // Contoh validasi
        $request->validate([
            'student_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late,excused'
        ]);

        // Simpan data ke database nanti di sini
        // Absence::create($request->all());

        return redirect()->route('absence.index')->with('success', 'Absensi berhasil ditambahkan');
    }

    /**
     * Update data absensi
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'status' => 'required|in:present,absent,late,excused'
        ]);

        // Update database
        // $absence = Absence::findOrFail($id);
        // $absence->update($request->all());

        return redirect()->route('absence.index')->with('success', 'Absensi berhasil diperbarui');
    }

    /**
     * Hapus data absensi
     */
    public function destroy($id)
    {
        // $absence = Absence::findOrFail($id);
        // $absence->delete();

        return redirect()->route('absence.index')->with('success', 'Absensi berhasil dihapus');
    }
}
