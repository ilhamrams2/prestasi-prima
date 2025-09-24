<?php

namespace App\Http\Controllers\siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadAttendance;
use App\Models\siakad\SiakadEnrollment;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = SiakadAttendance::with('enrollment')->paginate(10);
        return view('siakad.attendance.index', compact('attendances'));
    }

    public function create()
    {
        $enrollments = SiakadEnrollment::all();
        return view('siakad.attendance.create', compact('enrollments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:siakad_enrollments,id',
            'date' => 'required|date',
            'status' => 'required|in:H,S,I,A',
        ]);

        SiakadAttendance::create($request->all());

        return redirect()->route('attendance.index')->with('success', 'Data kehadiran berhasil ditambahkan.');
    }

    public function edit(SiakadAttendance $attendance)
    {
        $enrollments = SiakadEnrollment::all();
        return view('siakad.attendance.edit', compact('attendance', 'enrollments'));
    }

    public function update(Request $request, SiakadAttendance $attendance)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:siakad_enrollments,id',
            'date' => 'required|date',
            'status' => 'required|in:H,S,I,A',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.index')->with('success', 'Data kehadiran berhasil diperbarui.');
    }

    public function destroy(SiakadAttendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Data kehadiran berhasil dihapus.');
    }
}
