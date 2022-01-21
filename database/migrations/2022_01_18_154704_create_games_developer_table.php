<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesDeveloperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_developer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('devid');
            $table->foreign('devid')->references('dev_id')->on('developers');
            $table->unsignedBigInteger('gameid');
            $table->foreign('gameid')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_developer');
    }
}
