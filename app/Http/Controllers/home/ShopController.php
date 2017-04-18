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
   		//获取分类
   		$res = DB::table('shop_type')
   			->where('p_id', '=', '0')
   			->get();

   		return view('home.shop.register', ['value' => $res]);
   }

   /**
    * [postRegister description]
    * @param  Request $request [description]
    * @return [type]           [description]
    */
   public function postRegister(Request $request)
   {
        //获取所有数据
        $value = $request->except('_token');
        $id = $request->session()->get('home')->u_id;
        
        //获取是否重新提交
        $tijiao = DB::table('shopowner')
        	->where('u_id', '=', $id)
        	->get();

        //判断是否重新提交
        if ( ! empty($tijiao)) {
        	return redirect('shop/register')->with('error', '你已提交,请等待管理员的确认!');
        }

        //判断数据是否为空
        if (empty($value['shopname']) || empty($value['name']) || empty($value['idcard']) || empty($value['s_province']) || empty($value['s_city']) || empty($value['s_county'])) {
            return redirect('/shop/register')->with('empty', '数据不能为空');
        }

        //判断是否符合要求
        $idcard= '/^\d{15}|\d{18}$/';
        if ( ! preg_match($idcard, $value['idcard'])) {
            return redirect('/shop/register')->with('error', '数据不符合要求');
        }

        //合并地址
        $address = $value['s_province'] . ';' . $value['s_city'] . ';' . $value['s_county'];

        //添加数据
       $res = DB::table('shopowner')
           ->insert(['name' => $value['name'], 'idcard' => $value['idcard'], 'address' => $address, 'u_id' => $id]);

       $res1 = DB::table('user_shop')
       		->insert(['sname' => $value['shopname'], 'u_id' => $id, 'st_id' => $value['type']]);

       	//判断是否成功
       	if ($res && $res1) {
       		return redirect('shop/register')->with('success', '提交申请成功,请等待管理员查看!');
       	} else {
       		return redirect('shop/register')->with('error', '提交失败!');
       	}
   }
}
