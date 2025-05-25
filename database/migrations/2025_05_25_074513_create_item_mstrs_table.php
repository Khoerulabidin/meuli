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
        Schema::create('item_mstr', function (Blueprint $table) {
            $table->bigIncrements('item_mstr_id');
            $table->uuid('item_mstr_uuid')->unique()->nullable();
            $table->string('item_mstr_code')->nullable();
            $table->string('item_mstr_desc')->nullable();
            $table->json('item_mstr_spec')->nullable();
            $table->string('item_mstr_cat')->nullable();
            $table->string('item_mstr_um')->nullable();
            $table->boolean('item_mstr_status')->default(1);
            $table->string('item_mstr_img')->nullable();
            $table->bigInteger('item_mstr_cb')->nullable();
            $table->timestamp('item_mstr_ct')->nullable();
            $table->timestamp('item_mstr_ut')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_mstr');
    }
};
