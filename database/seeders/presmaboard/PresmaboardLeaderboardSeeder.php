<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PresmaboardLeaderboardSeeder extends Seeder
{
    public function run()
    {
        // Simple leaderboard calculation: average of all scores per student + small bonus per achievement/project
        $students = DB::table('presmaboard_students')->select('id')->get();

        $rows = [];
        foreach ($students as $s) {
            $scores = DB::table('presmaboard_scores')->where('student_id', $s->id)->pluck('score')->toArray();
            $avg = count($scores) ? array_sum($scores) / count($scores) : 0;

            $projectsCount = DB::table('presmaboard_projects')->where('student_id', $s->id)->count();
            $achCount = DB::table('presmaboard_achievements')->where('student_id', $s->id)->count();

            // bonus: +0.5 point per project, +1 point per achievement
            $bonus = ($projectsCount * 0.5) + ($achCount * 1.0);
            $total = round($avg + $bonus, 2);

            $rows[] = [
                'student_id' => $s->id,
                'total_score' => $total,
                'rank' => null,
                'periode' => '2025',
                'last_calculated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert rows
        foreach ($rows as $r) {
            DB::table('presmaboard_leaderboards')->insert($r);
        }

        // Compute and update ranks
        $board = DB::table('presmaboard_leaderboards')->orderByDesc('total_score')->get();
        $rank = 1;
        foreach ($board as $row) {
            DB::table('presmaboard_leaderboards')->where('id', $row->id)->update(['rank' => $rank]);
            $rank++;
        }
    }
}
