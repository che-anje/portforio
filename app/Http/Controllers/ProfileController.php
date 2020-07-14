<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\CreateProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Circle;
use App\Models\EmailReset;
use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm() {
        $id = Auth::user()->id;
        $user = Auth::user();
        $my_profile = $user->profile ?: Profile::make();
        $prefectures = \App\Models\Prefecture::orderBy('id','asc')->get();
        $cities = \App\Models\City::where('prefecture_id', $my_profile->prefectureOfInterest)->get();
        return view('createProfile', [
            'user_id' => $id,
            'my_profile' => $my_profile,
            'user' => $user,
            'prefectures' => $prefectures,
            'cities' => $cities,
        ]);
    }

    /*public function create(CreateProfileRequest $request) {
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
    */
    public function create(CreateProfileRequest $request) {

        Auth::user()->profile()->create($request->validated());        
    
        return redirect('/');
    
    }

    /* もう少しいい書き方がありそうなので聞く */
    public function show(int $id) {
        $my_profile = Profile::find($id);
        $my_profile['image_path'] = $my_profile->getImagePathAttributes();
        $year = $my_profile->birthdate_1i;
        $month = $my_profile->birthdate_2i;
        $date = $my_profile->birthdate_3i;
        $birthday = $year.'-'.$month.'-'.$date;
        $age = Carbon::parse($birthday)->age;
        $gender = Profile::getGenderDescription($my_profile->gender);
        $circles = $my_profile->user->circles;
        $circle = new Circle;
        $circle->addInfomationToCircles($circles);
        return view('showProfile', [
            'my_profile' => $my_profile,
            'age' => $age,
            'gender' => $gender,
            'circles' => $circles,
        ]);
    }

    public function showEditForm() {
        if(Auth::id()!==139) {
            $user = Auth::user();
            $my_profile = $user->profile ?: Profile::make();
            $my_profile['image_path'] = $my_profile->getImagePathAttributes();
            $prefectures = Prefecture::orderBy('id','asc')->get();
            $cities = \App\Models\City::where('prefecture_id', $my_profile->prefectureOfInterest)->get();
            return view('editProfile', [
                'my_profile' => $my_profile,
                'user' => $user,
                'prefectures' => $prefectures,
                'cities' => $cities,
            ]);
        }else{
            return back();
        }
        
    }

    public function edit(EditProfileRequest $request) {
        $user = Auth::user();
        if($user->id !== 139) {
            try {
                DB::beginTransaction();

                $form = $request->validated();
                [ $deleteImageUrl ] = $user->updateProfile($form);
                if($deleteImageUrl) {
                    $disk = Storage::disk('s3');
                    $disk->delete('UserImages/' . $deleteImageUrl);
                }
                DB::commit();
                $response = redirect()
                    ->route('profile.show', ['id' => (int) $user->profile->id ])
                    ->with('flash_message', 'アカウントを更新しました。')
                ;
            } catch (\Exception $e) {
                DB::rollback();
                $response = redirect()
                    ->route('profile.show', ['id' => (int) $user->profile->id ])
                    ->with('flash_message', 'メール更新に失敗しました。');
            }
            return $response;
        }else{
            return redirect(route('profile.show', [$user->profile->id]));
        }
    }

    
}
