<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mosels\Prefecture;

class Area extends Model
{
    public function prefectures()
    {
        return $this->hasMany(Prefecture::class);
    } 
}
