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
        Schema::create('presmaboard_scores', function (Blueprint $table) {
      $table->id();

            $table->foreignId('student_id')
                ->constrained('presmaboard_students')
                ->onDelete('cascade');

            $table->decimal('nilai_pkp', 5, 2)
                ->nullable()
                ->comment('Nilai PKP UTS/UAS per semester');

            $table->string('semester', 20)
                ->comment('Contoh: Semester Ganjil/Genap');

            $table->string('tahun_ajaran', 20)
                ->comment('Contoh: 2025/2026');

            $table->string('tipe_ujian', 10)
                ->default('UTS')
                ->comment('UTS atau UAS');

            $table->timestamps();

            $table->unique(
                ['student_id', 'semester', 'tahun_ajaran', 'tipe_ujian'],
                'uniq_score_per_semester'
            );

            // Untuk pencarian cepat berdasarkan periode
            $table->index(['student_id', 'semester', 'tahun_ajaran'], 'score_smt_ta_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmaboard_scores');
    }
};
