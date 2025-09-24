<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('presmalancer_users', function (Blueprint $table) {
        $table->id();
        $table->string('google_id', 50)->nullable();
        $table->string('email', 100)->unique();
        $table->string('name', 100);
        $table->string('avatar', 255)->nullable();
        $table->string('role')->default('user');
        $table->timestamp('email_verified_at')->nullable();
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
