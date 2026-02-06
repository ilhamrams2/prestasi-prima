<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\prestasiprima\MikrotikTrainer;
use App\Models\prestasiprima\MikrotikCertificate;

class MikrotikTrainerSeeder extends Seeder
{
    public function run()
    {
        $trainer = MikrotikTrainer::create([
            'name' => 'Achmad Maulana',
            'title' => 'S.Kom.',
            'role' => 'Certified Pro Instructor',
            'description' => 'Membimbing generasi muda menguasai Network Engineering Internasional.',
            'photo' => 'lana.jpeg',
            'is_active' => true,
        ]);

        $trainer->certificates()->create([
            'title' => 'MTCNA Certified',
            'verify_id' => 'PP-MTCNA-2024',
            'image' => 'sertifikat.jpeg',
        ]);
    }
}
