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
        Schema::create('waypoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('path_id');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->unsignedTinyInteger('index');
            $table->foreign('path_id')->references('id')->on('paths');
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
        Schema::dropIfExists('waypoint');
    }
};
