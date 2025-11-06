<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PresmaboardProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $studentIds = DB::table('presmaboard_students')->pluck('id')->toArray();
        $categoryIds = DB::table('presmaboard_project_categories')->pluck('id')->toArray();

        foreach ($studentIds as $sid) {
            // exactly 5 projects per student as requested
            for ($j = 1; $j <= 5; $j++) {
                $cat = $categoryIds[array_rand($categoryIds)];
                // insert first without gambar to get the inserted id
                $pid = DB::table('presmaboard_projects')->insertGetId([
                    'student_id' => $sid,
                    'judul' => 'Project ' . strtoupper($faker->word) . ' ' . $faker->unique()->numberBetween(1, 999),
                    'deskripsi' => $faker->sentence(8),
                    'gambar' => null,
                    'category_id' => $cat,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // update the record with a predictable local uploads path using the newly created id
                DB::table('presmaboard_projects')->where('id', $pid)->update([
                    'gambar' => 'uploads/presmaboard/projects/proj_' . $sid . '_' . $pid . '.jpg',
                ]);
            }
        }
    }
}
