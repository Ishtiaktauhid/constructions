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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn')->nullable();
            $table->text('description')->nullable();
            $table->string('mouza_no_en');
            $table->string('mouza_no_bn')->nullable();
            $table->string('rs_no_en')->unique();
            $table->string('rs_no_bn')->unique()->nullable();
            $table->string('bs_no_en')->unique();
            $table->string('bs_no_bn')->unique()->nullable();
            $table->string('rs_image')->nullable();
            $table->string('bs_image')->nullable();
            $table->string('registration_no_en')->unique();
            $table->string('registration_no_bn')->unique()->nullable();
            $table->string('registration_image')->nullable();
            $table->string('land_area', 255)->nullable();
            $table->date('acquire_date')->nullable();
            $table->text('original_owner_details')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
