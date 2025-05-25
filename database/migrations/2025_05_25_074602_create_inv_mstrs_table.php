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
        Schema::create('inv_mstr', function (Blueprint $table) {
            $table->bigIncrements('inv_mstr_id');
            $table->uuid('inv_mstr_uuid')->unique()->nullable();
            $table->string('inv_mstr_co')->nullable();
            $table->string('inv_mstr_relco')->nullable();
            $table->string('inv_mstr_nbr')->nullable();
            $table->date('inv_mstr_effdate')->nullable();
            $table->timestamp('inv_mstr_time')->nullable();
            $table->json('inv_mstr_cust')->nullable();
            $table->string('inv_mstr_table')->nullable();
            $table->string('inv_mstr_type ')->nullable();
            $table->boolean('inv_mstr_status')->default(1);
            $table->string('inv_mstr_inv')->nullable();
            $table->decimal('inv_mstr_disc', 18, 6)->nullable();
            $table->decimal('inv_mstr_rebate', 18, 6)->nullable();
            $table->decimal('inv_mstr_tax', 18, 6)->nullable();
            $table->string('inv_mstr_taxc')->nullable();
            $table->decimal('inv_mstr_tax1', 18, 6)->nullable();
            $table->string('inv_mstr_tax1c')->nullable();
            $table->decimal('inv_mstr_tax2', 18, 6)->nullable();
            $table->string('inv_mstr_tax2c')->nullable();
            $table->decimal('inv_mstr_tax3', 18, 6)->nullable();
            $table->string('inv_mstr_tax3c')->nullable();
            $table->decimal('inv_mstr_total', 18, 6)->nullable();
            $table->string('inv_mstr_curr')->nullable();
            $table->decimal('inv_mstr_rate', 18, 6)->nullable();
            $table->decimal('inv_mstr_amount', 18, 6)->nullable();
            $table->string('inv_mstr_rmks')->nullable();
            $table->string('inv_mstr_branch')->nullable();
            $table->bigInteger('inv_mstr_cb')->nullable();
            $table->timestamp('inv_mstr_ct')->nullable();
            $table->timestamp('inv_mstr_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_mstr');
    }
};
