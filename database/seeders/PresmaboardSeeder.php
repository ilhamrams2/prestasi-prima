<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresmaboardSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            \Database\Seeders\presmaboard\StudentSeeder::class,
            \Database\Seeders\presmaboard\ScoreSeeder::class,
            \Database\Seeders\presmaboard\AchievementSeeder::class,
            \Database\Seeders\presmaboard\ProjectCategorySeeder::class,
            \Database\Seeders\presmaboard\ProjectSeeder::class,
            \Database\Seeders\presmaboard\UserSeeder::class,
        ]);
    }
}
