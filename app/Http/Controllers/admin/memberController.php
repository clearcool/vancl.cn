<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;







class memberController extends Controller
{
    //用户列表
    public function getMemberlist()
    {
        $users = DB::table('user')
            ->leftJoin('user_detail', 'user.u_id', '=', 'user_detail.u_id')
            ->leftJoin('address_detail', 'user.u_id', '=', 'address_detail.u_id')
            ->get();
        return view('admin.member.member-list', ['users' => $users]);
    }

    //用户删除
    public function postMemberdel(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('user')->where('u_id', '=', $id)->delete();
        if ($res) {
           return 1;
        } else {
           return 0;
        }
    }

    //开启用户
    public function postMemberstart(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('user')->where('u_id', '=', $id)->update(['status' => 0]);
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    //关闭用户
    public function postMemberstop(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('user')->where('u_id', '=', $id)->update(['status' => 1]);
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    //删除的用户
    public function getMemberDel(Request $request)
    {
        return view('admin.member.member-del');
    }

    //下载记录
    public function getMemberRecordDownload(Request $request)
    {
        return view('admin.member.member-record-download');
    }

    //浏览记录
    public function getMemberRecordBrowse(Request $request)
    {
        return view('admin.member.member-record-browse');
    }

    //分享记录
    public function getMemberRecordShare(Request $request)
    {
        return view('admin.member.member-record-share');
    }

}