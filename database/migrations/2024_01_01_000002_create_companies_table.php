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
        Schema::create('presmalancer_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('presmalancer_users')->onDelete('cascade');
            $table->string('company_name', 150);
            $table->string('industry', 100)->nullable();
            $table->string('website', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('size', 50)->nullable(); // e.g., "100-500"
            $table->string('founded', 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmalancer_companies');
    }
};
