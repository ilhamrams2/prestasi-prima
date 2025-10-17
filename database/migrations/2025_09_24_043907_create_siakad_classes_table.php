<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siakad_classes', function (Blueprint $table) {
            $table->id();

            // Relasi ke jurusan
            $table->foreignId('major_id')->constrained('siakad_majors')->cascadeOnDelete();

            // Relasi ke wali kelas (guru)
            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained('siakad_teachers')
                ->nullOnDelete(); // jika guru dihapus, wali kelas jadi null

            // Kelas per tingkat
            $table->string('grade', 10)->nullable(); // contoh: 10, 11, 12
            $table->string('group_number', 10)->nullable(); // contoh: 1, 2

            // Nama lengkap kelas (gabungan grade + jurusan + group)
            $table->string('name', 100); // contoh: 10 PPLG 1

            // Kode kelas unik
            $table->string('class_code', 50)->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siakad_classes');
    }
};
