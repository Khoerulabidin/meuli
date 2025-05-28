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
        Schema::create('code_mstr', function (Blueprint $table) {
            $table->bigIncrements('code_mstr_id');
            $table->uuid('code_mstr_uuid')->unique();
            $table->string('code_mstr_fldname')->nullable();
            $table->string('code_mstr_value')->nullable();
            $table->string('code_mstr_cmmt')->nullable();
            $table->string('code_mstr_cmmt2')->nullable();
            $table->string('code_mstr_cmmt3')->nullable();
            $table->string('code_mstr_branch')->nullable();
            $table->string('code_mstr_cb')->nullable();
            $table->timestamp('code_mstr_ct')->nullable();
            $table->timestamp('code_mstr_ut')->nullable();

            $table->unique(['code_mstr_fldname', 'code_mstr_value'], 'unique_code_mstr_fldname_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_mstr');
    }
};
