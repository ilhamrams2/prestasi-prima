<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PresmaboardScoreSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $studentIds = DB::table('presmaboard_students')->pluck('id')->toArray();

        foreach ($studentIds as $sid) {
            // create UTS and UAS for semester 1 and 2 (randomly)
            $semesters = [1, 2];
            foreach ($semesters as $smt) {
                        foreach (['UTS', 'UAS'] as $tipe) {
                        // generate scores primarily in the 80-100 range per user request
                        $score = $faker->randomFloat(2, 80, 100); // 80.00 - 100.00
                    DB::table('presmaboard_scores')->updateOrInsert(
                        ['student_id' => $sid, 'semester' => $smt, 'tahun_ajaran' => '2025', 'tipe_ujian' => $tipe],
                        ['score' => $score, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
                    );
                }
            }
        }
    }
}
