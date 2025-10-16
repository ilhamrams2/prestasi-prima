<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasiprima_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kategori
            $table->string('slug')->unique(); // Slug untuk URL
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_categories');
    }
};
