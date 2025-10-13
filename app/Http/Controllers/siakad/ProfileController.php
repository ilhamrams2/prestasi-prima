<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * =====================
     * HALAMAN PROFIL SISWA
     * =====================
     * Menampilkan halaman profil dengan data dummy.
     */
    public function index()
    {
        // Data dummy sementara
        $student = [
            'nama' => 'Ardy Albanna',
            'email' => 'ardy.albanna@gmail.com',
            'telepon' => '082291873242',
            'tanggal_lahir' => '2025-09-23',
            'jenis_kelamin' => 'Laki-Laki',
            'nis' => '2024001',
            'alamat' => 'Jl. Hankam Raya No. 89, Cilangkap, Cipayung, Jakarta Timur, DKI Jakarta',
            'nama_wali' => 'Abi Plengerr',
            'telepon_wali' => '081234567891',
            'status' => 'Siswa',
            'kelas' => 'XII RPL',
            'bergabung' => '2023-07-15',
            'peringkat' => 5,
            'rata_rata' => 88.7,
        ];

        return view('siakad.pages.profile.index', compact('student'));
    }
}
