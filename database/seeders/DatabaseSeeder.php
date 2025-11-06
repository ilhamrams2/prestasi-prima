<?php

namespace Database\Seeders;

use Database\Seeders\presmaboard\StudentSeeder;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\prestasiprima\Prestasi;
use App\Models\Profile;
use Carbon\Carbon;
use Database\Seeders\presmaboard\AchievementSeeder;
use Database\Seeders\presmaboard\ProjectCategorySeeder;
use Database\Seeders\presmaboard\ProjectSeeder;
use Database\Seeders\presmaboard\ScoreSeeder;
use Database\Seeders\presmaboard\UserSeeder;
// Impor yang ditambahkan
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
      	$this->call([
          PrestasiprimaStaffSeeder::class,
          AchievementSeeder::class,
          ProjectCategorySeeder::class,
          ScoreSeeder::class,
          StudentSeeder::class,
          UserSeeder::class,
          ProjectSeeder::class,
          PrestasiprimaKegiatanSeeder::class,
          PrestasiprimaPrestasiSeeder::class,
          PrestasiprimaIndustriSeeder::class,
          PrestasiprimaGallerySeeder::class,
          PrestasiprimaCategorySeeder::class,
          PrestasiprimaNewsSeeder::class,
          PrestasiprimaUserSeeder::class,
          PresmaboardDatabaseSeeder::class,
          ]);

        // ==========================================================
        // SEEDER PRESMALANCER (YANG SUDAH ADA)
        // ==========================================================
        
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin Presmalancer',
            'email' => 'admin@presmalancer.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Company Users
        $companies = [
            [
                'user' => [
                    'name' => 'PT Aditya Birla',
                    'email' => 'hr@adityabirla.com',
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'email_verified_at' => now(),
                ],
                'company' => [
                    'company_name' => 'PT Aditya Birla',
                    'industry' => 'Technology',
                    'website' => 'www.adityabirla.co.id',
                    'description' => 'PT Aditya Birla adalah perusahaan teknologi terkemuka yang berfokus pada solusi digital inovatif.',
                    'address' => 'Jakarta Selatan',
                    'logo' => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=100&h=100&fit=crop&crop=center',
                    'phone' => '+62 21 5555 1234',
                    'email' => 'info@adityabirla.co.id',
                    'size' => '100-500',
                    'founded' => '2015',
                ]
            ],
            [
                'user' => [
                    'name' => 'Jaetindo Creative',
                    'email' => 'hr@jaetindo.com',
                    'password' => bcrypt('password'),
                    'role' => 'company',
                    'email_verified_at' => now(),
                ],
                'company' => [
                    'company_name' => 'Jaetindo Creative',
                    'industry' => 'Creative & Design',
                    'website' => 'www.jaetindo.co.id',
                    'description' => 'Jaetindo Creative adalah agensi kreatif yang menghadirkan solusi branding dan digital marketing.',
                    'address' => 'Bandung',
                    'logo' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=100&h=100&fit=crop&crop=center',
                    'phone' => '+62 22 5555 5678',
                    'email' => 'contact@jaetindo.co.id',
                    'size' => '50-100',
                    'founded' => '2018',
                ]
            ],
            [
                'user' => [
                    'name' => 'Panasonic Indonesia',
                    'email' => 'careers@panasonic.co.id',
                    'password' => bcrypt('password'),
                    'role' => 'company',
                    'email_verified_at' => now(),
                ],
                'company' => [
                    'company_name' => 'Panasonic Indonesia',
                    'industry' => 'Electronics',
                    'website' => 'www.panasonic.co.id',
                    'description' => 'Panasonic Indonesia adalah perusahaan elektronik global dengan komitmen pada inovasi.',
                    'address' => 'Jakarta Utara',
                    'logo' => 'https://images.unsplash.com/photo-1560472355-536de3962603?w=100&h=100&fit=crop&crop=center',
                    'phone' => '+62 21 5555 9012',
                    'email' => 'info@panasonic.co.id',
                    'size' => '500+',
                    'founded' => '1990',
                ]
            ],
            [
                'user' => [
                    'name' => 'Telkom Indonesia',
                    'email' => 'recruitment@telkom.co.id',
                    'password' => bcrypt('password'),
                    'role' => 'company',
                    'email_verified_at' => now(),
                ],
                'company' => [
                    'company_name' => 'Telkom Indonesia',
                    'industry' => 'Telecommunications',
                    'website' => 'www.telkom.co.id',
                    'description' => 'Telkom Indonesia adalah perusahaan telekomunikasi terbesar di Indonesia.',
                    'address' => 'Jakarta Pusat',
                    'logo' => 'https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=100&h=100&fit=crop&crop=center',
                    'phone' => '+62 21 5555 3456',
                    'email' => 'contact@telkom.co.id',
                    'size' => '500+',
                    'founded' => '1995',
                ]
            ],
        ];

        foreach ($companies as $companyData) {
            $user = User::create($companyData['user']);
            $company = Company::create(array_merge($companyData['company'], ['user_id' => $user->id]));
            
            // Create jobs for each company
            $this->createJobsForCompany($company);
        }

        // Create Regular Users with Profiles
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'password' => bcrypt('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'phone' => '+62 812 3456 78' . $i . '0',
                'address' => 'Jakarta, Indonesia',
                'bio' => "Saya adalah profesional yang berpengalaman di bidang teknologi dan memiliki passion untuk terus belajar.",
                'skills' => "JavaScript, PHP, Laravel, React, Node.js",
                'education' => "S1 Teknik Informatika",
                'experience' => "3 tahun sebagai Software Developer",
                'portfolio_link' => "https://portfolio-user{$i}.com",
            ]);
        }


        // ==========================================================
        // SEEDER PRESTASIPRIMA (BARU DITAMBAHKAN DARI SQL)
        // ==========================================================

        $this->seedPrestasiprimaCategories();
        $this->seedPrestasiprimaGalleries();
        // News harus dijalankan setelah Categories karena ada category_id
        $this->seedPrestasiprimaNews(); 

    // Seed presmaboard data (students, projects, scores, achievements, leaderboards)
    // This calls database/seeders/PresmaboardDatabaseSeeder.php
    $this->call([\Database\Seeders\PresmaboardDatabaseSeeder::class]);

        Schema::enableForeignKeyConstraints();
    }

    private function createJobsForCompany($company)
    {
        $jobs = [];
        
        if ($company->company_name === 'PT Aditya Birla') {
            $jobs[] = [
                'title' => 'Junior Web Developer',
                'description' => 'Kami mencari Junior Web Developer yang berpengalaman dalam React, Node.js, dan database management. Kandidat ideal memiliki pemahaman yang baik tentang modern web development.',
                'requirements' => "React\nNode.js\nJavaScript\nHTML/CSS\nGit",
                'location' => 'Jakarta Selatan',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 8-12 juta',
                'deadline' => Carbon::now()->addDays(30),
            ];
            $jobs[] = [
                'title' => 'Full Stack Developer',
                'description' => 'Kami membutuhkan Full Stack Developer berpengalaman untuk mengembangkan aplikasi web enterprise.',
                'requirements' => "React\nNode.js\nMongoDB\nExpress\nTypeScript",
                'location' => 'Jakarta Selatan',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 15-22 juta',
                'deadline' => Carbon::now()->addDays(45),
            ];
        } elseif ($company->company_name === 'Jaetindo Creative') {
            $jobs[] = [
                'title' => 'UI & UX Designer',
                'description' => 'Bergabunglah dengan tim kreatif kami sebagai UI/UX Designer. Anda akan bertanggung jawab merancang interface yang user-friendly dan engaging.',
                'requirements' => "Figma\nAdobe XD\nPrototyping\nUser Research\nWireframing",
                'location' => 'Bandung',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 6-10 juta',
                'deadline' => Carbon::now()->addDays(20),
            ];
        } elseif ($company->company_name === 'Panasonic Indonesia') {
            $jobs[] = [
                'title' => 'Back End Developer',
                'description' => 'Posisi Back End Developer untuk mengembangkan dan maintain sistem backend yang scalable.',
                'requirements' => "Java\nSpring Boot\nPostgreSQL\nDocker\nAWS",
                'location' => 'Jakarta Utara',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 12-18 juta',
                'deadline' => Carbon::now()->addDays(60),
            ];
        } elseif ($company->company_name === 'Telkom Indonesia') {
            $jobs[] = [
                'title' => 'Data Science Analyst',
                'description' => 'Bergabung dengan tim Data Science untuk menganalisis big data dan memberikan insights bisnis.',
                'requirements' => "Python\nSQL\nMachine Learning\nPandas\nTableau",
                'location' => 'Jakarta Pusat',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 10-15 juta',
                'deadline' => Carbon::now()->addDays(40),
            ];
            $jobs[] = [
                'title' => 'Network Engineer',
                'description' => 'Dibutuhkan teknisi untuk instalasi dan maintenance jaringan.',
                'requirements' => "Networking\nHardware\nTroubleshooting\nCustomer Service",
                'location' => 'Malang',
                'job_type' => 'Part Time',
                'salary_range' => 'Rp 4-6 juta',
                'deadline' => Carbon::now()->addDays(15),
            ];
        }

        foreach ($jobs as $jobData) {
            Job::create(array_merge($jobData, [
                'company_id' => $company->id,
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 7)),
            ]));
        }
    }

    // ==========================================================
    // METODE BARU UNTUK SEEDER PRESTASIPRIMA
    // ==========================================================

    private function seedPrestasiprimaCategories(): void
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

    private function seedPrestasiprimaGalleries(): void
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

    private function seedPrestasiprimaNews(): void
    {
        DB::table('prestasiprima_news')->truncate();

        DB::table('prestasiprima_news')->insert([
            [
                'id' => 7,
                'category_id' => 5,
                'title' => 'Peringatan Maulid Nabi Muhammad SAW 1447 H di SMK Prestasi Prima',
                'slug' => 'peringatan-maulid-nabi-muhammad-saw-1447-h-di-smk-prestasi-prima',
                'thumbnail' => 'uploads/thumbnails/1760922773_🌙✨ Selamat Memperingati Maulid Nabi Muhammad SAW ✨🌙12 Rabiul Awal 1447 HHari penuh berkah unt.webp',
                'excerpt' => null,
                'content' => "Dalam rangka memperingati Maulid Nabi Muhammad SAW 12 Rabiul Awal 1447 H, SMK Prestasi Prima menyelenggarakan kegiatan penuh makna sebagai bentuk rasa syukur dan cinta kepada Rasulullah.\r\n\r\nMelalui kegiatan ini, seluruh warga sekolah diajak untuk meneladani akhlak mulia Nabi Muhammad SAW — mulai dari kejujuran, kasih sayang, hingga semangat menebarkan kebaikan kepada sesama.\r\n\r\nPeringatan Maulid Nabi juga menjadi momen penting untuk memperkuat nilai spiritual, mempererat silaturahmi antar siswa, guru, dan staf, serta menanamkan semangat religius dalam kehidupan sehari-hari.\r\n\r\nDengan tema dan semangat kebersamaan, kegiatan ini diharapkan dapat menumbuhkan karakter siswa yang berakhlak mulia, berempati, dan menjadi generasi yang membawa keberkahan bagi lingkungan sekitarnya.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:01:32'),
                'updated_at' => Carbon::parse('2025-10-19 18:12:53'),
            ],
            [
                'id' => 8,
                'category_id' => 3,
                'title' => 'SMK Prestasi Prima Rilis Film Pendek “Jejak Satu Kak” Karya Oren’s Studio Production',
                'slug' => 'smk-prestasi-prima-rilis-film-pendek-jejak-satu-kak-karya-orens-studio-production',
                'thumbnail' => 'uploads/thumbnails/1760922755_SMK Prestasi Prima Rilis Film Pendek “Jejak Satu Kak” Karya Oren’s Studio Production.jpeg',
                'excerpt' => null,
                'content' => "Jakarta Timur, 10 September 2025 — Siswa-siswi SMK Prestasi Prima kembali menorehkan karya inspiratif di bidang perfilman melalui perilisan film pendek berjudul “Jejak Satu Kak”. Film ini diproduksi oleh Oren’s Studio Production 2025, yang merupakan kelompok produksi dari jurusan Broadcasting dan Film (BCF) SMK Prestasi Prima, Jakarta Timur, DKI Jakarta.\r\n\r\nFilm berdurasi singkat ini mengisahkan perjalanan Kirana, seorang siswi SMA yang memiliki kecintaan mendalam terhadap tari tradisional Indonesia. Kirana dikenal sebagai penari muda yang bersemangat dan sering mengikuti berbagai ajang perlombaan tari. Namun, meski telah berulang kali mencoba, ia belum pernah berhasil membawa pulang piala kemenangan. Kegigihan Kirana diuji ketika sebuah kecelakaan tragis menimpanya beberapa hari sebelum lomba besar yang sudah lama ia impikan. Akibat insiden itu, ia harus dirawat di rumah sakit dan sempat kehilangan semangat untuk kembali menari.\r\n\r\nNamun, kisah film ini berubah penuh haru ketika sebuah keajaiban kecil terjadi — panitia lomba mengumumkan adanya perubahan aturan yang membuat Kirana tetap memenuhi syarat penilaian. Tanpa diduga, ia diumumkan sebagai Juara 1 Lomba Tari Tradisional. Momen ini menjadi titik balik bagi Kirana, yang akhirnya kembali menari dengan semangat baru, melampaui batas fisik dan emosional yang sempat menahannya. Dalam pesan penutup film, Kirana menyampaikan rasa terima kasih atas dukungan teman-teman, keluarga, dan para guru yang tak henti memberi doa dan semangat.\r\n\r\n“Jejak Satu Kak bukan hanya kisah tentang menari, tetapi tentang keteguhan hati dan makna tidak menyerah,” ujar Sir Ilham, guru pembimbing jurusan Broadcasting & Film, yang turut mendampingi proses produksi film ini. Ia menambahkan bahwa seluruh proses — mulai dari penulisan naskah, pengambilan gambar, penyuntingan, hingga publikasi — dilakukan sepenuhnya oleh siswa dengan semangat kolaborasi dan profesionalisme tinggi.\r\n\r\nFilm ini resmi dirilis pada 10 September 2025 dan tayang perdana di kanal YouTube resmi SMK Prestasi Prima serta diputar di aula sekolah dalam kegiatan apresiasi karya siswa. Dengan karya ini, SMK Prestasi Prima kembali membuktikan komitmennya untuk menumbuhkan kreativitas siswa dalam dunia seni, teknologi, dan media digital.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:02:58'),
                'updated_at' => Carbon::parse('2025-10-19 18:12:35'),
            ],
            [
                'id' => 9,
                'category_id' => 1,
                'title' => 'Tim Imagine Presma Lolos 100 Besar dari 300 Tim di JHIC 2025',
                'slug' => 'tim-imagine-presma-lolos-100-besar-dari-300-tim-di-jhic-2025',
                'thumbnail' => 'uploads/thumbnails/1760922737_Tim Imagine Presma Lolos 100 Besar dari 300 Tim di JHIC 2025.jpeg',
                'excerpt' => null,
                'content' => "Tim Imagine Presma dari SMK Prestasi Prima berhasil menembus 100 besar dari sekitar 300 tim peserta yang mengikuti Jagoan Hosting Infra Competition 2025 (JHIC 2025). Lomba ini diadakan oleh Jagoan Hosting bersama mitra seperti Maspion IT dan Komdigi, dan terbuka untuk siswa-SMK aktif yang berminat di bidang IT serta pengembangan website sekolah. \r\n\r\n\r\nMenurut panduan lomba, setiap tim terdiri dari 3-5 siswa dan memiliki guru pembimbing; dalam kompetisi ini juga ada tahapan preliminary (online/hybrid) dan final yang dilaksanakan secara offline di Surabaya bagi tim terpilih. \r\n\r\n\r\nAnggota tim Imagine Presma terdiri dari: Abi, Ardy, Zwingli, Gibran (semuanya dari SMK) dan Marchia (juga dari SMK). Guru pembimbingnya adalah Sir Ilham, selaku guru bidang keahlian di SMK Prestasi Prima. Saat pengumuman lolos, Sir Ilham menyampaikan:\r\n\r\n“Saya sangat bangga dengan kerja keras lima siswa ini. Mereka menunjukkan bahwa dengan kolaborasi, kreativitas dan konsistensi, sekolah kejuruan pun bisa bersaing di level nasional.”\r\n\r\nTim tersebut berhasil masuk tahap 100 besar dari total kira-kira 318 tim peserta yang tercatat dalam JHIC 2025. \r\n\r\nDengan lolos tahap ini, tim kini menantikan pengumuman selanjutnya — bila mereka berhasil menembus 30 besar final, maka akan dipanggil ke Surabaya untuk sesi final offline dan pitching langsung. Panduan lomba menyebut bahwa final dilaksanakan secara offline di Maspion IT, Surabaya, untuk tim yang lolos 30 besar. \r\n\r\n\r\nDalam perjalanannya, tim Imagine Presma fokus pada pengembangan website sekolah yang tidak hanya menarik secara visual namun juga memuat performa teknis, manajemen server atau elemen infrastruktur yang kuat — sesuai dengan kriteria lomba yang menilai aspek UI/UX, admin infrastruktur, dan strateginya. \r\n\r\n\r\nSir Ilham juga menambahkan bahwa “Pengalaman di lomba ini bukan hanya soal menang, tetapi soal pembelajaran nyata untuk siswa: bagaimana caranya mereka bisa menerapkan skill-TI di dunia nyata, mulai dari coding, UI/UX, hingga deployment server dan optimasi website.”\r\n\r\nKe depan, tim Imagine Presma dan SMK Prestasi Prima berharap dapat menembus final 30 besar, sehingga bisa hadir di Surabaya untuk tahap final dan membawa nama baik sekolah ke kancah nasional. “Target kami sederhana: masuk final 30 besar dan terus naik hingga juara,” ujar salah satu anggota tim, Abi.\r\nSekolah pun telah menyediakan fasilitas pendukung seperti lab komputer, koneksi internet cepat, mentor tambahan, agar tim bisa mempersiapkan diri sebaik mungkin.\r\n\r\nKami mengucapkan selamat kepada tim Imagine Presma dan SMK Prestasi Prima atas pencapaian ini — semoga sukses menembus final dan membawa prestasi lebih lanjut bagi sekolah dan komunitas kejuruan.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:03:43'),
                'updated_at' => Carbon::parse('2025-10-19 18:12:17'),
            ],
            [
                'id' => 10,
                'category_id' => 1,
                'title' => 'SMK Prestasi Prima Gelar Kegiatan Kokurikuler: Satu Minggu Penuh Belajar Praktik Sesuai Jurusan',
                'slug' => 'smk-prestasi-prima-gelar-kegiatan-kokurikuler-satu-minggu-penuh-belajar-praktik-sesuai-jurusan',
                'thumbnail' => 'uploads/thumbnails/1760922715_SMK Prestasi Prima Gelar Kegiatan Kokurikuler Satu Minggu Penuh Belajar Praktik Sesuai Jurusan.jpeg',
                'excerpt' => null,
                'content' => "SMK Prestasi Prima kembali melaksanakan Kegiatan Kokurikuler sebagai bagian dari penguatan pembelajaran berbasis praktik di lingkungan sekolah. Kegiatan ini berlangsung selama satu minggu penuh, dimulai dari Senin, 13 Oktober hingga Jumat, 17 Oktober 2025, dengan melibatkan seluruh jurusan di SMK Prestasi Prima.\r\n\r\nBerbeda dari pembelajaran teori di kelas, kegiatan kokurikuler ini berfokus pada penerapan langsung ilmu sesuai bidang keahlian masing-masing jurusan. Siswa PPLG (Pengembangan Perangkat Lunak dan Gim) belajar membuat aplikasi sederhana serta gim edukatif menggunakan bahasa pemrograman dasar. Jurusan TJKT (Teknik Jaringan Komputer dan Telekomunikasi) mempraktikkan perakitan perangkat jaringan dan uji konektivitas antar-komputer. Sementara itu, siswa DKV (Desain Komunikasi Visual) menyalurkan kreativitasnya melalui pembuatan poster digital bertema “Inovasi dan Kemandirian Siswa SMK”, dan jurusan Broadcasting & Film (BCF) membuat liputan dokumenter tentang seluruh rangkaian kegiatan.\r\n\r\nKepala Sekolah Sir Hendry Kurniawan menyampaikan apresiasinya atas semangat para siswa dan guru yang telah menyukseskan kegiatan tersebut. “Kegiatan kokurikuler ini menjadi ajang siswa untuk mengasah keterampilan nyata di bidangnya masing-masing. Di sinilah mereka belajar memecahkan masalah, bekerja sama, dan menunjukkan kreativitas. Semua ini adalah bagian penting dari pembentukan karakter siswa SMK Prestasi Prima,” tutur Sir Hendry saat meninjau kegiatan di Lab Multimedia. Ia juga menegaskan bahwa meskipun kegiatan berlangsung intens selama satu minggu penuh, jam pulang siswa tetap seperti biasa, agar rutinitas belajar tetap seimbang dan teratur.\r\n\r\nKegiatan kokurikuler ini diakhiri dengan pameran hasil karya siswa dari setiap jurusan, yang menampilkan inovasi dan kreativitas mereka selama proses belajar. Melalui kegiatan ini, SMK Prestasi Prima menegaskan komitmennya untuk mencetak lulusan yang kompeten, berkarakter, dan siap menghadapi dunia kerja maupun pendidikan lanjut.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:04:20'),
                'updated_at' => Carbon::parse('2025-10-19 18:11:55'),
            ],
            [
                'id' => 11,
                'category_id' => 1,
                'title' => 'Ratusan Siswa SMA-SMK Prestasi Prima Hadiri Sosialisasi Jalur Masuk UPNVJ',
                'slug' => 'ratusan-siswa-sma-smk-prestasi-prima-hadiri-sosialisasi-jalur-masuk-upnvj',
                'thumbnail' => 'uploads/thumbnails/1760922640_SMK Prestasi Prima Jakarta Kunjungi Universitas Amikom Membuka Wawasan Dunia Pendidikan Tinggi dan Industri Kreatif.jpeg',
                'excerpt' => null,
                'content' => "Memasuki masa penerimaan mahasiswa baru, Universitas Pembangunan Nasional “Veteran” Jakarta (UPNVJ) kembali menerima undangan sosialisasi tentang jalur masuk UPNVJ yang berlangsung di SMA-SMK Prestasi Prima, Jakarta Timur, pada Senin, 24 Februari 2025.\r\n\r\nTidak hanya ratusan siswa, sosialisasi ini juga dihadiri perwakilan guru dari SMA-SMK Prestasi Prima.\r\n\r\nAntuasiasme luar biasa juga ditunjukkan para siswa/siswi yang serentak menyimak penjelasan dari Kepala Humas UPNVJ Dr Witanti Prihatiningsih dan Anisa Triselia selaku staf Humas UPNVJ saat menjelaskan tentang fakultas juga jalur masuk yang tersedia di UPNVJ.\r\n\r\nAgenda ini bersifat dua arah, sehingga, narasumber dan peserta bisa melakukan tanya jawab seara langsung dengan tujuan membantu siswa memahami proses penerimaan jalur masuk dan memberikan pemahaman komprehensIF kepada siswa tentang tahapan, syarat, dan strategi mengikuti seleksi masuk UPNVJ 2025. \r\n\r\n“Sosialisasi semacam ini penting untuk membantu siswa mempersiapkan diri dengan baik dalam menghadapi seleksi masuk perguruan tinggi. Melalui kegiatan ini, siswa dapat memperoleh informasi yang akurat mengenai prosedur dan mekanisme masuk UPNVJ, serta strategi pemilihan program studi yang mereka minati,” ujar Witanti.\r\n\r\nTidak hanya UPNVJ, puluhan perguruan tinggi negeri dan swasta lainnya juga ikut meramaikan sosialisasi penerimaan mahasiswa baru yang digelar oleh SMA-SMK Prestasi Prima. Diharapkan lewat acara ini, penyebaran informasi dan kepeminatan siswauntuk naik ke jenjang perguruan tinggi dapat meningkat.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:04:51'),
                'updated_at' => Carbon::parse('2025-10-19 18:10:40'),
            ],
            [
                'id' => 12,
                'category_id' => 4,
                'title' => 'Sejarah Baru! Prestasi Prima Akhirnya Tembus Fantastic Four!',
                'slug' => 'sejarah-baru-prestasi-prima-akhirnya-tembus-fantastic-four',
                'thumbnail' => 'uploads/thumbnails/1760922456_(Fantastic Four) SMA Prestasi Prima.jpg',
                'excerpt' => null,
                'content' => "SMA Prestasi Prima berhasil mengamankan tiket Fantastic Four pertama sepanjang sejarah usai menyingkirkan SMA 48 Jakarta (Fourtight) di babak delapan besar Honda DBL with Kopi Good Day 2025 East Jakarta dengan skor akhir 33-18.\r\n\r\nSang kapten, Andrew Destinov Syahailatua (Andrew), menjadi motor kemenangan dengan torehan 8 poin, 4 rebound, dan 1 assist. Ternyata, lolos ke Fantastic Four memang sudah mereka prediksi sejak awal menginjakkan kaki ke lapangan.\r\n\r\nUniknya, pada pertandingan kali ini kunci kemenangan Prestasi Prima justru datang dari pemain yang turun dari bangku cadangan. Hal itu diakui langsung oleh Andrew.\r\n\r\n\"Kunci kemenangannya udah pasti dari bench yang berhasil step up hari ini,\" katanya.\r\n\r\nJarak skor yang tercipta pun terbilang cukup jauh. Menurut Andrew, hal itu tak lepas dari mental pantang kalah yang semakin kuat berkat dorongan motivasi para pemain senior.\r\n\r\n\"Mental gak mau kalah karena setengah dari kita yang last year. Jadi di tahun terakhir kita, kita mau ngasih yang terbaik,\" ujar Andrew.\r\n\r\nSetiap permainan apik yang mereka suguhkan di hadapan penonton tentu lahir dari rangkaian kerja keras.\r\n\r\nAndrew menegaskan bahwa semua pemain Prestasi Prima punya komitmen tinggi terhadap latihan, yang digelar empat kali seminggu selama dua bulan menjelang kompetisi DBL.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:05:24'),
                'updated_at' => Carbon::parse('2025-10-19 18:07:36'),
            ],
            [
                'id' => 13,
                'category_id' => 5,
                'title' => 'SMK Prestasi Prima Terima Program Makan Bergizi Gratis dari Pemerintah',
                'slug' => 'smk-prestasi-prima-terima-program-makan-bergizi-gratis-dari-pemerintah',
                'thumbnail' => 'uploads/thumbnails/1760922613_SMK Prestasi Prima Terima Program Makan Bergizi Gratis dari Pemerintah.jpeg',
                'excerpt' => null,
                'content' => "Jakarta Timur, 19 Oktober 2025 — SMK Prestasi Prima menjadi salah satu sekolah kejuruan yang menerima Program Makan Bergizi Gratis (MBG) dari pemerintah pusat. Program nasional yang digagas oleh Presiden Prabowo Subianto ini resmi diluncurkan di sejumlah sekolah di Jakarta Timur, termasuk SMK Prestasi Prima yang berlokasi di Cilangkap.\r\n\r\nKepala Sekolah SMK Prestasi Prima, Sir Hendry Kurniawan, menyampaikan apresiasinya terhadap program tersebut. “Kami merasa sangat bersyukur dan berterima kasih kepada pemerintah, khususnya Bapak Presiden Prabowo Subianto, atas perhatian besar beliau terhadap pendidikan dan kesehatan siswa,” ujar Sir Hendry saat ditemui di aula sekolah, seusai acara peresmian program. “Program makan bergizi gratis ini bukan sekadar memberikan makanan, tetapi juga energi dan semangat bagi anak-anak kami untuk belajar dan berprestasi lebih baik.”\r\n\r\nSir Hendry juga menegaskan bahwa program MBG memiliki dampak langsung terhadap kualitas pembelajaran siswa. Menurutnya, banyak siswa yang sebelumnya datang ke sekolah tanpa sarapan karena keterbatasan ekonomi. Dengan adanya makanan bergizi setiap hari, siswa kini lebih fokus dan aktif di kelas. “Kami melihat perubahan nyata. Anak-anak lebih bersemangat mengikuti pelajaran, tidak mudah lelah, dan suasana belajar pun menjadi jauh lebih positif. Ini bukti nyata bahwa perhatian terhadap gizi berpengaruh langsung terhadap kualitas pendidikan,” tambahnya.\r\n\r\nSelain SMK Prestasi Prima, beberapa sekolah lain di wilayah Jakarta Timur juga ikut menerima program MBG tahap pertama ini. Setiap sekolah mendapatkan pasokan bahan makanan bergizi, meliputi nasi, lauk pauk, sayuran segar, buah, dan susu. Pemerintah bekerja sama dengan berbagai pihak, termasuk UMKM lokal, untuk memastikan suplai makanan tetap higienis dan memenuhi standar gizi nasional.\r\n\r\n“Harapan kami, program ini terus berjalan dan bahkan ditingkatkan cakupannya. Dengan tubuh sehat dan pikiran kuat, siswa-siswa Indonesia akan siap menjadi generasi emas tahun 2045,” tutup Sir Hendry optimistis.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:06:07'),
                'updated_at' => Carbon::parse('2025-10-19 18:10:13'),
            ],
            [
                'id' => 14,
                'category_id' => 5,
                'title' => 'SMK Prestasi Prima Resmikan Kantin Baru di Belakang Sekolah, Sediakan Meja dan Kursi Nyaman untuk Siswa',
                'slug' => 'smk-prestasi-prima-resmikan-kantin-baru-di-belakang-sekolah-sediakan-meja-dan-kursi-nyaman-untuk-siswa',
                'thumbnail' => 'uploads/thumbnails/1760922592_SMK Prestasi Prima Resmikan Kantin Baru di Belakang Sekolah, Sediakan Meja dan Kursi Nyaman untuk Siswa.jpeg',
                'excerpt' => null,
                'content' => "Jakarta Timur, 4 Oktober 2025 — Dalam upaya meningkatkan kenyamanan dan ketertiban lingkungan sekolah, SMK Prestasi Prima resmi membuka kantin baru yang berlokasi di belakang gedung sekolah. Kehadiran kantin tambahan ini menjadi solusi dari keterbatasan tempat duduk di kantin utama, yang sebelumnya sering membuat siswa makan di lorong-lorong kelas.\r\n\r\nKantin baru tersebut dilengkapi dengan meja dan kursi yang tertata rapi, serta area yang cukup luas untuk menampung lebih banyak siswa saat jam istirahat. Dengan suasana yang lebih terbuka dan nyaman, pihak sekolah berharap kebiasaan makan di tempat yang kurang tepat, seperti di depan kelas atau di tangga, tidak lagi terjadi. “Kami ingin seluruh siswa memiliki tempat yang layak dan bersih untuk makan. Dengan adanya kantin baru ini, aktivitas makan siang bisa lebih tertib, nyaman, dan tentu saja lebih higienis,” ujar Sir Irham, selaku guru bidang Kesiswaan SMK Prestasi Prima.\r\n\r\nSir Irham juga menambahkan bahwa penambahan fasilitas ini merupakan bagian dari pembinaan karakter disiplin dan tanggung jawab siswa. “Kami terus berupaya menciptakan lingkungan belajar yang positif. Salah satu caranya adalah dengan menata ulang area makan siswa agar lebih teratur. Sekolah menyediakan sarana, dan kami berharap siswa pun menjaga kebersihan serta ketertiban bersama,” tuturnya.\r\n\r\nKepala Sekolah Sir Hendry Kurniawan turut menyambut baik inisiatif tersebut. Ia menilai bahwa pembangunan kantin baru ini tidak hanya soal fasilitas, tetapi juga bagian dari upaya membangun budaya sekolah yang sehat dan beretika. “Tempat makan yang baik akan menciptakan kebiasaan yang baik pula. Kami ingin siswa-siswi SMK Prestasi Prima tidak hanya cerdas, tetapi juga berperilaku santun dan menjaga lingkungan sekolah,” ujarnya.\r\n\r\nDengan adanya kantin baru ini, kini siswa-siswi SMK Prestasi Prima memiliki dua area kantin aktif yang siap melayani kebutuhan makan dan minum selama jam istirahat. Suasana sekolah pun terlihat lebih tertib dan nyaman, mendukung semangat belajar setiap harinya.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:06:47'),
                'updated_at' => Carbon::parse('2025-10-19 18:09:52'),
            ],
            [
                'id' => 16,
                'category_id' => 2,
                'title' => 'SMK Prestasi Prima Kembangkan Sistem Absensi Digital Berbasis ID Card Multifungsi',
                'slug' => 'smk-prestasi-prima-kembangkan-sistem-absensi-digital-berbasis-id-card-multifungsi',
                'thumbnail' => 'uploads/thumbnails/1760922561_SMK Prestasi Prima Kembangkan Sistem Absensi Digital Berbasis ID Card Multifungsi.jpeg',
                'excerpt' => null,
                'content' => "Inovasi digital kembali hadir dari siswa dan guru SMK Prestasi Prima, Jakarta Timur. Kali ini, tim teknologi sekolah berhasil mengembangkan sebuah sistem absensi otomatis berbasis ID Card elektronik (e-ID) yang multifungsi. Sistem ini tidak hanya digunakan untuk kehadiran siswa, tetapi juga terintegrasi dengan sistem pembayaran non-tunai dan fungsi transportasi publik layaknya e-money.\r\n\r\nPerangkat utama dari sistem ini berupa box absensi digital, yaitu kotak pintar yang dilengkapi sensor RFID (Radio Frequency Identification). Di dalam setiap kartu identitas siswa, terdapat chip yang mampu melakukan tap-in ke perangkat tersebut. Saat siswa menempelkan ID Card mereka di permukaan box, sistem langsung merekam waktu kedatangan dan pulang secara otomatis ke database sekolah. Teknologi ini juga dirancang agar terhubung dengan jaringan Wi-Fi sekolah, sehingga data absensi bisa dipantau secara real-time oleh guru dan wali kelas melalui dashboard khusus.\r\n\r\nYang membuat sistem ini unik adalah fungsi ganda yang dimiliki oleh ID Card siswa. Kartu tersebut tidak hanya berfungsi untuk absensi, tetapi juga bisa digunakan layaknya e-money, seperti untuk membayar transportasi umum (TransJakarta, MRT, dan tol), serta bertransaksi di kantin sekolah. “Kami ingin menciptakan satu kartu serbaguna yang tidak hanya memudahkan kehadiran, tetapi juga mendukung gaya hidup digital siswa,” ujar Sir Ilham, guru pembimbing dari jurusan Teknik Jaringan Komputer dan Telekomunikasi (TJKT) yang turut memimpin proyek ini.\r\n\r\nProyek sistem absensi digital ini dikembangkan oleh tim gabungan dari jurusan PPLG (Pengembangan Perangkat Lunak dan Gim) dan TJKT, dengan melibatkan siswa dalam seluruh tahap pembuatan — mulai dari pemrograman database, desain perangkat keras, hingga integrasi dengan sistem pembayaran digital. Kepala sekolah, Sir Hendry Kurniawan, menyampaikan bahwa inovasi seperti ini adalah bukti nyata dari penerapan kurikulum berbasis proyek di SMK Prestasi Prima. “Kami ingin siswa belajar bukan hanya teori, tetapi juga bagaimana teknologi dapat diterapkan untuk kebutuhan nyata sekolah dan masyarakat,” ujarnya.\r\n\r\nSistem absensi berbasis ID Card multifungsi ini rencananya akan mulai diuji coba di lingkungan sekolah pada semester berikutnya. Dengan penerapan teknologi ini, SMK Prestasi Prima berharap dapat menjadi pelopor sistem sekolah cerdas (smart school) di wilayah Jakarta Timur, sekaligus mendukung gerakan cashless society dan efisiensi administrasi pendidikan berbasis digital.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:07:39'),
                'updated_at' => Carbon::parse('2025-10-19 18:09:21'),
            ],
            [
                'id' => 17,
                'category_id' => 4,
                'title' => 'Ultras Presma Raih Juara 1 Most Favorite Supporter DBL 2025 East Jakarta',
                'slug' => 'ultras-presma-raih-juara-1-most-favorite-supporter-dbl-2025-east-jakarta',
                'thumbnail' => 'uploads/thumbnails/1760922540_images (1).jfif',
                'excerpt' => null,
                'content' => "Prestasi membanggakan kembali diraih oleh Ultras Presma! Dalam ajang DBL 2025 East Jakarta, SMA Prestasi Prima Jakarta berhasil meraih Juara 1 Most Favorite Supporter berkat semangat, kreativitas, dan kekompakan luar biasa dari seluruh anggota Ultras Presma.\r\n\r\nDengan yel-yel penuh energi, koreografi megah, dan semangat yang membara, Ultras Presma berhasil menciptakan atmosfer yang luar biasa di setiap pertandingan. Mereka bukan hanya sekadar suporter, tetapi juga simbol kebanggaan, solidaritas, dan identitas kuat SMA Prestasi Prima Jakarta.\r\n\r\nGelar ini menjadi bukti nyata bahwa dukungan tulus dan kebersamaan dapat membawa prestasi, bukan hanya di lapangan, tetapi juga di luar arena pertandingan. Semangat “To Get Her I Can’t, But Together We Can” benar-benar hidup di setiap teriakan dan langkah Ultras Presma, menjadikan mereka inspirasi bagi seluruh siswa untuk terus berprestasi dan menjaga kekompakan.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:10:06'),
                'updated_at' => Carbon::parse('2025-10-19 18:09:00'),
            ],
            [
                'id' => 20,
                'category_id' => 2,
                'title' => 'Pekan Kokurikuler SMK Prestasi Prima 2025',
                'slug' => 'pekan-kokurikuler-smk-prestasi-prima-2025',
                'thumbnail' => 'uploads/thumbnails/1760922515_Pekan Kokurikuler SMK Prestasi Prima 2025.webp',
                'excerpt' => null,
                'content' => "Pekan Kokurikuler SMK Prestasi Prima 2025 merupakan rangkaian kegiatan pembelajaran berbasis proyek dan kreativitas yang melibatkan seluruh siswa kelas X dan XI dari berbagai jurusan — PPLG, TJKT, DKV, dan BCF.\r\n\r\nKegiatan ini bertujuan untuk mengasah kemampuan kolaboratif, inovatif, serta penerapan ilmu yang telah dipelajari di kelas ke dalam bentuk nyata. Selama lima hari pelaksanaan, siswa berpartisipasi dalam berbagai proyek, presentasi, dan kegiatan kolaborasi lintas jurusan yang mendorong kreativitas serta pengembangan soft skill.\r\n\r\nMelalui Pekan Kokurikuler, SMK Prestasi Prima berkomitmen menumbuhkan karakter mandiri, berintegritas, dan siap bersaing di dunia industri serta masyarakat global.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:10:55'),
                'updated_at' => Carbon::parse('2025-10-19 18:08:35'),
            ],
            [
                'id' => 21,
                'category_id' => 1,
                'title' => 'SMK Prestasi Prima: Sekolah Berakreditasi A dengan Komitmen Mutu dan Inovasi Pendidikan',
                'slug' => 'smk-prestasi-prima-sekolah-berakreditasi-a-dengan-komitmen-mutu-dan-inovasi-pendidikan',
                'thumbnail' => 'uploads/thumbnails/1760922479_SMK Prestasi Prima Sekolah Berakreditasi A dengan Komitmen Mutu dan Inovasi Pendidikan.jpeg',
                'excerpt' => null,
                'content' => "SMK Prestasi Prima merupakan salah satu sekolah kejuruan unggulan di Jakarta Timur yang telah meraih akreditasi “A” dari Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M). Pencapaian ini menegaskan kualitas tinggi yang dimiliki sekolah, baik dalam bidang manajemen, proses pembelajaran, tenaga pendidik, maupun sarana dan prasarana yang tersedia. Akreditasi “A” menjadi bukti konkret bahwa SMK Prestasi Prima telah memenuhi seluruh standar mutu pendidikan nasional dengan hasil yang sangat memuaskan.\r\n\r\nBerlokasi di Jalan Hankam Raya No. 89, Cilangkap, Cipayung, Jakarta Timur, SMK Prestasi Prima berdiri di bawah naungan Yayasan Wahana Prestasi Prima. Sekolah ini dikenal luas sebagai SMK berbasis Teknologi Informasi dan Komunikasi (ICT) terbaik di Jakarta Timur. Dengan luas area lebih dari 6.000 meter persegi, sekolah ini dilengkapi dengan berbagai fasilitas modern seperti laboratorium komputer, studio broadcasting, laboratorium jaringan, serta ruang desain kreatif yang mendukung proses pembelajaran berbasis praktik industri.\r\n\r\nSMK Prestasi Prima memiliki beberapa program keahlian unggulan, di antaranya Pengembangan Perangkat Lunak dan Gim (PPLG), Teknik Jaringan Komputer dan Telekomunikasi (TJKT), Desain Komunikasi Visual (DKV), dan Broadcasting & Film (BCF). Setiap jurusan dirancang agar siswa mampu bersaing di dunia industri 4.0 yang menuntut keterampilan teknologi, komunikasi, dan kreativitas tingkat tinggi. Melalui pendekatan “learning by doing”, siswa tidak hanya diajarkan teori, tetapi juga praktik langsung dalam proyek dan kolaborasi lintas jurusan.\r\n\r\nKepala sekolah, Sir Hendry Kurniawan, menyampaikan bahwa keberhasilan meraih akreditasi “A” bukanlah tujuan akhir, melainkan awal dari komitmen untuk terus berinovasi. “Kami tidak berhenti di angka akreditasi. Fokus kami adalah memastikan setiap lulusan SMK Prestasi Prima memiliki karakter kuat, kemampuan teknis yang relevan, dan semangat untuk terus berkembang,” ujarnya dalam sambutan kegiatan akademik sekolah.\r\n\r\nKeberhasilan ini turut didukung oleh sistem manajemen mutu yang terencana, pembinaan guru secara berkelanjutan, serta kolaborasi dengan industri dan perguruan tinggi. Dengan akreditasi “A” dan reputasi sebagai sekolah berbasis ICT, SMK Prestasi Prima telah menjadi sekolah rujukan dan inspirasi bagi lembaga pendidikan kejuruan lainnya di Indonesia.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:13:00'),
                'updated_at' => Carbon::parse('2025-10-19 18:07:59'),
            ],
            [
                'id' => 23,
                'category_id' => 3,
                'title' => 'Hindia Ramaikan Pembukaan Exponer 2025 di SMK Prestasi Prima',
                'slug' => 'hindia-ramaikan-pembukaan-exponer-2025-di-smk-prestasi-prima',
                'thumbnail' => 'uploads/thumbnails/1760922295_Hindia Ramaikan Pembukaan Exponer 2025 di SMK Prestasi Prima.jpeg',
                'excerpt' => null,
                'content' => "Jakarta Timur, 14 Oktober 2025 — Suasana halaman SMK Prestasi Prima sore itu berubah menjadi lautan sorak dan tepuk tangan saat penyanyi kenamaan Indonesia, Hindia, naik ke atas panggung membawakan lagu andalannya untuk membuka acara Exponer 2025. Acara tahunan bergengsi ini menjadi wadah kreativitas dan kompetisi bagi para siswa SMP se-Jabodetabek, yang diadakan oleh SMA dan SMK Prestasi Prima sebagai bentuk kontribusi terhadap dunia pendidikan dan pengembangan bakat generasi muda.\r\n\r\nExponer 2025 mengusung tema “Explore Your Future Through Innovation and Art”, dengan berbagai lomba antar-SMP seperti kompetisi desain poster digital, futsal, tari modern, dan coding challenge. Kegiatan ini berlangsung di area terpadu SMA–SMK Prestasi Prima, Jakarta Timur, selama lima hari penuh. Pembukaan acara tahun ini menjadi momen istimewa karena menghadirkan Hindia, musisi muda dengan lagu-lagu penuh makna yang digemari oleh banyak pelajar. Dengan lagu seperti Evaluasi, Secukupnya, dan Wejangan Mama, Hindia berhasil menciptakan suasana hangat, penuh semangat, dan inspiratif.\r\n\r\nKepala Sekolah SMK Prestasi Prima, Sir Hendry Kurniawan, menyampaikan rasa terima kasih atas kehadiran Hindia dalam pembukaan Exponer 2025. “Kami ingin menunjukkan bahwa sekolah bukan hanya tempat belajar akademik, tetapi juga ruang bagi siswa untuk berkembang, berekspresi, dan menemukan potensi mereka. Kehadiran Hindia menjadi simbol bahwa kreativitas dan pendidikan bisa berjalan beriringan,” ujarnya dalam sambutan resmi.\r\n\r\nSelain konser pembuka, Exponer 2025 juga menghadirkan berbagai bazar karya siswa, pameran teknologi, dan booth interaktif dari jurusan PPLG, TJKT, DKV, serta Broadcasting & Film. Para pengunjung, terutama peserta dari SMP, diajak untuk mengenal lebih dekat dunia pendidikan kejuruan dan teknologi yang dikembangkan oleh SMK Prestasi Prima.\r\n\r\nAcara berjalan meriah namun tetap tertib, dengan dukungan penuh dari tim OSIS, guru pembina, dan seluruh panitia sekolah. Penampilan Hindia pun menutup hari pertama dengan pesan penuh motivasi:\r\n\r\n“Jangan pernah takut gagal di usia muda. Justru di sinilah kalian punya ruang untuk mencoba sebanyak-banyaknya,” ujar Hindia di tengah penampilannya, disambut tepuk tangan panjang dari para peserta.\r\n\r\nDengan konser pembuka yang spektakuler ini, Exponer 2025 resmi dibuka — menjadi awal dari pekan kompetisi yang seru, edukatif, dan penuh semangat kolaborasi antar pelajar. SMK Prestasi Prima kembali membuktikan diri sebagai sekolah yang tidak hanya unggul dalam teknologi, tetapi juga peduli pada pengembangan karakter dan kreativitas generasi muda.",
                'published_at' => null,
                'created_at' => Carbon::parse('2025-10-19 13:13:47'),
                'updated_at' => Carbon::parse('2025-10-19 18:04:55'),
            ],
        ]);
    }
}