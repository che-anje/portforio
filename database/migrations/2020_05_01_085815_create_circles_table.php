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
            $table->string('name',191);
            $table->Integer('admin_user_id');
            $table->string('introduction',191);
            $table->tinyInteger('prefecture_id');
            $table->string('detailedArea',191)->nullable();
            $table->tinyInteger('ageGroup')->nullable();
            $table->string('activityDay',191)->nullable();
            $table->string('cost',191)->nullable();
            $table->string('image',191)->nullable();
            $table->tinyInteger('recruit_status')->nullable();
            $table->string('description_template')->nullable();
            $table->tinyInteger('request_required')->nullable();
            $table->tinyInteger('private_status');
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
