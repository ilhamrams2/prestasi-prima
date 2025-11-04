<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prestasiprima_staff', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->text('kutipan')->nullable();
            $table->string('kategori')->default('guru'); // contoh: kepala sekolah, kaprog, kesiswaan, guru mapel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_staff');
    }
};

// 