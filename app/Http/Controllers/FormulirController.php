<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;

class FormulirController extends Controller
{
    /**
     * Tampilkan form pendaftaran
     */
    public function create()
    {
        return view('prestasiprima.pendaftaran.formulir');
    }

    /**
     * Simpan data form ke database dan redirect ke halaman validasi
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            // Data Siswa
            'nama_siswa' => 'required|string|max:150',
            'nisn' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string|in:Laki-laki,Perempuan',
            'agama' => 'nullable|string|max:30',
            'kewarganegaraan' => 'nullable|string|max:50',

            // Data Kontak
            'alamat' => 'nullable|string',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kota' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',

            // Pilihan Jurusan
            'pilihan_jurusan_1' => 'required|in:PPLG,TKJ,BCF,DKV',

            // Data Tambahan
            'hobi' => 'nullable|string|max:200',
            'prestasi' => 'nullable|string|max:200',
            'riwayat_kesehatan' => 'nullable|string|max:200',
            'tinggi_badan' => 'nullable|integer',
            'berat_badan' => 'nullable|integer',
        ]);

        // Simpan ke database
        Formulir::create($validated);

        // Redirect ke halaman validasi
        return redirect()->route('pendaftaran.validasi');
    }

    /**
     * Tampilkan halaman validasi (semua data formulir)
     */
    public function validasi()
    {
        // Ambil semua data dari tabel formulir
        $formulirs = Formulir::orderBy('created_at', 'desc')->get();

        // Tampilkan view validasi
        return view('prestasiprima.pendaftaran.validasi', compact('formulirs'));
    }
}