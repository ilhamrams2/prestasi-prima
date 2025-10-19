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
                'title' => 'Prestasi Siswa Prestasi Prima Juara 1 Olimpiade Matematika Nasional 2025',
                'slug' => Str::slug('Prestasi Siswa Prestasi Prima Juara 1 Olimpiade Matematika Nasional 2025'),
                'content' => '<p>Selamat kepada <strong>Andi Setiawan</strong> dari kelas XII IPA 1 yang berhasil meraih Juara 1 dalam Olimpiade Matematika Nasional 2025 yang diselenggarakan di Jakarta. Prestasi ini menjadi kebanggaan bagi seluruh warga sekolah.</p>',
                'category_id' => 1,
                'thumbnail' => 'uploads/news/olimpiade-matematika.jpg',
            ],
            [
                'title' => 'Kegiatan Bakti Sosial Prestasi Prima di Panti Asuhan Bina Kasih',
                'slug' => Str::slug('Kegiatan Bakti Sosial Prestasi Prima di Panti Asuhan Bina Kasih'),
                'content' => '<p>Siswa dan guru dari Prestasi Prima melaksanakan kegiatan bakti sosial di Panti Asuhan Bina Kasih, Jakarta Timur. Kegiatan ini bertujuan untuk menumbuhkan rasa empati dan kepedulian sosial.</p>',
                'category_id' => 2,
                'thumbnail' => 'uploads/news/bakti-sosial.jpg',
            ],
            [
                'title' => 'Workshop Digital Marketing untuk Siswa SMK Prestasi Prima',
                'slug' => Str::slug('Workshop Digital Marketing untuk Siswa SMK Prestasi Prima'),
                'content' => '<p>Program ini dihadiri oleh narasumber dari dunia industri yang membagikan wawasan mengenai strategi pemasaran digital dan peluang kerja di bidang tersebut.</p>',
                'category_id' => 3,
                'thumbnail' => 'uploads/news/workshop-digital-marketing.jpg',
            ],
            [
                'title' => 'Prestasi Prima Gelar Seminar “AI dan Dunia Pendidikan”',
                'slug' => Str::slug('Prestasi Prima Gelar Seminar AI dan Dunia Pendidikan'),
                'content' => '<p>Seminar ini membahas pemanfaatan Artificial Intelligence dalam dunia pendidikan modern, menghadirkan pakar AI dari berbagai universitas ternama di Indonesia.</p>',
                'category_id' => 3,
                'thumbnail' => 'uploads/news/seminar-ai.jpg',
            ],
            [
                'title' => 'Siswa SMK Prestasi Prima Berhasil Memenangkan Lomba Desain Grafis Nasional',
                'slug' => Str::slug('Siswa SMK Prestasi Prima Berhasil Memenangkan Lomba Desain Grafis Nasional'),
                'content' => '<p>Salah satu siswa dari jurusan Multimedia berhasil menjuarai lomba desain grafis nasional dengan karya bertema “Teknologi untuk Kemanusiaan”.</p>',
                'category_id' => 1,
                'thumbnail' => 'uploads/news/lomba-desain-grafis.jpg',
            ],
            [
                'title' => 'Kegiatan Class Meeting Semester Genap 2025',
                'slug' => Str::slug('Kegiatan Class Meeting Semester Genap 2025'),
                'content' => '<p>Kegiatan rutin yang diadakan setiap akhir semester ini bertujuan mempererat tali persaudaraan antar siswa sekaligus menjadi ajang penyaluran bakat dan minat.</p>',
                'category_id' => 2,
                'thumbnail' => 'uploads/news/class-meeting.jpg',
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
