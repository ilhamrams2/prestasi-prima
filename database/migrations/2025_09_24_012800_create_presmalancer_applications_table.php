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
    Schema::create('presmalancer_applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('job_id');
        $table->unsignedBigInteger('user_id');
        $table->text('cover_letter')->nullable();
        $table->string('status')->default('pending');
        $table->timestamps();

        $table->foreign('job_id')->references('id')->on('presmalancer_jobs')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('presmalancer_users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmalancer_applications');
    }
};
