<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function getIndex()
    {
        return view('home.person.personaldata');
    }

    public function getInformation()
    {
        return view('home.person.information');
    }
    public function getSafety()
    {
        return view('home.person.safety');
    }

    public function getAddress()
    {
        return view('home.person.address');
    }

    public function getOrder()
    {
        return view('home.person.order');
    }

    public function getChange()
    {
        return view('home.person.change');
    }

    public function getCoupon(Request $request)
    {
        //查看用户所拥有的优惠劵
        $u_id=session('home')->u_id;
        $time=time();
        //进行数据库查询 未使用的
        $coupon=DB::table('user_coupon as uc')
                ->join('coupon as c','c.c_id','=','uc.c_id')
                ->where('uc.u_id',$u_id)
                ->where('status',1)
                ->get();
                //进行数据库查询 已经使用的
         $oldcoupon=DB::table('user_coupon as uc')
                ->join('coupon as c','c.c_id','=','uc.c_id')
                ->where('uc.u_id',$u_id)
                ->where('status',0)
                ->orwhere('endtime','<',$time)
                ->get();
        return view('home.person.coupon',['coupon'=>$coupon,'oldcoupon'=>$oldcoupon]);
    }
    public function getDelcoupon(Request $request)
    {
        //获取用户所删除优惠劵的id
        $id=$request->input('id');
        //获取登录人的id
        $u_id=session('home')->u_id;
        //删除已经使用的
        $time=time();
        $res=DB::table('user_coupon')
            ->where('status',0)
            ->orwhere('endtime','<',$time)
            ->where('c_id',$id)
            ->delete();
            if($res)
            {
                return 0;
            }else{
                return 1;
            }
    }
    public function getBonus()
    {
        return view('home.person.bonus');
    }

    public function getBill()
    {
        return view('home.person.bill');
    }

    public function getCollection()
    {
        return view('home.person.collection');
    }

    public function getFoot()
    {
        return view('home.person.foot');
    }

    public function getComment()
    {
        return view('home.person.comment');
    }

    public function getNews()
    {
        return view('home.person.news');
    }

}
