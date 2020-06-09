<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Circle;
use App\Models\User;

class Board extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'board_users', 'board_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function circle()
    {
        return $this->belongsTo('App\Models\Circle');
    }
}
