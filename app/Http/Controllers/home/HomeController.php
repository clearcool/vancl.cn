<?phpnamespace App\Http\Controllers\home;use Illuminate\Http\Request;use DB;use App\Http\Requests;use App\Http\Controllers\Controller;use Illuminate\Routing\Route;use Gregwar\Captcha\CaptchaBuilder;use Cache;use App\Common\Ucpaas;use Hash;class HomeController extends Controller{    /**     * 首页方法     * @param     * @return null     */    public function index()    {        return view('home.index');    }    /**     * 商品搜索     * @param 搜索关键字 search     * @return null     */    public function postSearch(Request $request)    {        $search=$request->input('search');        DB::connection()->enableQueryLog();        $searchshop=DB::table('shop as s')            ->join('shop_type as st1','s.st_id','=','st1.st_id')            ->join('shop_type as st2','st1.p_id','=','st2.st_id')            ->join('user_shop as us','us.us_id','=','s.us_id')            ->select('*','st1.stname as ssname')            ->orwhere('s.shopname','like','%'.$search.'%')            ->orwhere('s.describe','like','%'.$search.'%')            ->orwhere('st2.stname','like','%'.$search.'%')            ->orwhere('st1.stname','like','%'.$search.'%')            ->get();//        dd(DB::getQueryLog());//        dd($searchshop);            //获取所有的请求参数        $all = $request->all();       return view('home.seach',['searchshop'=>$searchshop,'search'=>$search,'all'=>$all]);    }    /**     * 购物车公共数据     * @param Request session('home')     * @return int     */    public static function gwc()    {        if(session('home'))        {            $cart=DB::table('shopping_cart as sc')                ->join('shop_stock as st','st.ss_id','=','sc.ss_id')                ->join('shop_detail as sd','sd.sd_id','=','st.sd_id')                ->join('shop as s','s.s_id','=','sd.s_id')                ->where('u_id','=',session('home')->u_id)                ->take(2)                ->get();            $num=count($cart);            return view('home.layout.gwc',['cart'=>$cart,'num'=>$num]);        }else{            $cart=null;            return view('home.layout.gwc',['cart'=>$cart]);        }    }    /**     * 购物车商品删除     * @param Request sc_id     * @return int     */    public function getCardel(Request $request)    {        $sc_id=$request->input('sc_id');        $res=DB::table('shopping_cart')        ->where('sc_id','=',$sc_id)        ->delete();        if($res){            return 1;        }else{            return 2;        }    }    /**     * 前台登录页面     * @return     */    public function getLogin(Request $request)    {        return view('home.login.Login');    }    /**     * 用户名登录     * @param Request $request     * @return int     *  1 是为空     *  2 手机号未注册     *  3 被封号     *  4 密码错误     *  5 登录成功 跳转到主页     */    public function postLogina(Request $request)    {        //获取用户的登录信息        $user = $_POST;        //判断用户名或密码是否为空        if (empty($user['username1']) || empty($user['password1'])) {            return 1;        }        //与数据库进行对比        $res = DB::table('user')            ->join('user_detail','user.u_id','=','user_detail.u_id')            ->where('username', '=', $user['username1'])            ->get();        //判断用户是否存在        if (empty($res)) {            return 2;        } else {            if (Hash::check($user['password1'], $res[0]->password)) {                //判断用户是被禁止登陆                if ($res[0]->status == 1) {                    return 3;                }                //将登陆用户的信息存入session                $request->session()->put(['home' => $res[0]]);                //解析主页                return 5;            } else {                return 4;            }        }    }    /**     * 用户手机号登录     * @param Request $request     * @return int     *  1 是为空     *  2 手机号未注册     *  3 被封号     *  5 登录成功 跳转到主页     *  6 验证码不正确     */    public function postLoginb(Request $request)    {        //获取用户的登录信息        $user = $_POST;        //判断用户名或密码是否为空        if (empty($user['userphone']) || empty($user['yanzhengma'])) {            return 1;        }        //与数据库进行对比        $res = DB::table('user')            ->join('user_detail','user.u_id','=','user_detail.u_id')            ->where('userphone', '=', $user['userphone'])            ->get();        //判断手机号是否存在        if (empty($res)) {            return 2;        } else {            //判断验证码是否正确            if(session('code') == $user['yanzhengma']) {                //判断用户是被禁止登陆                if ($res[0]->status == 1) {                    return 3;                }                //将登陆用户的信息存入session                $request->session()->put(['home' => $res[0]]);                //解析主页                return 5;            }else{                return 6;            }        }    }    /**     * 前台注册页面     * @return     */    public function getRegister()    {        return view('home.login.Register');    }    /**     * 获取用户名 判断用户名是否重复     * @param Request $request     * @return int     *  1 不重名     *  2 用户名已存在     */    public function getRegisterb(Request $request)    {        //获取用户名        $name = $_GET['name'];        //查询数据库是否有重名        $res = DB::table('user')->where('username', '=', $name)->get();        if (empty($res)) {            return 1;        } else {            return 2;        }    }    /**     * 查询手机号是否注册过     * @param Request $request     * @return int     *  1 未注册     *  2 已注册     */    public function getPhone(Request $request)    {        //获取要查询的手机号        $c = $request->input('c');        //查询数据库判断手机号是否重复        $b = DB::table('user')->where('userphone', '=', $c)->get();        if (empty($b)) {            return 1;        } else {            return 2;        }    }    /**     * 判断注册验证码是否正确     * @param Request $request     * @return int     */    public function getCode(Request $request)    {        //获取要查询的手机号        $code = $request->input('code');        //判断验证码是否正确        if(session('code') == $code){            return 1;        }else{            return 2;        }    }    /**     * 注册时手机号发送短信     * @param Request $request     * @return array     */    public function getYanzheng(Request $request)    {        //获取要发送的手机号        $a = $request->input('phone');        //短信验证码        //初始化必填        $options['accountsid'] = '7ac5387ae559b5a4a547c5b5ae9ca072';        $options['token'] = '46502cc72314f98d1a6d3a542e84da6a';        //初始化 $options必填        $ucpass = new Ucpaas($options);        $appId = "0abae7bf13774e22a47710cd5c268814";        $to = $a;        $templateId = "39612";        $code = rand(10000, 99999);        $param = $code;        $request->session()->put(['code' => $code]);        return $ucpass->templateSMS($appId, $to, $templateId, $param);    }    /**     * 处理用户注册信息     * @param Requests\HomePostRequest $request     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     */    public function postRegisterb(\App\Http\Requests\HomePostRequest $request)    {        //获取所有提交的数据        $user = $request->all();        //查询名字和电话是否重复        $a = DB::table('user')->where('username', '=', $user['username'])->get();        $b = DB::table('user')->where('userphone', '=', $user['userphone'])->get();        //判断用户名是否重复 和两次密码是否一致        if (!empty($a)) {            return view('home.login.Register')->withErrors('用户名重复,请更换');        } else if (!empty($b)) {            return view('home.login.Register')->withErrors('手机号重复,请更换');        } else if ($user['password'] != $user['password2']) {            return view('home.login.Register')->withErrors('两次密码不一样');        }        //去掉无用字段        $user = $request->except('_token','code','password2');        //哈希加密        $user['password'] = Hash::make($user['password']);        //加入时间        $user['jointime'] = time();        //将信息插入user 数据库        $res = DB::table('user')->insertGetId($user);        //将 u_id 插入user_detail表        $res1 = DB::table('user_detail')->insert(['u_id'=>$res, 'pic' => '/uploads/pic/default.jpg']);        $ress = DB::table('user')            ->join('user_detail','user.u_id','=','user_detail.u_id')            ->where('u_id', '=',$res)            ->get();        //判断        if ($res && $res1) {            //将注册用户的信息存入session            $request->session()->put(['home' => $ress[0]]);            return redirect('/');        } else {            return back()->withErrors('注册失败');        }    }    /**     * 详情页方法     * @param     * @return     */    public function getDetails(Request $request)    {        $id = $request->input('id');        //分类信息        $type = DB::table('shop_type as t')            ->join('shop_type as t2', 't.p_id', '=', 't2.st_id')            ->join('shop as s', 't.st_id', '=', 's.st_id')            ->select('*', 't2.stname as pname', 't.stname as tname')            ->where('s.s_id', $id)            ->first();        //商品信息        $shop = DB::table('shop')            ->where('s_id', $id)            ->first();        //详情信息        $pic = DB::table('shop as s')            ->join('shop_detail as sd', 's.s_id', '=', 'sd.s_id')            ->where('s.s_id','=',$shop->s_id)            ->select('sd.sd_id', 'sd.goodsurl', 'sd.color')            ->get();        $num = 0;        for ($i = 0; $i <= count($pic) - 1; $i++) {            $s = DB::table('shop_stock')                ->where('sd_id', $pic[$i]->sd_id)                ->get();            $a = DB::table('shop_stock')                ->where('sd_id', $pic[$i]->sd_id)                ->sum('stock');            $stock[$pic[$i]->color] = $s;            $num += $a;        }        foreach ($pic as $k => $v) {            $picc[$k]['goodsurl'] = explode(';', $v->goodsurl);            $picc[$k]['color'] = $v->color;        }        //购物车数量        if(session('home'))        {            $carnum=DB::table('shopping_cart')                ->where('u_id','=',session('home')->u_id)                ->count();        }else{            $carnum=0;        }        //商品评论        $shop_comment=DB::table('shop_comment as sc')            ->join('user as u','u.u_id','=','sc.u_id')            ->where('sc.s_id', $id)            ->get();        return view('home.details', ['type' => $type, 'shop' => $shop,'carnum'=>$carnum,'num' => $num, 'picc' => $picc, 'stock' => $stock,'shop_comment'=>$shop_comment]);    }    /**     * 详情页图片     * @param color     * @return data     */    public function getPic(Request $request)    {        $color = $request->input('color');        $id = $request->input('id');        $p = DB::table('shop_detail')            ->where('color', $color)            ->where('s_id',$id)            ->select('goodsurl')            ->first();        $pp = explode(';', $p->goodsurl);        return $pp;    }    /**     * 详情页尺寸     * @param color     * @return data     */    public function getSize(Request $request)    {        $color = $request->input('color');        $id = $request->input('id');        $size = DB::table('shop_detail as sd')            ->join('shop_stock as st', 'sd.sd_id', '=', 'st.sd_id')            ->where('sd.color', $color)            ->where('st.s_id',$id)            ->select('st.ss_id as id', 'st.size as size', 'st.stock as stock')            ->get();        return $size;    }    /**     * 头部列表     * @param     * @return     */    public function getHead(Request $request)    {   //获取父页面传值        $name = $request->input('name');        //查询商品类的id        $shoptype = DB::table('shop_type')            ->where('stname', $name)            ->value('st_id');        //查询商品类        $shoptitle = DB::table('shop_type')            ->where('p_id', $shoptype)            ->get();        //多表查询商品信息        // DB::connection()->enableQueryLog();        $st = DB::table('shop_type')            ->where('p_id', $shoptype)            ->select('st_id', 'stname')            ->get();        for ($i = 0; $i < count($st); $i++) {            $shop[$st[$i]->stname] = [];            $s = DB::table('shop as s')            ->join('user_shop as us','us.us_id','=','s.us_id')            ->where('s.st_id','=', $st[$i]->st_id)->get();            foreach ($s as $k => $v) {                array_push($shop[$st[$i]->stname], $v);            }        }        // dd($shop);        return view('home.headlist', ['shoptitle' => $shoptitle, 'shop' => $shop]);    }    /**     * 列表页方法     * @param id     * @return     */    public function getList(Request $request)    {        //用户列表页        $id = $request->input('id');        if (!empty("a")) {            // DB::connection()->enableQueryLog();            $shop = DB::table('shop as s')                ->join('user_shop as us','us.us_id','=','s.us_id')                ->where('s.st_id', $id)                ->paginate(2);            // dd(DB::getQueryLog());        }        switch ($request->input('a')) {            //默认排序            case "default":                $shop = DB::table('shop as s')                    ->join('user_shop as us','us.us_id','=','s.us_id')                    ->where('s.st_id', $id)                    ->paginate(2);                break;                //按照售量排序            case "sole":                $shop = DB::table('shop as s')                    ->join('user_shop as us','us.us_id','=','s.us_id')                    ->where('s.st_id', $id)                    ->orderBy('Sales', 'desc')                    ->paginate(2);                break;                //按照好评排序            case "praise":                // DB::connection()->enableQueryLog();                $shop = DB::table('shop as s')                    ->join('user_shop as us','us.us_id','=','s.us_id')                    ->where('s.st_id', $id)                    ->orderby('praise', 'desc')                    ->paginate(2);                // dd(DB::getQueryLog());                break;                //按照更新时间排序            case "newtime":                $shop = DB::table('shop as s')                     ->join('user_shop as us','us.us_id','=','s.us_id')                    ->where('s.st_id', $id)                    ->orderBy('uptime', 'asc')                    ->paginate(2);                break;        }        //商品库存        $shopsales = DB::table('shop')            ->where('st_id', $id)            ->value('Sales');        //类别名查询        $titletype = DB::table('shop_type')            ->where('st_id', $id)            ->value('stname');        //获取所有的请求参数        $all = $request->all();        //解析模板        return view('home.list', ['id' => $id, 'shopsales' => $shopsales, 'titletype' => $titletype, 'shop' => $shop, 'all' => $all]);    }    /**     * 优惠券列表     * @param     * @return     */    public function getCoupon()    {        $coupon=DB::table('coupon')            ->get();        return view('home.coupon',['coupon'=>$coupon]);    }    /**     * 领取优惠劵     * @param     * @return     */    public function getReceive(Request $request)    {        // dd(session('home'));        //获取所领取优惠劵的id        $id=$request->input('id');        //判断用户是否登录        if(!session('home')){            return 0;        }        //获取领取优惠劵的有效时间        $effective=DB::table('coupon')            ->where('c_id',$id)            ->value('effective');        //获取领取优惠劵的信息        $sheets=DB::table('coupon')            ->where('c_id',$id)            ->value('sheets');        //获取登录者的id        $u_id=DB::table('user')            ->where('username','=',session('home')->username)            ->value('u_id');        //判断用户是否已经领取过同类的优惠劵        $c_id=DB::table('user_coupon')            ->where('u_id','=',session('home')->u_id)            ->value('c_id');        //进行判断        if($c_id==$id){            return 1;        }        //领取优惠劵将数据放回数据库        $time=time();        $insetId=DB::table('user_coupon')->insertGetId(            ['c_id'=>$id,'u_id'=>$u_id,'starttime'=>$time,'endtime'=>$time+$effective,'status'=>1,'number'=>$time+$id]);        $coupon=DB::table('coupon')            ->where('c_id',$id)            ->update(['sheets'=>$sheets-1]);        // dd(11);        if($insertId){            return 2;        }    }}