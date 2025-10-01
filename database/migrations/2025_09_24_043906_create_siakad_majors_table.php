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
        Schema::create('siakad_majors', function (Blueprint $table) {
           $table->id();
            $table->string('major_code', 50)->unique();
            $table->string('image', 200)->nullable();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }


  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_majors');
    }
};
