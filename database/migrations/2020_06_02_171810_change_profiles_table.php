<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            
            $table->string('firstName',191)->change();
            $table->string('familyName',191)->change();
            $table->string('name',191)->change();
            $table->Integer('gender')->change();
            $table->Integer('prefectureOfInterest')->nullable()->change();
            $table->Integer('cityOfInterest')->nullable()->change();
            $table->Integer('searchSettingByEmail')->nullable()->change();
            $table->string('user_image')->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            
        });
    }
}
