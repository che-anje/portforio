<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CreateCircleRequest extends FormRequest
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
            'name' => 'required|max:20',
            'admin_user_id' => 'required',
            'introduction' => 'required',
            'prefecture_id' => 'required',
            'detailedArea' => 'nullable',
            'ageGroup' => 'nullable',
            'activityDay' => 'nullable',
            'cost' => 'nullable',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'recruit_status' => 'nullable',
            'description_template' => 'nullable',
            'request_required' => 'nullable',
            'private_status' => 'nullable',
            'genres' => 'required',            
        ];
    }

    public function validated(): array
    {
        $validated = parent::validated();
        
        if(isset($validated['image'])) {
            $disk = Storage::disk('s3');
            $originalImg = $validated['image'];
            $path = $disk->putFile('CircleImages', $originalImg, 'public');
            $validated['image'] = str_replace('CircleImages/', '', $path);
            
        }
        return $validated;
    }

    
}
