<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiPrimaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // === SEED TESTIMONI ===
        $testimonis = [
            [
                'nama' => 'Erwin Eka Saputra',
                'jabatan' => 'Alumni TKJ - Software Engineer @ Tech Corp',
                'pesan' => 'Di SMK Prestasi Prima, saya tidak cuma belajar coding, tapi belajar bagaimana membangun solusi. Fondasi yang saya dapatkan di sini adalah alasan kenapa saya bisa bersaing di level universitas dan industri sekaligus.',
                'foto' => null,
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'jabatan' => 'Alumni Multimedia - UI/UX Designer @ GoTo',
                'pesan' => 'Proyek industri yang saya kerjakan selama sekolah bukan sekadar tugas, tapi portofolio nyata. SMK Prestasi Prima adalah tempat di mana kreativitas saya punya arah dan akhirnya diakui oleh dunia profesional.',
                'foto' => null,
            ],
            [
                'nama' => 'Mohammad Daffa Rizky',
                'jabatan' => 'Alumni RPL - Direct Career Path @ PT. SEVIMA',
                'pesan' => 'Lulus langsung kerja di PT. SEVIMA sambil lanjut kuliah beasiswa di Binus? Itu mungkin di sini. Kurikulumnya sangat \'kena\' dengan apa yang dicari perusahaan saat ini.',
                'foto' => null,
            ],
            [
                'nama' => 'Andi Wijaya',
                'jabatan' => 'Alumni TKJ - Network Engineer @ Cisco',
                'pesan' => 'Sertifikasi internasional yang difasilitasi sekolah menjadi kunci utama saya menembus perusahaan teknologi global tak lama setelah lulus.',
                'foto' => null,
            ],
            [
                'nama' => 'Bagus Prayoga',
                'jabatan' => 'Alumni RPL - Senior Developer @ Tokopedia',
                'pesan' => 'Mentalitas Digital Leader yang ditanamkan sejak awal membuat saya percaya diri untuk bersaing di industri tech yang sangat dinamis.',
                'foto' => null,
            ],
        ];

        foreach ($testimonis as $t) {
            DB::table('prestasiprima_testimonis')->updateOrInsert(['nama' => $t['nama']], $t);
        }

        // === SEED EKSTRAKURIKULER ===
        $ekskuls = [
            ['nama' => 'Badminton', 'deskripsi' => 'Pengembangan bakat siswa dalam olahraga bulu tangkis.', 'gambar' => 'badminton.jpg'],
            ['nama' => 'Bola Basket', 'deskripsi' => 'Klub basket untuk melatih kerjasama tim dan fisik.', 'gambar' => 'basketball.jpg'],
            ['nama' => 'Bola Voli', 'deskripsi' => 'Pelatihan bola voli untuk putra dan putri.', 'gambar' => 'volly.jpg'],
            ['nama' => 'English Club', 'deskripsi' => 'Wadah bagi siswa untuk memperlancar kemampuan berbahasa Inggris.', 'gambar' => 'english.jpg'],
            ['nama' => 'Futsal', 'deskripsi' => 'Tim futsal sekolah yang aktif mengikuti berbagai turnamen.', 'gambar' => 'futsall.jpg'],
            ['nama' => 'Ganefo', 'deskripsi' => 'Kegiatan kepanduan dan disiplin.', 'gambar' => 'ganefo.jpg'],
            ['nama' => 'ICT Club', 'deskripsi' => 'Komunitas pecinta teknologi informasi.', 'gambar' => 'ict.jpg'],
            ['nama' => 'KIR', 'deskripsi' => 'Karya Ilmiah Remaja untuk pengembangan riset.', 'gambar' => 'kir.jpg'],
            ['nama' => 'Modern Dance', 'deskripsi' => 'Ekskul seni tari modern.', 'gambar' => 'moderndance.jpg'],
            ['nama' => 'Orens Digital', 'deskripsi' => 'Fokus pada pengembangan konten digital.', 'gambar' => 'digital.jpg'],
            ['nama' => 'PMR', 'deskripsi' => 'Palang Merah Remaja untuk kemanusiaan.', 'gambar' => 'pmr.jpg'],
            ['nama' => 'Pramuka', 'deskripsi' => 'Pramuka wajib bagi seluruh siswa.', 'gambar' => 'pramuka.jpg'],
            ['nama' => 'Rohis', 'deskripsi' => 'Kerohanian Islam.', 'gambar' => 'rohis.jpg'],
            ['nama' => 'Silat', 'deskripsi' => 'Seni bela diri tradisional Indonesia.', 'gambar' => 'silat.png'],
            ['nama' => 'Esport', 'deskripsi' => 'Pengembangan strategi dan kerjasama dalam gaming profesional.', 'gambar' => 'esport.jpg'],
        ];

        foreach ($ekskuls as $e) {
            DB::table('prestasiprima_ekstrakurikulers')->updateOrInsert(['nama' => $e['nama']], array_merge($e, ['created_at' => now(), 'updated_at' => now()]));
        }

        // === SEED KARYA PROYEK ===
        $projects = [
            [
                'judul' => 'Simulator Roblox: Presma Tycoon',
                'kategori' => 'Game Development',
                'deskripsi' => 'Game simulasi karya siswa RPL yang mengajarkan manajemen sumber daya dan kolaborasi dalam dunia virtual Roblox.',
                'tags' => 'RPL, Roblox, GameDev',
                'link' => 'https://www.roblox.com/id/games/17508460500/Presma-Simulator-RP',
                'gambar' => 'roblox.webp',
            ],
            [
                'judul' => 'Website Absensi Siswa',
                'kategori' => 'Web Development',
                'deskripsi' => 'Proyek digital absensi modern berbasis Laravel dan Tailwind yang dikembangkan untuk kebutuhan sekolah.',
                'tags' => 'Laravel, Tailwind, WebApp',
                'link' => 'https://github.com/JongBatak/spmb',
                'gambar' => 'absensi.png',
            ],
            [
                'judul' => 'Desain Poster Digital',
                'kategori' => 'Desain Kreatif',
                'deskripsi' => 'Karya visual siswa DKV dengan tema motivasi dan semangat belajar, menggunakan Adobe Illustrator.',
                'tags' => 'DKV, Adobe, Poster',
                'link' => '#',
                'gambar' => 'poster.jpeg',
            ],
        ];

        foreach ($projects as $p) {
            DB::table('prestasiprima_karya_proyeks')->updateOrInsert(['judul' => $p['judul']], array_merge($p, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
