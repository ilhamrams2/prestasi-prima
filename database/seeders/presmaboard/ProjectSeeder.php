<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\presmaboard\PresmaboardStudent;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $categories = PresmaboardProjectCategory::pluck('id')->toArray();
        $studentIds = PresmaboardStudent::pluck('id')->toArray();

        // Ensure there are students to link projects to
        if (empty($studentIds)) {
            echo "No students found. Please seed students first.\n";
            return;
        }

        for ($i = 0; $i < 20; $i++) { // Create 20 projects
            DB::table((new PresmaboardProject())->getTable())->insert([
                'student_id' => $faker->randomElement($studentIds),
                'judul' => $faker->sentence(3),
                'deskripsi' => $faker->paragraph(3),
                'gambar' => null, // Placeholder
                'category_id' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
