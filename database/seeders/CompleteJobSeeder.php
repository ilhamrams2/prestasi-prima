<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;
use Carbon\Carbon;

class CompleteJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all companies
        $companies = Company::all();

        if ($companies->isEmpty()) {
            $this->command->error('❌ No companies found! Please run CompanySeeder first.');
            $this->command->info('Run: php artisan db:seed --class=CompanySeeder');
            return;
        }

        $jobs = [
            // PT Teknologi Maju Jobs
            [
                'company_id' => $companies->where('name', 'PT Teknologi Maju')->first()->id ?? 1,
                'title' => 'Senior Full Stack Developer',
                'description' => 'Kami mencari Senior Full Stack Developer yang berpengalaman untuk bergabung dengan tim kami. Kandidat ideal memiliki pemahaman mendalam tentang React, Laravel, dan arsitektur microservices. Anda akan bertanggung jawab untuk mengembangkan dan maintain aplikasi web yang scalable dan performant.',
                'requirements' => 'React, Laravel, PostgreSQL, Docker, AWS, Git, Microservices, 3+ years experience, Bachelor degree in Computer Science',
                'location' => 'Jakarta Selatan',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 15-22 juta',
                'deadline' => Carbon::now()->addDays(30),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'PT Teknologi Maju')->first()->id ?? 1,
                'title' => 'Backend Developer',
                'description' => 'Posisi Backend Developer untuk mengembangkan API dan sistem backend yang scalable. Pengalaman dengan Laravel dan database optimization sangat diutamakan. Anda akan bekerja dengan tim yang dinamis dan teknologi terkini.',
                'requirements' => 'PHP, Laravel, MySQL, RESTful API, Redis, Queues, 2+ years experience',
                'location' => 'Jakarta Selatan',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 10-15 juta',
                'deadline' => Carbon::now()->addDays(25),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'PT Teknologi Maju')->first()->id ?? 1,
                'title' => 'DevOps Engineer',
                'description' => 'Kami membutuhkan DevOps Engineer untuk mengelola infrastructure dan CI/CD pipeline. Kandidat harus memiliki pengalaman dengan cloud platforms dan containerization.',
                'requirements' => 'Docker, Kubernetes, AWS, Jenkins, Linux, Monitoring, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 12-18 juta',
                'deadline' => Carbon::now()->addDays(28),
                'is_active' => true,
            ],

            // Startup Digital Indonesia Jobs
            [
                'company_id' => $companies->where('name', 'Startup Digital Indonesia')->first()->id ?? 2,
                'title' => 'UI/UX Designer',
                'description' => 'Bergabunglah dengan tim kreatif kami sebagai UI/UX Designer. Anda akan bertanggung jawab merancang interface yang user-friendly dan engaging untuk berbagai platform digital. Portfolio yang strong sangat diperlukan.',
                'requirements' => 'Figma, Adobe XD, Prototyping, User Research, Wireframing, Portfolio required, 1+ years experience',
                'location' => 'Bandung',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 8-12 juta',
                'deadline' => Carbon::now()->addDays(20),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'Startup Digital Indonesia')->first()->id ?? 2,
                'title' => 'Frontend Developer',
                'description' => 'Kami mencari Frontend Developer yang passionate dengan teknologi terkini. Kandidat harus mahir React dan memiliki eye for design. Pengalaman dengan TypeScript dan modern CSS frameworks akan menjadi nilai plus.',
                'requirements' => 'React, TypeScript, Tailwind CSS, Git, Responsive Design, 1+ years experience',
                'location' => 'Bandung',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 7-11 juta',
                'deadline' => Carbon::now()->addDays(28),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'Startup Digital Indonesia')->first()->id ?? 2,
                'title' => 'Mobile Developer (React Native)',
                'description' => 'Posisi Mobile Developer untuk mengembangkan aplikasi mobile dengan React Native. Pengalaman dengan native modules dan optimization sangat diutamakan.',
                'requirements' => 'React Native, JavaScript, iOS, Android, Redux, REST API, 2+ years experience',
                'location' => 'Remote',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 9-14 juta',
                'deadline' => Carbon::now()->addDays(22),
                'is_active' => true,
            ],

            // PT Kreatif Media Jobs
            [
                'company_id' => $companies->where('name', 'PT Kreatif Media')->first()->id ?? 3,
                'title' => 'Content Creator',
                'description' => 'Mencari content creator kreatif untuk membuat konten video dan foto untuk social media. Pengalaman dengan editing software dan understanding tentang social media trends diperlukan.',
                'requirements' => 'Video Editing, Photography, Social Media, Creativity, Adobe Suite, Content Strategy',
                'location' => 'Yogyakarta',
                'job_type' => 'Freelance',
                'salary_range' => 'Rp 5-8 juta',
                'deadline' => Carbon::now()->addDays(15),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'PT Kreatif Media')->first()->id ?? 3,
                'title' => 'Video Editor',
                'description' => 'Posisi Video Editor untuk membuat konten video berkualitas tinggi. Pengalaman dengan motion graphics dan color grading akan menjadi nilai tambah.',
                'requirements' => 'After Effects, Premiere Pro, Motion Graphics, Color Grading, Storytelling, Portfolio required',
                'location' => 'Yogyakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 6-9 juta',
                'deadline' => Carbon::now()->addDays(22),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'PT Kreatif Media')->first()->id ?? 3,
                'title' => 'Graphic Designer',
                'description' => 'Kami membutuhkan Graphic Designer untuk membuat visual design yang menarik. Kandidat harus memiliki creativity tinggi dan portfolio yang strong.',
                'requirements' => 'Adobe Illustrator, Photoshop, InDesign, Branding, Typography, Portfolio required',
                'location' => 'Yogyakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 5-8 juta',
                'deadline' => Carbon::now()->addDays(18),
                'is_active' => true,
            ],

            // PT Telkom Indonesia Jobs
            [
                'company_id' => $companies->where('name', 'PT Telkom Indonesia')->first()->id ?? 4,
                'title' => 'Data Analyst',
                'description' => 'Bergabung dengan tim Data untuk menganalisis data dan memberikan insights bisnis. Pengalaman dengan SQL dan data visualization tools sangat diutamakan.',
                'requirements' => 'SQL, Python, Tableau, Power BI, Statistics, Data Analysis, 1+ years experience',
                'location' => 'Jakarta Pusat',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 8-12 juta',
                'deadline' => Carbon::now()->addDays(25),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'PT Telkom Indonesia')->first()->id ?? 4,
                'title' => 'Network Engineer',
                'description' => 'Posisi Network Engineer untuk mengelola dan maintain infrastruktur jaringan. Kandidat harus memiliki sertifikasi networking dan pengalaman yang relevan.',
                'requirements' => 'Networking, Cisco, Routing, Switching, CCNA, Troubleshooting, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 9-13 juta',
                'deadline' => Carbon::now()->addDays(20),
                'is_active' => true,
            ],

            // Tokopedia Jobs
            [
                'company_id' => $companies->where('name', 'Tokopedia')->first()->id ?? 5,
                'title' => 'Software Engineer',
                'description' => 'Join Tokopedia sebagai Software Engineer. Anda akan bekerja dengan teknologi terkini dan scale yang besar. Fresh graduate welcome to apply!',
                'requirements' => 'Java, Golang, Kotlin, Microservices, SQL, Git, Algorithm, Data Structure',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 12-18 juta',
                'deadline' => Carbon::now()->addDays(30),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'Tokopedia')->first()->id ?? 5,
                'title' => 'Product Manager',
                'description' => 'Kami mencari Product Manager yang passionate dalam membangun produk digital. Kandidat harus memiliki understanding yang baik tentang user needs dan business metrics.',
                'requirements' => 'Product Management, Agile, User Research, Data Analysis, Communication, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 15-22 juta',
                'deadline' => Carbon::now()->addDays(28),
                'is_active' => true,
            ],

            // Gojek Jobs
            [
                'company_id' => $companies->where('name', 'Gojek Indonesia')->first()->id ?? 6,
                'title' => 'Android Developer',
                'description' => 'Posisi Android Developer untuk mengembangkan fitur-fitur baru di aplikasi Gojek. Kandidat harus memiliki passion dalam mobile development.',
                'requirements' => 'Kotlin, Java, Android SDK, MVVM, RxJava, Git, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 12-18 juta',
                'deadline' => Carbon::now()->addDays(25),
                'is_active' => true,
            ],
            [
                'company_id' => $companies->where('name', 'Gojek Indonesia')->first()->id ?? 6,
                'title' => 'iOS Developer',
                'description' => 'Join Gojek sebagai iOS Developer. Anda akan mengembangkan aplikasi iOS dengan performa tinggi dan user experience yang excellent.',
                'requirements' => 'Swift, iOS SDK, UIKit, SwiftUI, XCode, Git, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 12-18 juta',
                'deadline' => Carbon::now()->addDays(27),
                'is_active' => true,
            ],

            // Bank BCA Jobs
            [
                'company_id' => $companies->where('name', 'Bank BCA')->first()->id ?? 7,
                'title' => 'Java Developer',
                'description' => 'Posisi Java Developer untuk mengembangkan aplikasi banking. Kandidat harus memiliki understanding tentang security dan transaction processing.',
                'requirements' => 'Java, Spring Boot, SQL, Security, Clean Code, 2+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 10-15 juta',
                'deadline' => Carbon::now()->addDays(30),
                'is_active' => true,
            ],

            // PT Astra International Jobs
            [
                'company_id' => $companies->where('name', 'PT Astra International')->first()->id ?? 8,
                'title' => 'Business Analyst',
                'description' => 'Kami mencari Business Analyst untuk menganalisis business process dan memberikan rekomendasi improvement. Kandidat harus memiliki analytical thinking yang kuat.',
                'requirements' => 'Business Analysis, Process Improvement, SQL, Documentation, Communication, 1+ years experience',
                'location' => 'Jakarta',
                'job_type' => 'Full Time',
                'salary_range' => 'Rp 8-12 juta',
                'deadline' => Carbon::now()->addDays(23),
                'is_active' => true,
            ],
        ];

        $successCount = 0;
        foreach ($jobs as $jobData) {
            try {
                Job::create($jobData);
                $successCount++;
            } catch (\Exception $e) {
                $this->command->warn("Failed to create job: {$jobData['title']} - {$e->getMessage()}");
            }
        }

        $this->command->info("✅ {$successCount} jobs seeded successfully!");
    }
}