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
        // Rename tabel dari 'industris' menjadi 'prestasiprima_industris'
        Schema::rename('industris', 'prestasiprima_industris');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Jika rollback, kembalikan nama tabel lama
        Schema::rename('prestasiprima_industris', 'industris');
    }
};