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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('adress')->nullable();
            $table->string('Location_of_care')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('number_of_visits')->nullable();
            $table->string('prescription')->nullable();
            $table->string('prescription_file')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('subtreatments')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('specialty_id')->nullable()->constrained('specialties')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
