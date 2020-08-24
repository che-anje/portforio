<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    protected $categories = [
        [
            'id' => 1,
            'name' => 'みんなで語る',
            'image' => 'WM2y3FUptyCIon2gCHwkhvF8PmD2ozDJTTp1KrYM.jpeg',
        ],
        [
            'id' => 2,
            'name' => '体を動かす',
            'image' => 'WzFmeg25Xh4oApMobmkscuS9LmB6Ul4UqOJovldP.jpeg',
        ],
        [
            'id' => 3,
            'name' => 'みんなで学ぶ',
            'image' => 'KaP7o1Gd83UD1jjs7LP7j8v5BR5gOciQEihLd9fb.jpeg',
        ],
        [
            'id' => 4,
            'name' => 'みんなで観る',
            'image' => 'vunKorb5xFffntCBMTMcbboCyOWaHURL4JYqQMrf.jpeg',
        ],
        [
            'id' => 5,
            'name' => 'みんなで行く',
            'image' => '4NJme68gnt3l7F2MRkoDZdG0veKmvZJXIFqwHkJc.jpeg',
        ],
        [
            'id' => 6,
            'name' => 'みんなで食べる',
            'image' => 'C7SRcAA3LZcY1Y30VwrCxhieqFZtF7tlm9cTO9pH.jpeg',
        ],
        [
            'id' => 7,
            'name' => 'みんなで創る',
            'image' => '8fgqGzRdnmJ5vKmfff9Sc5XaYDayHskSPwlbTNiV.jpeg',
        ],
        [
            'id' => 8,
            'name' => 'みんなで遊ぶ',
            'image' => 'WpVILC82DJH97NpvPkqC6I7n9JNC6Ia9BYGonJsu.jpeg',
        ],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */

    

    public function run()
    {
        foreach($this->categories as $category) {
            Category::create($category);
        }
    }
}
