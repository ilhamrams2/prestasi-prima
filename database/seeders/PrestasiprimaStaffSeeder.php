<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\prestasiprima\Staff;

class PrestasiprimaStaffSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data staff dan gambar dummy.
     */
    public function run(): void
    {
        $source = public_path('staff_dummy');        // Folder sumber
        $destination = public_path('storage/staff'); // Folder tujuan storage

        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        if (!File::exists($source)) {
            $this->command->warn("⚠️ Folder sumber tidak ditemukan: $source");
            return;
        }

        $files = File::files($source);

        if (empty($files)) {
            $this->command->warn("⚠️ Tidak ada file di folder sumber: $source");
            return;
        }

        // Hapus data lama
        Staff::truncate();

        // Pastikan kepala sekolah selalu ada
        $kepalaFile = collect($files)->first(function($file){
            return stripos($file->getFilename(), 'kepala') !== false;
        });

        if ($kepalaFile) {
            $filename = $kepalaFile->getFilename();
            $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);

            File::copy($kepalaFile->getPathname(), $destination . '/' . $filename);

            Staff::create([
                'nama' => ucwords(str_replace(['-', '_'], ' ', $nameWithoutExt)),
                'jabatan' => 'Kepala Sekolah',
                'kategori' => 'kepala',
                'foto' => $filename,
                'kutipan' => 'Pendidikan bukan hanya tentang ilmu pengetahuan, tetapi tentang membangun karakter dan mencetak generasi yang siap menghadapi masa depan dengan akhlak mulia.',
            ]);
        }

        // Loop untuk semua file lainnya
        foreach ($files as $file) {
            $filename = $file->getFilename();
            if ($kepalaFile && $filename === $kepalaFile->getFilename()) continue; // skip kepala sekolah

            $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);

            File::copy($file->getPathname(), $destination . '/' . $filename);

            // Tentukan kategori
            $kategori = 'guru_mapel';
            $jabatan = 'Guru Mapel';
            $kutipan = null;

            if (stripos($nameWithoutExt, 'kapro') !== false) {
                $kategori = 'kaprog';
                $jabatan = 'Kepala Program Keahlian';
            } elseif (stripos($nameWithoutExt, 'kesiswaan') !== false) {
                $kategori = 'kesiswaan';
                $jabatan = 'Staff Kesiswaan';
            }

            Staff::create([
                'nama' => ucwords(str_replace(['-', '_'], ' ', $nameWithoutExt)),
                'jabatan' => $jabatan,
                'kategori' => $kategori,
                'foto' => $filename,
                'kutipan' => $kutipan,
            ]);
        }

        $this->command->info('✅ Seeder PrestasiprimaStaffSeeder berhasil dijalankan!');
    }
}
