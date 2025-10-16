<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class presmaboarduser extends Seeder
{
    public function run(): void
    {
        // Hapus semua data sebelum isi ulang
        DB::table('presmaboard_user')->truncate();

        DB::table('presmaboard_user')->insert([
            [
                'name' => 'Admin Prestasi',
                'email' => 'admin@presmaboard.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
