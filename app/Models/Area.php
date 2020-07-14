<?php

namespace App\Models;

use App\Mosels\Prefecture;
use Illuminate\Database\Eloquent\Model;


class Area extends Model
{
    public function prefectures()
    {
        return $this->hasMany(Prefecture::class);
    } 
}
