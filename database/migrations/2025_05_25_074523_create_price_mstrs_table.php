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
        Schema::create('price_mstr', function (Blueprint $table) {
            $table->bigIncrements('price_mstr_id');
            $table->uuid('price_mstr_uuid')->unique()->nullable();
            $table->string('price_mstr_item')->nullable();
            $table->string('price_mstr_um')->nullable();
            $table->string('price_mstr_nbr')->nullable();
            $table->decimal('price_mstr_cost', 18, 6)->nullable();
            $table->date('price_mstr_start')->nullable();
            $table->date('price_mstr_expire')->nullable();
            $table->boolean('price_mstr_status')->default(1);
            $table->bigInteger('price_mstr_cb')->nullable();
            $table->timestamp('price_mstr_ct')->nullable();
            $table->timestamp('price_mstr_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_mstr');
    }
};
