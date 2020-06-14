<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function genres() {
        return $this->hasMany(Genre::class);
    }

    public function circles()
    {
        return $this->belongsToMany('App\Models\Circle');
    }

    public static function getAllCategories() {
        return Category::orderby('id', 'asc')->get();
    }

    public function getGenresOfCategories($categories) {
        foreach($categories as $category) {
            $category['genres'] = $category->genres()->orderby('id')->get();
        }
        return $categories;
    }

}
