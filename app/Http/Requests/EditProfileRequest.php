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
            $originalImg = $validated['user_image'];
            $filePath = $originalImg->store('public/UserImages');
            $validated['user_image'] = str_replace('public/UserImages/', '', $filePath);
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
