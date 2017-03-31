<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditPostRequest extends Request
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
        return[
            'username' => 'required|min:4|max:20',
            'password' => 'regex:/\w{6,18}/',
            'phone' => 'required|regex:/1+[3,5,7,8]\d{9}/'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.min' => '用户名不能小于4个字符',
            'username.max' => '用户名不能大于20字符',
            'password.regex' => '请输入6到18位的密码',
            'phone.required'=> '手机号不能为空',
            'phone.regex'=> '请输入正确的手机号'
        ];
    }
}
