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
        Schema::create('presmalancer_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('presmalancer_jobs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('presmalancer_users')->onDelete('cascade');
            $table->text('cover_letter')->nullable();
            $table->string('status')->default('pending'); // pending, reviewed, accepted, rejected
            $table->timestamp('created_at')->useCurrent();
            
            // Prevent duplicate applications
            $table->unique(['job_id', 'user_id']);
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
