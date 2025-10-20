<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
                    'role' => 'company',
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
}
