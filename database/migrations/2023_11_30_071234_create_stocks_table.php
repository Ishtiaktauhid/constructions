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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->unsignedBigInteger('purchase_material_id')->nullable();
            $table->unsignedBigInteger('project_material_issue_id')->nullable();
            $table->unsignedBigInteger('material_damage_id')->nullable();
            $table->decimal('quantity',10,2)->default(0);
            $table->decimal('unit_price',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0)->nullable();
            $table->decimal('discount',10,2)->default(0)->nullable();
            $table->integer('batch_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
