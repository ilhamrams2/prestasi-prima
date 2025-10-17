<?php

namespace Database\Seeders;

use App\Models\siakad\SiakadStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class SiakadStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 20) as $index) {
            DB::table('siakad_students')->insert([
                'major_id' => $faker->numberBetween(1, 3),
                'class_id' => $faker->numberBetween(1, 3),
                'student_number' => 'STU' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'name' => $faker->name(),
                'email' => 'student' . $index . '@smkprestasiprima.sch.id',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
