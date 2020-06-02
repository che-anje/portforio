<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use App\Traits\AboutPrefecture;

class PrefectureController extends Controller

{
    use aboutPrefecture;

    public function change(int $id) {
        if(Auth::check()) {
            $this->changePrefecture($id);
            return redirect('/');
        }else{
            $my_prefecture = Prefecture::find($id);
            $prefectures = $this->getPrefectures();
            session()->put(['my_prefecture' => $my_prefecture, 'prefectures' => $prefectures,]);
            return redirect('/');
        }
    }

    public function categoryPrefChange(int $pref_id, $category_id) {
        if(Auth::check()) {
            $this->changePrefecture($pref_id);
            
        }else{
            $my_prefecture = Prefecture::find($pref_id);
            $prefectures = $this->getPrefectures();
            session()->put(['my_prefecture' => $my_prefecture, 'prefectures' => $prefectures,]);
            
        }
        return redirect("/circle/$category_id/$pref_id");
    }

    public function circlePrefChange(int $pref_id, $category_id=null) {
        if(Auth::check()) {
            $this->changePrefecture($pref_id);
            
        }else{
            $my_prefecture = Prefecture::find($pref_id);
            $prefectures = $this->getPrefectures();
            session()->put(['my_prefecture' => $my_prefecture, 'prefectures' => $prefectures,]);
            
        }
        if($category_id){
            return redirect("/index/$pref_id?&category=$category_id");
        }else{
            return redirect("/index/$pref_id");
        }

    }
}
