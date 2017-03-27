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
                return redirect('/admin/index/validate');

            }else{
                echo '登录失败';die;
            }
       }


   }


}
