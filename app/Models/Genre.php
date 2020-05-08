<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Circle;
use App\Models\Category;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function circle()
    {
        return $this->belongsToMany('App\Models\Circle');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
