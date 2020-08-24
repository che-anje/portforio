<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'familyName' => '鈴木',
            'firstName' => '一郎',
            'name' => '@guest',
            'gender' => 1,
            'prefectureOfInterest' => 48,
            'cityOfInterest' => 0,
            'searchSettingByEmail' => 1,
            'introduction' => 'よろしくお願いします。',
            'birthdate_1i' => 1995,
            'birthdate_2i' => 7,
            'birthdate_3i' => 5,
            'user_id' => 1,
            'user_image' => '7Rgwv8r9If4LdbjHduMDyvrTsk8s8aL06xP7eb4T.jpeg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
