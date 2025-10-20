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
        Schema::create('presmalancer_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('presmalancer_companies')->onDelete('cascade');
            $table->string('title', 150);
            $table->text('description');
            $table->text('requirements');
            $table->string('location', 150);
            $table->string('job_type')->default('Full Time'); // Full Time, Part Time, Contract, Freelance, Internship
            $table->string('salary_range', 100)->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
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
