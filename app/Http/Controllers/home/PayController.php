<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PayController extends Controller
{
    /**
     * 直接购买商品
     * @parem id  gnum
     * @return \Illuminate\Http\Response
     */
    public function postDobuy(Request $request)
    {
        $id=$request->input('id');
        $num=$request->input('gnum');
        $u_id=session('home')->u_id;

        //用户收货地址
        $ress=DB::table('address_detail')
            ->where('u_id',$u_id)
            ->get();
        for($i=0;$i<=count($ress)-1;$i++){
            $ress[$i]->address= explode(';',$ress[$i]->address);
        }

        //默认收货地址
        $deress=DB::table('address_detail')
            ->where('u_id',$u_id)
            ->where('default','=',1)
            ->first();
            $deress->address= explode(';',$deress->address);

         //用户优惠券
        $coupon=DB::table('user_coupon as uc')
            ->join('coupon as c','uc.c_id','=','c.c_id')
            ->where('u_id','=',$u_id)
            ->where('status','=',1)
            ->where('endtime','>',time())
            ->get();
//        dd($coupon);
        //直接购买
        $detail = DB::table('shop_stock as st')
               ->join('shop_detail as sd','st.sd_id','=','sd.sd_id')
               ->join('shop as s','s.s_id','=','sd.s_id')
               ->join('user_shop as us','us.us_id','=','s.us_id')
               ->where('st.ss_id','=',$id)
               ->get();
//        dd($detail);
//        dd($ress);
//        dd($detail);
        return view('/home/pay',['ress'=>$ress,'coupon'=>$coupon,'deress'=>$deress,'num'=>$num,'detail'=>$detail]);
    }

    //将商品信息存入session
    public function getCuncar(Request $request)
    {
        $car=$request->all();
        session(['car' => $car]);
    }

    //购物车购买商品
    public function getCarbuy()
    {
        $car =session('car');

    }


    /**
     * 购物时修改选择地址
     * @parem id
     * @return \Illuminate\Http\Response
     */
    public function getDeress(Request $request)
    {
        $id=$request->input('id');
        $ress=DB::table('address_detail')
            ->where('add_id','=',$id)
            ->first();
        $ress->address= explode(';',$ress->address);
        return json_encode($ress);
    }
    /**
     * 选择优惠券
     * @parem id
     * @return \Illuminate\Http\Response
     */
    public function getCoupon(Request $request)
    {
        $id=$request->input('id');
        $coupon=DB::table('coupon')
            ->where('c_id','=',$id)
            ->first();
        return json_encode($coupon);
    }

    //处理单件商品提交
    /**
     * @param Request $request
     */
    public function postDanbuy(Request $request)
    {
        //获取数据
        $add_id=$request->input('address');
        $ss_id=$request->input('stock');
        $num=$request->input('num');
        $c_id=$request->input('coupon');
        $u_id=session('home')->u_id;

        //生成订单
          //获取商品信息
          $shop=DB::table('shop_stock as st')
              ->join('shop_detail as sd','st.sd_id','=','sd.sd_id')
              ->join('shop as s','sd.s_id','=','s.s_id')
              ->join('user_shop as us','us.us_id','=','s.us_id')
              ->where('st.ss_id','=',$ss_id)
              ->first();
          //计算总额
        if($c_id)
        {
            $coupon=DB::table('coupon')
                ->where('c_id','=',$c_id)
                ->first();
            $price=$shop->price * $num - $coupon->denomination;
        }else{
            $c_id=null;
            $price=$shop->price * $num;
            if($price<199)
            {
                $price=$price+10;
            }
        }

        //查询用户余额
        $balance=DB::table('user_detail')
            ->where('u_id',$u_id)
            ->select('money')
            ->first();

          //添加订单
            $o_id=DB::table('order')->insertGetId(
                ['add_id' =>$add_id,'u_id' =>session('home')->u_id,'ordertime'=>time(),'totalprice'=>$price,'ordernumber'=>time()+rand(100000,999999),'c_id'=>$c_id ]
            );
            $res=DB::table('order_detail')->insert(
                ['o_id'=>$o_id,'us_id'=>$shop->us_id,'ss_id'=>$shop->ss_id,'price'=>$shop->price,'num'=>$num]
            );

        return view('home.buy.payment',['shop'=>$shop,'o_id'=>$o_id,'balance'=>$balance,'price'=>$price]);
    }

    //确认支付密码
    public function getPass(Request $request)
    {
        $u_id=session('home')->u_id;
        $pass=$request->input('pass');
        $user=DB::table('user_detail')
            ->where('u_id',$u_id)
            ->first();
        if($pass==$user->paymentpassword){
            return 1;
        }else{
            return 0;
        }
    }

    //付款
    public function postBuy(Request $request)
    {
        //订单
        $o_id=$request->input('o_id');
        $order=DB::table('order')
            ->where('o_id',$o_id)
            ->first();
        $o_price=floatval($order->totalprice);

        //用户
        $u_id=session('home')->u_id;
        $pass=$request->input('pass');
        $user=DB::table('user_detail')
            ->where('u_id',$u_id)
            ->first();
        $u_price=floatval($user->money);
        $ppp=$u_price-$o_price;
        if($ppp<0)
        {
            //失败页面
            return view('home.buy.fail');
        }else{
            //执行扣钱
            DB::table('user_detail')
                ->where('id', $u_id)
                ->update(['money' => $ppp]);

            //成功页面
            $order=DB::table('order as o')
                ->join('address_detail as ad','o.add_id','=','ad.add_id')
                ->where('o.o_id',$o_id)
                ->first();
            //修改订单状态
            DB::table('order')
                ->where('o_id', $o_id)
                ->update(['status' => 1]);
            //判断是否使用优惠券
            if($order->c_id)
            {
                //修改优惠券状态
                DB::table('user_coupon')
                    ->where('u_id', $u_id)
                    ->where('c_id',$order->c_id)
                    ->update(['status' => 0]);
            }
            $order->address= explode(';',$order->address);
            return view('home.buy.success',['order'=>$order]);
        }
    }


    /**
     * 订单页面去付款的动作
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postTopay(Request $request)
    {
        $od_id = $request->only('od_id');

        //查询订单的数据
        $data = DB::table('order_detail as od')
                ->join('order as o','o.o_id','=','od.o_id')
                ->where('od_id','=',$od_id)
                ->get();

        //获取商品的总价
        $a = $data[0]->price*$data[0]->num;
        //判断是否需要运费
        if($a < 199){
            $a = $data[0]->price*$data[0]->num+10;
        }

        //获取商品信息
        $shop=DB::table('shop_stock as st')
            ->join('shop_detail as sd','st.sd_id','=','sd.sd_id')
            ->join('shop as s','sd.s_id','=','s.s_id')
            ->join('user_shop as us','us.us_id','=','s.us_id')
            ->where('st.ss_id','=',$data[0]->ss_id)
            ->first();

        //获取数据
        $u_id=session('home')->u_id;
        //查询用户余额
        $balance=DB::table('user_detail')
            ->where('u_id',$u_id)
            ->select('money')
            ->first();

        return view('home.buy.payment',['shop'=>$shop,'o_id'=>$data[0]->o_id,'balance'=>$balance,'price'=>$a]);
    }

}
