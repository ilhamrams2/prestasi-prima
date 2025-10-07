<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'PT Teknologi Maju',
                'company_name' => 'PT Teknologi Maju',
                'description' => 'Perusahaan teknologi terdepan di Indonesia yang fokus pada pengembangan software enterprise dan solusi digital untuk berbagai industri.',
                'industry' => 'Technology',
                'location' => 'Jakarta Selatan',
                'email' => 'info@teknologimaju.com',
                'phone' => '021-12345678',
                'website' => 'https://teknologimaju.com',
            ],
            [
                'name' => 'Startup Digital Indonesia',
                'company_name' => 'Startup Digital Indonesia',
                'description' => 'Startup yang fokus pada solusi digital inovatif untuk membantu UMKM berkembang di era digital.',
                'industry' => 'Technology',
                'location' => 'Bandung',
                'email' => 'hello@startupdigital.id',
                'phone' => '022-87654321',
                'website' => 'https://startupdigital.id',
            ],
            [
                'name' => 'PT Kreatif Media',
                'company_name' => 'PT Kreatif Media',
                'description' => 'Agensi kreatif dan media yang menghadirkan konten berkualitas dan strategi marketing yang efektif.',
                'industry' => 'Creative & Marketing',
                'location' => 'Yogyakarta',
                'email' => 'contact@kreatifmedia.com',
                'phone' => '0274-123456',
                'website' => 'https://kreatifmedia.com',
            ],
            [
                'name' => 'PT Telkom Indonesia',
                'company_name' => 'PT Telkom Indonesia',
                'description' => 'Perusahaan telekomunikasi terbesar di Indonesia dengan layanan yang komprehensif.',
                'industry' => 'Telecommunications',
                'location' => 'Jakarta Pusat',
                'email' => 'recruitment@telkom.co.id',
                'phone' => '021-52990000',
                'website' => 'https://telkom.co.id',
            ],
            [
                'name' => 'Tokopedia',
                'company_name' => 'Tokopedia',
                'description' => 'Marketplace terkemuka di Indonesia yang menghubungkan jutaan penjual dan pembeli.',
                'industry' => 'E-Commerce',
                'location' => 'Jakarta',
                'email' => 'careers@tokopedia.com',
                'phone' => '021-50866886',
                'website' => 'https://tokopedia.com',
            ],
            [
                'name' => 'Gojek Indonesia',
                'company_name' => 'Gojek Indonesia',
                'description' => 'Super app yang menyediakan berbagai layanan dari transportasi hingga pembayaran digital.',
                'industry' => 'Technology',
                'location' => 'Jakarta',
                'email' => 'careers@gojek.com',
                'phone' => '021-50888999',
                'website' => 'https://gojek.com',
            ],
            [
                'name' => 'Bank BCA',
                'company_name' => 'Bank BCA',
                'description' => 'Bank swasta terbesar di Indonesia dengan jaringan ATM dan cabang yang luas.',
                'industry' => 'Banking & Finance',
                'location' => 'Jakarta',
                'email' => 'recruitment@bca.co.id',
                'phone' => '021-23588000',
                'website' => 'https://bca.co.id',
            ],
            [
                'name' => 'PT Astra International',
                'company_name' => 'PT Astra International',
                'description' => 'Konglomerat terkemuka dengan portofolio bisnis yang beragam.',
                'industry' => 'Conglomerate',
                'location' => 'Jakarta',
                'email' => 'hrd@astra.co.id',
                'phone' => '021-50888000',
                'website' => 'https://astra.co.id',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }

        $this->command->info('✅ ' . count($companies) . ' companies seeded successfully!');
    }
}