<?php

namespace Database\Seeders;

use App\Models\presmaboard_users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\PresmaboardUser;

class PresmaboardUserSeeder extends Seeder
{


     public function run(): void
    {
  if (!presmaboard_users::where('email', 'admin@presmaboard.com')->exists()) {
            presmaboard_users::create([
                'name' => 'Admin Presmaboard',
                'email' => 'admin@presmaboard.com',
                'password' => Hash::make('Presmaboard123!'), // kamu bisa ubah nanti
                'role' => 'admin',
            ]);

            $this->command->info('✅ Admin Presmaboard berhasil dibuat!');
        } else {
            $this->command->warn('⚠️ Admin Presmaboard sudah ada, tidak dibuat ulang.');
        }
    }

}