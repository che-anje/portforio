<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CirclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('circles')->insert([
            'name' => 'テニーズ',
            'admin_user_id' => 1,
            'introduction' => '楽しいテニスサークルです',
            'prefecture_id' => 27,
            'category_id' => 1,
            'detailedArea' => '鶴舞公園テニスコート',
            'ageGroup' => '2',
            'activityDay' => '毎週水曜日',
            'cost' => 'なし',
            'image' => 'OjsgvLxU77J5SvlkVdYzF6Tpn2AIKXV2XHuMprXK.jpeg',
            'recruit_status' => 0,
            'description_template' => '名前、生年月日、好きなスポーツなど',
            'request_required' => 0,
            'private_status' => 0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
