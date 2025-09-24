<?php

namespace App\Http\Controllers\siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadClass;
use App\Models\siakad\SiakadMajor;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = SiakadMajor::all();
        return view('siakad.pages.major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'major_code' => 'required|string|max:50|unique:siakad_majors,major_code',
            'name'       => 'required|string|max:100',
        ]);

        try {
            SiakadMajor::create($validatedData);

            return redirect()->route('siakad.majors.index')
                ->with('success', 'Jurusan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $major = SiakadMajor::findOrFail($id);

        $validatedData = $request->validate([
            'major_code' => 'required|string|max:50|unique:siakad_majors,major_code,' . $major->id,
            'name'       => 'required|string|max:100',
        ]);

        try {
            $major->update($validatedData);

            return redirect()->route('siakad.majors.index')
                ->with('success', 'Jurusan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $major = SiakadMajor::findOrFail($id);
            $major->delete();

            return redirect()->route('siakad.majors.index')
                ->with('success', 'Jurusan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}