<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MemberController extends Controller
{
    /**
     *  用戶管理
     *  商铺管理
     */

    /**
     * 用户搜索 列表页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMemberlist(Request $request)
    {
        //获取用户搜索内容
        $value = $request->input('value');

        //判断用户是否搜索
        if (empty($value)) {
            $users = DB::table('user')
                ->leftJoin('user_detail', 'user.u_id', '=', 'user_detail.u_id')
                ->paginate('10');
        } else {
            $users = DB::table('user')
                ->select('*')
                ->leftJoin('user_detail', 'user.u_id', '=', 'user_detail.u_id')
                ->where('username','like', '%'.$value.'%')
                ->paginate('10');
        }

        //查询有多少个用户
        $number = DB::table('user')
            ->count();

        return view('admin.member.member-list', ['users' => $users, 'number' => $number]);
    }


    /**
     * 用户的删除动作
     * @param Request $request
     * @return int
     * 1 删除成功
     * 0 删除失败
     */
    public function postMemberdel(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行删除
        $res = DB::table('user')->where('u_id', '=', $id)->delete();

        //判断是否删除成功
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * 开启用户登陆的权限
     * @param Request $request
     * @return int
     * 0 开启成功
     * 1 开启失败
     */
    public function postMemberstart(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行开启用户
        $res = DB::table('user')->where('u_id', '=', $id)->update(['status' => 0]);

        //判断是否开启成功
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * 关闭用户登录的权限
     * @param Request $request
     * @return int
     * 0 开启成功
     * 1 开启失败
     */
    public function postMemberstop(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行关闭用户
        $res = DB::table('user')->where('u_id', '=', $id)->update(['status' => 1]);

        //判断是否关闭成功
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }


    /**
     * 商铺的列表页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShopslist(Request $request)
    {

        //查询数据库
        $shops = DB::table('shopowner')
            ->leftJoin('user_shop','shopowner.u_id','=','user_shop.u_id')
            ->leftJoin('shop_type','user_shop.st_id','=','shop_type.st_id')
            ->get();

        return view('admin.member.shops-list',['shops'=>$shops]);
    }

    /**
     * 执行修改店主的动作
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShopsdetails(Request $request)
    {
        //获取店主的ss_id
        $ssp_id = $request->input('ssp_id');

        //查询数据
        $shops = DB::table('shopowner')
            ->leftJoin('user_detail','shopowner.u_id','=','user_detail.u_id')
            ->leftJoin('user','shopowner.u_id','=','user.u_id')
            ->where('ssp_id','=',$ssp_id)
            ->get();

        return view('admin.member.shops-details',['shops'=>$shops]);
    }


    /**
     * 修改后的店主信息插入数据库
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request)
    {
        //获取要修改的店主的个人信息
        $user = $request->only('u_id','address','status');

        //修改个人数据
        $res = DB::table('shopowner')
            ->where('u_id','=',$user['u_id'])
            ->update(['address'=>$user['address']]);

        $res1 = DB::table('user')
            ->where('u_id','=',$user['u_id'])
            ->update(['status'=>$user['status']]);

        //判断
        if($res || $res1){
            return back()->with('success','管理员修改成功');
        }else{
            return back()->withErrors('管理员修改失败');
        }
    }

    /**
     * 跳转到修改店铺信息的页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShopedit(Request $request)
    {
        //获取要修改的店铺店主的 u_id
        $u_id = $request->input('u_id');
   
        //查询店铺表
        $shops = DB::table('user_shop as us')
            ->leftJoin('shop_type as st','us.st_id','=','st.st_id')
            ->leftJoin('user as u','us.u_id','=','u.u_id')
            ->leftJoin('shopowner as sp','us.u_id','=','sp.u_id')
            ->where('us.u_id','=',$u_id)
            ->get();

        //解析到修改页面
        return view('admin.member.shops-edit',['shops'=>$shops]);
    }

    /**
     * 将修改的店铺信息插入数据库
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postModify(Request $request)
    {
        //获取修改的商铺的信息
        $a = $request->only('u_id','st_id','stname','shopcondition');

        //执行修改的操作
            $status = DB::table('user_shop')
                ->where('u_id', '=', $a['u_id'])
                ->get();

            if($status[0]->shoptime == 0)
            {
                 $res = DB::table('user_shop')
                     ->where('u_id', '=', $a['u_id'])
                     ->update(['shopcondition' => $a['shopcondition'], 'shoptime' => time()]);

                 $res2 = DB::table('user')
                        ->where('u_id','=',$a['u_id'])
                        ->update(['cate'=>'1']);
            }else {
                $res = DB::table('user_shop')
                    ->where('u_id', '=', $a['u_id'])
                    ->update(['shopcondition' => $a['shopcondition']]);
            }
            $res1 = DB::table('shop_type')
                 ->where('st_id','=',$a['st_id'])
                 ->update(['stname'=>$a['stname']]);

            $res2 = DB::table('user')
                    ->where('u_id','=',$a['u_id'])
                    ->update(['cate'=>'1']);

        //判断
        if($res1 || $res || $res2){
            return back()->with('success','店铺信息修改成功');
        }else{
            return back()->withErrors('店铺信息修改失败');
        }

    }

}
