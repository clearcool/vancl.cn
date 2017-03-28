<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;







class adminController extends Controller
{

	//管理员列表
    public function getAdminList(Request $request)
    {

        //获取总条数
        $num = DB::table('admin')->count();

        //判断用户是否搜索
        if($request->input('keyword')){
            $admins = DB::table('admin')
                ->where('username','like','%'.$request->input('keyword').'%')
                ->paginate(3);
        }else{
            $admins = DB::table('admin')->paginate(3);
        }

        //每页分几条
//        $admins = DB::table('admin')->paginate(3);
        //返回列表页视图
        return view('admin.admin.admin-list',['admins'=>$admins,'admin'=>$num]);

    }

    //跳转到添加页面
    public function getAdminadd(Request $request)
    {
        return view('admin.admin.admin-add');
    }

    //执行添加动作
    public function postAdmininsert(\App\Http\Requests\AdminPostRequest $request)
    {
        //获取所有提交的数据
        $data = $request->all();

        //查询名字是否重复
        $a = DB::table('admin')->where('username','=',$data['username'])->get();

        //判断用户名是否重复 和两次密码是否一致
        if(!empty($a)){
            return view('admin.admin.admin-add')->withErrors('用户名重复,请更换');
        }else if($data['password'] != $data['password2']){
            return view('admin.admin.admin-add')->withErrors('两次密码不一样');
        }

        //去掉无用字段
        $data = $request->except('_token','password2');

        //哈希加密
        $data['password']=Hash::make($data['password']);
        //加入时间
        $data['jointime']=time();

        //添加到数据库
        $res = DB::table('admin')->insertGetId($data);
        //判断成功或失败
        if($res){
            return redirect ('admin.admin.admin-list');
        }else{
            return back()->withInput()->withErrors('添加管理员失败');
        }

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