<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'user_id' => 'exists:users,id',  //to check that the user is existing in the DB
        ];
    }

    //this function is to customize error message
    public function messages() 

    {
        return[
        'title.required' => 'you must enter title',
        'description.required' => 'you must enter description',
        ];
    }
}
