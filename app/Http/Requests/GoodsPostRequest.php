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
            'size'=>'required',
            'color'=>'required',
            'goodsurl'=>'required',
            'shop_describe'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'size.required'=>'尺寸必须添加',
            'color.required'=>'颜色必须添加',
            'goodsurl.required'=>'图片格式不正确',
            'shop_describe.required'=>'商品描述必须添加'
        ];
    }
}
