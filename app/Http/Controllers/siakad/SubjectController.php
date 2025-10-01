<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use App\Models\Siakad\SiakadSubject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Tampilkan daftar mata pelajaran
     */
    public function index()
    {
        $subjects = SiakadSubject::latest()->paginate(10);
        return view('siakad.pages.subject.index', compact('subjects'));
    }

    /**
     * Simpan data mata pelajaran baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:siakad_subjects',
            'subject_name' => 'required|string|max:100',
            'subject_group' => 'nullable|string|max:50',
        ]);

        SiakadSubject::create($request->all());

        return redirect()->route('subjects.index')
                         ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }
}
