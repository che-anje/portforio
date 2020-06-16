<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Prefecture;
use App\Models\Profile;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getSelectedPrefectureId(): int
    {
        if(Auth::check() && Auth::user()->profile->prefectureOfInterest != 0) {
            return Auth::user()->profile->prefectureOfInterest;
        }
        if(session()->exists('my_prefecture')) {
            return session('my_prefecture');
        }
        return Prefecture::ALL_PREFECTURE;
    }

    public function changeMyPrefecture(int $id) {
        $prefecture = new Prefecture;
        if($user = Auth::user()) {
            $user->profile->prefectureOfInterest = $id;
            $user->profile->cityOfInterest = 0;
            $user->profile->save();
            return;
        }
        session()->put(['my_prefecture' => $id]);
    }
}
