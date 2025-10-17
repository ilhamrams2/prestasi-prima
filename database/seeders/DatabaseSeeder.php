<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiakadUserSeeder::class,
            TeacherSeeder::class,
            SiakadMajorSeeder::class,
<<<<<<< HEAD
<<<<<<< HEAD
            SiakadClassSeeder::class,
            SiakadStudentSeeder::class,
=======
            presmaboarduser::class,
            PrestasiprimaGallerySeeder::class, // ✅ Tambahkan seeder galeri di sini
<<<<<<< HEAD
>>>>>>> 5b039d2 (tambah halaman galery fe dan be lengkap)
=======
            PrestasiprimaCategorySeeder::class,
            PrestasiprimaNewsSeeder::class,
>>>>>>> 8701b0e (tambah halaman berita fe dan be lengkap)
=======
            presmaboarduser::class,
            PrestasiprimaGallerySeeder::class, // ✅ Tambahkan seeder galeri di sini
            PrestasiprimaCategorySeeder::class,
            PrestasiprimaNewsSeeder::class,
>>>>>>> a34568fa340ceec7e5874a82cdfaf666b8306aeb
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
