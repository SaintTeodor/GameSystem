<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genid');
            $table->unsignedBigInteger('gameid');
            $table->foreign('genid')->references('genre_id')->on('genres');
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
        Schema::dropIfExists('games_genre');
    }
}
