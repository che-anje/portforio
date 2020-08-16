<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Circle;

class MyPageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('has.profile');
    }
    
    public function show() {
        $user = Auth::user();
        $profile = $user->profile;
        $profile['image_path'] = $profile->getImagePathAttributes();
        $circles = $user->circles;
        $circle = new Circle;
        $circle->addInfomationToCircles($circles);
        return view('mypage', [
            'user' => $user,
            'profile' => $profile,
            'circles' => $circles,
        ]);
    }
}
