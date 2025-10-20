<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PrestasiprimaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasiprima_categories')->truncate();

        DB::table('prestasiprima_categories')->insert([
            [
                'id' => 1,
                'name' => 'Akademik',
                'slug' => 'akademik',
                'created_at' => Carbon::parse('2025-10-19 12:58:23'),
                'updated_at' => Carbon::parse('2025-10-19 12:58:23'),
            ],
            [
                'id' => 2,
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'created_at' => Carbon::parse('2025-10-19 12:58:23'),
                'updated_at' => Carbon::parse('2025-10-19 12:58:23'),
            ],
            [
                'id' => 3,
                'name' => 'Seni',
                'slug' => 'seni',
                'created_at' => Carbon::parse('2025-10-19 12:58:23'),
                'updated_at' => Carbon::parse('2025-10-19 12:58:23'),
            ],
            [
                'id' => 4,
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'created_at' => Carbon::parse('2025-10-19 12:58:23'),
                'updated_at' => Carbon::parse('2025-10-19 12:58:23'),
            ],
            [
                'id' => 5,
                'name' => 'Sosial',
                'slug' => 'sosial',
                'created_at' => Carbon::parse('2025-10-19 12:58:23'),
                'updated_at' => Carbon::parse('2025-10-19 12:58:23'),
            ],
        ]);
    }
}
