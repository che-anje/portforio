<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(
            [   
                "category_id" => 1,
                "name" => "友達づくり",
            ],
            [   
                "category_id" => 1,
                "name" => "カフェ会",
            ],
            [   
                "category_id" => 1,
                "name" => "ホームパーティ",
            ],
            [   
                "category_id" => 1,
                "name" => "飲み会",
            ],
            [   
                "category_id" => 1,
                "name" => "２０台友達づくり",
            ],
            [   
                "category_id" => 1,
                "name" => "女子会",
            ],
            [   
                "category_id" => 1,
                "name" => "ママ友",
            ],
            [   
                "category_id" => 1,
                "name" => "育児",
            ],
            [   
                "category_id" => 1,
                "name" => "パパ友",
            ],
            [   
                "category_id" => 1,
                "name" => "異業種交流",
            ],
            [   
                "category_id" => 1,
                "name" => "国際交流",
            ],
            [   
                "category_id" => 1,
                "name" => "雑談",
            ],
            [   
                "category_id" => 1,
                "name" => "漫画",
            ],
            [   
                "category_id" => 1,
                "name" => "音楽",
            ],
            [   
                "category_id" => 1,
                "name" => "朝活",
            ],
            [   
                "category_id" => 1,
                "name" => "動物・ペット",
            ],
            [   
                "category_id" => 1,
                "name" => "犬",
            ],
            [   
                "category_id" => 1,
                "name" => "猫",
            ],
            [   
                "category_id" => 1,
                "name" => "飲まない友",
            ],
            [   
                "category_id" => 1,
                "name" => "仕事終わり",
            ],
            [   
                "category_id" => 1,
                "name" => "主婦友",
            ],
            [   
                "category_id" => 1,
                "name" => "ランチ女子会",
            ],
            [   
                "category_id" => 1,
                "name" => "男子会",
            ],
            [   
                "category_id" => 1,
                "name" => "就職・転職",
            ],
            [   
                "category_id" => 1,
                "name" => "教員と保育士",
            ],
            [   
                "category_id" => 1,
                "name" => "フリーランス",
            ],
            [   
                "category_id" => 1,
                "name" => "同業種",
            ],
            [   
                "category_id" => 1,
                "name" => "愚痴聞き",
            ],
            [   
                "category_id" => 1,
                "name" => "アイドル",
            ],
            [   
                "category_id" => 1,
                "name" => "怖い話",
            ],
            [   
                "category_id" => 1,
                "name" => "LGBT",
            ],
            [   
                "category_id" => 1,
                "name" => "アニメ",
            ],
            [   
                "category_id" => 1,
                "name" => "インカレ・学生団体",
            ],
            [   
                "category_id" => 1,
                "name" => "グループチャット",
            ],
            [   
                "category_id" => 1,
                "name" => "シェアハウス",
            ],
            [   
                "category_id" => 1,
                "name" => "ファッション",
            ],
            [   
                "category_id" => 1,
                "name" => "音楽と文学",
            ],
            [   
                "category_id" => 1,
                "name" => "韓国好き",
            ],
            [   
                "category_id" => 1,
                "name" => "同郷仲間",
            ],
            [   
                "category_id" => 1,
                "name" => "メンタルケア",
            ],
            [   
                "category_id" => 1,
                "name" => "ヒーリング",
            ],
            [   
                "category_id" => 1,
                "name" => "心理学",
            ],
            [   
                "category_id" => 2,
                "name" => "サッカー",
            ], 
            [   
                "category_id" => 2,
                "name" => "フットサル",
            ],
            [   
                "category_id" => 2,
                "name" => "テニス",
            ],
            [   
                "category_id" => 2,
                "name" => "バレーボール",
            ],
            [   
                "category_id" => 2,
                "name" => "バスケットボール",
            ],
            [   
                "category_id" => 2,
                "name" => "ボルダリング",
            ],
            [   
                "category_id" => 2,
                "name" => "野球",
            ],
            [   
                "category_id" => 2,
                "name" => "ソフトボール",
            ],
            [   
                "category_id" => 2,
                "name" => "バドミントン",
            ],
            [   
                "category_id" => 2,
                "name" => "卓球",
            ],
            [   
                "category_id" => 2,
                "name" => "マリンスポーツ",
            ],
            [   
                "category_id" => 2,
                "name" => "サーフィン",
            ],
            [   
                "category_id" => 2,
                "name" => "ダイビング",
            ],
            [   
                "category_id" => 2,
                "name" => "水泳",
            ],
            [   
                "category_id" => 2,
                "name" => "スノーボード",
            ],
            [   
                "category_id" => 2,
                "name" => "スキー",
            ],
            [   
                "category_id" => 2,
                "name" => "ゴルフ",
            ],
            [   
                "category_id" => 2,
                "name" => "ランニング・ジョギング",
            ],
            [   
                "category_id" => 2,
                "name" => "ウォーキング",
            ],
            [   
                "category_id" => 2,
                "name" => "ダイエット",
            ],
            [   
                "category_id" => 2,
                "name" => "ダンス",
            ],
            [   
                "category_id" => 2,
                "name" => "格闘技",
            ],
            [   
                "category_id" => 2,
                "name" => "自転車",
            ],[   
                "category_id" => 2,
                "name" => "ヨガ",
            ],
            [   
                "category_id" => 2,
                "name" => "ボウリング",
            ],
            [   
                "category_id" => 3,
                "name" => "勉強会",
            ],
            [
                "category_id" => 3,   
                "name" => "読書会",
            ],
            [  
                "category_id" => 3, 
                "name" => "カメラ・写真",
            ],
            [   
                "category_id" => 3,
                "name" => "語学",
            ],
            [   
                "category_id" => 3,
                "name" => "英会話",
            ],
            [   
                "category_id" => 3,
                "name" => "プログラミング",
            ],
            [   
                "category_id" => 3,
                "name" => "デザイン",
            ],
            [   
                "category_id" => 3,
                "name" => "ビジネス",
            ],
            [   
                "category_id" => 3,
                "name" => "美容",
            ],
            [   
                "category_id" => 3,
                "name" => "資格試験",
            ],
            [   
                "category_id" => 3,
                "name" => "スペイン語",
            ],
            [   
                "category_id" => 3,
                "name" => "フランス語",
            ],
            [   
                "category_id" => 3,
                "name" => "中国語",
            ],
            [   
                "category_id" => 3,
                "name" => "韓国語",
            ],
            [   
                "category_id" => 3,
                "name" => "パソコン",
            ],
            [   
                "category_id" => 3,
                "name" => "ゲーム開発",
            ],
            [   
                "category_id" => 3,
                "name" => "空間デザイン",
            ],
            [   
                "category_id" => 3,
                "name" => "起業・スタートアップ",
            ],
            [   
                "category_id" => 3,
                "name" => "ブレーンストーミング",
            ],
            [   
                "category_id" => 3,
                "name" => "コピーライティング",
            ],
            [   
                "category_id" => 3,
                "name" => "経済",
            ],
            [   
                "category_id" => 3,
                "name" => "マーケティング",
            ],
            [   
                "category_id" => 3,
                "name" => "投資",
            ],
            [   
                "category_id" => 3,
                "name" => "副業",
            ],
            [   
                "category_id" => 3,
                "name" => "公務員試験",
            ],
            
            [   
                "category_id" => 4,
                "name" => "映画",
            ],
            [
                "category_id" => 4,   
                "name" => "絵画・アート",
            ],
            [  
                "category_id" => 4, 
                "name" => "演劇鑑賞・観劇",
            ],
            [   
                "category_id" => 4,
                "name" => "ミュージカル",
            ],
            [   
                "category_id" => 4,
                "name" => "クラシック音楽",
            ],
            [   
                "category_id" => 4,
                "name" => "コンサート",
            ],
            [   
                "category_id" => 4,
                "name" => "スポーツ観戦",
            ],
            [   
                "category_id" => 4,
                "name" => "サッカー観戦",
            ],
            [   
                "category_id" => 4,
                "name" => "プロ野球観戦",
            ],
            [   
                "category_id" => 4,
                "name" => "天体観測",
            ],
            [   
                "category_id" => 4,
                "name" => "ドラマ",
            ],
            [   
                "category_id" => 4,
                "name" => "アニメ",
            ],
            [   
                "category_id" => 4,
                "name" => "ファッションショー",
            ],
            [   
                "category_id" => 4,
                "name" => "お笑いライブ",
            ],
            [   
                "category_id" => 4,
                "name" => "オリジナルヒーローショー",
            ],
            [   
                "category_id" => 4,
                "name" => "海外ドラマ",
            ],
            [   
                "category_id" => 4,
                "name" => "ネット声優",
            ],
            [   
                "category_id" => 4,
                "name" => "洋楽",
            ],
            [   
                "category_id" => 4,
                "name" => "アイドル",
            ],
            [   
                "category_id" => 4,
                "name" => "KPOP",
            ],
            
            [   
                "category_id" => 5,
                "name" => "アウトドア",
            ],
            [   
                "category_id" => 5,
                "name" => "登山・ハイキング",
            ],
            [   
                "category_id" => 5,
                "name" => "ピクニック",
            ],
            [   
                "category_id" => 5,
                "name" => "キャンプ",
            ],
            [   
                "category_id" => 5,
                "name" => "旅行",
            ],
            [   
                "category_id" => 5,
                "name" => "散策・散歩",
            ],
            [   
                "category_id" => 5,
                "name" => "カメラ旅・散歩",
            ],
            [   
                "category_id" => 5,
                "name" => "神社・仏閣巡り",
            ],
            [   
                "category_id" => 5,
                "name" => "海",
            ],
            [   
                "category_id" => 5,
                "name" => "工場見学",
            ],
            [   
                "category_id" => 5,
                "name" => "ライブ",
            ],
            [   
                "category_id" => 5,
                "name" => "イベント",
            ],
            [   
                "category_id" => 5,
                "name" => "ボランティア",
            ],
            [   
                "category_id" => 5,
                "name" => "自然",
            ],
            [   
                "category_id" => 5,
                "name" => "釣り",
            ],
            [   
                "category_id" => 5,
                "name" => "クルージング",
            ],
            [   
                "category_id" => 5,
                "name" => "城・城郭巡り",
            ],
            [   
                "category_id" => 5,
                "name" => "御朱印集め",
            ],
            [   
                "category_id" => 5,
                "name" => "温泉",
            ],
            [   
                "category_id" => 5,
                "name" => "花見",
            ],
            [   
                "category_id" => 5,
                "name" => "クルマ",
            ],
            [   
                "category_id" => 5,
                "name" => "お笑いライブ",
            ],
            [   
                "category_id" => 5,
                "name" => "芸能イベント",
            ],
            [   
                "category_id" => 5,
                "name" => "古着屋巡り",
            ],
            [   
                "category_id" => 5,
                "name" => "農業",
            ],
            [   
                "category_id" => 5,
                "name" => "花火大会",
            ],
            [   
                "category_id" => 5,
                "name" => "フェス",
            ],
            [   
                "category_id" => 5,
                "name" => "ツーリング・ドライブ",
            ],
            [   
                "category_id" => 5,
                "name" => "競馬",
            ],
            [   
                "category_id" => 5,
                "name" => "日帰り旅行",
            ],
            
            [   
                "category_id" => 6,
                "name" => "グルメ・料理全般",
            ],
            [   
                "category_id" => 6,
                "name" => "食事会",
            ],
            [   
                "category_id" => 6,
                "name" => "晩ご飯",
            ],
            [   
                "category_id" => 6,
                "name" => "バーベキュー",
            ],
            [   
                "category_id" => 6,
                "name" => "食べ歩き",
            ],
            [   
                "category_id" => 6,
                "name" => "タコパ",
            ],
            [   
                "category_id" => 6,
                "name" => "和食",
            ],
            [   
                "category_id" => 6,
                "name" => "イタリアン",
            ],
            [   
                "category_id" => 6,
                "name" => "中華料理",
            ],
            [   
                "category_id" => 6,
                "name" => "ラーメン",
            ],
            [   
                "category_id" => 6,
                "name" => "お酒全般",
            ],
            [   
                "category_id" => 6,
                "name" => "朝食会",
            ],
            [   
                "category_id" => 6,
                "name" => "韓国料理",
            ],
            [   
                "category_id" => 6,
                "name" => "世界の料理",
            ],
            [   
                "category_id" => 6,
                "name" => "スパイスカレー",
            ],
            [   
                "category_id" => 6,
                "name" => "エスニック料理",
            ],
            [   
                "category_id" => 6,
                "name" => "低糖質料理",
            ],
            [   
                "category_id" => 6,
                "name" => "パン",
            ],
            [   
                "category_id" => 6,
                "name" => "うどん",
            ],
            [   
                "category_id" => 6,
                "name" => "スイーツ",
            ],
            [   
                "category_id" => 6,
                "name" => "肉",
            ],
            [   
                "category_id" => 6,
                "name" => "日本酒",
            ],
            [   
                "category_id" => 6,
                "name" => "ワイン",
            ],
            [   
                "category_id" => 6,
                "name" => "梅酒",
            ],
            [   
                "category_id" => 6,
                "name" => "BAR",
            ],
            [   
                "category_id" => 6,
                "name" => "おしゃれなお店",
            ],
            [   
                "category_id" => 6,
                "name" => "食べ放題",
            ],
            [   
                "category_id" => 6,
                "name" => "鍋",
            ],
            
            [   
                "category_id" => 7,
                "name" => "音楽全般",
            ],
            [   
                "category_id" => 7,
                "name" => "ワークショップ",
            ],
            [   
                "category_id" => 7,
                "name" => "オーケストラ",
            ],
            [   
                "category_id" => 7,
                "name" => "吹奏楽",
            ],
            [   
                "category_id" => 7,
                "name" => "合唱",
            ],
            [   
                "category_id" => 7,
                "name" => "弦楽合奏",
            ],
            [   
                "category_id" => 7,
                "name" => "クラシック音楽",
            ],
            [   
                "category_id" => 7,
                "name" => "アンサンブル",
            ],
            [   
                "category_id" => 7,
                "name" => "作曲",
            ],
            [   
                "category_id" => 7,
                "name" => "コーラス",
            ],
            [   
                "category_id" => 7,
                "name" => "バンド",
            ],
            [   
                "category_id" => 7,
                "name" => "JPOP",
            ],
            [   
                "category_id" => 7,
                "name" => "ピアノ",
            ],
            [   
                "category_id" => 7,
                "name" => "ギター",
            ],
            [   
                "category_id" => 7,
                "name" => "劇団・演劇",
            ],
            [   
                "category_id" => 7,
                "name" => "ミュージカル",
            ],
            [   
                "category_id" => 7,
                "name" => "芸術・アート",
            ],
            [   
                "category_id" => 7,
                "name" => "映像制作",
            ],
            [   
                "category_id" => 7,
                "name" => "ハワイアンソング",
            ],
            [   
                "category_id" => 7,
                "name" => "管楽器アンサンブル",
            ],
            [   
                "category_id" => 7,
                "name" => "DTM",
            ],
            [   
                "category_id" => 7,
                "name" => "メディアアート",
            ],
            [   
                "category_id" => 7,
                "name" => "録音",
            ],
            [   
                "category_id" => 7,
                "name" => "ボカロ",
            ],
            [   
                "category_id" => 7,
                "name" => "アカペラ",
            ],
            [   
                "category_id" => 7,
                "name" => "ゴスペル",
            ],
            [   
                "category_id" => 7,
                "name" => "ジャズ",
            ],
            [   
                "category_id" => 7,
                "name" => "ユニット",
            ],
            [   
                "category_id" => 7,
                "name" => "ロック",
            ],
            [   
                "category_id" => 7,
                "name" => "軽音",
            ],
            [   
                "category_id" => 7,
                "name" => "クラブミュージック",
            ],
            [   
                "category_id" => 7,
                "name" => "DJ",
            ],
            [   
                "category_id" => 7,
                "name" => "伝統芸能",
            ],
            [   
                "category_id" => 7,
                "name" => "映画制作",
            ],
            [   
                "category_id" => 7,
                "name" => "YouTube動画制作",
            ],
            [   
                "category_id" => 7,
                "name" => "小説",
            ],
            [   
                "category_id" => 7,
                "name" => "絵本",
            ],
            [   
                "category_id" => 7,
                "name" => "イラスト",
            ],
            [   
                "category_id" => 7,
                "name" => "ハンドメイド",
            ],
            [   
                "category_id" => 7,
                "name" => "編み物",
            ],
            [   
                "category_id" => 7,
                "name" => "手品",
            ],
            [   
                "category_id" => 7,
                "name" => "町おこし",
            ],
            [   
                "category_id" => 7,
                "name" => "俳句",
            ],
            [   
                "category_id" => 7,
                "name" => "DIY",
            ],
            [   
                "category_id" => 7,
                "name" => "ラテアート",
            ],
            
            [   
                "category_id" => 8,
                "name" => "カラオケ",
            ],
            [   
                "category_id" => 8,
                "name" => "トランプ",
            ],
            [   
                "category_id" => 8,
                "name" => "ダーツ",
            ],
            [   
                "category_id" => 8,
                "name" => "ビリヤード",
            ],
            [   
                "category_id" => 8,
                "name" => "麻雀",
            ],
            [   
                "category_id" => 8,
                "name" => "将棋",
            ],
            [   
                "category_id" => 8,
                "name" => "囲碁",
            ],
            [   
                "category_id" => 8,
                "name" => "オセロ",
            ],
            [   
                "category_id" => 8,
                "name" => "人狼",
            ],
            [   
                "category_id" => 8,
                "name" => "レジャー",
            ],
            [   
                "category_id" => 8,
                "name" => "ゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "ボードゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "サバイバルゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "ポーカー",
            ],
            [   
                "category_id" => 8,
                "name" => "クイズ",
            ],
            [   
                "category_id" => 8,
                "name" => "バンジージャンプ",
            ],
            [   
                "category_id" => 8,
                "name" => "ゴーカート",
            ],
            [   
                "category_id" => 8,
                "name" => "水遊び",
            ],
            [   
                "category_id" => 8,
                "name" => "ドローン",
            ],
            [   
                "category_id" => 8,
                "name" => "ジャグリング・大道芸",
            ],
            [   
                "category_id" => 8,
                "name" => "カードゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "スマホゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "テーブルゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "TRPG",
            ],
            [   
                "category_id" => 8,
                "name" => "リアル脱出ゲーム",
            ],
            [   
                "category_id" => 8,
                "name" => "謎解き",
            ],
            [   
                "category_id" => 8,
                "name" => "ファミコン",
            ],
            [   
                "category_id" => 8,
                "name" => "ポケモン",
            ],
            [   
                "category_id" => 8,
                "name" => "モンハン",
            ],
            [   
                "category_id" => 8,
                "name" => "パズドラ",
            ],
            [   
                "category_id" => 8,
                "name" => "スマブラ",
            ],
            [   
                "category_id" => 8,
                "name" => "遊戯王",
            ],

        );
    }
}
