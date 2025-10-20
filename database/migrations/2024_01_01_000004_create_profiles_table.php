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
        Schema::create('presmalancer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('presmalancer_users')->onDelete('cascade');
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->string('portfolio_link', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmalancer_profiles');
    }
};
