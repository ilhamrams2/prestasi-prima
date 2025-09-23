<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Jakarta Futsal Series',
                'url' => 'https://www.youtube.com/live/qeIa2QlKxoY?si=wk6ArOm_rCbVwsCt',
                'category_id' => 1, // Ekstrakurikuler
            ],
            [
                'title' => 'Upacara 17 Agustus',
                'url' => 'https://www.youtube.com/live/e9IFbRPsHto?si=WZsEp3IZs7rxsCbT',
                'category_id' => 2, // Kegiatan Sekolah
            ],
            [
                'title' => 'Exponer Cup',
                'url' => 'https://www.youtube.com/live/i-qTBVvFpak?si=mLwKL1HYSvEUAWle',
                'category_id' => 3, // Prestasi
            ],
            [
                'title' => 'Lomba Tari Tradisional',
                'url' => 'https://youtu.be/ca5m4KKziDo?si=2OeDQoBWa_PcRJpG',
                'category_id' => 4, // Lomba
            ],
            
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
