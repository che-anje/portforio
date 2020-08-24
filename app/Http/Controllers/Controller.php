<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Prefecture;
use App\Models\Profile;
use App\Models\User;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use Illuminate\Http\Request;

    

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const ALL_PREFECTURE = 48;

    public function getSelectedPrefectureId(): int
    {
        
        if(Auth::check() && Auth::user()->profile->prefectureOfInterest != 0) {
            return Auth::user()->profile->prefectureOfInterest;
        }elseif(session()->exists('my_prefecture')) {
            return session('my_prefecture');
        }
        return self::ALL_PREFECTURE;
        
        
    }

    public function changeMyPrefecture(int $id) {
        $prefecture = new Prefecture;
        if($user = Auth::user()) {
            $user->profile->prefectureOfInterest = $id;
            $user->profile->cityOfInterest = 0;
            $user->profile->save();
            return;
        }
        Session::put('my_prefecture', $id);
        return;
    }

    public function insertLogOfShow($circle_id, $user_id=null) {
        $point_log = new Point_Log;
        $ip_address = \Request::ip();
        $session_id = session()->getId();
        $point = 1;
        if($point_log->CheckLogs($session_id,$user_id,$circle_id,$point)){
            $point_log->insert($ip_address, $session_id, $circle_id, $user_id, $point);
        }
        return;
    }


    public function insertLogOfRegister($circle_id, $user_id=null) {
        $point_log = new Point_Log;
        $ip_address = \Request::ip();
        $session_id = session()->getId();
        $point = 2;
        if($point_log->CheckLogs($session_id,$user_id,$circle_id,$point)){
            $point_log->insert($ip_address, $session_id, $circle_id, $user_id, $point);
        }
        return;
    }
}
