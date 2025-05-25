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
        Schema::create('inv_det', function (Blueprint $table) {
            $table->bigIncrements('inv_det_id');
            $table->uuid('inv_det_uuid')->unique()->nullable();
            $table->unsignedBigInteger('inv_det_mstr')->nullable();
            $table->string('inv_det_codid')->nullable();
            $table->string('inv_det_item')->nullable();
            $table->string('inv_det_um')->nullable();
            $table->decimal('inv_det_qty', 18, 6)->nullable();
            $table->decimal('inv_det_price', 18, 6)->nullable();
            $table->decimal('inv_det_disc', 18, 6)->nullable();
            $table->decimal('inv_det_total', 18, 6)->nullable();
            $table->string('inv_det_rmks')->nullable();
            $table->string('inv_det_branch')->nullable();
            $table->bigInteger('inv_det_cb')->nullable();
            $table->timestamp('inv_det_ct')->nullable();
            $table->timestamp('inv_det_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_det');
    }
};
