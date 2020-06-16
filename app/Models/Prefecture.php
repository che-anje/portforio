<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\City;
use App\Models\Profile;
use App\Models\Circle;
use Illuminate\Support\Facades\Auth;

class Prefecture extends Model
{

    const ALL_PREFECTURE = 48;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'prefectureOfInterest');
    }

    public function circle()
    {
        return $this->hasOne(Circle::class);
    }


    
    public function cities()
    {   
        return $this->hasMany(City::class);
    } 

    public static function getPrefectures() {
        
        return Prefecture::orderBy('id','asc')->get();
    }

    



    

    


}
