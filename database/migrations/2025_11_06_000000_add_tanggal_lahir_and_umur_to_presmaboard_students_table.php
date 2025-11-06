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
        Schema::table('presmaboard_students', function (Blueprint $table) {
            // Add birthdate and age to support seeding "umur" < 18
            if (! Schema::hasColumn('presmaboard_students', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->nullable()->after('email');
            }
            if (! Schema::hasColumn('presmaboard_students', 'umur')) {
                $table->unsignedTinyInteger('umur')->nullable()->after('tanggal_lahir');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presmaboard_students', function (Blueprint $table) {
            if (Schema::hasColumn('presmaboard_students', 'umur')) {
                $table->dropColumn('umur');
            }
            if (Schema::hasColumn('presmaboard_students', 'tanggal_lahir')) {
                $table->dropColumn('tanggal_lahir');
            }
        });
    }
};
