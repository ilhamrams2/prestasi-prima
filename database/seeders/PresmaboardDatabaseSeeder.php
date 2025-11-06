<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresmaboardDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Order: categories, users, students, projects, scores, achievements, leaderboards
    $this->call([\Database\Seeders\presmaboard\PresmaboardProjectCategorySeeder::class]);
    $this->call([\Database\Seeders\presmaboard\PresmaboardUserSeeder::class]);
    $this->call([\Database\Seeders\presmaboard\PresmaboardStudentSeeder::class]);
    $this->call([\Database\Seeders\presmaboard\PresmaboardProjectSeeder::class]);

    // Download placeholder images into public/uploads so frontend can load local files
    $this->call([\Database\Seeders\presmaboard\PresmaboardImageDownloaderSeeder::class]);

    $this->call([\Database\Seeders\presmaboard\PresmaboardScoreSeeder::class]);
    $this->call([\Database\Seeders\presmaboard\PresmaboardAchievementSeeder::class]);
    $this->call([\Database\Seeders\presmaboard\PresmaboardLeaderboardSeeder::class]);
    }
}
