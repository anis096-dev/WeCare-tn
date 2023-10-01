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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable()->unique();
            $table->boolean('phone_verified')->default(false);
            $table->string('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('bio')->nullable();
            $table->string('occupation')->nullable();
            $table->string('present_adress')->nullable();
            $table->string('permanent_adress')->nullable();
            $table->string('CIN')->nullable()->unique();
            $table->string('file')->nullable();
            $table->boolean('status')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->foreignId('role_id')->default('4')->constrained('roles','id')->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('specialty_id')->nullable()->constrained('specialties')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamp('last_seen')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
