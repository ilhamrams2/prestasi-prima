<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\prestasiprima\Industri;

class PrestasiprimaIndustriSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data industri dan gambar dummy.
     */
    public function run(): void
    {
        // Lokasi folder sumber gambar dummy
        $source = public_path('industri_dummy');

        // Lokasi folder tujuan tempat gambar akan disalin
        $destination = public_path('storage/industri');

        // Jika folder tujuan belum ada, buat otomatis
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        // Pastikan folder sumber ada sebelum menyalin
        if (File::exists($source)) {
            $files = File::files($source);

            // Salin setiap file ke folder tujuan
            foreach ($files as $file) {
                File::copy($file->getPathname(), $destination . '/' . $file->getFilename());
            }
        } else {
            $this->command->warn("⚠️ Folder sumber tidak ditemukan: $source");
        }

        // Hapus data lama supaya tidak duplikat (opsional)
        Industri::truncate();

        // Tambahkan data industri otomatis berdasarkan file
        foreach ($files as $file) {
            $name = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            Industri::create([
                'nama' => ucfirst($name),
                'slug' => strtolower($name),
                'logo' => 'industri/' . $file->getFilename(),
            ]);
        }

        $this->command->info('✅ Seeder PrestasiprimaIndustriSeeder berhasil dijalankan!');
    }
}
