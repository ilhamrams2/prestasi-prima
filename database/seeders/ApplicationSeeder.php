<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find or create a test user
        $user = User::first() ?? User::create([
            'name' => 'Seed User',
            'email' => 'seed-user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        // Create 12 applications, 5 accepted
        for ($i = 1; $i <= 12; $i++) {
            Application::create([
                'job_id' => 1,
                'user_id' => $user->id,
                'first_name' => 'Applicant',
                'last_name' => 'No' . $i,
                'address' => 'Jakarta',
                'phone' => '+628100000' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'email' => 'applicant' . $i . '@example.com',
                'status' => ($i <= 5) ? 'accepted' : 'pending',
                'submitted_at' => now()->subDays(12 - $i),
            ]);
        }
    }
}
