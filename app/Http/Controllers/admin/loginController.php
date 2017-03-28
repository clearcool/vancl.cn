<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class loginController extends Controller
{
    /**
     * @param Request $request
     */
    public function postValidate(Request $request)
   {
       $a = array_except($request->all(),'_token');

       $b = DB::table('admin')->get();

       foreach ($b as $k=>$v)
       {
            if($a['username'] == $v->username && $a['password'] == $v->password)
            {
                //将登陆用户的信息存入session
               $request->session()->put('id',$v->id);

               //解析主页
                return view('admin.index',['id'=>$v->id]);

            }

       }

       //如果账号不正确让它继续登陆
       return back()->withInput()->withErrors('账号或密码错误,请及时联系超管');


   }


}
