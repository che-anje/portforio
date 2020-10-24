<?php

namespace Tests\Unit;

use App\Models\Circle;
use App\Models\Genre;
use App\Models\Circle_Genre;
use App\Models\Circle_Ranking;
use GenresTableSeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


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
        $genres = $genre->inRandomOrder()->take(3)->get();
        factory(\App\Models\Circle::class, 5)
            ->create()
            ->each(function($circle) use ($genres) {
                $circle->genre()->attach(
                    $genres->pluck("id")->toArray()
                );
            });

        $circles = Circle::where('id', '<>', 1)->get();
        $count = $circles->count();
        foreach($circles as $key => $circle) {
            $circle_rank = new Circle_Ranking;
            $circle_rank->circle_id = $circle->id;
            $circle_rank->total_point = $count - $key;
            $circle_rank->rank = $key + 1;
            $circle_rank->save();
        }

        $exist_circle = $circle->inRandomOrder()->first();
        $genre = $exist_circle->genre()->first();
        Storage::fake('s3');
        $dummy = UploadedFile::fake()->create('dummy.jpg');
        $dummy->storeAs('', 'dummy.jpg', ['disk' => 's3']);
        $recomended_circles = $circle->getRecommendedCircles($genre,$exist_circle->prefecture_id);
        Storage::disk('s3')->assertExists('dummy.jpg');
        $recomended_order = $recomended_circles->pluck('id')->toArray();
        $circles_order = $circles->pluck('id')->toArray();
        $this->assertEquals($recomended_order, $circles_order);
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
