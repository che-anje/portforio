<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prefecture;
use App\Models\Town;

class City extends Model
{
    public function prefecture()
    {   
        return $this->belongsTo(Prefecture::class);
    } 

    public function towns()
    {   
        return $this->hasMany(Town::class);
    }
}
