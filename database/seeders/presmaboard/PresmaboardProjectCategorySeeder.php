<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresmaboardProjectCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nama' => 'Aplikasi Web', 'jurusan' => 'pplg'],
            ['nama' => 'Desain Grafis', 'jurusan' => 'dkv'],
            ['nama' => 'Jaringan & Sistem', 'jurusan' => 'tkj'],
            ['nama' => 'Bisnis & Kejuruan', 'jurusan' => 'bcf'],
            ['nama' => 'Multimedia', 'jurusan' => 'dkv'],
        ];

        foreach ($categories as $cat) {
            DB::table('presmaboard_project_categories')->updateOrInsert(
                ['nama' => $cat['nama']],
                ['jurusan' => $cat['jurusan']]
            );
        }
    }
}
