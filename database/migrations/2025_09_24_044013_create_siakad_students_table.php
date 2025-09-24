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
        Schema::create('siakad_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 50)->unique(); // NIS/NISN
            $table->string('name', 100);
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->date('birth_date')->nullable();
            $table->foreignId('class_id')->constrained('siakad_classes')->onDelete('cascade');
            $table->integer('year_entry')->nullable(); // Tahun masuk sekolah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_students');
    }
};
