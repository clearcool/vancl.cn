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

    /**
     * 用户优惠劵
     * @param u_id
     * @return 
     */
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
    /**
     * 删除优惠劵
     * @param id
     * @return 
     */
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

    /**
     * 用户资产展示
     * @parem  u_id
     * @return \Illuminate\Http\Response
     */
    public function getBill(Request $request)
    {

        //获取登录人的id
        $u_id=session('home')->u_id;

        //用户资产
        $Assets=DB::table('user_detail')
                ->where('u_id',$u_id)
                ->value('money');
                
        return view('home.person.bill',['Assets'=>$Assets]);
    }
    /**
     * 用户充值
     * @parem  u_id money
     * @return \Illuminate\Http\Response
     */
    public function postAssets(Request $request)
    {
        
        //获取登录人的id
        $u_id=session('home')->u_id;
        //获取充值钱数
        $newassets=$request->only('newassets');
        //用户资产
        $Assets=DB::table('user_detail')
                ->where('u_id',$u_id)
                ->value('money');
              

         //将充值的钱与数据库中的相加，并放回数据库
         $money=$newassets['newassets']+$Assets;
         $res=DB::table('user_detail')
                ->where('u_id',$u_id)
                ->update(['money'=>$money]);
            
       if($res){
         $Assets=DB::table('user_detail')
                ->where('u_id',$u_id)
                ->value('money');
        return $Assets;
       }else{
           return 1;
       }

        //现在所拥有的余额

      
      
       
    }

    /**
     * 用户收藏商品
     * @parem  u_id
     * @return \Illuminate\Http\Response
     */
    public function getCollection(Request $request)
    {
        //获取登录人的id
        $u_id=session('home')->u_id;
        
        //查询数据库该用户收藏的商品
        $collection=DB::table('user as u')
                    ->join('collection as c','u.u_id','=','c.u_id')
                    ->join('shop as s','s.s_id','=','c.s_id')

                    ->where('u.u_id',$u_id)
                    ->get();
        return view('home.person.collection',['collection'=>$collection]);
    }
    /**
     * 用户取消收藏
     * @parem  id
     * @return \Illuminate\Http\Response
     */
    public function getDelcollection(Request $request)
    {   
        //获取取消收藏商品的id
        $id=$request->input('id');

        //从收藏表里删除用户收藏
        $res=DB::table('collection')
            ->where('s_id',$id)
            ->delete();

         return back();
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
