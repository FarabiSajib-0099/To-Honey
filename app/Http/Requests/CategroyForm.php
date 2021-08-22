<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FindOutNumberRules;
class CategroyForm extends FormRequest
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

     public function rules(){
         return[

            'cat_name'=>['required', new FindOutNumberRules],
            'cat_des'=>'required'
         ];
     }
    public function messages()
    {
        return [
            'cat_name.required'=>'Category name koy?',
            'cat_des.required'=>'Category Filed a kichu nai'
        ];
    }
}
