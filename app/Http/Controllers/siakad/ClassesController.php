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

        // return view('siakad..page.classes', compact('classes'));
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
        // Validasi input
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'major' => 'required|string|max:100',
        ]);

        try {
            // Menemukan kelas berdasarkan ID dan mengupdate datanya
            $class = SiakadClass::findOrFail($id);
            $class->update($validatedData);

            // Redirect setelah berhasil memperbarui
            return redirect()->route('siakad.classes.index')->with('success', 'Kelas berhasil diperbarui!');
        } catch (\Exception $e) {
            // Menangani error jika ada yang gagal
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



     public function destroy($id)
    {
        try {
            // Menemukan kelas berdasarkan ID dan menghapusnya
            $class = SiakadClass::findOrFail($id);
            $class->delete();

            // Redirect setelah berhasil menghapus
            return redirect()->route('siakad.classes.index')->with('success', 'Kelas berhasil dihapus!');
        } catch (\Exception $e) {
            // Menangani error jika ada yang gagal
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}