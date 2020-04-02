<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\City;

class Prefecture extends Model
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    public function cities()
    {   
        return $this->hasMany(City::class);
    } 
}
