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
        $profile = $user->profile;
        return view('mypage', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
