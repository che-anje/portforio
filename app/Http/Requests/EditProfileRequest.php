<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Prefecture;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */ 

    public function rules()
    {
        return [
            'familyName' => 'required|max:20',
            'firstName' => 'required|max:20',
            'name' => 'required|max:20',
            'gender' => 'required',
            'birthdate_1i' => 'required',
            'birthdate_2i' => 'required',
            'birthdate_3i' => 'required',
            'prefectureOfInterest' => 'nullable',
            'cityOfInterest' => 'nullable',
            'searchSettingByEmail' => 'required',
            'introduction' => 'required|max:140|',
            'user_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|max:100',
            'password' => 'nullable|min:6|confirmed'
        ];
    }

    public function validated(): array
    {
        $validated = parent::validated();
        
        if(isset($validated['user_image'])) {
            $disk = Storage::disk('s3');
            $originalImg = $validated['user_image'];
            $path = $disk->putFile('UserImages', $originalImg, 'public');
            $validated['user_image'] = str_replace('UserImages/', '', $path);
            
        }

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        if (isset($validated['email'])) {
            $validated['new_email'] = $validated['email'];
            unset($validated['email']);
        }

        return $validated;
    }
}
