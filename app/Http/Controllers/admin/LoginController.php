<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    public function postValidate(Request $request)
    {
        //获取用户信息
        $user = array_except($request->all(),'_token');

        $username = $user['username'];

        $b = DB::table('admin')->where('username','=',$username)->get();

        if(empty($b)){
            //账号不存在
            return back()->withInput()->withErrors('该账号不存在');
        }else{
            if(Hash::check($user['password'],$b[0]->password)){
                //将登陆用户的信息存入session
                $request->session()->put(['admin'=>$b[0]]);
                //解析主页
                return view('admin.index',['admin',$b[0]]);
            }else{
                //如果账号不正确让它继续登陆
                return back()->withInput()->withErrors('账号或密码错误,请及时联系超管');
            }
        }
    }
}
