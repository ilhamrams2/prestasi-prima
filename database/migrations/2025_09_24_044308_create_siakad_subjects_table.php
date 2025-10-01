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
        Schema::create('siakad_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code', 50)->unique();   // Kode Mapel
            $table->string('subject_name', 100);            // Nama Mapel
            $table->string('subject_group', 50)->nullable(); // Kelompok A, B, C
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_subjects');
    }
};
