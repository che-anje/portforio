<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::truncate();
        Area::create($this->area(1, '北海道', 'ホッカイドウ')); 
        Area::create($this->area(2, '東北', 'トウホク')); 
        Area::create($this->area(3, '関東', 'カントウ')); 
        Area::create($this->area(4, '中部', 'チュウブ')); 
        Area::create($this->area(5, '近畿', 'キンキ')); 
        Area::create($this->area(6, '中国', 'チュウゴク')); 
        Area::create($this->area(7, '四国', 'シコク')); 
        Area::create($this->area(8, '九州', 'キュウシュウ')); 
    }

    public function area($id, $name, $kana)
    {
        return [
            'id'    => $id,
            'name'  => $name,
            'kana'  => $kana
        ];
    }
}
