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
            SiakadMajorSeeder::class,
            presmaboarduser::class,
            PrestasiprimaGallerySeeder::class, // ✅ Tambahkan seeder galeri di sini
            PrestasiprimaCategorySeeder::class,
            PrestasiprimaNewsSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
