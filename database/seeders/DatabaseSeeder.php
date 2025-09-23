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
        // Kalau mau bikin user dummy bisa di sini juga
        // \App\Models\User::factory(10)->create();

        // Jalankan seeder kategori & galeri
        $this->call([
            CategorySeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
