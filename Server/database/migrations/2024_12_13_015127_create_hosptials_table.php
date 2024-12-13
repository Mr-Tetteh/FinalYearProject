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
        Schema::create('hosptials', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_contact');
            $table->string('hospital_email');
            $table->string('hospital_country');
            $table->string('hospital_city');
            $table->string('user_name');
            $table->string('user_phone_number');
            $table->string('user_email');
            $table->string('number_of_monthly_subscription');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosptials');
    }
};
