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
        Schema::create('co_det', function (Blueprint $table) {
            $table->bigIncrements('co_det_id');
            $table->uuid('co_det_uuid')->unique()->nullable();
            $table->unsignedBigInteger('co_det_mstr')->nullable();
            $table->string('co_det_item')->nullable();
            $table->string('co_det_um')->nullable();
            $table->decimal('co_det_qty', 18, 6)->nullable();
            $table->decimal('co_det_price', 18, 6)->nullable();
            $table->decimal('co_det_disc', 18, 6)->nullable();
            $table->decimal('co_det_total', 18, 6)->nullable();
            $table->string('co_det_rmks')->nullable();
            $table->string('co_det_branch')->nullable();
            $table->bigInteger('co_det_cb')->nullable();
            $table->timestamp('co_det_ct')->nullable();
            $table->timestamp('co_det_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_det');
    }
};
