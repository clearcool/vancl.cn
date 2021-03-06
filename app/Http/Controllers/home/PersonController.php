<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class PersonController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人中心主页
     */
    public function getIndex(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户信息
        $detail = DB::table('user_detail')
            ->where('u_id', '=', $session->u_id)
            ->get();

        //查询有多少优惠券
        $coupon = DB::table('user_coupon')
            ->where('u_id', '=', $session->u_id)
            ->count();

        //解析并分配数据
        return view('home.person.personaldata', ['detail' => $detail['0'], 'coupon' => $coupon]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人信息
     */
    public function getInformation(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户信息
        $detail = DB::table('user_detail')
            ->leftJoin('user', 'user_detail.u_id', '=', 'user.u_id')
            ->where('user.u_id', '=', $session->u_id)
            ->get();

        //解析并分配数据
        return view('home.person.information', ['detail' => $detail['0']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUserup(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //获取用户修改信息
        $value = $request->except('_token');

        //正则
        $email = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
        $phone = '/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';

        //判断用户是否符合要求
        if (!preg_match($email, $value['email']) || !preg_match($phone, $value['phone']))
            return redirect('/person/information')->with('empty', '数据不符合要求!');

        //判断是否有picFile
        if ($request->hasFile('pic')) {

            //获取file
            $file = $request->file('pic');

            //判断是否上传成功
            if ($file->isValid()) {
                //获取原来的目录
                $oldpic = DB::table('user_detail')
                    ->select('pic')
                    ->where('u_id', '=', $session->u_id)
                    ->get();
                $oldpic = $oldpic[0]->pic;

                //删除原来的pic
                if ($oldpic !== '/uploads/pic/default.jpg')
                    unlink('.' . $oldpic);

                //设置上传目录
                $oldname = $file->getClientOriginalName();
                $filetype = $file->getClientOriginalExtension();
                $newname = '/uploads/pic/' . md5(date('Y-m-d H:i:s') . $oldname) . '.' . $filetype;
                $file->move('uploads/pic', $newname);

                //判断用户的数据是否为空
                if (empty($value['nickname']) || empty($value['phone']) || empty($value['email']))
                    return redirect('/person/information')->with('empty', '数据不能为空!');

                //修改数据
                $res = DB::table('user_detail')
                    ->where('u_id', '=', $session->u_id)
                    ->update(['nickname' => $value['nickname'], 'sex' => $value['radio10'], 'email' => $value['email'], 'tel' => $value['phone'], 'pic' => $newname]);

            }
        } else {
            //判断用户的数据是否为空
            if (empty($value['nickname']) || empty($value['phone']) || empty($value['email']))
                    return redirect('/person/information')->with('empty', '数据不能为空!');

            //修改数据
            $res = DB::table('user_detail')
                ->where('u_id', '=', $session->u_id)
                ->update(['nickname' => $value['nickname'], 'sex' => $value['radio10'], 'email' => $value['email'], 'tel' => $value['phone']]);
        }

        //判断数据
        if ($res) {
            return redirect('/person/information')->with('success', '修改成功!');
        } else {
            return redirect('/person/information')->with('error', '修改失败!');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 安全设置
     */
    public function getSafety(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户信息
        $detail = DB::table('user_detail')
            ->leftJoin('user', 'user_detail.u_id', '=', 'user.u_id')
            ->where('user.u_id', '=', $session->u_id)
            ->get();
        return view('home.person.safety', ['detail' => $detail[0]]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 修改密码页
     */
    public function getPassword()
    {
        return view('home.person.password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 修改密码
     */
    public function postPassword(Request $request)
    {
        //获取用户id
        $id = $request->session()->get('home');
        $id = $id->u_id;

        //获取用户数据
        $value = $request->except('_token');

        //正则
        $reg = '/^\w{6,17}$/';

        //判断用户设置的密码是否符合要求
        if (!preg_match($reg, $value['newpassword']))
            return redirect('/person/password')->with('error', '密码不符合要求!');

        //判断数据是否为空
        if (empty($value['password']) || empty($value['repassword']) || empty($value['newpassword']))
            return redirect('/person/password')->with('empty', '数据不能为空!');

        //获取原来的密码
        $oldpassword = DB::table('user')
            ->select('password')
            ->where('u_id', '=', $id)
            ->get();

        //判断是否和原来的代码一样
        if (Hash::check($value['password'], $oldpassword[0]->password)) {
            //判断两次密码是否一样
            if ($value['newpassword'] === $value['repassword']) {
                //修改密码
                $newpassword = Hash::make($value['newpassword']);
                $res = DB::table('user')
                    ->where('u_id', '=', $id)
                    ->update(['password' => $newpassword]);

                //判断是否修改成功
                if ($res) {
                    return redirect('person/quit')->with('success', '修改成功!');
                } else {
                    return redirect('/person/password')->with('error', '修改失败!');
                }
            } else {
                return redirect('/person/password')->with('error', '两次密码不正确!');
            }
        } else {
            return redirect('/person/password')->with('error', '原来的密码不正确!');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 支付密码
     */
    public function getSetpay(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户手机
        $value = DB::table('user')
            ->where('u_id', '=', $session->u_id)
            ->select('userphone')
            ->get();

        //发送用户数据
        $value = $value[0];
        return view('home.person.setpay',['value' => $value]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 修改支付密码
     */
    public function postSetpay(Request $request)
    {
        //获取用户数据
        $id = $request->session()->get('home')->u_id;
        $paymentpassword = $request->input('paymentpassword');
        $repaymentpassword = $request->input('repaymentpassword');

        //判断
        $gpaymentpassword = '/^\d{1,6}$/';

        if (! preg_match($gpaymentpassword, $paymentpassword)) {
            return redirect('/person/setpay')->with('error', '密码只能是六位');
        }

        if (empty($paymentpassword) || empty($repaymentpassword)) {
            return redirect('/person/setpay')->with('empty', '数据不能为空!');
        }

        if ($paymentpassword !== $repaymentpassword) {
           return redirect('/person/setpay')->with('error', '两次支付密码不正确!');
        }

        //修改用户
        $res = DB::table('user_detail')
            ->where('u_id', '=', $id)
            ->update(['paymentpassword' => $paymentpassword]);

        //判断
        if ($res) {
            return redirect('/person/setpay')->with('success', '修改成功!');
        } else {
            return redirect('/person/setpay')->with('error', '修改失败!');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 手机
     */
    public function getBindphone(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户手机
        $value = DB::table('user')
            ->where('u_id', '=', $session->u_id)
            ->select('userphone')
            ->get();

        //发送用户数据
        $value = $value[0];
        return view('home.person.bindphone', ['value' => $value]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 修改手机
     */
    public function postBindphone(Request $request)
    {
        $id = $request->session()->get('home')->u_id;
        $value = $request->except('_token');

        //正则
        $phone = '/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';

        //判断是否为空
        if (empty($value['newphone'])) {
            return redirect('/person/bindphone')->with('empty', '数据不能为空!');
        }

        //判断是否符合要求
        if (! preg_match($phone, $value['newphone'])) {
            return redirect('/person/bindphone')->with('errot', '数据不符合要求');
        }

        //修改数据
        $res = DB::table('user')
            ->where('u_id', $id)
            ->update(['userphone' => $value['newphone']]);

        //判断
        if ($res) {
            return redirect('/person/bindphone')->with('success', '修改成功!');
        } else {
            return redirect('/person/bindphone')->with('error', '修改失败!');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 实名验证
     */
    public function getIdcard(Request $request)
    {
        //获取用户id
        $session = $request->session()->get('home');

        //查询用户手机
        $value = DB::table('user')
            ->where('u_id', '=', $session->u_id)
            ->select('userphone')
            ->get();

        //发送用户数据
        $value = $value[0];
        return view('home.person.idcard', ['value' => $value]);
    }

    public function postIdcard(Request $request)
    {
        //获取用户信息
        $id = $request->session()->get('home')->u_id;
        $idnumber = $request->input('idnumber');
        $realname = $request->input('realname');

        //正则
        $gidnumber = '/^\d{15}|\d{18}$/';

        //判断数据是否为空
        if (empty($idnumber) || empty($realname)) {
            return redirect('/person/idcard')->with('empty', '数据不能为空');
        }

        //判断是否符合要求
        if (! preg_match($gidnumber, $idnumber)) {
            return redirect('/person/idcard')->with('error', '数据不符合要求');
        }

        $res = DB::table('user_detail')
            ->where('u_id', '=', $id)
            ->update(['idnumber' => $idnumber, 'realname' => $realname]);

        if ($res) {
            return redirect('/person/idcard')->with('success', '修改成功');
        } else {
            return redirect('/person/idcard')->with('error', '修改失败');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 所有地址
     */
    public function getAddress(Request $request)
    {
        //获取id
        $session = $request->session()->get('home');

        //查询所有的地址
        $res = DB::table('address_detail')
            ->where('u_id', '=', $session->u_id)
            ->get();

        return view('home.person.address', ['value' => $res]);
    }

    /**
     * @param Request $request
     * @return int
     * 设置默认地址
     */
    public function getAjaxaddress(Request $request)
    {
        //获取要修改的id
        $add_id = $request->input('id');

        //获取用户id
        $u_id = $request->session()->get('home')->u_id;

        //修改成所有非默认
        $all = DB::table('address_detail')
            ->where('u_id', '=', $u_id)
            ->update(['default' => 0]);

        //判断是否修改成功
        if ($all || $all == 0) {
            //修改成默认
            $res = DB::table('address_detail')
                ->where('add_id', '=', $add_id)
                ->update(['default' => 1]);

            //判断是否修改成功
            if ($res) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return int
     * 删除地址
     */
    public function postAjaxaddressdel(Request $request)
    {
        //获取要删除的id
        $add_id = $request->input('id');

        //执行删除
        $res = DB::table('address_detail')
            ->where('add_id', '=', $add_id)
            ->delete();

        //判断是否删除成功
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 添加地址
     */
    public function postAddressadd(Request $request)
    {
        //获取所有信息
        $value = $request->except('_token');

        //手机正则
        $phone = '/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';

        //判断用户是否符合要求
        if (empty($value['addressname']) || empty($value['phone']) || empty($value['s_province']) || empty($value['s_city']) || empty($value['s_county']) || empty($value['centent']))
            return back()->with('empty', '数据不能为空!');

        if (!preg_match($phone, $value['phone']))
            return back()->with('error', '数据不符合要求!');

        //获取用户要添加的信息
        $u_id = $request->session()->get('home')->u_id;
        $addressname = $value['addressname'];
        $phone = $value['phone'];
        $address = $value['s_province'] . ';' . $value['s_city'] . ';' . $value['s_county'];
        $add_detail = $value['centent'];

        //执行添加
        $res = DB::table('address_detail')
            ->insert(['u_id' => $u_id, 'addressname' => $addressname, 'phone' => $phone, 'address' => $address, 'add_detail' => $add_detail]);

        //判断是否添加成功
        if ($res) {
            return back()->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }
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
           		->orderBy('o.ordertime','desc')
                ->get();


        //查询用户的订单分页
        $details = DB::table('order as o')
            ->join('order_detail as od','o.o_id','=','od.o_id')
            ->join('shop_stock as ss','od.ss_id','=','ss.ss_id')
            ->join('shop_detail as sd','ss.sd_id','=','sd.sd_id')
            ->join('shop as s','s.s_id','=','sd.s_id')
            ->join('user_shop as us','od.us_id','=','us.us_id')
            ->where('o.u_id','=',$u_id)
           	->orderBy('o.ordertime','desc')
            ->paginate(4);

            $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }

        //返回列表页视图
        return view('home.person.order',['detail'=>$detail,'details'=>$details,'coupon'=>$coupon]);
    }


    /**
     * 用户删除订单的动作
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

                $c=DB::table('coupon')
                   ->get();
                   $coupon=[];
                foreach($c as $k=>$v)
                {
                    $coupon[$v->c_id]=$v;
                }

        //拆分字符串
        $detail[0]->address = explode(';', $detail[0]->address);

        return view('home.person.orderinfo',['detail'=>$detail,'coupon'=>$coupon]);
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
         $money=$newassets['newassets']*2+$Assets;
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
    /**
     * 用户收藏店铺
     * @parem  id
     * @return \Illuminate\Http\Response
     */
    public function getCollectionshop(Request $request)
    {
        //获取登录人的id
        $u_id=session('home')->u_id;
        //查询收藏的店铺信息
        $Collectionshop=DB::table('shop_collection as sc')
                        ->join('user_shop as us','us.us_id','=','sc.us_id')
                        ->where('sc.u_id',$u_id)
                        ->get();
        return view('home.person.collectionshop',['Collectionshop'=>$Collectionshop]);
    }
    public function getDelshop(Request $request)
    {
        //获取取消收藏的id
        $id=$request->input('id');
        //从收藏表里删除用户收藏
        $res=DB::table('shop_collection')
            ->where('id',$id)
            ->delete();

         return back();

    }
    public function getComment()
    {
        return view('home.person.comment');
    }


    /**
     * 前台退出
     */
    public function getQuit(Request $request)
    {
        $request->session()->forget('home');
        return redirect('/');
    }

}
