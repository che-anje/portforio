<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

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
        return $this->hasMany('App\Models\Circle');
    }

    public function getImagePathAttributes() {
        return Storage::disk('s3')->url('CategoryImages/' . $this->image);
    }

}
