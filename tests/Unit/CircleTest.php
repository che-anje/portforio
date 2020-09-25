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
        $this->assertEquals($attributes['name'], $circle->name);
    }
}
