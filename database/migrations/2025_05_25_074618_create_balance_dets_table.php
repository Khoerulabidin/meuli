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
        Schema::create('balance_det', function (Blueprint $table) {
            $table->bigIncrements('balance_det_id');
            $table->uuid('balance_det_uuid')->unique()->nullable();
            $table->unsignedBigInteger('balance_det_mstr')->nullable();
            $table->string('balance_det_type')->nullable();
            $table->string('balance_det_curr')->nullable();
            $table->decimal('balance_det_rate', 18, 6)->nullable();
            $table->decimal('balance_det_amount', 18, 6)->nullable();
            $table->string('balance_det_rmks')->nullable();
            $table->string('balance_det_branch')->nullable();
            $table->bigInteger('balance_det_cb')->nullable();
            $table->timestamp('balance_det_ct')->nullable();
            $table->timestamp('balance_det_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_det');
    }
};
