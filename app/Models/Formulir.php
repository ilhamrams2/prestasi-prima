<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulirs'; // tabel plural sesuai konvensi Laravel

    protected $fillable = [
        // Data Siswa
        'nama_siswa',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'kewarganegaraan',

        // Data Kontak
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'no_hp',
        'email',

        // Pilihan Jurusan
        'pilihan_jurusan_1',

        // Data Tambahan
        'hobi',
        'prestasi',
        'riwayat_kesehatan',
        'tinggi_badan',
        'berat_badan',
    ];
}
