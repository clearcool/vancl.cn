<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    /**
     * 判断管理员是否可以登录
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postValidate(Request $request)
    {
        //获取管理员信息
        $user = array_except($request->all(),'_token');
        //获取管理员名字
        $username = $user['username'];
        //获取这个管理员的信息
        $b = DB::table('admin')->where('username','=',$username)->get();

        if(empty($b)){
            //账号不存在
            return back()->withInput()->withErrors('该账号不存在');
        }else{
            if(Hash::check($user['password'],$b[0]->password)){
                //判断管理员是被禁止登陆
                if($b[0]->status == 1){
                    return back()->withInput()->withErrors('你已经被超管封号');
                }
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
