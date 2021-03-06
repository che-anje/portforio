<?php

use Illuminate\Database\Seeder;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PrefecturesTableSeeder extends Seeder
{
    
    protected $prefs = [ 
        [   
            "id" => 1,
            "area_id" => 1,
            "name" => "北海道",
            "kana" => "ホッカイドウ",
        ],  
        [   
            "id" => 2,
            "area_id" => 2,
            "name" => "青森県",
            "kana" => "アオモリケン",
        ],  
        [   
            "id" => 3,
            "area_id" => 2,
            "name" => "岩手県",
            "kana" => "イワテケン",
        ],  
        [   
            "id" => 4,
            "area_id" => 2,
            "name" => "宮城県",
            "kana" => "ミヤギケン",
        ],  
        [   
            "id" => 5,
            "area_id" => 2,
            "name" => "秋田県",
            "kana" => "アキタケン",
        ],  
        [   
            "id" => 6,
            "area_id" => 2,
            "name" => "山形県",
            "kana" => "ヤマガタケン",
        ],  
        [   
            "id" => 7,
            "area_id" => 2,
            "name" => "福島県",
            "kana" => "フクシマケン",
        ],
        [
            "id" => 8,
            "area_id" => 3,
            "name" => "茨城県",
            "kana" => "イバラキケン",
        ],
        [
            "id" => 9,
            "area_id" => 3,
            "name" => "栃木県",
            "kana" => "トチギケン",
        ],
        [
            "id" => 10,
            "area_id" => 3,
            "name" => "群馬県",
            "kana" => "グンマケン",
        ],
        [
            "id" => 11,
            "area_id" => 3,
            "name" => "埼玉県",
            "kana" => "サイタマケン",
        ],
        [
            "id" => 12,
            "area_id" => 3,
            "name" => "千葉県",
            "kana" => "チバケン",
        ],
        [
            "id" => 13,
            "area_id" => 3,
            "name" => "東京都",
            "kana" => "トウキョウト",
        ],
        [
            "id" => 14,
            "area_id" => 3,
            "name" => "神奈川県",
            "kana" => "カナガワケン",
        ],
        [
            "id" => 15,
            "area_id" => 4,
            "name" => "新潟県",
            "kana" => "ニイガタケン",
        ],
        [
            "id" => 16,
            "area_id" => 4,
            "name" => "富山県",
            "kana" => "トヤマケン",
        ],
        [
            "id" => 17,
            "area_id" => 4,
            "name" => "石川県",
            "kana" => "イシカワケン",
        ],
        [
            "id" => 18,
            "area_id" => 4,
            "name" => "福井県",
            "kana" => "フクイケン",
        ],
        [
            "id" => 19,
            "area_id" => 4,
            "name" => "山梨県",
            "kana" => "ヤマナシケン",
        ],
        [
            "id" => 20,
            "area_id" => 4,
            "name" => "長野県",
            "kana" => "ナガノケン",
        ],
        [
            "id" => 21,
            "area_id" => 4,
            "name" => "岐阜県",
            "kana" => "ギフケン",
        ],
        [
            "id" => 22,
            "area_id" => 4,
            "name" => "静岡県",
            "kana" => "シズオカケン",
        ],
        [
            "id" => 23,
            "area_id" => 4,
            "name" => "愛知県",
            "kana" => "アイチケン",
        ],
        [
            "id" => 24,
            "area_id" => 5,
            "name" => "三重県",
            "kana" => "ミエケン",
        ],
        [
            "id" => 25,
            "area_id" => 5,
            "name" => "滋賀県",
            "kana" => "シガケン",
        ],
        [
            "id" => 26,
            "area_id" => 5,
            "name" => "京都府",
            "kana" => "キョウトフ",
        ],
        [
            "id" => 27,
            "area_id" => 5,
            "name" => "大阪府",
            "kana" => "オオサカフ",
        ],
        [
            "id" => 28,
            "area_id" => 5,
            "name" => "兵庫県",
            "kana" => "ヒョウゴケン",
        ],
        [
            "id" => 29,
            "area_id" => 5,
            "name" => "奈良県",
            "kana" => "ナラケン",
        ],
        [
            "id" => 30,
            "area_id" => 5,
            "name" => "和歌山県",
            "kana" => "ワカヤマケン",
        ],
        [
            "id" => 31,
            "area_id" => 6,
            "name" => "鳥取県",
            "kana" => "トットリケン",
        ],
        [
            "id" => 32,
            "area_id" => 6,
            "name" => "島根県",
            "kana" => "シマネケン",
        ],
        [
            "id" => 33,
            "area_id" => 6,
            "name" => "岡山県",
            "kana" => "オカヤマケン",
        ],
        [
            "id" => 34,
            "area_id" => 6,
            "name" => "広島県",
            "kana" => "ヒロシマケン",
        ],
        [
            "id" => 35,
            "area_id" => 6,
            "name" => "山口県",
            "kana" => "ヤマグチケン",
        ],
        [
            "id" => 36,
            "area_id" => 7,
            "name" => "徳島県",
            "kana" => "トクシマケン",
        ],
        [
            "id" => 37,
            "area_id" => 7,
            "name" => "香川県",
            "kana" => "カガワケン",
        ],
        [
            "id" => 38,
            "area_id" => 7,
            "name" => "愛媛県",
            "kana" => "エヒメケン",
        ],
        [
            "id" => 39,
            "area_id" => 7,
            "name" => "高知県",
            "kana" => "コウチケン",
        ],
        [
            "id" => 40,
            "area_id" => 8,
            "name" => "福岡県",
            "kana" => "フクオカケン",
        ],
        [
            "id" => 41,
            "area_id" => 8,
            "name" => "佐賀県",
            "kana" => "サガケン",
        ],
        [
            "id" => 42,
            "area_id" => 8,
            "name" => "長崎県",
            "kana" => "ナガサキケン",
        ],
        [
            "id" => 43,
            "area_id" => 8,
            "name" => "熊本県",
            "kana" => "クマモトケン",
        ],
        [
            "id" => 44,
            "area_id" => 8,
            "name" => "大分県",
            "kana" => "オオイタケン",
        ],
        [
            "id" => 45,
            "area_id" => 8,
            "name" => "宮崎県",
            "kana" => "ミヤザキケン",
        ],
        [
            "id" => 46,
            "area_id" => 8,
            "name" => "鹿児島県",
            "kana" => "カゴシマケン",
        ],
        [
            "id" => 47,
            "area_id" => 8,
            "name" => "沖縄県",
            "kana" => "オキナワケン",
        ],
        [
            "id" => 48,
            "area_id" => 8,
            "name" => "全国",
            "kana" => "ゼンコク",
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->prefs as $pref) {
            Prefecture::create($pref);
        } 
    }
}
