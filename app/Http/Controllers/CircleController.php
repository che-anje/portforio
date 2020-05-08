<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circle;
use App\Models\Profile;
use App\Models\Prefecture;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CircleController extends Controller
{
    public function getCircles(int $id) {
        
        if(Auth::check()) {
            $profile = Auth::user()->profile;
            $profile->prefectureOfInterest = $id;
            $profile->cityOfInterest = 0;
            $profile->save();
            $my_prefecture = Prefecture::where('id', $profile->prefectureOfInterest)->first();
        }else{
            $my_prefecture = null;
        }
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->get();
        $circles = Circle::where('prefecture_id', $id)->get();
        return view('home',  [
            'my_prefecture' => $my_prefecture,
            'prefectures' => $prefectures,
            'circles' => $circles,
        ]);
    }

    public function edit() {
        return view('circle_image');
    }

    public function up(Request $request) {
        $circle = Circle::find(1);
        
        if($request->file('circle_image')) {
            Storage::delete('public/CircleImages/'.$circle->image);
            $originalImg = $request->circle_image;
            $filePath = $originalImg->store('public/CircleImages');
            $circle->image = str_replace('public/CircleImages/', '', $filePath);
        }
        $circle->save();
    }

}
