<?php

namespace Tests\Unit;

use App\Models\Circle;
use Tests\TestCase;


class CircleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreateCircle_成功() {
        $attributes = [
            'name' => "テストくん",
            'introduction' => "宜しくお願いします。",
            'prefecture_id' => 1,
            'detailedArea' => "札幌",
            'category_id' => 1,
            'ageGroup' => 1,
            'activityDay' => "日曜日",
            'cost' => "1000円",
            'image' => "画像",
            'recruit_status' => 1,
            'description_template' => "名前、年齢",
            'request_required' => 0,
            'private_status' => 0,
            'admin_user_id' => 1,
        ];
        $circle = new Circle;
        $circle->createCircle($attributes);
        $this->assertDatabaseHas('circles', $attributes);
        $circle->where($attributes)->delete();
    }

    public function testUpdateCircle_成功() {
        $attributes = [
            'name' => "テストサークル",
            'introduction' => "楽しいよ。",
            'prefecture_id' => 1,
            'detailedArea' => "札幌",
            'category_id' => 1,
            'ageGroup' => 1,
            'activityDay' => "日曜日",
            'cost' => "1000円",
            'image' => "画像",
            'recruit_status' => 1,
            'description_template' => "名前、年齢",
            'request_required' => 0,
            'private_status' => 0,
            'admin_user_id' => 1,
        ];
        $circle = new Circle;
        $circle->createCircle($attributes);
        $new_data = [
            'name' => "変更サークル",
            'introduction' => "Hello,world",
            'prefecture_id' => 2,
            'detailedArea' => "青森",
            'category_id' => 2,
            'ageGroup' => 1,
            'activityDay' => "土曜日、日曜日",
            'cost' => "2000円",
            'image' => "画像２",
            'recruit_status' => 1,
            'description_template' => "名前、年齢、性別",
            'request_required' => 0,
            'private_status' => 0,
            'admin_user_id' => 1,
        ];
        $delete_image = $circle->updateCircle($new_data);
        $this->assertDatabaseHas('circles',$new_data);
        $this->assertDatabaseMissing('circles', $attributes);
        $this->assertEquals([$attributes['image']], $delete_image);
        $circle->where($new_data)->delete();
    }

    public function testGetRecommendedCircles_成功() {
        $this->assertTrue(true);
    }

    public function testGetCircleList_成功() {
        $this->assertTrue(true);
    }

    public function testGetCircleMembers() {
        $this->assertTrue(true);
    }
}
