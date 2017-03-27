<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class memberController extends Controller
{

	//用户管理
    public function getMemberList(Request $request)
    {
        return view('admin.member.member-list');
    }

    //添加用户
    public function getMemberAdd(Request $request)
    {
        return view('admin.member.member-add');
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