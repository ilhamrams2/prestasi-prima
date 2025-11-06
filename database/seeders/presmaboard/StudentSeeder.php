<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardStudent;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kelas = ['X', 'XI', 'XII'];
        $jurusan = ['pplg', 'dkv', 'tkj', 'bcf'];
        $angkatan = ['2023', '2024', '2025'];

        // Get available project categories (ProjectCategorySeeder should run before this)
        $categoryIds = PresmaboardProjectCategory::pluck('id')->toArray();
        if (empty($categoryIds)) {
            $categoryIds = [1];
        }

        // Create 30 students
        for ($i = 0; $i < 30; $i++) {
            $nama = $faker->name;
            $gender = $faker->randomElement(['l', 'p']);
            $fotoName = 'presmaboard/students/' . $faker->unique()->lexify('photo_????') . '.jpg';

            $student = PresmaboardStudent::create([
                'nama' => $nama,
                'gender' => $gender,
                'foto' => $fotoName,
                'kelas' => $faker->randomElement($kelas),
                'jurusan' => $faker->randomElement($jurusan),
                'angkatan' => $faker->randomElement($angkatan),
                'email' => $faker->unique()->safeEmail,
                'nis' => $faker->unique()->numerify('########'),
                'is_active' => true,
            ]);

            // Create 1-3 projects per student
            $projCount = rand(1, 3);
            for ($p = 0; $p < $projCount; $p++) {
                PresmaboardProject::create([
                    'student_id' => $student->id,
                    'judul' => $faker->sentence(3),
                    'deskripsi' => $faker->paragraph,
                    'gambar' => 'presmaboard/projects/' . $faker->lexify('proj_????') . '.jpg',
                    'category_id' => $faker->randomElement($categoryIds),
                ]);
            }

            // Create UTS and sometimes UAS scores
            $semester = $faker->randomElement(['1', '2']);
            $tahunAjaran = $faker->randomElement(['2023/2024', '2024/2025']);

            PresmaboardScore::create([
                'student_id' => $student->id,
                'score' => $faker->randomFloat(2, 60, 100),
                'semester' => $semester,
                'tahun_ajaran' => $tahunAjaran,
                'tipe_ujian' => 'UTS',
            ]);

            if ($faker->boolean(70)) {
                PresmaboardScore::create([
                    'student_id' => $student->id,
                    'score' => $faker->randomFloat(2, 60, 100),
                    'semester' => $semester,
                    'tahun_ajaran' => $tahunAjaran,
                    'tipe_ujian' => 'UAS',
                ]);
            }
        }
    }
}
<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardStudent;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kelas = ['X', 'XI', 'XII'];
        $jurusan = ['pplg', 'dkv', 'tkj', 'bcf'];
        $angkatan = ['2023', '2024', '2025'];

        // Get available project categories (ProjectCategorySeeder should run before this)
        $categoryIds = PresmaboardProjectCategory::pluck('id')->toArray();
        if (empty($categoryIds)) {
            $categoryIds = [1];
        }

        // Create 30 students
        for ($i = 0; $i < 30; $i++) {
            $nama = $faker->name;
            $gender = $faker->randomElement(['l', 'p']);
            $fotoName = 'presmaboard/students/' . $faker->unique()->lexify('photo_????') . '.jpg';

            $student = PresmaboardStudent::create([
                'nama' => $nama,
                'gender' => $gender,
                'foto' => $fotoName,
                'kelas' => $faker->randomElement($kelas),
                'jurusan' => $faker->randomElement($jurusan),
                'angkatan' => $faker->randomElement($angkatan),
                'email' => $faker->unique()->safeEmail,
                'nis' => $faker->unique()->numerify('########'),
                'is_active' => true,
            ]);

            // Create 1-3 projects per student
            $projCount = rand(1, 3);
            for ($p = 0; $p < $projCount; $p++) {
                PresmaboardProject::create([
                    'student_id' => $student->id,
                    'judul' => $faker->sentence(3),
                    'deskripsi' => $faker->paragraph,
                    'gambar' => 'presmaboard/projects/' . $faker->lexify('proj_????') . '.jpg',
                    'category_id' => $faker->randomElement($categoryIds),
                ]);
            }

            // Create UTS and sometimes UAS scores
            $semester = $faker->randomElement(['1', '2']);
            $tahunAjaran = $faker->randomElement(['2023/2024', '2024/2025']);

            PresmaboardScore::create([
                'student_id' => $student->id,
                'score' => $faker->randomFloat(2, 60, 100),
                'semester' => $semester,
                'tahun_ajaran' => $tahunAjaran,
                'tipe_ujian' => 'UTS',
            ]);

            if ($faker->boolean(70)) {
                PresmaboardScore::create([
                    'student_id' => $student->id,
                    'score' => $faker->randomFloat(2, 60, 100),
                    'semester' => $semester,
                    'tahun_ajaran' => $tahunAjaran,
                    'tipe_ujian' => 'UAS',
                ]);
            }
        }
    }
}
<?php

