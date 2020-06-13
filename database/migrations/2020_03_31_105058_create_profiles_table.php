<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\GenderPublishState;
use App\Enums\Gender;
use App\Enums\BirthdayPublishState;
use App\Enums\MyArea;
use App\Enums\PrefectureOfInterest;
use App\Enums\SearchSettingByEmail;


class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('familyName');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->tinyInteger('prefectureOfInterest');
            $table->Integer('cityOfInterest');
            $table->tinyInteger('searchSettingByEmail');
            $table->string('introduction');
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
        Schema::dropIfExists('profiles');
    }
}
