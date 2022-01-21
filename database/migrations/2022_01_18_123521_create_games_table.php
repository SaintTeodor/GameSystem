<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('dev_id');
            $table->date('relyear');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('genre_id')->references('genre_id')->on('genres');
            $table->foreign('dev_id')->references('dev_id')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
