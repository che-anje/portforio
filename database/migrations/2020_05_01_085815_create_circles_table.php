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
            $table->string('name');
            $table->Integer('admin_user_id');
            $table->string('introduction');
            $table->tinyInteger('prefecture_id');
            $table->string('detailedArea')->nullable();
            $table->tinyInteger('ageGroup')->nullable();
            $table->string('activeDay')->nullable();
            $table->string('cost')->nullable();
            $table->string('image')->nullable();
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
