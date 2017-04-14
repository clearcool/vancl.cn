<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * 商铺的已完成订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询该店铺的已完成的订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','4')
            ->paginate(2);

        return view('home.shoppage.order.order-list',['shops'=>$shops]);
    }


    /**
     * 商铺待付款订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifu(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //商铺待付款订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','0')
            ->paginate(2);

        return view('home.shoppage.order.order-daifu',['shops'=>$shops]);
    }

    /**
     * 商铺待发货订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaifa(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询商铺待发货订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','1')
            ->paginate(2);

        return view('home.shoppage.order.order-daifa',['shops'=>$shops]);
    }


    /**
     * 商铺待收货订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaishou(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询该商铺待收货订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','2')
            ->paginate(2);

        return view('home.shoppage.order.order-daishou',['shops'=>$shops]);
    }

    /**
     * 商铺的待评价订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaiping(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询该商铺的待评价订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','3')
            ->paginate(2);

        return view('home.shoppage.order.order-daiping',['shops'=>$shops]);
    }

    /**
     * 商铺的申请退款订单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDaitui(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询该店铺的申请退款订单
        $shops = DB::table('order_detail as od')
            ->join('refund as r','od.od_id','=','r.od_id')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','5')
            ->paginate(2);

        return view('home.shoppage.order.order-daitui',['shops'=>$shops]);
    }


    /**
     * 商品退款完成
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTuiwan(Request $request)
    {
        //获取用户的u_id
        $u_id = session('home')->u_id;
        //获取该商家的 us_id
        $a = DB::table('user_shop')->where('u_id','=',$u_id)->first();

        //查询该店铺的退款完成订单
        $shops = DB::table('order_detail as od')
            ->join('user_shop as us','us.us_id','=','od.us_id')
            ->join('order as o','od.o_id','=','o.o_id')
            ->join('address_detail as ad','o.add_id','=','ad.add_id')
            ->join('user as u','o.u_id','=','u.u_id')
            ->join('shop_stock as st','st.ss_id','=','od.ss_id')
            ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->select('*','u.status as aa','od.status as bb')
            ->where('od.us_id','=',$a->us_id)
            ->where('od.status','=','6')
            ->paginate(2);

        return view('home.shoppage.order.order-tuiwan',['shops'=>$shops]);
    }

    /**
     * 执行发货
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getRightoff(Request $request)
    {
        //获取要发货的订单od_id
        $od_id = $request->all();
        //修改订单状态
        $res = DB::table('order_detail')
                ->where('od_id','=',$od_id)
                ->update(['status'=>'2']);
        //判断
        if($res){
            return redirect('/orders/daifa')->with('success', '发货成功');
        }else{
            return redirect('/orders/daifa')->with('error', '发货失败');
        }
    }

    /**
     * 将退款加入用户的余额
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getRefund(Request $request)
    {
        //获取订单的 od_id
        $od_id = $request->all();
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
                return redirect('/orders/daitui')->with('success', '退款成功');
            }else{
                return redirect('/orders/daitui')->with('error', '退款失败');
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
                return redirect('/orders/daitui')->with('success', '退款成功');
            }else{
                return redirect('/orders/daitui')->with('error', '退款失败');
            }
        }
    }

    /**
     * 已完成订单的删除
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete(Request $request)
    {
        //获取订单 od_id
        $data = $request->all();

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
                return redirect('/orders/list')->with('success', '删除成功');
            }else{
                return redirect('/orders/list')->with('error', '删除失败');
            }
        }else{
            //执行删除的动作
            $res2 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->delete();
            //判断
            if($res2){
                return redirect('/orders/list')->with('success', '删除成功');
            }else{
                return redirect('/orders/list')->with('error', '删除失败');
            }
        }

    }


    /**
     * 商品的所有评论
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPinglun(Request $request)
    {
        //获取商品的s_id
        $data = $request->all();
        //查询该商品下的所有评论和回复
        //获取商品的s_id
        $s_id = $request->all();

        //查询该商品的信息
        $shop = DB::table('shop as s')
            ->join('shop_type as st','s.st_id','=','st.st_id')
            ->where('s_id','=',$s_id)
            ->first();

        //查询该商品下的所有评论
        $detail = DB::table('shop as s')
            ->leftJoin('shop_comment as sc','s.s_id','=','sc.s_id')
            ->leftJoin('user as u','sc.u_id','=','u.u_id')
            ->LeftJoin('user_detail as ud','u.u_id','=','ud.u_id')
            ->where('s.s_id','=',$s_id)
            ->get();
        return view('home.shoppage.order.comment',['shop'=>$shop,'detail'=>$detail,'a'=>$data]);
    }


    /**
     * 店家回复
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postHuifu(Request $request)
    {
        $data = $request->all();

        //判断是不是空回复
        if(empty($data['backcomment'])){
            return back()->withErrors('回复评论失败');
        }
        //将数据插入数据库
        $res = DB::table('shop_comment')
                ->where('cm_id','=',$data['cm_id'])
                ->update(['backcomment'=>$data['backcomment']]);

        //判断
        if($res){
            return back()->with('success','回复评论成功');
        }else{
            return back()->withErrors('回复评论失败');
        }
    }
}