namespace Database\Seeders\presmaboard;
use App\Models\presmaboard\PresmaboardStudent;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardScore;
<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardStudent;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardStudent;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardScore;
use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kelas = ['X', 'XI', 'XII'];
        $jurusan = ['pplg', 'dkv', 'tkj', 'bcf'];
        $angkatan = ['2023', '2024', '2025'];

        // Ensure there are project categories available
        $categoryIds = PresmaboardProjectCategory::pluck('id')->toArray();
        if (empty($categoryIds)) {
            // fallback to 1 (assumes categories seeded), but seeder for categories should run first
            $categoryIds = [1];
        }

        // Create 30 students, each with 1-3 projects and 1-2 scores. Photos use placeholder paths.
        <?php

        namespace Database\Seeders\presmaboard;

        use App\Models\presmaboard\PresmaboardStudent;
        use App\Models\presmaboard\PresmaboardProject;
        use App\Models\presmaboard\PresmaboardScore;
        use App\Models\presmaboard\PresmaboardProjectCategory;
        use Illuminate\Database\Console\Seeds\WithoutModelEvents;
        use Illuminate\Database\Seeder;
        use Illuminate\Support\Facades\DB;
        use Faker\Factory as Faker;

        class StudentSeeder extends Seeder
        {
            public function run(): void
            {
                $faker = Faker::create('id_ID');
                $kelas = ['X', 'XI', 'XII'];
                $jurusan = ['pplg', 'dkv', 'tkj', 'bcf'];
                $angkatan = ['2023', '2024', '2025'];

                // Ensure there are project categories available
                $categoryIds = PresmaboardProjectCategory::pluck('id')->toArray();
                if (empty($categoryIds)) {
                    // fallback to 1 (assumes categories seeded), but seeder for categories should run first
                    $categoryIds = [1];
                }

                // Create 30 students, each with 1-3 projects and 1-2 scores. Photos use placeholder paths.
                for ($i = 0; $i < 30; $i++) {
                    $nama = $faker->name;
                    $gender = $faker->randomElement(['l', 'p']);
                    $fotoName = 'students/' . $faker->unique()->lexify('photo_????') . '.jpg';

                    $student = PresmaboardStudent::create([
                        'nama' => $nama,
                        'gender' => $gender,
                        'foto' => $fotoName,
                        'kelas' => $faker->randomElement($kelas),
                        'jurusan' => $faker->randomElement($jurusan),
                        'angkatan' => $faker->randomElement($angkatan),
                        'email' => $faker->unique()->safeEmail,
                        'nis' => $faker->unique()->numerify('########'),
                        'is_active' => true,
                    ]);

                    // Projects (1-3 per student)
                    $projCount = rand(1, 3);
                    for ($p = 0; $p < $projCount; $p++) {
                        PresmaboardProject::create([
                            'student_id' => $student->id,
                            'judul' => $faker->sentence(3),
                            'deskripsi' => $faker->paragraph,
                            'gambar' => 'presmaboard/projects/' . $faker->lexify('proj_????') . '.jpg',
                            'category_id' => $faker->randomElement($categoryIds),
                        ]);
                    }

                    // Scores: create UTS and/or UAS for a random semester and tahun_ajaran
                    $semester = $faker->randomElement(['1', '2']);
                    $tahunAjaran = $faker->randomElement(['2023/2024', '2024/2025']);

                    // Always create UTS
                    PresmaboardScore::create([
                        'student_id' => $student->id,
                        'score' => $faker->randomFloat(2, 60, 100),
                        'semester' => $semester,
                        'tahun_ajaran' => $tahunAjaran,
                        'tipe_ujian' => 'UTS',
                    ]);

                    // Sometimes create UAS as well
                    if ($faker->boolean(70)) { // 70% chance
                        PresmaboardScore::create([
                            'student_id' => $student->id,
                            'score' => $faker->randomFloat(2, 60, 100),
                            'semester' => $semester,
                            'tahun_ajaran' => $tahunAjaran,
                            'tipe_ujian' => 'UAS',
                        ]);
                    }
                }
            }
        }
