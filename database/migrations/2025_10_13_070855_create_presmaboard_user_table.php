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
        Schema::create('presmaboard_user', function (Blueprint $table) {
$table->id();
    $table->string('nama');
    $table->string('foto')->nullable();
    $table->string('kelas', 10);
    $table->string('jurusan', 100);
    $table->string('angkatan', 20)->nullable();
    $table->string('email')->unique();
    $table->string('no_induk')->unique();
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
        Schema::dropIfExists('presmaboard_user');
    }
};