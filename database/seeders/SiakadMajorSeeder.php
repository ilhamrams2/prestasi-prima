<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiakadMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siakad_majors')->insert([
            [
                'major_code' => 'PPLG',
                'name' => 'Pengembangan Perangkat Lunak dan Gim',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_code' => 'TJKT',
                'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_code' => 'DKV',
                'name' => 'Desain Komunikasi Visual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'major_code' => 'BCF',
                'name' => 'Broadcasting & Film',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
