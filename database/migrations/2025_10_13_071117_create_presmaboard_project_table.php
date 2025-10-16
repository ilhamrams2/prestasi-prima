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
        Schema::create('presmaboard_project', function (Blueprint $table) {
               $table->id();
            $table->foreignId('student_id')->constrained('presmaboard_students')->onDelete('cascade');
            $table->string('judul_project');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
    $table->enum('jurusan', ['pplg', 'dkv', 'tkj', 'bcf']); // supaya fix 4 jurusan
    $table->string('kategori', 100)->nullable(); // ambil dari config(‘portfolio’)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmaboard_project');
    }
};