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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->integer('hospital');
            $table->string('patient_number');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('guardian1_first_name');
            $table->string('guardian1_last_name')->nullable();
            $table->string('guardian1_other_names')->nullable();
            $table->string('guardian1_relation');
            $table->string('guardian1_contact');
            $table->string('guardian1_residential_address');
            $table->string('guardian2_first_name')->nullable();
            $table->string('guardian2_last_name')->nullable();
            $table->string('guardian2_other_names')->nullable();
            $table->string('guardian2_relation')->nullable();
            $table->string('guardian2_contact')->nullable();
            $table->string('guardian2_residential_address')->nullable();
            $table->string('allergies')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('additional_notes')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
