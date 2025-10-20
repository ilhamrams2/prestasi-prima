<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PrestasiprimaGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasiprima_galleries')->truncate();

        DB::table('prestasiprima_galleries')->insert([
            [
                'id' => 1,
                'title' => 'LDKS 2025 SEKOLAH PRESTASI PRIMA',
                'category' => 'Kegiatan Sekolah',
                'thumbnail' => 'https://img.youtube.com/vi/RhWsR6qHf2I/hqdefault.jpg',
                'video_url' => 'https://youtu.be/RhWsR6qHf2I?si=mMNWSTGjG9GuIvHa',
                'description' => 'LDKS 2025 SEKOLAH PRESTASI PRIMA',
                'created_at' => Carbon::parse('2025-10-19 13:16:07'),
                'updated_at' => Carbon::parse('2025-10-19 13:16:07'),
            ],
            [
                'id' => 2,
                'title' => 'STUDY CAREER EXPO | SEKOLAH PRESTASI PRIMA 2025',
                'category' => 'Ekstrakurikuler',
                'thumbnail' => 'https://img.youtube.com/vi/Asi93VHxRgs/hqdefault.jpg',
                'video_url' => 'https://youtu.be/Asi93VHxRgs?si=nkfafLk2cQlJ_7Oh',
                'description' => 'STUDY CAREER EXPO | SEKOLAH PRESTASI PRIMA 2025',
                'created_at' => Carbon::parse('2025-10-19 13:17:03'),
                'updated_at' => Carbon::parse('2025-10-19 13:17:03'),
            ],
            [
                'id' => 3,
                'title' => 'CAMPUS TRIP BROMO - MALANG - YOGYAKARTA 2024',
                'category' => 'Kunjungan',
                'thumbnail' => 'https://img.youtube.com/vi/xliqy2TowC4/hqdefault.jpg',
                'video_url' => 'https://youtu.be/xliqy2TowC4?si=gXE3J8ZkBGIqH9cB',
                'description' => 'CAMPUS TRIP BROMO - MALANG - YOGYAKARTA 2024',
                'created_at' => Carbon::parse('2025-10-19 13:17:52'),
                'updated_at' => Carbon::parse('2025-10-19 13:17:52'),
            ],
            [
                'id' => 4,
                'title' => 'MPLS | SEKOLAH PRESTASI PRIMA 2025',
                'category' => 'Kegiatan Sekolah',
                'thumbnail' => 'https://img.youtube.com/vi/VuaLqzZu_nc/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/live/VuaLqzZu_nc?si=POPogRhPS77FlDSY',
                'description' => 'MPLS | SEKOLAH PRESTASI PRIMA 2025',
                'created_at' => Carbon::parse('2025-10-19 13:19:20'),
                'updated_at' => Carbon::parse('2025-10-19 13:19:20'),
            ],
            [
                'id' => 5,
                'title' => 'ROADSHOW DBL - SMA PRESTASI PRIMA',
                'category' => 'Ekstrakurikuler',
                'thumbnail' => 'https://img.youtube.com/vi/_kf1USP-oY8/hqdefault.jpg',
                'video_url' => 'https://youtu.be/_kf1USP-oY8?si=nGwVAuDmPX-D9vzc',
                'description' => 'ROADSHOW DBL - SMA PRESTASI PRIMA',
                'created_at' => Carbon::parse('2025-10-19 13:19:58'),
                'updated_at' => Carbon::parse('2025-10-19 13:19:58'),
            ],
            [
                'id' => 6,
                'title' => 'NONTON BERSAMA FILM BELIEVE TAKDIR, MIMPI, KEBERANIAN - SEKOLAH PRESTASI PRIMA',
                'category' => 'Kunjungan',
                'thumbnail' => 'https://img.youtube.com/vi/4OOP5uIUmmQ/hqdefault.jpg',
                'video_url' => 'https://youtu.be/4OOP5uIUmmQ?si=JXssvi8GKyH1m2uZ',
                'description' => 'NONTON BERSAMA FILM BELIEVE TAKDIR, MIMPI, KEBERANIAN - SEKOLAH PRESTASI PRIMA',
                'created_at' => Carbon::parse('2025-10-19 13:20:48'),
                'updated_at' => Carbon::parse('2025-10-19 13:20:48'),
            ],
            [
                'id' => 7,
                'title' => 'WISUDA SEKOLAH PRESTASI PRIMA 2025',
                'category' => 'Kegiatan Sekolah',
                'thumbnail' => 'https://img.youtube.com/vi/1Xh2O8XVwTs/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/live/1Xh2O8XVwTs?si=Mg7BzytWJavDANIO',
                'description' => 'WISUDA SEKOLAH PRESTASI PRIMA 2025',
                'created_at' => Carbon::parse('2025-10-19 13:23:20'),
                'updated_at' => Carbon::parse('2025-10-19 13:23:20'),
            ],
            [
                'id' => 8,
                'title' => 'GENIALE DANCER - SMAN PRESTASI PRIMA JKT',
                'category' => 'Lomba',
                'thumbnail' => 'https://img.youtube.com/vi/zAE1iNcqvZw/hqdefault.jpg',
                'video_url' => 'https://youtu.be/zAE1iNcqvZw?si=XIfJj7gjOPi6Mgzh',
                'description' => 'GENIALE DANCER - SMAN PRESTASI PRIMA JKT',
                'created_at' => Carbon::parse('2025-10-19 13:24:10'),
                'updated_at' => Carbon::parse('2025-10-19 13:24:10'),
            ],
            [
                'id' => 9,
                'title' => 'Film Pendek - UTARAKAN - SMK PRESTASI PRIMA - AVC 2023',
                'category' => 'Prestasi',
                'thumbnail' => 'https://img.youtube.com/vi/QilDoZwgrtM/hqdefault.jpg',
                'video_url' => 'https://youtu.be/QilDoZwgrtM?si=UdnTNzVNggidU4xc',
                'description' => 'Film Pendek - UTARAKAN - SMK PRESTASI PRIMA - AVC 2023',
                'created_at' => Carbon::parse('2025-10-19 13:26:16'),
                'updated_at' => Carbon::parse('2025-10-19 13:26:16'),
            ],
            [
                'id' => 10,
                'title' => 'PROFIL PERPUSTAKAAN SMA PRESTASI PRIMA | 2024',
                'category' => 'Kunjungan',
                'thumbnail' => 'https://img.youtube.com/vi/WmUQSc98Gw4/hqdefault.jpg',
                'video_url' => 'https://youtu.be/WmUQSc98Gw4?si=QzE70zMhDb2aQ675',
                'description' => 'PROFIL PERPUSTAKAAN SMA PRESTASI PRIMA | 2024',
                'created_at' => Carbon::parse('2025-10-19 13:27:47'),
                'updated_at' => Carbon::parse('2025-10-19 13:27:47'),
            ],
            [
                'id' => 11,
                'title' => 'PRA-MPLS SEKOLAH PRESTASI PRIMA - 2025',
                'category' => 'Kegiatan Sekolah',
                'thumbnail' => 'https://img.youtube.com/vi/RoZwvEUnBv4/hqdefault.jpg',
                'video_url' => 'https://youtu.be/RoZwvEUnBv4?si=0XjpGUkX_BFTX3Ho',
                'description' => 'PRA-MPLS SEKOLAH PRESTASI PRIMA - 2025',
                'created_at' => Carbon::parse('2025-10-19 13:28:11'),
                'updated_at' => Carbon::parse('2025-10-19 13:28:11'),
            ],
        ]);
    }
}
