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
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('symptoms');
            $table->string('diagnosis');
            $table->longText('treatment');
            $table->string('temperature');
            $table->string('pulse_rate');
            $table->string('sugar_rate')->nullable();
            $table->boolean('admitted')->default(false);
            $table->string('ward_number')->nullable();
            $table->boolean('surgery')->default(false);
            $table->string('surgery_date')->nullable();
            $table->string('surgery_reason')->nullable();
            $table->longText('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_records');
    }
};
