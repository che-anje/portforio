<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Town extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    } 
}
