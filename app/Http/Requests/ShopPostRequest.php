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
            'describe'=>'required',
            'st_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'shopname.required'=>'必须添加商品名称',
            'price.required'=>'必须添加价格',
            'picurl.required'=>'必须添加图片',
            'describe.required'=>'必须添加商品描述',
            'st_id.required'=>'必须添加商品分类'
        ];
    }
}
