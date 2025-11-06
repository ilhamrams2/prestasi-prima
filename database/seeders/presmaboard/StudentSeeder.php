<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardStudent;
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

        for ($i = 0; $i < 10; $i++) {
            DB::table((new PresmaboardStudent)->getTable())->insert([
                'nama' => $faker->name,
                'gender' => $faker->randomElement(['l', 'p']),
                'foto' => null,
                'kelas' => $faker->randomElement($kelas),
                'jurusan' => $faker->randomElement($jurusan),
                'angkatan' => $faker->randomElement($angkatan),
                'email' => $faker->unique()->safeEmail,
                'nis' => $faker->unique()->randomNumber(8, true),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }
    }
}
