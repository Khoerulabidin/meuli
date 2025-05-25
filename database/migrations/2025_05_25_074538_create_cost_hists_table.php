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
        Schema::create('cost_hist', function (Blueprint $table) {
            $table->bigIncrements('cost_hist_id');
            $table->uuid('cost_hist_uuid')->unique()->nullable();
            $table->string('cost_hist_type')->nullable();
            $table->date('cost_hist_effdate')->nullable();
            $table->string('cost_hist_inv')->nullable();
            $table->string('cost_hist_curr')->nullable();
            $table->decimal('cost_hist_rate', 18, 6)->nullable();
            $table->decimal('cost_hist_amount', 18, 6)->nullable();
            $table->string('cost_hist_rmks')->nullable();
            $table->string('cost_hist_branch')->nullable();
            $table->bigInteger('cost_hist_cb')->nullable();
            $table->timestamp('cost_hist_ct')->nullable();
            $table->timestamp('cost_hist_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_hist');
    }
};
