<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use Illuminate\Http\Request;

class Point_Log extends Model
{
    protected $table = 'point_logs';

    protected $fillable = [
        'ip_address', 'session_id', 'circle_id', 'user_id', 'point'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function insert($ip_address, $session_id, $circle_id, $user_id=null, $point) {
        \Session::regenerateToken(); 
        $log = new Point_Log;
        $log->ip_address = ip2long($ip_address);
        $log->session_id = $session_id;
        $log->circle_id = $circle_id;
        $log->user_id = $user_id;
        $log->point = $point;
        $log->save();
    }

    public function CheckLogs($session_id,$user_id,$circle_id,$point) {
        $query = Point_Log::query();
        $query->where('session_id',$session_id);
        $query->where('user_id',$user_id);
        $query->where('circle_id',$circle_id);
        $query->where('point',$point);
        $log = $query->whereRaw('created_at > NOW() - INTERVAL 1 HOUR')->get();
        return !isset($log[0]);
    }
}
