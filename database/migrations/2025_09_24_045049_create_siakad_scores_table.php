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
        Schema::create('siakad_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('siakad_enrollments')->onDelete('cascade');
            $table->decimal('assignment', 5, 2)->nullable();
            $table->decimal('mid_exam', 5, 2)->nullable();
            $table->decimal('final_exam', 5, 2)->nullable();
            $table->decimal('final_score', 5, 2)->nullable();
            $table->string('grade', 5)->nullable(); // A, B, C, D
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_scores');
    }
};
