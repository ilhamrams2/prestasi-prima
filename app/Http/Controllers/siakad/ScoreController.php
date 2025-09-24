<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use App\Models\siakad\SiakadScore;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

    public function index()
    {
        $scores = SiakadScore::with('enrollment')->get(); // Mengambil data skor beserta enrollmentnya

        return view('siakad.scores.index', compact('scores'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:siakad_enrollments,id', // Validasi enrollment harus ada
            'assignment' => 'required|numeric|min:0|max:100',
            'mid_exam' => 'required|numeric|min:0|max:100',
            'final_exam' => 'required|numeric|min:0|max:100',
            'final_score' => 'required|numeric|min:0|max:100',
            'grade' => 'required|string|in:A,B,C,D,E,F',
        ]);

        try {

            SiakadScore::create($validatedData);


            return redirect()->route('siakad.scores.index')->with('success', 'Skor berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }





    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:siakad_enrollments,id', // Validasi enrollment harus ada
            'assignment' => 'required|numeric|min:0|max:100',
            'mid_exam' => 'required|numeric|min:0|max:100',
            'final_exam' => 'required|numeric|min:0|max:100',
            'final_score' => 'required|numeric|min:0|max:100',
            'grade' => 'required|string|in:A,B,C,D,E,F',
        ]);

        try {
            $score = SiakadScore::findOrFail($id);
            $score->update($validatedData);

            return redirect()->route('siakad.scores.index')->with('success', 'Data skor berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            $score = SiakadScore::findOrFail($id);
            $score->delete();


            return redirect()->route('siakad.scores.index')->with('success', 'Skor berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
