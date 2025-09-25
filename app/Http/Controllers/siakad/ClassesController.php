<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siakad\SiakadClass;
class ClassesController extends Controller
{

 public function index()
    {
        $classes = SiakadClass::all();
        return view('siakad.pages.class.index', compact('classes'));
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'major' => 'required|string|max:100',
        ]);

        try {
            SiakadClass::create($validatedData);

            return redirect()->route('siakad.classes.index')->with('success', 'Kelas berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }







 public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'major' => 'required|string|max:100',
        ]);

        try {
            $class = SiakadClass::findOrFail($id);
            $class->update($validatedData);


            return redirect()->route('siakad.classes.index')->with('success', 'Kelas berhasil diperbarui!');
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
