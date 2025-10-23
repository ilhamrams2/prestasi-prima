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
            
            // Foreign Keys
            $table->foreignId('job_id')->constrained('presmalancer_jobs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('presmalancer_users')->onDelete('cascade');
            
            // Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('phone', 20);
            $table->string('email');
            
            // Application Source
            $table->string('source')->nullable(); // Dari mana mengetahui lowongan
            
            // Document Uploads
            $table->string('resume_path')->nullable();
            $table->string('cover_letter_path')->nullable();
            $table->enum('resume_type', ['upload', 'drop', 'none'])->default('upload');
            $table->enum('cover_letter_type', ['upload', 'drop', 'none'])->default('upload');
            
            // Cover Letter Text (optional alternative to file)
            $table->text('cover_letter')->nullable();
            
            // Application Status & Phase
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected', 'withdrawn'])
                  ->default('pending');
            $table->integer('current_phase')->default(1); // 1, 2, 3, 4
            $table->boolean('is_completed')->default(false);
            
            // Phase 2 Data - Company Questions
            $table->json('phase2_answers')->nullable(); // Answers to company questions
            
            // Phase 3 Data - Design Draft
            $table->string('template_choice')->nullable(); // Selected template: modern_professional, corporate_classic, creative_design, minimal_clean
            $table->json('phase3_files')->nullable(); // Portfolio/design files
            $table->text('phase3_notes')->nullable();
            $table->text('cover_letter_text')->nullable(); // Cover letter content for phase 3
            
            // Phase 4 Data - Review
            $table->text('final_notes')->nullable();
            $table->timestamp('submitted_at')->nullable(); // When application was submitted
            
            // Additional Data (for flexibility)
            $table->json('additional_data')->nullable();
            
            // Admin Notes
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('presmalancer_users')->onDelete('set null');
            
            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // For soft deletes (trash functionality)
            
            // Prevent duplicate applications
            $table->unique(['job_id', 'user_id'], 'unique_job_user_application');
            
            // Indexes for better query performance
            $table->index('status');
            $table->index('current_phase');
            $table->index('created_at');
            $table->index(['job_id', 'status']);
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
