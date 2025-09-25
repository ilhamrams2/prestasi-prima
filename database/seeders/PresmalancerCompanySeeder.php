<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class PresmalancerCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'company_name' => 'PT Prestasi Prima',
            'industry'     => 'Education',
            'website'      => 'https://prestasiprima.sch.id',
            'description'  => 'Sekolah unggulan dengan program digital.',
            'address'      => 'Jakarta, Indonesia',
        ]);

        Company::create([
            'company_name' => 'Orens Solution',
            'industry'     => 'Technology',
            'website'      => 'https://orenssolution.com',
            'description'  => 'Startup IT yang fokus di software dan AI.',
            'address'      => 'Depok, Indonesia',
        ]);
    }
}
