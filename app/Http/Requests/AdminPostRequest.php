<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminPostRequest extends Request
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
                'username' => 'required|min:6|max:255',
                'password' => 'required|regex:/\w{6,18}/',
                'password2' => 'required',
                'phone' => 'required|regex:/1+[3,5,7,8]\d{9}/'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.min' => '用户名不能小于6个字符',
            'username.max' => '用户名不能大于255字符',
            'password.required' => '初始密码不能为空',
            'password.regex' => '请输入正确格式的密码',
            'password2.required' => '确认密码不能为空',
            'phone.required'=> '手机号不能为空',
            'phone.regex'=> '请输入正确的手机号'
        ];
    }
}
