<?php namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;

trait aboutPrefecture
{
    public function getPrefectures() {
        
        return Prefecture::orderBy('id','asc')->get();
    }

    public function getMyPrefecture() {
        
        $my_profile = Auth::user()->profile;
        return Prefecture::where('id', $my_profile->prefectureOfInterest)->first();
        
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