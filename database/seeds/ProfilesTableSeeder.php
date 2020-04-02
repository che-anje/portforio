<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Profiles')->insert([
            'surName' => '崔',
            'familyName' => '央載',
            'name' => 'あんじぇ',
            'gender' => '1',
            'genderPublishState' => '1',
            'birthday' => '19960225',
            'birthdayPublishState' => '1',
            'prefectureOfInterest1' => '1',
            'cityOfInterest1' => '1',
            'prefectureOfInterest2' => '1',
            'cityOfInterest2' => '2',
            'prefectureOfInterest3' => '1',
            'cityOfInterest3' => '3',
            'searchSettingByEmail' => '1',
            'introduction' => 'よろしくお願いします。',
            'myArea' => '1',
        ]);
    }
}
