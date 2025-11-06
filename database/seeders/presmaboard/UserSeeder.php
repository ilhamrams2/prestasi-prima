<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table((new PresmaboardUser)->getTable())->insert([
            [
                'name' => 'Admin Prestasi',
                'email' => 'admin@presmaboard.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}