<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use App\Enums\Gender;
use Carbon\Carbon;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm() {
        $id = Auth::user()->id;
        return view('createProfile', [
            'user_id' => $id,
        ]);
    }

    public function create(Request $request) {
        $my_profile = new Profile();
        $my_profile->user_id = $request->user_id;
        $my_profile->familyName = $request->familyName;
        $my_profile->firstName = $request->firstName;
        $my_profile->name = $request->name;
        
        $my_profile->gender = $request->gender;
        $my_profile->birthdate_1i = $request->birthdate_1i;
        $my_profile->birthdate_2i = $request->birthdate_2i;
        $my_profile->birthdate_3i = $request->birthdate_3i;
        $my_profile->introduction = $request->introduction;
        $my_profile->save();
        return redirect('/');
    }

    /* もう少しいい書き方がありそうなので聞く */
    public function show() {
        $my_profile = Auth::user()->profile;
        $year = $my_profile->birthdate_1i;
        $month = $my_profile->birthdate_2i;
        $date = $my_profile->birthdate_3i;
        $birthday = $year.'-'.$month.'-'.$date;
        $age = Carbon::parse($birthday)->age;
        $gender = Profile::getGenderDescription($my_profile->gender);
        return view('showProfile', [
            'my_profile' => $my_profile,
            'age' => $age,
            'gender' => $gender,
        ]);
    }

    public function showEditForm() {
        $user = Auth::user();
        $my_profile = $user->profile;
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->get();
        return view('editProfile', [
            'my_profile' => $my_profile,
            'user' => $user,
            'prefectures' => $prefectures,
        ]);
    }
}
