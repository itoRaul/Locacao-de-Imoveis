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
        Schema::create('data_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id')->constrained('data')->onDelete('cascade');
            $table->string('cep');
            $table->string('address');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('complement')->nullable();
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');

            for ($i = 1; $i <= 10; $i++) {
                $table->string("image_$i")->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_properties');
    }
};
