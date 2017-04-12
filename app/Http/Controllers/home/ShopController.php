<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ShopController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function getRegister()
   {
   		return view('home.shop.register');
   }

   public function postRegister(Request $request)
   {
        //获取所有数据
        $value = $request->except('_token');

        //判断数据是否为空
        if (empty($value['shopname']) || empty($value['name']) || empty($value['phone']) || empty($value['idcard']) || empty($value['s_province']) || empty($value['s_city']) || empty($value['s_county'])) {
            return redirect('/shop/register')->with('empty', '数据不能为空');
        }

        //判断数据是否符合要求
        $phone = '/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';
        $idcard= '/^\d{15}|\d{18}$/';
        if (! preg_match($phone, $value['phone']) || ! preg_match($idcard, $value['idcard'])) {
            return redirect('/shop/register')->with('error', '数据不符合要求');
        }

        $address = $value['s_province'] . ';' . $value['s_city'] . ';' . $value['s_county'];

//        $res = DB::table('shopowner')
//            ->insert(['name' => $value['shopname'], 'idcard' => $value['idcard'], 'phone' => $value['phone'], 'address' => $address]);

   }

}
