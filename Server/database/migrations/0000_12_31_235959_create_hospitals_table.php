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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('hospital_email');
            $table->string('hospital_address');
            $table->string('hospital_contact');
            $table->string('hospital_location');
            $table->string('hospital_consistency');
            $table->string('hospital_city');
            $table->string('number_of_monthly_subscription');
            $table->boolean('status')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
