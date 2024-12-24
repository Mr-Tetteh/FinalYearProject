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
            $table->longText('symptoms');
            $table->string('diagnosis');
            $table->longText('treatment');
            $table->boolean('drug_is_paid')->default(false);
            $table->string('temperature');
            $table->string('pulse_rate');
            $table->string('sugar_rate')->nullable();
            $table->boolean('admitted')->default(false);
            $table->string('ward_number')->nullable();
            $table->string('weight')->nullable();
            $table->boolean('surgery')->default(false);
            $table->string('surgery_date')->nullable();
            $table->string('surgery_reason')->nullable();
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
            $table->string('lab11')->nullable();
            $table->longText('lab11_results')->nullable();
            $table->string('lab12')->nullable();
            $table->longText('lab12_results')->nullable();
            $table->string('lab13')->nullable();
            $table->longText('lab13_results')->nullable();
            $table->string('lab14')->nullable();
            $table->longText('lab14_results')->nullable();
            $table->string('lab15')->nullable();
            $table->longText('lab15_results')->nullable();
            $table->boolean('labs_is_paid')->default(false);
            $table->boolean('drugs_is_paid')->default(false);
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
