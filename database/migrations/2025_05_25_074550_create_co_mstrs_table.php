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
        Schema::create('co_mstr', function (Blueprint $table) {
            $table->bigIncrements('co_mstr_id');
            $table->uuid('co_mstr_uuid')->unique()->nullable();
            $table->string('co_mstr_nbr')->nullable();
            $table->date('co_mstr_effdate')->nullable();
            $table->timestamp('co_mstr_time')->nullable();
            $table->json('co_mstr_cust')->nullable();
            $table->string('co_mstr_table')->nullable();
            $table->string('co_mstr_type ')->nullable();
            $table->boolean('co_mstr_status')->default(1);
            $table->string('co_mstr_inv')->nullable();
            $table->decimal('co_mstr_disc', 18, 6)->nullable();
            $table->decimal('co_mstr_rebate', 18, 6)->nullable();
            $table->decimal('co_mstr_tax', 18, 6)->nullable();
            $table->string('co_mstr_taxc')->nullable();
            $table->decimal('co_mstr_tax1', 18, 6)->nullable();
            $table->string('co_mstr_tax1c')->nullable();
            $table->decimal('co_mstr_tax2', 18, 6)->nullable();
            $table->string('co_mstr_tax2c')->nullable();
            $table->decimal('co_mstr_tax3', 18, 6)->nullable();
            $table->string('co_mstr_tax3c')->nullable();
            $table->decimal('co_mstr_total', 18, 6)->nullable();
            $table->string('co_mstr_curr')->nullable();
            $table->decimal('co_mstr_rate', 18, 6)->nullable();
            $table->decimal('co_mstr_amount', 18, 6)->nullable();
            $table->string('co_mstr_rmks')->nullable();
            $table->string('co_mstr_branch')->nullable();
            $table->bigInteger('co_mstr_cb')->nullable();
            $table->timestamp('co_mstr_ct')->nullable();
            $table->timestamp('co_mstr_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_mstr');
    }
};
