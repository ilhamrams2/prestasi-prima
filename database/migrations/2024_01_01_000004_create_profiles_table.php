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
            
            // Profile Picture
            $table->string('avatar')->nullable(); // Path to profile picture
            
            // Contact Information
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            
            // Professional Information
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->string('portfolio_link', 255)->nullable();
            
            // Social Links
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('website_url')->nullable();
            
            // Stats (for sidebar display)
            $table->integer('applications_count')->default(0);
            $table->integer('interviews_count')->default(0);
            $table->integer('offers_count')->default(0);
            
            $table->timestamps();
            
            // Index for faster queries
            $table->index('user_id');
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
