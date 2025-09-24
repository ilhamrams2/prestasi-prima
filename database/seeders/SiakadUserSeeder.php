<?php

namespace Database\Seeders;

use App\Models\siakad\SiakadUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiakadUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
       SiakadUser::create([
            'name'       => 'Ilham Ramadan',
            'teacher_id' => 'ADM001',
            'subject'    => 'Instructor Lab PPLG',
            'position'   => 'Instructor Lab PPLG',
            'phone'      => '081111111111',
            'email'      => 'ilhamramadan@smkprestasiprima.sch.id',
            'password'   => Hash::make('password'), // ganti sesuai kebutuhan
            'role'       => 'admin',
        ]);

        // Admin
        SiakadUser::create([
            'name'       => 'Ilham Ramadan',
            'teacher_id' => 'TCH001',
            'subject'    => 'KDKA',
            'position'   => 'Guru',
            'phone'      => '081222222222',
            'email'      => 'agusnugraha@smkprestasiprima.sch.id',
            'password'   => Hash::make('password'), // ganti sesuai kebutuhan
            'role'       => 'teacher',
        ]);

    }
}
