<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PrestasiprimaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user lama jika ada (untuk re-seeding)
        DB::table('users')->whereIn('email', [
            'admin@smkprestasiprima.sch.id',
            'guru@smkprestasiprima.sch.id'
        ])->delete();

        DB::table('users')->insert([
            [
                'name' => 'Admin Prestasi Prima',
                'email' => 'admin@smkprestasiprima.sch.id',
                'password' => Hash::make('password'), // ganti sesuai kebutuhan
                'role' => 'super_admin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guru Prestasi Prima',
                'email' => 'guru@smkprestasiprima.sch.id',
                'password' => Hash::make('password'),
                'role' => 'editor',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
