<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\CreateProfileRequest;
use Illuminate\Support\Facades\Hash;
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

    public function create(CreateProfileRequest $request) {
        $my_profile = new Profile();
        $my_profile->user_id = $request->user_id;
        $my_profile->familyName = $request->familyName;
        $my_profile->firstName = $request->firstName;
        $my_profile->name = $request->name;
        
        $my_profile->gender = $request->gender;
        $my_profile->birthdate_1i = $request->birthdate_1i;
        $my_profile->birthdate_2i = $request->birthdate_2i;
        $my_profile->birthdate_3i = $request->birthdate_3i;
        $my_profile->prefectureOfInterest = $request->prefectureOfInterest;
        $my_profile->cityOfInterest = $request->cityOfInterest;
        $my_profile->introduction = $request->introduction;
        $my_profile->save();
        
        return redirect('/');
    }

    /* もう少しいい書き方がありそうなので聞く */
    public function show(int $id) {
        $my_profile = Profile::find($id);
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

    public function showEditForm(int $id) {
        $user = User::where('id', $id)->first();
        $my_profile = $user->profile ?: Profile::make();
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->get();
        $cities = \App\Models\City::where('prefecture_id', $my_profile->prefectureOfInterest)->get();
        return view('editProfile', [
            'my_profile' => $my_profile,
            'user' => $user,
            'prefectures' => $prefectures,
            'cities' => $cities,
        ]);
    }

    public function edit(int $id, EditProfileRequest $request) {
        $my_profile = Profile::where('user_id',$id)->first();
        $my_profile->familyName = $request->familyName;
        $my_profile->firstName = $request->firstName;
        $my_profile->name = $request->name;
        $my_profile->gender = $request->gender;
        $my_profile->birthdate_1i = $request->birthdate_1i;
        $my_profile->birthdate_2i = $request->birthdate_2i;
        $my_profile->birthdate_3i = $request->birthdate_3i;
        $my_profile->prefectureOfInterest = $request->prefectureOfInterest;
        $my_profile->cityOfInterest = $request->cityOfInterest;
        $my_profile->searchSettingByEmail = $request->searchSettingByEmail;
        $my_profile->introduction = $request->introduction;
        if($request->user_image) {
            $originalImg = $request->user_image;
            $filePath = $originalImg->store('public/UserImages');
            $my_profile->user_image = str_replace('public/UserImages/', '', $filePath);
        }
        $my_profile->save();

        $user = User::find($id);
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/');
    }
}
