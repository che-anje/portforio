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
}
