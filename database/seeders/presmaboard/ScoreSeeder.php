<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $studentIds = PresmaboardStudent::pluck('id')->toArray();

        if (!empty($studentIds)) {
            $scores = [];
            $uniqueCombinations = [];

            for ($i = 0; $i < 20; $i++) { // Generate 20 dummy scores
                $studentId = $faker->randomElement($studentIds);
                $semester = $faker->numberBetween(1, 2);
                $tahunAjaran = (string)$faker->biasedNumberBetween(2020, 2024) . '/' . (string)$faker->biasedNumberBetween(2021, 2025);
                $tipeUjian = $faker->randomElement(['UTS', 'UAS']);

                // Ensure unique combination of student_id, semester, tahun_ajaran, tipe_ujian
                $combination = "{$studentId}-{$semester}-{$tahunAjaran}-{$tipeUjian}";
                if (in_array($combination, $uniqueCombinations)) {
                    $i--; // Decrement counter to retry generating a unique record
                    continue;
                }
                $uniqueCombinations[] = $combination;

                $scores[] = [
                    'student_id' => $studentId,
                    'score' => $faker->randomFloat(2, 50, 100), // Score between 50 and 100 for more realistic data
                    'semester' => $semester,
                    'tahun_ajaran' => $tahunAjaran,
                    'tipe_ujian' => $tipeUjian,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table((new PresmaboardScore())->getTable())->insert($scores);
        }
    }
}