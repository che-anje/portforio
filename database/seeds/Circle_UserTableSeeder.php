<?php

use Illuminate\Database\Seeder;

class Circle_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Circle_User')->insert([
            'circle_id' => '1',
            'user_id' => '126',
        ]);
    }
}
