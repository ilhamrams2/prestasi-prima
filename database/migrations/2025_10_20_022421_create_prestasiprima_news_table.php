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
            
            // Foreign Key
            $table->foreignId('category_id')
                  ->constrained('prestasiprima_categories')
                  ->onDelete('restrict');

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->date('published_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('prestasiprima_news');
    }
};
