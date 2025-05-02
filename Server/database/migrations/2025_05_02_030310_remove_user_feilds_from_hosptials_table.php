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
        Schema::table('hosptials', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'user_phone_number', 'user_email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hosptials', function (Blueprint $table) {
            $table->string('user_name');
            $table->string('user_phone_number');
            $table->string('user_email');
        });
    }
};
