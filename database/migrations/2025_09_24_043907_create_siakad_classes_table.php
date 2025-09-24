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
        Schema::create('siakad_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name', 50);
            $table->integer('grade')->nullable(); // 10, 11, 12
            $table->string('major', 100)->nullable(); // RPL, TKJ, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siakad_classes');
    }
};
