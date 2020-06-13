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

    
    public static function getMyPrefecture() {
        if(Auth::check()) {
        //ログインユーザーの場合
            if(Auth::user()->profile->prefectureOfInterest != 0) {
            //プロフィールに都道府県を設定している場合
                return Auth::user()->profile->prefecture;
            }elseif(session()->exists('my_prefecture')){
            //セッションになら都道府県がある場合
                return session('my_prefecture');
            }else{
            //どちらにも設定していない場合
                return Prefecture::find(48);
            }
        }elseif(session()->exists('my_prefecture')){
        //ゲストでセッションがある場合
            return session('my_prefecture');
        }else{
        //ゲストでセッションがない場合
            return Prefecture::find(48);
        }
    }

    public static function getCirclePrefecture() {
        
    }

    public function changePrefecture(int $id) {
        $profile = Auth::user()->profile;
            $profile->prefectureOfInterest = $id;
            $profile->cityOfInterest = 0;
            $profile->save();
            $my_prefecture = Prefecture::find($id);
            $prefectures = $this->getPrefectures();
            session()->put(['my_prefecture' => $my_prefecture, 'prefectures' => $prefectures,]);
        
    }
}
