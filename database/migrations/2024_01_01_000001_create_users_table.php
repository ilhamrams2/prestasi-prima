<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presmalancer_users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id', 50)->nullable();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('avatar', 255)->nullable();
            $table->string('role', 50)->default('user'); // 'user' atau 'admin'
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->nullable(); // nullable biar bisa Google login
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presmalancer_users');
    }
};
