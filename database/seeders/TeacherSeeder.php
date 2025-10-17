<?php

namespace Database\Seeders;

use App\Models\siakad\SiakadTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['teacher_id' => 'T001', 'name' => 'Ahmad Fauzi', 'subject' => 'Matematika', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T002', 'name' => 'Siti Nurhaliza', 'subject' => 'Bahasa Indonesia', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T003', 'name' => 'Rudi Hartono', 'subject' => 'PPLG', 'position' => 'Kepala Jurusan'],
            ['teacher_id' => 'T004', 'name' => 'Dewi Lestari', 'subject' => 'Bahasa Inggris', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T005', 'name' => 'Bambang Santoso', 'subject' => 'DKV', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T006', 'name' => 'Lina Marlina', 'subject' => 'Produktif TJKT', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T007', 'name' => 'Fajar Pratama', 'subject' => 'PAI', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T008', 'name' => 'Nur Aini', 'subject' => 'IPS', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T009', 'name' => 'Dedi Suhendar', 'subject' => 'PJOK', 'position' => 'Guru Mapel'],
            ['teacher_id' => 'T010', 'name' => 'Rina Kurniawati', 'subject' => 'PKN', 'position' => 'Guru Mapel'],
        ];

        foreach ($teachers as $data) {
            SiakadTeacher::create([
                'teacher_id' => $data['teacher_id'],
                'name' => $data['name'],
                'subject' => $data['subject'],
                'position' => $data['position'],
                'status' => 'Active',
                'email' => Str::slug($data['name'], '.') . '@smkprestasiprima.sch.id',
                'phone' => '08' . rand(1000000000, 9999999999),
            ]);
        }
    }
}
