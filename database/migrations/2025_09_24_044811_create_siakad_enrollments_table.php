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
        Schema::create('siakad_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('siakad_students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('siakad_subjects')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('siakad_teachers')->onDelete('cascade');
            $table->string('semester', 20); // Ganjil/Genap + Tahun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_enrollments');
    }
};
