<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PresmaboardStudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $genders = ['l', 'p'];
        $jurusanList = ['pplg', 'dkv', 'tkj', 'bcf'];
        $kelasOptions = ['X', 'XI', 'XII'];

        // create 16 students
        for ($i = 1; $i <= 16; $i++) {
            $gender = $genders[array_rand($genders)];
            $jurusan = $jurusanList[array_rand($jurusanList)];
            $kelas = $kelasOptions[array_rand($kelasOptions)];

            // umur: random 12..17 (below 18)
            $umur = $faker->numberBetween(12, 17);
            $tanggal_lahir = Carbon::now()->subYears($umur)->subDays($faker->numberBetween(0, 365))->toDateString();

            $nama = $faker->firstName() . ' ' . $faker->lastName();
            $email = 'student' . str_pad($i, 2, '0', STR_PAD_LEFT) . '@presmaboard.test';
            $nis = 'NIS' . str_pad($i, 4, '0', STR_PAD_LEFT);
            $angkatan = (string) Carbon::now()->year;

            // insert first without foto so we can use the inserted id for a predictable filename
            $sid = DB::table('presmaboard_students')->insertGetId([
                'nama' => $nama,
                'gender' => $gender,
                'foto' => null,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'angkatan' => $angkatan,
                'email' => $email,
                'nis' => $nis,
                'is_active' => true,
                'tanggal_lahir' => $tanggal_lahir,
                'umur' => $umur,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // update the record with a predictable uploads path that the downloader will create
            DB::table('presmaboard_students')->where('id', $sid)->update([
                'foto' => 'uploads/presmaboard/students/photo_' . $sid . '.jpg',
            ]);
        }
    }
}
