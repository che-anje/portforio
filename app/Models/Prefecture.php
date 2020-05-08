<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\City;
use App\Models\Profile;
use App\Models\Circle;

class Prefecture extends Model
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'foreign_key', 'prefectureOfInterest');
    }

    public function circle()
    {
        return $this->hasOne(Circle::class);
    }


    
    public function cities()
    {   
        return $this->hasMany(City::class);
    } 
}
