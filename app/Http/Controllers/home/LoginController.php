<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //用户的登录
   public function getLogin()
   {
       return view('home.login');
   }

   //验证用户登录
    public function postLoginb()
    {
        echo '33';
    }

   //用户的注册
    public function getRegister()
    {
        return view('home.register');
    }

    //用户注册的添加
    public function postRegisterb(Request $request)
    {
       $user = $request->all();
       dd($user);
    }

}
