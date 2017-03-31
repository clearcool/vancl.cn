<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class memberController extends Controller
{
    //用户列表|用户查询
    public function getMemberlist(Request $request)
    {
        //获取用户搜索内容
        $value = $request->input('value');

        //判断用户是否搜索
        if (empty($value)) {
            $users = DB::table('user')
                ->leftJoin('user_detail', 'user.u_id', '=', 'user_detail.u_id')
                ->leftJoin('address_detail', 'user.u_id', '=', 'address_detail.u_id')
                ->paginate('10');
        } else {
            $users = DB::table('user')
                ->select('*')
                ->leftJoin('user_detail', 'user.u_id', '=', 'user_detail.u_id')
                ->leftJoin('address_detail', 'user.u_id', '=', 'address_detail.u_id')
                ->where('username','like', '%'.$value.'%')
                ->paginate('10');
        }

        //查询有多少个用户
        $number = DB::table('user')
            ->count();

        return view('admin.member.member-list', ['users' => $users, 'number' => $number]);
    }

    //用户删除
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

    //开启用户
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

    //关闭用户
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
}