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


    /**
     * 用户的订单详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrder(Request $request)
    {
        //获取登录的用户信息
        $u_id = session('home')->u_id;

        //查询用户的订单
        $detail = DB::table('order as o')
                ->join('order_detail as od','o.o_id','=','od.o_id')
                ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
                ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
                ->join('shop as s','s.s_id','=','sd.s_id')
                ->join('user_shop as us','od.us_id','=','us.us_id')
                ->where('o.u_id','=',$u_id)
                ->get();


        //查询用户的订单分页
        $details = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.u_id','=',$u_id)
            ->paginate(4);

        //返回列表页视图
        return view('home.person.order',['detail'=>$detail,'details'=>$details]);
    }


    /**
     * 用户删除订单的动作
     * @param Request $request
     * @return int
     *  1 删除成功
     *  2 删除失败
     */
    public function postDelete(Request $request)
    {
        //获取要删除的订购的o_id
        $data = $request->only('o_id');
        //执行删除的动作
        $res = DB::table('order')->where('o_id','=',$data['o_id'])->delete();
        $res1 = DB::table('order_detail')->where('o_id','=',$data['o_id'])->delete();

        //判断
        if($res && $res1){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 查询用户退货订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChange(Request $request)
    {
        //获取登录的用户信息
        $u_id = session('home')->u_id;

        //查询用户的订单
        $detail = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.u_id','=',$u_id)
            ->get();

        return view('home.person.change',['detail'=>$detail]);
    }


    /**
     * 所有订单的用户确认收货的动作
     * @param Request $request
     * @return int
     *  1 收货成功
     *  2 收货失败
     */
    public function postShouhuo(Request $request)
    {
        //获取要修改的订单o_id
        $o_id = $request->only('o_id');
        //修改数据库
        $res = DB::table('order')->where('o_id','=',$o_id)->update(['status'=>'3']);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }

    }


    /**
     * 待收货订单的用户确认收货动作
     * @param Request $request
     * @return int
     *  1 收货成功
     *  2 收货失败
     */
    public function postShouhuoa(Request $request)
    {
        //获取要修改的订单o_id
        $o_id = $request->only('o_id');
        //修改数据库
        $res = DB::table('order')->where('o_id','=',$o_id)->update(['status'=>'3']);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    public function postTuikuan(Request $request)
    {
        //获取要退款的订单信息
        $data = $request->only('o_id','reason','u_id');
        $data['applytime'] = time();

        //将数据插入数据库
        $res = DB::table('refund')->insertGetId($data);
        //修改订单的状态
        $res1 = DB::table('order')->where('o_id','=',$data['o_id'])->update(['status'=>'5']);
        //判断
        if($res && $res1){
            return back();
        }else{
            return back();
        }
    }

    public function getA()
    {
        return view('home.person.refund');
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
