<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
            'prefectureOfInterest' => 'required',
            'cityOfInterest' => 'required',
            'introduction' => 'required|max:140|',
        ];
    }
}
