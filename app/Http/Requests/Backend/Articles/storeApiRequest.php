<?php

namespace App\Http\Requests\Backend\Articles;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserRequest.
 */
class storeApiRequest extends FormRequest
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

            'catg_id'   =>  'required',
            'title'     =>  'required|min:3|max:191',
            'body'      =>  'required',
            'image'     =>  'required'
        ];

    }
}
