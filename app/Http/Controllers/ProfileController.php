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

    public function edit(EditProfileRequest $request) {
        $user = Auth::user();
        try {
            DB::beginTransaction();
    
            $form = $request->validated();
            [ $deleteImageUrl ] = $user->updateProfile($form);
            if($deleteImageUrl) {
                Storage::delete('public/UserImages/' . $deleteImageUrl);
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
    }

    /*
    public function edit(int $id, EditProfileRequest $request) {
        $my_profile = Profile::where('user_id',$id)->first();
        $old_image = $my_profile->user_image;
        $my_profile->fill($request->validated());
        if($request->file('user_image')) {
            Storage::delete('public/UserImages/'.$old_image);
            $originalImg = $request->user_image;
            $filePath = $originalImg->store('public/UserImages');
            $my_profile->user_image = str_replace('public/UserImages/', '', $filePath);
        }
        $my_profile->save();

        $user = User::find($id);
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($user->email !== $request->email) {
            $new_email = $request->email;
            // トークン生成
            $token = hash_hmac(
                'sha256',
                Str::random(40) . $new_email,
                config('app.key')
            );
            // トークンをDBに保存
            DB::beginTransaction();
            try {
                $param = [];
                $param['user_id'] = $id;
                $param['new_email'] = $new_email;
                $param['token'] = $token;
                $email_reset = EmailReset::create($param);
                DB::commit();
                $email_reset->sendEmailResetNotification($token);
                return redirect()->route('profile.show', ['id' => (int)$my_profile->id])->with('flash_message', 'アカウントを更新しました。');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('profile.show', ['id' => (int)$my_profile->id])->with('flash_message', 'メール更新に失敗しました。');
            }
        }
        $user->save();

        return redirect()->route('profile.show', ['id' => (int)$my_profile->id])->with('flash_message', 'アカウントを更新しました。');
    }*/
}
