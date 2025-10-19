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
        Schema::create('presmaboard_students', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('gender', ['l', 'p'])->default('l');
            $table->string('foto')->nullable();
            $table->string('kelas')->nullable();
            $table->enum('jurusan', ['pplg', 'dkv', 'tkj', 'bcf'])->default('pplg');
            $table->string('angkatan')->nullable();
            $table->string('email')->unique();
            $table->string('nis')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['kelas', 'jurusan', 'angkatan'], 'student_kja_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmaboard_students');
    }
};
