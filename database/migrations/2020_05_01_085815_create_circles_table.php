<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('genre_id');
            $table->Integer('admin_user_id');
            $table->string('name');
            $table->string('introduction');
            $table->tinyInteger('prefecture_id');
            $table->string('detailedArea');
            $table->tinyInteger('ageGroup');
            $table->string('activeDay');
            $table->string('cost');
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
        Schema::dropIfExists('circles');
    }
}
