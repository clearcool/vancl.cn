<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShopPostRequest extends Request
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
            'shopname'=>'required',
            'price'=>'required',
            'picurl'=>'required',
            'describe'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'商品名称必须添加',
            'price.required'=>'价格必须添加',
            'picurl.required'=>'图片格式不正确',
            'describe.required'=>'商品描述必须添加'
        ];
    }
}
