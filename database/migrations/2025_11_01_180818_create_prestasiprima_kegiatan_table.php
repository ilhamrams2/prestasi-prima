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
        Schema::create('prestasiprima_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('jam');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('tempat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_kegiatan');
    }
};
