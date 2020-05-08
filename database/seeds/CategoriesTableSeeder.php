<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    protected $categories = [
        ['name' => 'みんなで語る'],
        ['name' => '体を動かす'],
        ['name' => 'みんなで学ぶ'],
        ['name' => 'みんなで観る'],
        ['name' => 'みんなで行く'],
        ['name' => 'みんなで食べる'],
        ['name' => 'みんなで創る'],
        ['name' => 'みんなで遊ぶ'],
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
