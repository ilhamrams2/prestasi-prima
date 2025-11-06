<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PresmaboardAchievementSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $studentIds = DB::table('presmaboard_students')->pluck('id')->toArray();

        // Create exactly 5 achievements for each student (titles can be changed later)
        $defaultTitles = [
            'Juara 1 Lomba Sekolah',
            'Peserta Pameran Projek',
            'Sertifikat Pelatihan',
            'Penghargaan Inovasi',
            'Aksi Sosial Terbaik',
        ];

        foreach ($studentIds as $sid) {
            foreach ($defaultTitles as $t) {
                DB::table('presmaboard_achievements')->insert([
                    'student_id' => $sid,
                    'judul' => $t,
                    'deskripsi' => $faker->sentence(6),
                    'tanggal' => $faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
