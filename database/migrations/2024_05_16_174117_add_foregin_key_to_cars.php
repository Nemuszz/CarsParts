<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('user_car_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};
