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
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->char('user_uuid', 36);
            $table->unsignedBigInteger('path_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->unsignedBigInteger('weather_id');
            $table->timestamp('start_date');
            $table->timestamp('finish_date');
            $table->text('comment');
            $table->decimal('temperature', 3, 1);
            $table->foreign('user_uuid')->references('uuid')->on('user');
            $table->foreign('path_id')->references('id')->on('path');
            $table->foreign('type_id')->references('id')->on('activity_type');
            $table->foreign('difficulty_id')->references('id')->on('difficulty');
            $table->foreign('weather_id')->references('id')->on('weather');
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
        Schema::dropIfExists('activity');
    }
};
