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
        Schema::create('branch_mstr', function (Blueprint $table) {
            $table->bigIncrements('branch_mstr_id');
            $table->uuid('branch_mstr_uuid')->unique()->nullable();
            $table->string('branch_mstr_name')->nullable();
            $table->date('branch_mstr_joined')->nullable();
            $table->string('branch_mstr_addr1')->nullable();
            $table->string('branch_mstr_addr2')->nullable();
            $table->string('branch_mstr_telp')->nullable();
            $table->string('branch_mstr_fax')->nullable();
            $table->string('branch_mstr_email')->nullable();
            $table->string('branch_mstr_pic')->nullable();
            $table->string('branch_mstr_sosmed1')->nullable();
            $table->string('branch_mstr_sosmed2')->nullable();
            $table->string('branch_mstr_sosmed3')->nullable();
            $table->string('branch_mstr_sosmed4')->nullable();
            $table->string('branch_mstr_img')->nullable();
            $table->json('branch_mstr_profile')->nullable();
            $table->bigInteger('branch_mstr_cb')->nullable();
            $table->timestamp('branch_mstr_ct')->nullable();
            $table->timestamp('branch_mstr_ut')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_mstr');
    }
};
