<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    //商家优惠劵列表
    public function getCouponlist(Request $request)
    {
        $coupon=DB::table('coupon')
                ->get();
        $count=DB::table('coupon')
                ->count();
                return view('admin.coupon.coupon',['coupon'=>$coupon,'count'=>$count]);
    }
    //用户优惠劵列表
    public function getUcoupon(Request $request)
    {
        $ucoupon=DB::table('user_coupon as uc')
                ->join('user as u','u.u_id','=','uc.u_id')
                ->join('coupon as c','c.c_id','=','uc.c_id')
                ->select('*','uc.status as s')
                ->get();
        $count=DB::table('user_coupon')
                ->count();
                return view('admin.coupon.ucoupon',['ucoupon'=>$ucoupon,'count'=>$count]);
    }

    //跳转添加优惠劵界面
    public function getAdd(Request $request)
    {
       return view('admin.coupon.addcoupon');
    }
   //商家添加优惠劵
    public function postA(Request $request)
    {   
        //获取添加信息
        $data = $request->only(['effective','denomination','sheets','min_price']);
        //判断是否有空值
        if(empty($data['effective']) || empty($data['denomination']) || empty($data['sheets']) ||empty($data['min_price'])){

            return back()->withInput();
        }
        //将添加的优惠劵插入数据库
        $res=DB::table('coupon')
                ->insert(['effective'=>$data['effective']*86400,'denomination'=>$data['denomination'],'sheets'=>$data['sheets'],'min_price'=>$data['min_price']]);
                 //跳转页面
        if($res)
        {
            return redirect('admin/coupon/couponlist');
        }else{
            return back()->withInput();
        }

    }
    //删除用户添加的优惠劵
    public function getDelcoupon(Request $request)
    {   
        //获取删除用户的优惠劵c_id
        $c_id = $request->input('id');

        //检测用户是否还有该类优惠劵
        $id=DB::table('user_coupon')
            ->where('c_id',$c_id)
            ->get();

            //判断是否存在
        if(isset($id)){
            return 0;
        }
        //如果不存在
        $res=DB::table('coupon')
                ->where('c_id',$c_id)
                ->delete();

        //判断是否成功
            if(!$res){
                return 1;
            }else{
                return 2;
            }
    }
}
