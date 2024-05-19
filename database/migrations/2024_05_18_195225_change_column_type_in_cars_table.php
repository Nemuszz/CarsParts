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
        Schema::table('cars', function (Blueprint $table) {
            $table->integer('mileage')->change();
            $table->integer('price')->change();
            $table->integer('year')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            // If you need to revert the changes, you can change the column type back to VARCHAR
            $table->string('mileage')->change();
            $table->string('price')->change();
            $table->integer('year')->change();
        });
    }
};
