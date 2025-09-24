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
        Schema::create('siakad_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('siakad_enrollments')->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['H','S','I','A']); // Hadir, Sakit, Izin, Alpha
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_attendances');
    }
};
