<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HomePostRequest extends Request
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
                'username' => 'required|min:6|max:18',
                'password' => 'required|regex:/\w{6,18}/',
                'password2' => 'required',
                'userphone' => 'required|regex:/1+[3,5,7,8]\d{9}/'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.min' => '用户名不能小于6位',
            'username.max' => '用户名不能大于18位',
            'password.required' => '密码不能为空',
            'password.regex' => '请输入6到18位的密码',
            'password2.required' => '确认密码不能为空',
            'phone.required'=> '手机号不能为空',
            'phone.regex'=> '请输入正确的手机号'
        ];
    }
}
