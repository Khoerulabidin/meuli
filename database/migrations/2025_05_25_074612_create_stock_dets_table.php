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
        Schema::create('stock_det', function (Blueprint $table) {
            $table->bigIncrements('stock_det_id');
            $table->uuid('stock_det_uuid')->unique()->nullable();
            $table->unsignedBigInteger('stock_det_mstr')->nullable();
            $table->string('stock_det_item')->nullable();
            $table->string('stock_det_um')->nullable();
            $table->decimal('stock_det_qty', 18, 6)->nullable();
            $table->decimal('stock_det_price', 18, 6)->nullable();
            $table->string('stock_det_loc')->nullable();
            $table->string('stock_det_branch')->nullable();
            $table->bigInteger('stock_det_cb')->nullable();
            $table->timestamp('stock_det_ct')->nullable();
            $table->timestamp('stock_det_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_det');
    }
};
