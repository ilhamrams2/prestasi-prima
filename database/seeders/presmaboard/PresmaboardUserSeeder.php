<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PresmaboardUserSeeder extends Seeder
{
    public function run()
    {
        // Create a default presmaboard admin
        DB::table('presmaboard_users')->updateOrInsert(
            ['email' => 'admin@presmaboard.test'],
            [
                'name' => 'Admin Presmaboard',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
