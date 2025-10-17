<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siakad_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id', 50)->unique(); // NIP / ID Guru
            $table->string('name', 100);
            $table->string('subject', 100)->nullable(); // Mata pelajaran utama
            $table->string('position', 100)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siakad_teachers');
    }
};
