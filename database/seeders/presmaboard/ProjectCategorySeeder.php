<?php

namespace Database\Seeders\presmaboard;

use App\Models\presmaboard\PresmaboardProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama' => 'Software Development', 'jurusan' => 'pplg'],
            ['nama' => 'Web & Mobile App', 'jurusan' => 'pplg'],
            ['nama' => 'Game Development', 'jurusan' => 'pplg'],
            ['nama' => 'UI/UX & Design Interface', 'jurusan' => 'pplg'],
            ['nama' => 'IoT & Arduino Integration', 'jurusan' => 'pplg'],

            ['nama' => 'Graphic Design & Branding', 'jurusan' => 'dkv'],
            ['nama' => 'Digital Illustration', 'jurusan' => 'dkv'],
            ['nama' => 'Motion Graphic & Animation', 'jurusan' => 'dkv'],
            ['nama' => 'Poster & Visual Campaign', 'jurusan' => 'dkv'],
            ['nama' => 'UI Mockup & Visual Concept', 'jurusan' => 'dkv'],

            ['nama' => 'Network Simulation & Topology', 'jurusan' => 'tkj'],
            ['nama' => 'Server & Router Configuration', 'jurusan' => 'tkj'],
            ['nama' => 'Cyber Security Project', 'jurusan' => 'tkj'],
            ['nama' => 'IoT Network Setup', 'jurusan' => 'tkj'],
            ['nama' => 'Network Monitoring & Troubleshooting', 'jurusan' => 'tkj'],

            ['nama' => 'Cinematography & Camera Operation', 'jurusan' => 'bcf'],
            ['nama' => 'Video Editing & Post Production', 'jurusan' => 'bcf'],
            ['nama' => 'Short Film & Documentary Project', 'jurusan' => 'bcf'],
            ['nama' => 'Photography & Visual Storytelling', 'jurusan' => 'bcf'],
            ['nama' => 'Broadcasting & Live Streaming', 'jurusan' => 'bcf'],
        ];

        foreach ($categories as $category) {
            DB::table((new PresmaboardProjectCategory())->getTable())->updateOrInsert(
                ['nama' => $category['nama']],  // key for uniqueness check
                ['jurusan' => $category['jurusan']]  // values to insert or update
            );
        }
    }
}