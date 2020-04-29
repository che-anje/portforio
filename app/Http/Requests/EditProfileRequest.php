<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'prefectureOfInterest' => 'not_in: 0',
            'cityOfInterest' => 'not_in: 0',
            'searchSettingByEmail' => 'required',
            'introduction' => 'required|max:140|',
            'user_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|max:100',
            'password' => 'nullable|min:6|confirmed'
        ];
    }
}
