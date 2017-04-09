<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * 查询所有用户的完成订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComplete(Request $request)
    {
        //查询所有用户的完成订单
        $detail = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.status','=','4')
            ->paginate(5);

        return view('admin.order.self-complete',['detail'=>$detail]);
    }


    /**
     * 查询所有用户的待付款订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifu(Request $request)
    {
        //查询所有用户的待付款订单
        $detail = DB::table('order as o')
                ->join('order_detail as od','o.o_id','=','od.o_id')
                ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
                ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
                ->join('shop as s','s.s_id','=','sd.s_id')
                ->join('user_shop as us','od.us_id','=','us.us_id')
                ->where('o.status','=','0')
                ->paginate(5);

        return view('admin.order.self-daifu',['detail'=>$detail]);
    }


    /**
     * 查询所有用户的待发货订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifa(Request $request)
    {
        //查询所有用户的待发货订单
        $detail = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.status','=','1')
            ->paginate(5);

        return view('admin.order.self-daifa',['detail'=>$detail]);
    }


    /**
     * 查询所有用户的待评价订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaiping(Request $request)
    {
        //查询所有用户的待评价订单
        $detail = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.status','=','3')
            ->paginate(5);
        return view('admin.order.self-daiping',['detail'=>$detail]);
    }

    /**
     * 执行删除交易完成的订单
     * @param Request $request
     * @return int
     *  1 删除成功
     *  2 删除失败
     */
    public function postDelete(Request $request)
    {
        //获取要删除的订单的o_id
        $data = $request->only('o_id');

        //执行订单删除动作
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
     * 执行删除未付款订单的动作
     * @param Request $request
     * @return int
     *  1 删除成功
     *  2 删除失败
     */
    public function postDeleteweifu(Request $request)
    {
        //获取要删除的订单的o_id
        $data = $request->only('o_id');

        //执行订单删除动作
        $res = DB::table('order')->where('o_id','=',$data['o_id'])->delete();
        $res1 = DB::table('order_detail')->where('o_id','=',$data['o_id'])->delete();

        //判断
        if($res && $res1){
            return 1;
        }else{
            return 2;
        }
    }



}
