<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function genre() {
        return $this->hasMany(Genre::class);
    }
}
