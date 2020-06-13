<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circle_User extends Model
{
    protected $table = 'circle_user';

    public function scopeGetApproval($query,$circle_id,$user_id) {
        if(Circle_User::where('circle_id', $circle_id)->where('user_id', $user_id)->first()){
            return $query->where('circle_id', $circle_id)->where('user_id', $user_id)->first()->approval;
            
        }else{
            return 0;
        }
    }
}

