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
        Schema::table('siakad_teachers', function (Blueprint $table) {
            if (!Schema::hasColumn('siakad_teachers', 'status')) {
                $table->enum('status', ['Active', 'Inactive'])->default('Active')->after('position');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siakad_teachers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
