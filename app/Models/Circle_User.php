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

    public function createCircleUser($user_id, $circle_id, int $approval) {
        $circle_user = new Circle_User;
        $circle_user->user_id = $user_id;
        $circle_user->circle_id = $circle_id;
        $circle_user->approval = $approval;
        $circle_user->save();
        return $circle_user;
    }
}

