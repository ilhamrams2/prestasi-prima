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
        Schema::create('presmalancer_users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id', 50)->nullable()->unique();
            $table->string('email', 100)->unique();
            $table->string('name', 100);
            $table->string('avatar', 255)->nullable();
            $table->string('role')->default('user'); // user, company, admin
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); // For non-Google auth
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmalancer_users');
    }
};
