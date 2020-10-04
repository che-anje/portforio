<?php

namespace Tests\Unit;

use App\Models\Circle;
use App\Models\Genre;
use App\Models\Circle_Genre;
use GenresTableSeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CircleTest extends TestCase
{
    use RefreshDatabase;
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

    /*public function getRecommendedCircles($genre,$prefecture_id) {
        $circles = Circle::where('prefecture_id',$prefecture_id)->genre($genre->id)->sortByPopularity()->get();
        $circle = new Circle;
        $circle->addInfomationToCircles($circles);
        return $circles;
    }*/

    public function testGetRecommendedCircles_成功() {
        $this->seed();
        $circle = new Circle;
        $genre = new Genre;
        $genres = $genre->all();
        factory(\App\Models\Circle::class, 10)
            ->create()
            ->each(function($circle) use ($genres) {
                $circle->genre()->attach(
                    $genres->random(rand(1,3))->pluck("id")->toArray()
                );
            });
        $exist_circle = $circle->inRandomOrder()->first();
        $genre = $exist_circle->genre()->first();
        $prefecture_id = $exist_circle->prefecture_id;
        $circles = $circle->getRecommendedCircles($genre,$prefecture_id);
        dd($circles);
        $this->assertTrue(true);
    }

    public function testAddInfomationToCircles_成功() {
        $this->assertTrue(true);
    }

    public function testGetImagePathAttributes_成功() {
        $this->assertTrue(true);
    }

    public function testAddInfomationToCircle_成功() {
        $this->assertTrue(true);
    }

    public function testGetCircleList_成功() {
        $this->assertTrue(true);
    }

    public function testGetCircleMembers_成功() {
        $this->assertTrue(true);
    }

    public function testGetCheckedGenres() {
        $this->assertTrue(true);
    }

    public function testGetPopGenres() {
        $this->assertTrue(true);
    }

    public function testSortCirclesByPopularity() {
        $this->assertTrue(true);
    }

    public function testSortByNewArrival() {
        $this->assertTrue(true);
    }

   public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }
}
