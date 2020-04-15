<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Enums\Gender;

class ProfileController extends Controller
{

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
}
