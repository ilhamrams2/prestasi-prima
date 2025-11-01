<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\prestasiprima\Prestasi;

class PrestasiprimaPrestasiSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data prestasi dan gambar dummy.
     */
    public function run(): void
    {
        // Lokasi folder sumber gambar dummy (pastikan folder ini ada)
        $source = public_path('assets/images/prestasi_dummy');

        // Lokasi folder tujuan tempat gambar akan disalin
        $destination = public_path('storage/prestasi');

        // Jika folder tujuan belum ada, buat secara otomatis
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        // Pastikan folder sumber ada sebelum menyalin
        if (File::exists($source)) {
            // Ambil semua file di folder sumber
            $files = File::files($source);

            // Salin setiap file ke folder tujuan
            foreach ($files as $file) {
                File::copy($file->getPathname(), $destination . '/' . $file->getFilename());
            }
        } else {
            $this->command->warn("⚠️ Folder sumber tidak ditemukan: $source");
        }

        // Hapus semua data lama (opsional, bisa kamu matikan kalau tidak ingin hapus)
        Prestasi::truncate();

        // Tambahkan 21 data dummy prestasi
        for ($i = 1; $i <= 21; $i++) {
            Prestasi::create([
                'judul' => 'Judul ' . $i,
                'deskripsi' => 'Deskripsi ' . $i,
                'gambar' => 'prestasi/' . $i . '.webp',
            ]);
        }

        $this->command->info('✅ Seeder PrestasiprimaPrestasiSeeder berhasil dijalankan!');
    }
}
