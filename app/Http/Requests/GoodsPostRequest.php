<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsPostRequest extends Request
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
            
            'color'=>'required',
            'goodsurl'=>'required',
            
        ];
    }

    public function messages()
    {
        return [

            'color.required'=>'必须添加颜色',
            'goodsurl.required'=>'必须添加图片',
            
        ];
    }
}
