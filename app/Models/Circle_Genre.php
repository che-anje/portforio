<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circle_Genre extends Model
{
    protected $table = 'circle_genre';

    public function updateCircleGenres($circle_id,$genres) {
        $this->where('circle_id', $circle_id)->delete();
        $this->updateCircleGenre($circle_id,$genres);
    }

    public function updateCircleGenre($circle_id,$genres) {
        foreach((array)$genres as $genre) {
            $circle_genre = new Circle_Genre;
            $circle_genre->circle_id = $circle_id;
            $circle_genre->genre_id = $genre;
            $circle_genre->save();
        }
        
    }
}
