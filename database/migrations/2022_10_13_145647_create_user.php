<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('username', 64);
            $table->char('password', 255);
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('email', 255);
            $table->unsignedSmallInteger('weight');
            $table->unsignedSmallInteger('height');
            $table->unsignedSmallInteger('max_heart_rate');
            $table->date('birthdate');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
