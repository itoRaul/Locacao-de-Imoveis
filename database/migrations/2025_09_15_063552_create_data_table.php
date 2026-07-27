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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fullname');
            $table->string('socialname')->nullable();
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('cep');
            $table->string('address');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('complement')->nullable();
            $table->foreignId('marital_status_id')->constrained('marital_status');
            $table->foreignId('education_level_id')->constrained('education_levels');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('city_id')->constrained('cities');
            $table->enum('nationality', ['Brasileira', 'Estrangeira']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
