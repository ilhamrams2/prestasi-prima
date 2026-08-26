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
        Schema::create('hero_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_url');
            $table->string('video_id', 32);
            $table->string('tagline')->nullable()->default('"If better is possible, good is not enough"');
            $table->string('headline_top')->nullable()->default('PRESTASI');
            $table->string('headline_bottom')->nullable()->default('PRIMA');
            $table->text('description')->nullable();
            $table->string('hud_tag')->nullable()->default('Institutional Vision / 2025');
            $table->string('hud_status')->nullable()->default('Status: Active');
            $table->string('hud_mission')->nullable()->default('Mission / 01');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_videos');
    }
};
