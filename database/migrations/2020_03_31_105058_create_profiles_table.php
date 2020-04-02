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
            $table->string('surName');
            $table->string('familyName');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->tinyInteger('genderPublishState')->unsigned()->default(GenderPublishState::None);
            $table->date('birthday');
            $table->tinyInteger('birthdayPublishState');
            $table->tinyInteger('prefectureOfInterest1');
            $table->Integer('cityOfInterest1');
            $table->tinyInteger('prefectureOfInterest2');
            $table->Integer('cityOfInterest2');
            $table->tinyInteger('prefectureOfInterest3');
            $table->Integer('cityOfInterest3');
            $table->tinyInteger('searchSettingByEmail');
            $table->string('introduction');
            $table->tinyInteger('myArea');
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
