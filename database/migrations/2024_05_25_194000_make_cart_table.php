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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_id')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->string('make');
            $table->string('model');
            $table->string('section');
            $table->string('name');
            $table->string('price');
            $table->integer('amount');
            $table->integer('part_code')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('cart', function (Blueprint $table) {});
    }
};
