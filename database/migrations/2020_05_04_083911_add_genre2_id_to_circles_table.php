<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenre2IdToCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circles', function (Blueprint $table) {
            $table->Integer('genre2_id');
            $table->Integer('genre3_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circles', function (Blueprint $table) {
            Schema::dropIfExists('circles');
        });
    }
}
