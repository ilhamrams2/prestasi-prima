<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasiprima\PrestasiprimaGallery;

class PrestasiprimaGallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Satu Dekade Sekolah Prestasi Prima',
                'category' => 'Kegiatan Sekolah',
                'video_url' => 'https://youtu.be/_kf1USP-oY8?si=sgiKCLwpo_TmKK13',
                'description' => 'Perayaan satu dekade berdirinya Sekolah Prestasi Prima yang diisi dengan berbagai kegiatan seni dan pertunjukan siswa.',
            ],
            [
                'title' => 'Roadshow DBL Ultras Presma',
                'category' => 'Olahraga',
                'video_url' => 'https://youtu.be/_kf1USP-oY8?si=sgiKCLwpo_TmKK13',
                'description' => 'Keseruan tim DBL Ultras Presma saat melakukan roadshow dan memperkenalkan semangat sportivitas kepada para siswa.',
            ],
            [
                'title' => 'Kampus Trip Bromo - Malang - Yogyakarta 2024',
                'category' => 'Kegiatan Sekolah',
                'video_url' => 'https://youtu.be/xliqy2TowC4?si=kx1Iosx0db80Hg8d',
                'description' => 'Perjalanan edukatif siswa ke beberapa kota besar, mengunjungi kampus ternama dan destinasi wisata budaya di Jawa Timur dan Yogyakarta.',
            ],
            [
                'title' => 'Jakarta Futsal Series',
                'category' => 'Olahraga',
                'video_url' => 'https://www.youtube.com/live/qeIa2QlKxoY?si=ldbfn0NSn9UsqxQP',
                'description' => 'Tim futsal SMA Prestasi Prima berpartisipasi dalam kompetisi bergengsi Jakarta Futsal Series dan menunjukkan performa terbaik mereka.',
            ],
            [
                'title' => 'Upacara HUT RI ke-78',
                'category' => 'Kegiatan Sekolah',
                'video_url' => 'https://www.youtube.com/live/e9IFbRPsHto?si=68IAekxq8umlU7zt',
                'description' => 'Pelaksanaan upacara memperingati Hari Kemerdekaan Republik Indonesia ke-78 di lingkungan sekolah dengan khidmat dan semangat nasionalisme.',
            ],
            [
                'title' => 'Exponer Cup 2024',
                'category' => 'Prestasi',
                'video_url' => 'https://www.youtube.com/live/i-qTBVvFpak?si=qJXYcQ2leSBGWmoh',
                'description' => 'SMA Prestasi Prima meraih prestasi membanggakan dalam ajang Exponer Cup yang diikuti oleh sekolah-sekolah unggulan di Jakarta Timur.',
            ],
            [
                'title' => 'Lomba Tari Tradisional Nusantara',
                'category' => 'Kesenian',
                'video_url' => 'https://youtu.be/ca5m4KKziDo?si=9MshuDmKWG9AB1Uk',
                'description' => 'Penampilan memukau siswa dalam lomba tari tradisional yang mengangkat kekayaan budaya Indonesia dengan koreografi yang elegan.',
            ],
            [
                'title' => 'Nonton Bersama Film Edukatif',
                'category' => 'Kegiatan Sekolah',
                'video_url' => 'https://youtu.be/4OOP5uIUmmQ?si=NERBRZgjAZOLDZM0',
                'description' => 'Kegiatan nonton bersama di aula sekolah sebagai bagian dari program penguatan karakter dan nilai-nilai sosial bagi siswa.',
            ],
            [
                'title' => 'Pra-MPLS Sekolah Prestasi Prima 2024',
                'category' => 'Kegiatan Sekolah',
                'video_url' => 'https://youtu.be/RoZwvEUnBv4?si=5vuK1D_zzYBzF6-k',
                'description' => 'Kegiatan pra-MPLS untuk menyambut siswa baru dengan berbagai kegiatan perkenalan dan pengenalan lingkungan sekolah.',
            ],
            [
                'title' => 'Turnamen E-Sport Mobile Legends',
                'category' => 'Kompetisi',
                'video_url' => 'https://www.youtube.com/live/pKKckawHTDA?si=JIJxOmnsJRUHk2Sv',
                'description' => 'Kompetisi e-sport antar kelas yang menampilkan strategi dan kerja sama tim dalam permainan Mobile Legends tingkat sekolah.',
            ],
        ];

        foreach ($galleries as $data) {
            // Ambil ID video YouTube
            $videoId = $this->extractYouTubeId($data['video_url']);

            // Tambahkan thumbnail otomatis dari YouTube
            $data['thumbnail'] = $videoId
                ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg"
                : null;

            // Simpan ke database
            PrestasiprimaGallery::create($data);
        }
    }

    /**
     * Ekstrak ID video dari berbagai format URL YouTube
     */
    private function extractYouTubeId(string $url): ?string
    {
        preg_match(
            '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
            $url,
            $matches
        );
        return $matches[1] ?? null;
    }
}
