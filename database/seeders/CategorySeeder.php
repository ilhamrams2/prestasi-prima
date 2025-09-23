<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Ekstrakurikuler', 'icon' => 'football-ball'],
            ['name' => 'Kegiatan Sekolah', 'icon' => 'school'],
            ['name' => 'Prestasi', 'icon' => 'trophy'],
            ['name' => 'Lomba', 'icon' => 'medal'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat['name']], $cat);
        }
    }
}
