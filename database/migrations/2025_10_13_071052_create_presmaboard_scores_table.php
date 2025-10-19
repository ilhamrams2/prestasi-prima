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

            $table->decimal('score', 5, 2)
                ->nullable();

            $table->unsignedInteger('semester')
                ->default(1);

            $table->string('tahun_ajaran')
                ->nullable();

            $table->enum('tipe_ujian', ['UTS', 'UAS'])
                ->default('UTS');

            $table->timestamps();

            $table->unique(
                ['student_id', 'semester', 'tahun_ajaran', 'tipe_ujian'],
                'uniq_score_per_semester'
            );

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
