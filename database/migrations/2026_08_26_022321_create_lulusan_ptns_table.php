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
        Schema::create('prestasiprima_lulusan_ptns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kampus');
            $table->string('singkatan')->nullable();
            $table->string('logo');
            $table->string('link_website')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_lulusan_ptns');
    }
};
