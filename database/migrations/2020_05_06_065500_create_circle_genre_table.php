<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_genre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('circle_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();
            $table->timestamps();

            //FK rule
            $table->foreign('circle_id')
                ->references('id')
                ->on('circles')
                ->onDelete('cascade');
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_genre');
    }
}
