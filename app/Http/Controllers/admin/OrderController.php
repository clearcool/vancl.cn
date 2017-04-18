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
        $detail = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','4')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   
            
        return view('admin.order.self-complete',['detail'=>$detail,'coupon'=>$coupon]);
    }


    /**
     * 查询所有用户的待付款订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifu(Request $request)
    {
        //查询所有用户的待付款订单
        $detail = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','0')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        return view('admin.order.self-daifu',['detail'=>$detail,'coupon'=>$coupon]);
    }


    /**
     * 查询所有用户的待发货订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifa(Request $request)
    {
        //查询所有用户的待发货订单
        $detail = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','1')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        return view('admin.order.self-daifa',['detail'=>$detail,'coupon'=>$coupon]);
    }

    /**
     * 查询所有用户的待评价订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaishou(Request $request)
    {
        //查询所有用户的待评价订单
        $detail = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','2')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        return view('admin.order.self-daishou',['detail'=>$detail,'coupon'=>$coupon]);
    }

    /**
     * 查询所有用户的待评价订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaiping(Request $request)
    {
        //查询所有用户的待评价订单
        $detail = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','3')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   
        return view('admin.order.self-daiping',['detail'=>$detail,'coupon'=>$coupon]);
    }


    /**
     * 执行删除交易完成的订单
     * @param Request $request
     * @return int
     *  1 删除成功
     *  2 删除失败
     */
    // public function postDelete(Request $request)
    // {
    //     //获取要删除的订购的od_id
    //     $data = $request->only('od_id');

    //     //查询订单详情表
    //     $date = DB::table('order_detail')->where('od_id','=',$data['od_id'])->first();

    //     //获取订单详情的该订单商品的数量
    //     $num = DB::table('order_detail')->where('o_id','=',$date->o_id)->count();

    //     //判断是否删除的订单表的信息
    //     if($num == 1){
    //         //执行删除的动作
    //         $res = DB::table('order')->where('o_id','=',$date->o_id)->delete();
    //         $res1 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->delete();
    //         //判断
    //         if($res && $res1){
    //             return 1;
    //         }else{
    //             return 2;
    //         }
    //     }else{
    //         //执行删除的动作
    //         $res2 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->delete();
    //         //判断
    //         if($res2){
    //             return 1;
    //         }else{
    //             return 2;
    //         }
    //     }
    // }


    /**
     * 执行删除未付款订单的动作
     * @param Request $request
     * @return int
     *  1 删除成功
     *  2 删除失败
     */
    public function postDeleteweifu(Request $request)
    {
        //获取要删除的订购的od_id
        $data = $request->only('od_id');

        //查询订单详情表
        $date = DB::table('order_detail')->where('od_id','=',$data['od_id'])->first();

        //获取订单详情的该订单商品的数量
        $num = DB::table('order_detail')->where('o_id','=',$date->o_id)->count();

        //判断是否删除的订单表的信息
        if($num == 1){
            //执行删除的动作
            $res = DB::table('order')->where('o_id','=',$date->o_id)->delete();
            $res1 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->delete();
            //判断
            if($res && $res1){
                return 1;
            }else{
                return 2;
            }
        }else{
            //执行删除的动作
            $res2 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->delete();
            //判断
            if($res2){
                return 1;
            }else{
                return 2;
            }
        }
    }


    /**
     *  执行发货的动作
     * @param Request $request
     * @return int
     *  1 发货成功
     *  2 发货失败
     */
    public function postModifyfahuo(Request $request)
    {
        //获取要修改的订单的o_id
        $od_id = $request->only('od_id');
        //对订单的状态修改
        $res = DB::table('order_detail')->where('od_id','=',$od_id)->update(['status'=>'2']);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 查询所有的用户申请退款的订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRefund(Request $request)
    {
        //查询所有用户退款订单
        $detail = DB::table('order_detail as od')
            ->join('refund as rd','od.od_id','=','rd.od_id' )
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','5')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        return view('admin.order.self-refund',['detail'=>$detail,'coupon'=>$coupon]);
    }

    /**
     * 查询所有退款完成的订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRefunda(Request $request)
    {
        //查询所有用户的退款完成的订单
        $detail = DB::table('order_detail as od')
            ->join('refund as rd','od.od_id','=','rd.od_id' )
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('s.us_id','=','0')
            ->where('od.status','=','6')
            ->orderBy('o.ordertime','desc')
            ->paginate(5);

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        return view('admin.order.self-refundcompleted',['detail'=>$detail,'coupon'=>$coupon]);
    }

    /**申请退款动作
     * @param Request $request
     * @return int
     *  1 退款完成
     *  2 退款失败
     */
    public function postTongyitui(Request $request)
    {
        //获取申请退款的o_id
        $od_id = $request->only('od_id');
        //从查看该订单的信息
        $data = DB::table('order_detail')->where('od_id','=',$od_id)->first();

        //获取用户信息
        $u_id =session('home')->u_id;
        $money = DB::table('user_detail')->where('u_id','=',$u_id)->first();

        //判断是不是免邮
        if($data->price*$data->num >= 199){
            //将金额加入用户账户
            $a = $data->price*$data->num + $money->money;
            //修改用户金额
            $res = DB::table('user_detail')->where('u_id','=',$u_id)->update(["money"=>$a]);
            //修改订单状态
            $res1 = DB::table('order_detail')->where('od_id','=',$od_id)->update(["status"=>"6"]);
            //判断
            if($res && $res1){
                return 1;
            }else{
                return 2;
            }
        }else{
            //将金额加入用户账户
            $a = $data->price*$data->num + $money->money + 10;
            //修改数据库订单状态
            $res = DB::table('user_detail')->where('u_id','=',$u_id)->update(["money"=>$a]);
            //修改订单状态
            $res1 = DB::table('order_detail')->where('od_id','=',$od_id)->update(["status"=>"6"]);
            //判断
            if($res && $res1){
                return 1;
            }else{
                return 2;
            }
        }
    }


    /**
     * 订单详情页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDetails(Request $request)
    {
        //获取订单详情的od_id
        $od_id = $request->all();

        //查询用户的订单
        $detail  = DB::table('order_detail as od')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as add','o.add_id','=','add.add_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('od.od_id','=',$od_id)
            ->get();

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }   

        //拆分字符串
        $detail[0]->address = explode(';', $detail[0]->address);

        return view('admin.order.self-orderinfo',['detail'=>$detail,'coupon'=>$coupon]);
    }

}
