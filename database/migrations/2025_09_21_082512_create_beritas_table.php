<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // judul berita
            $table->string('kategori')->nullable(); // kategori berita
            $table->date('tanggal_upload')->nullable(); // tanggal upload/setoran
            $table->text('isi'); // isi/keterangan berita
            $table->string('gambar')->nullable(); // path gambar berita
            $table->string('penulis')->nullable(); // nama penulis
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};