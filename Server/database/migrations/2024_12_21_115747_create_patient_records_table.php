<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('weight')->nullable();
            $table->string('spo2')->nullable();
            $table->string('fbs')->nullable();
            $table->string('rbs')->nullable();
            $table->string('nurse_additional_notes')->nullable();
            $table->longText('history')->nullable();
            $table->longText('examination_findings')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('investigations')->nullable();
            $table->longText('treatment')->nullable();
            $table->longText('doctor_additional_notes')->nullable();
            $table->longText('pharmacists_notes')->nullable();
            $table->longText('medication_notes')->nullable();
            $table->string('prescription_notes')->nullable();
            $table->string('pharmacist_additional_notes')->nullable();
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
