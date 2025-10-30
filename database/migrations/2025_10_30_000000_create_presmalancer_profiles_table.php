<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // If the table already exists (e.g. created manually), skip creating it to avoid migration errors.
        if (!Schema::hasTable('presmalancer_profiles')) {
            Schema::create('presmalancer_profiles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->string('avatar')->nullable();
                $table->string('phone')->nullable();
                $table->string('location')->nullable();
                $table->text('bio')->nullable();
                $table->text('skills')->nullable();
                $table->string('role')->nullable();
                $table->string('address')->nullable();
                $table->timestamps();

                // Note: foreign key to presmalancer_users may be added if desired
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presmalancer_profiles');
    }
};
