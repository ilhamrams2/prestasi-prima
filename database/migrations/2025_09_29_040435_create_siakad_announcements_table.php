<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('siakad_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Judul pengumuman
            $table->text('content');              // Isi pengumuman
            $table->string('priority')->nullable();  // Prioritas (Tinggi, Sedang, Rendah)
            $table->string('category')->nullable();  // Kategori (Akademik, Acara, dll.)
            $table->unsignedBigInteger('user_id')->nullable(); // pembuat pengumuman (optional)
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_announcements');
    }
};
