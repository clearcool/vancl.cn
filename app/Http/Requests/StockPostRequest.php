<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StockPostRequest extends Request
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
            
            'size'=>'required',
            
            
        ];
    }

    public function messages()
    {
        return [

            'size.required'=>'必须添加尺寸',
            
            
        ];
    }
}
