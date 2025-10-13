<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Hash;
use App\Models\presmaboard_users;

class presmaboard_user extends Seeder
{
   public function run(): void
    {
        if (!presmaboard_users::where('email', 'admin@presmaboard.com')->exists()) {
            presmaboard_users::create([
                'name' => 'Admin Presmaboard',
                'email' => 'admin@presmaboard.com',
                'password' => Hash::make('Presmaboard123!'), // bisa diubah sesuai kebutuhan
                'role' => 'admin',
            ]);

            $this->command->info('✅ Admin Presmaboard berhasil dibuat!');
        } else {
            $this->command->warn('⚠️ Admin Presmaboard sudah ada, tidak dibuat ulang.');
        }
    }
}
