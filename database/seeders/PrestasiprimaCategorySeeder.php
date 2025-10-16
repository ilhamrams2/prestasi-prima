<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\prestasiprima\Category;

class PrestasiprimaCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Akademik', 'slug' => 'akademik'],
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Seni', 'slug' => 'seni'],
            ['name' => 'Olahraga', 'slug' => 'olahraga'],
            ['name' => 'Sosial', 'slug' => 'sosial'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
