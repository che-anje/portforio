<?php

use Illuminate\Database\Seeder;

class CirclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Circles')->insert([
            'name' => 'テニーズ',
            'introduction' => '楽しいテニスサークルです',
            'prefecture_id' => '27',
            'detailedArea' => '鶴舞公園テニスコート',
            'ageGroup' => '2',
            'activeDay' => '毎週水曜日',
            'cost' => 'なし',
        ]);
    }
}
