<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\prestasiprima\News;
use Illuminate\Support\Str;

class PrestasiprimaNewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Tim Futsal Prestasi Prima Lolos ke Final Liga Pelajar Jakarta',
                'slug' => Str::slug('Tim Futsal Prestasi Prima Lolos ke Final Liga Pelajar Jakarta'),
                'thumbnail' => 'news/futsal-final.jpg',
                'excerpt' => 'Tim futsal Prestasi Prima berhasil melangkah ke babak final setelah mengalahkan SMA Harapan Bangsa.',
                'content' => '<p>Tim futsal SMA Prestasi Prima kembali menunjukkan performa luar biasa di ajang <strong>Liga Pelajar Jakarta</strong>. Mereka berhasil menumbangkan SMA Harapan Bangsa dengan skor 3–1.</p>
                              <p>Pelatih tim, Bapak <strong>Rizky Nugraha</strong>, mengatakan bahwa kekompakan dan semangat juang menjadi kunci kemenangan kali ini.</p>
                              <p>Pertandingan final akan dilaksanakan di GOR Soemantri Brodjonegoro, Jakarta Selatan. Mari dukung tim kita meraih juara!</p>',
                'category_id' => 4,
                'published_at' => now(),
            ],
            [
                'title' => 'Prestasi Prima Raih Juara Umum Olimpiade Sains Kota Jakarta Timur',
                'slug' => Str::slug('Prestasi Prima Raih Juara Umum Olimpiade Sains Kota Jakarta Timur'),
                'thumbnail' => 'news/olimpiade-sains.jpg',
                'excerpt' => 'Siswa Prestasi Prima berhasil menyabet juara umum dalam ajang Olimpiade Sains tingkat Kota Jakarta Timur.',
                'content' => '<p>Dalam ajang <strong>Olimpiade Sains Kota Jakarta Timur 2025</strong>, SMA Prestasi Prima berhasil meraih prestasi luar biasa dengan memborong 5 medali emas dan 2 perak.</p>
                              <p>Bidang yang diungguli antara lain Matematika, Fisika, dan Biologi. Kepala Sekolah, Ibu <strong>Nurhayati</strong>, menyampaikan rasa bangganya atas pencapaian ini.</p>',
                'category_id' => 1,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Workshop Artificial Intelligence untuk Siswa SMA Prestasi Prima',
                'slug' => Str::slug('Workshop Artificial Intelligence untuk Siswa SMA Prestasi Prima'),
                'thumbnail' => 'news/ai-workshop.jpg',
                'excerpt' => 'SMA Prestasi Prima menyelenggarakan workshop tentang kecerdasan buatan bersama dosen dari Universitas Indonesia.',
                'content' => '<p>Kegiatan <strong>AI Workshop</strong> ini diikuti oleh 120 siswa dari jurusan IPA dan Teknologi Informasi.</p>
                              <p>Dalam kegiatan ini, siswa belajar dasar-dasar machine learning dan implementasi AI di kehidupan sehari-hari.</p>',
                'category_id' => 2,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Seni Tari Prestasi Prima Tampil Memukau di Festival Budaya Jakarta',
                'slug' => Str::slug('Seni Tari Prestasi Prima Tampil Memukau di Festival Budaya Jakarta'),
                'thumbnail' => 'news/tari-budaya.jpg',
                'excerpt' => 'Penampilan tim tari SMA Prestasi Prima mendapat sambutan meriah di Festival Budaya Jakarta 2025.',
                'content' => '<p>Tim tari yang diketuai oleh <strong>Anisa Putri</strong> tampil membawakan tarian Betawi modern yang memadukan unsur tradisi dan kreativitas.</p>
                              <p>Penampilan mereka berhasil meraih penghargaan "Penampilan Terfavorit" dalam ajang tahunan tersebut.</p>',
                'category_id' => 3,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Kegiatan Donor Darah Bersama PMI di SMA Prestasi Prima',
                'slug' => Str::slug('Kegiatan Donor Darah Bersama PMI di SMA Prestasi Prima'),
                'thumbnail' => 'news/donor-darah.jpg',
                'excerpt' => 'Kegiatan sosial donor darah kembali digelar di SMA Prestasi Prima dengan kerja sama PMI Jakarta Timur.',
                'content' => '<p>Kegiatan ini diikuti oleh lebih dari 80 peserta, terdiri dari guru, siswa, dan warga sekitar sekolah.</p>
                              <p>Pihak PMI mengapresiasi kepedulian SMA Prestasi Prima dalam mendukung program kemanusiaan nasional.</p>',
                'category_id' => 5,
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'SMA Prestasi Prima Gelar Lomba Debat Bahasa Inggris Antar Sekolah',
                'slug' => Str::slug('SMA Prestasi Prima Gelar Lomba Debat Bahasa Inggris Antar Sekolah'),
                'thumbnail' => 'news/debat-english.jpg',
                'excerpt' => 'Lomba debat Bahasa Inggris tingkat SMA se-Jakarta berlangsung meriah di SMA Prestasi Prima.',
                'content' => '<p>Kompetisi ini diikuti oleh 15 sekolah dari wilayah Jabodetabek dengan tema "Technology and Human Values".</p>
                              <p>Tim Prestasi Prima berhasil masuk ke babak semifinal dan mendapatkan penghargaan Best Speaker.</p>',
                'category_id' => 1,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tim Robotik Prestasi Prima Juara 2 Nasional Robotic Challenge',
                'slug' => Str::slug('Tim Robotik Prestasi Prima Juara 2 Nasional Robotic Challenge'),
                'thumbnail' => 'news/robotik-juara.jpg',
                'excerpt' => 'Inovasi robot pintar karya siswa Prestasi Prima berhasil menembus ajang nasional dan raih juara kedua.',
                'content' => '<p>Robot "PrimaBot" yang dirancang siswa jurusan Teknik Komputer dan Jaringan berhasil menjuarai ajang <strong>Indonesia Robotic Challenge 2025</strong>.</p>
                              <p>Robot ini mampu mendeteksi rintangan secara otomatis menggunakan sensor ultrasonik.</p>',
                'category_id' => 2,
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Kegiatan Class Meeting: Ajang Kreativitas dan Sportivitas Siswa',
                'slug' => Str::slug('Kegiatan Class Meeting: Ajang Kreativitas dan Sportivitas Siswa'),
                'thumbnail' => 'news/class-meeting.jpg',
                'excerpt' => 'SMA Prestasi Prima kembali menggelar kegiatan class meeting sebagai penutup semester ganjil tahun ajaran ini.',
                'content' => '<p>Kegiatan ini diisi dengan berbagai lomba seperti futsal, voli, mural, dan pentas seni antar kelas.</p>
                              <p>Tujuannya adalah mempererat kekompakan antar siswa serta memberikan ruang bagi kreativitas mereka.</p>',
                'category_id' => 4,
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
