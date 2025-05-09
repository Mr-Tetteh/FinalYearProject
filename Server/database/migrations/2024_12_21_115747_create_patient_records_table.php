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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('history')->nullable();
            $table->string('diagnosis')->nullable();
            $table->longText('treatment')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('rbs')->nullable();
            $table->string('fbs')->nullable();
            $table->string('spo2')->nullable();
            $table->string('weight')->nullable();
            $table->string('labs')->nullable();
            $table->string('lab1')->nullable();
            $table->longText('lab1_results')->nullable();
            $table->string('lab2')->nullable();
            $table->longText('lab2_results')->nullable();
            $table->string('lab3')->nullable();
            $table->longText('lab3_results')->nullable();
            $table->string('lab4')->nullable();
            $table->longText('lab4_results')->nullable();
            $table->string('lab5')->nullable();
            $table->longText('lab5_results')->nullable();
            $table->string('lab6')->nullable();
            $table->longText('lab6_results')->nullable();
            $table->string('lab7')->nullable();
            $table->longText('lab7_results')->nullable();
            $table->string('lab8')->nullable();
            $table->longText('lab8_results')->nullable();
            $table->string('lab9')->nullable();
            $table->longText('lab9_results')->nullable();
            $table->string('lab10')->nullable();
            $table->longText('lab10_results')->nullable();
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
