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
            'username' => 'Ilham Ramadan',
            'email' => 'ilhamramadan@smkprestasiprima.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Guru
        SiakadUser::create([
            'username' => 'Agus Nugraha',
            'email' => 'agusnugraha@smkprestasiprima.sch.id',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);
    }
}
