<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiakadMajorSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel siakad_majors
     */
    public function run(): void
    {
        $majors = [
            [
                'major_code' => 'PPLG',
                'name' => 'Pengembangan Perangkat Lunak dan Gim',
            ],
            [
                'major_code' => 'TJKT',
                'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            ],
            [
                'major_code' => 'DKV',
                'name' => 'Desain Komunikasi Visual',
            ],
            [
                'major_code' => 'BCF',
                'name' => 'Broadcasting & Film',
            ],
        ];

        foreach ($majors as $major) {
            DB::table('siakad_majors')->updateOrInsert(
                ['major_code' => $major['major_code']], // cek unik berdasarkan kode jurusan
                [
                    'name' => $major['name'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}