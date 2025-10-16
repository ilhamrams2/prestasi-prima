<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasiprima_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('prestasiprima_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable(); // Gambar utama
            $table->text('excerpt')->nullable(); // Ringkasan singkat berita
            $table->longText('content'); // Isi berita penuh
            $table->date('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_news');
    }
};
