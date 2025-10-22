<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardAchievement;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $studentIds = PresmaboardStudent::pluck('id')->toArray();

        if (!empty($studentIds)) {
            $achievements = [];
            for ($i = 0; $i < 100; $i++) { // Generate 10 dummy achievements
                $achievements[] = [
                    'student_id' => $faker->randomElement($studentIds),
                    'judul' => $faker->sentence(3, true), // 3-word title
                    'deskripsi' => $faker->paragraph(2, true), // 2-sentence description
                    'tanggal' => $faker->dateTimeBetween('2024-01-01', '2025-12-31')->format('Y-m-d'),
                ];
            }

            DB::table((new PresmaboardAchievement())->getTable())->insert($achievements);
        }
    }
}
