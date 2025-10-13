<?php

namespace Database\Seeders;

use App\Models\siakad\SiakadUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiakadUserSeeder extends Seeder
{
    public function run(): void
    {
        // === ADMIN ===
        SiakadUser::updateOrCreate(
            ['email' => 'ilhamramadan@smkprestasiprima.sch.id'], // cek berdasarkan email
            [
                'teacher_id' => 'ADM02',
                'name'       => 'Ilham Ramadan',
                'subject'    => 'Instructor Lab PPLG',
                'position'   => 'Instructor Lab PPLG',
                'phone'      => '081111111111',
                'password'   => Hash::make('password'),
                'role'       => 'admin',
            ]
        );

        // === TEACHER ===
        SiakadUser::updateOrCreate(
            ['email' => 'agusnugraha@smkprestasiprima.sch.id'], // cek berdasarkan email
            [
                'teacher_id' => 'TCH001',
                'name'       => 'Ilham Ramadan',
                'subject'    => 'KDKA',
                'position'   => 'Guru',
                'phone'      => '081222222222',
                'password'   => Hash::make('password'),
                'role'       => 'teacher',
            ]
        );
    }
}