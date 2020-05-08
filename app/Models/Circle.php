<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Genre;

class Circle extends Model
{
    protected $fillable = [
        'name',
        'introduction',
        'prefecture_id',
        'detailedArea',
        'ageGroup',
        'activeDay',
        'cost',
    ];

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function genre() {
        return $this->belongsToMany('App\Models\Genre', 'circle_genre', 'circle_id', 'genre_id');
        //->withPivot('id');
    }

}
