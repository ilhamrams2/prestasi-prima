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
        Schema::create('siakad_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('teacher_id', 50)->unique(); // NIP / ID Guru
            $table->string('subject', 100)->nullable(); // Mata pelajaran utama
            $table->string('position', 100)->nullable(); // Jabatan (wali kelas, kaprodi, dll)
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'teacher'])->default('teacher');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_users');
    }
};
