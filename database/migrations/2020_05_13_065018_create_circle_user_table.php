<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('circle_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            //FK rule
            $table->foreign('circle_id')
                ->references('id')
                ->on('circles')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('circle_user');
    }
}
