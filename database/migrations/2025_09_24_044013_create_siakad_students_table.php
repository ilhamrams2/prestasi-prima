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
        Schema::create('siakad_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')->nullable()->constrained('siakad_majors')->nullOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('siakad_classes')->nullOnDelete();
            $table->string('student_number', 50)->unique();
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_students');
    }
};
