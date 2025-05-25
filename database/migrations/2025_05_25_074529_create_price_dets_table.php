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
        Schema::create('price_det', function (Blueprint $table) {
            $table->bigIncrements('price_det_id');
            $table->uuid('price_det_uuid')->unique()->nullable();
            $table->unsignedBigInteger('price_det_mstr')->nullable();
            $table->string('price_det_item')->nullable();
            $table->string('price_det_um')->nullable();
            $table->decimal('price_det_cost', 18, 6)->nullable();
            $table->bigInteger('price_det_cb')->nullable();
            $table->timestamp('price_det_ct')->nullable();
            $table->timestamp('price_det_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_det');
    }
};
