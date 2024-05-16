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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_car_id');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('mileage');
            $table->string('price');
            $table->string('body_type');
            $table->string('fuel_type');
            $table->integer('power');
            $table->string('gear');
            $table->integer('number_of_doors');
            $table->text('description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
