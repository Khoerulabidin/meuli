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
        Schema::create('user_mstr', function (Blueprint $table) {
            $table->bigIncrements('user_mstr_id');
            $table->uuid('user_mstr_uuid')->unique();
            $table->string('user_mstr_name');
            $table->string('user_mstr_email')->unique();
            $table->string('user_mstr_username')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_mstr_password');
            $table->rememberToken();
            $table->boolean('user_mstr_status')->default(1);
            $table->integer('user_mstr_branch')->nullable();
            $table->string('user_mstr_img')->nullable();
            $table->string('user_mstr_cb')->nullable();
            $table->timestamp('user_mstr_ct')->nullable();
            $table->timestamp('user_mstr_ut')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('usr_mstr');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
