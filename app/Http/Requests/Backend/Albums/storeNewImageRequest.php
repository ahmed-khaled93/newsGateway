<?php

namespace App\Http\Requests\Backend\Albums;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserRequest.
 */
class storeNewImageRequest extends FormRequest
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

            'album_id'  =>  'required',
            'title'     =>  'required|min:3|max:191',
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

    }
}
