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
        Schema::create('hospital_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained()->cascadeOnDelete();
            $table->string('reasonForPayment');
            $table->json('selectedLabIds')->nullable();
            $table->json('labNames')->nullable();
            $table->string('totalLabAmount')->nullable();
            $table->json('selectedDrugsIds')->nullable();
            $table->json('drugNames')->nullable();
            $table->string('totalDrugAmount')->nullable();
            $table->string('consultationAmount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_payments');
    }
};
