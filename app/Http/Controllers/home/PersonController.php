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
        //获取登录的用户u_id
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
        //获取要修改的订单详情的od_id
        $od_id = $request->only('od_id');
        //修改数据库
        $res = DB::table('order_detail')->where('od_id','=',$od_id)->update(['status'=>'3']);
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
        //获取要修改的订单详情的od_id
        $od_id = $request->only('od_id');
        //修改数据库
        $res = DB::table('order_detail')->where('od_id','=',$od_id)->update(['status'=>'3']);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 用户退款订单
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postTuikuan(Request $request)
    {
        //获取要退款的订单信息
        $data = $request->only('od_id','reason','u_id');

        $data['applytime'] = time();
        //将数据插入数据库
        $res = DB::table('refund')->insertGetId($data);
        //修改订单的状态
        $res1 = DB::table('order_detail')->where('od_id','=',$data['od_id'])->update(['status'=>'5']);

        //判断
        if($res && $res1){
            return back();

        }else{
            return back();
        }
    }


    /**
     * 商品的评论
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postPinglun(Request $request)
    {
        //获取商品的评论
        $data = $request->except('_token','od_id');

        //判断是否提交空数据
        if(empty($data['star']) || empty($data['content'])){
            return back()->withErrors('不能提交空评论');
        }

        $od_id = $request->only('od_id');
        //获取用户的u_id
        $data['u_id'] = session('home')->u_id;

        if($data['star'] >= 4){
            //查询商品的好评数量
            $shop = DB::table('shop')
                    ->where('s_id','=',$data['s_id'])
                    ->first();
            //加上好评数量
            $praise = $shop->praise + 1;
            //修改的数据插入数据库
            $xing = DB::table('shop')->where('s_id','=',$data['s_id'])->update(['praise'=>$praise]);
            if(!$xing){
                return back()->withErrors('商品加好评失败!');
            }
        }

        //插入数据库
        $res = DB::table('shop_comment')->insertGetId($data);

        if($res){
            //修改订单详情的状态
            $res1 = DB::table('order_detail')->where('od_id','=',$od_id)->update(['status'=>'4']);
            //判断
            if($res1){
                return back()->with('success','评论成功');
            }else{
                return back()->withErrors('修改状态失败');
            }
        }else{
            return back()->withErrors('评论失败');
        }
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

    /**
     * 查询用户订单详情
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

        //拆分字符串
        $detail[0]->address = explode(';', $detail[0]->address);

        return view('home.person.orderinfo',['detail'=>$detail]);
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
