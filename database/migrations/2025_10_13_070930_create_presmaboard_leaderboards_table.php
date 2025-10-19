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
        Schema::create('presmaboard_leaderboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('presmaboard_students')->onDelete('cascade');

            // Nilai agregat hasil perhitungan dari scores, achievements, projects
            $table->decimal('total_score', 8, 2)->default(0);
            $table->integer('rank')->nullable();
            $table->string('periode', 20)->nullable(); // contoh: '2025 Ganjil'

            // optional: terakhir update ranking
            $table->timestamp('last_calculated_at')->nullable();

            $table->timestamps();

            $table->unique(['student_id', 'periode'], 'uniq_leaderboard_per_periode');
            $table->index(['rank', 'total_score'], 'leaderboard_rank_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmaboard_leaderboards');
    }
};
