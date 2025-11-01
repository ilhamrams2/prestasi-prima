<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiprimaKegiatanSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel prestasiprima_kegiatan.
     */
    public function run(): void
    {
        DB::table('prestasiprima_kegiatan')->insert([
    [
        'judul' => 'EXPONER 2025',
        'tanggal' => '2025-10-19', // ✅ format benar
        'jam' => '07:00:00',
        'deskripsi' => '"Exponer Prestasi Prima" adalah acara tahunan yang diadakan oleh Sekolah Prestasi Prima.',
        'tempat' => 'Sekolah Prestasi Prima',
    ],
    [
        'judul' => 'Lomba Inovasi Siswa',
        'tanggal' => '2025-10-20',
        'jam' => '08:00:00',
        'deskripsi' => 'Kompetisi antar jurusan untuk mengembangkan ide kreatif berbasis teknologi.',
        'tempat' => 'Aula Utama Sekolah',
    ],
]);

    }
}
