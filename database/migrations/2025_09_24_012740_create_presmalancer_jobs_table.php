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
    Schema::create('presmalancer_jobs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('company_id');
        $table->string('title', 150);
        $table->text('description');
        $table->text('requirements');
        $table->string('location', 150);
        $table->string('job_type');
        $table->string('salary_range', 100);
        $table->date('deadline');
        $table->timestamps();

        $table->foreign('company_id')->references('id')->on('presmalancer_companies')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presmalancer_jobs');
    }
};
