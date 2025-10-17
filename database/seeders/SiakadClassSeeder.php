<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiakadClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumsi sudah ada data jurusan (siakad_majors)
        $majors = DB::table('siakad_majors')->pluck('id', 'name');

        $data = [
            [
                'major_id' => $majors['PPLG'] ?? 1,
                'teacher_id' => null,
                'grade' => '10',
                'group_number' => '1',
                'name' => '10 PPLG 1',
                'class_code' => 'PPLG10A',
            ],
            [
                'major_id' => $majors['TKJ'] ?? 2,
                'teacher_id' => null,
                'grade' => '11',
                'group_number' => '1',
                'name' => '11 TKJ 1',
                'class_code' => 'TKJ11A',
            ],
            [
                'major_id' => $majors['DKV'] ?? 3,
                'teacher_id' => null,
                'grade' => '12',
                'group_number' => '1',
                'name' => '12 DKV 1',
                'class_code' => 'DKV12A',
            ],
        ];

        foreach ($data as $d) {
            DB::table('siakad_classes')->insert([
                'major_id' => $d['major_id'],
                'teacher_id' => $d['teacher_id'],
                'grade' => $d['grade'],
                'group_number' => $d['group_number'],
                'name' => $d['name'],
                'class_code' => $d['class_code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
