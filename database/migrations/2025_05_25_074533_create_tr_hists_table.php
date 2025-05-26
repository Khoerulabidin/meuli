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
        Schema::create('tr_hist', function (Blueprint $table) {
            $table->bigIncrements('tr_hist_id');
            $table->uuid('tr_hist_uuid')->unique()->nullable();
            $table->string('tr_hist_type')->nullable();
            $table->date('tr_hist_effdate')->nullable();
            $table->string('tr_hist_item')->nullable();
            $table->string('tr_hist_loc')->nullable();
            $table->string('tr_hist_rmks')->nullable();
            $table->string('tr_hist_receiver')->nullable();
            $table->decimal('tr_hist_qty', 18, 6)->nullable();
            $table->decimal('tr_hist_cost', 18, 6)->nullable();
            $table->json('tr_hist_table')->nullable();
            $table->string('tr_hist_branch')->nullable();
            $table->bigInteger('tr_hist_cb')->nullable();
            $table->timestamp('tr_hist_ct')->nullable();
            $table->timestamp('tr_hist_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_hist');
    }
};
