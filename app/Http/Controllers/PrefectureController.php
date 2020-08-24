<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Session;

class PrefectureController extends Controller

{

    public function change(int $id) {
        $prefecture = new Prefecture;
        if($user = Auth::user()) {
            $user->profile->prefectureOfInterest = $id;
            $user->profile->cityOfInterest = 0;
            $user->profile->save();
            return;
        }
        Session::put('my_prefecture', $id);
        Session::save();
        return redirect('/');
        //$this->changeMyPrefecture($id);
        
    }

    public function categoryPrefChange(int $pref_id, $category_id) {
        $prefecture = new Prefecture;
        $this->changeMyPrefecture($pref_id);
        return redirect("/circle/$category_id/$pref_id");
    }

    public function circlePrefChange(int $pref_id, $category_id=null) {
        $prefecture = new Prefecture;
        $this->changeMyPrefecture($pref_id);
        if($category_id){
            return redirect("/index/$pref_id?&category=$category_id");
        }else{
            return redirect("/index/$pref_id");
        }

    }
}
