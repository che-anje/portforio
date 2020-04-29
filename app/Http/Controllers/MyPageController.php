<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class MyPageController extends Controller
{
    public function show() {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('mypage', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
