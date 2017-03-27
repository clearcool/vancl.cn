<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class adminController extends Controller
{

	//管理员列表
    public function getAdminList(Request $request)
    {
        return view('admin.admin.admin-list');
    }

    //添加管理员
    public function getAdminAdd(Request $request)
    {
        return view('admin.admin.admin-add');
    }

    //权限管理
    public function getAdminPermission(Request $request)
    {
        return view('admin.admin.admin-permission');
    }

    //角色管理管理
    public function getAdminRole(Request $request)
    {
        return view('admin.admin.admin-role');
    }

    //新建网站角色
    public function getAdminRoleAdd(Request $request)
    {
        return view('admin.admin.admin-role-add');
    }

}