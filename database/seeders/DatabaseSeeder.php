<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\presmaboard\AchievementSeeder as PresmaboardAchievementSeeder;
use Database\Seeders\presmaboard\ProjectCategorySeeder as PresmaboardProjectCategorySeeder;
use Database\Seeders\presmaboard\ProjectSeeder as PresmaboardProjectSeeder;
use Database\Seeders\presmaboard\ScoreSeeder as PresmaboardScoreSeeder;
use Database\Seeders\presmaboard\UserSeeder as PresmaboardUserSeeder;
use Database\Seeders\presmaboard\StudentSeeder as PresmaboardStudentSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiakadUserSeeder::class,
            TeacherSeeder::class,
            SiakadMajorSeeder::class,
            SiakadClassSeeder::class,
            SiakadStudentSeeder::class,

            // Presmaboard
            PresmaboardUserSeeder::class,
            PresmaboardStudentSeeder::class,
            PresmaboardProjectCategorySeeder::class,
            PresmaboardProjectSeeder::class,
            PresmaboardAchievementSeeder::class,
            PresmaboardScoreSeeder::class,

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
