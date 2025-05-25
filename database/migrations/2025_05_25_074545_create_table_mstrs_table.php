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
        Schema::create('table_mstr', function (Blueprint $table) {
            $table->bigIncrements('tabel_mstr_id');
            $table->uuid('table_mstr_uuid')->unique()->nullable();
            $table->string('table_mstr_barcode')->nullable();
            $table->boolean('table_mstr_status')->default(1); // booked or available
            $table->string('table_mstr_branch')->nullable();
            $table->bigInteger('table_mstr_cb')->nullable();
            $table->timestamp('table_mstr_ct')->nullable();
            $table->timestamp('table_mstr_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_mstr');
    }
};
