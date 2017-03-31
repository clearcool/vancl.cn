<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminController extends Controller
{

    //管理员列表
    public function getAdminlist(Request $request)
    {
        //获取总条数
        $num = DB::table('admin')->count();

        //判断用户是否搜索 和几条一页
        if($request->input('keyword')){
            $admins = DB::table('admin')
                ->where('username','like','%'.$request->input('keyword').'%')
                ->paginate(7);
        }else{
            $admins = DB::table('admin')->paginate(7);
        }

        //获取搜索参数
        $all = $request->all();

        //返回列表页视图
        return view('admin.admin.admin-list',['admins'=>$admins,'all'=>$all,'admin'=>$num]);

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
            return back()->with('success','管理员添加成功');
        }else{
            return back()->withErrors('添加管理员失败');
        }

    }

    //管理员的修改动作
    public function getAdminupdate(Request $request)
    {
        //获取要修改的管理员 id
        $id=$request->input('id');

        //查询数据
        $admin = DB::table('admin')->where('id',$id)->get();

        //将数据放到修改页面
        return view('admin.admin.admin-edit',['admin'=>$admin]);
    }


    //将修改的数据插入数据库
    public function postAdminedit(\App\Http\Requests\EditPostRequest $request)
    {
        //获取所有提交的数据
        $data = $request->all();

        //查询名字是否重复
        $a = DB::table('admin')->where('username','=',$data['username'])->get();

        //判断名字是否重复
        if(empty($a)){

            //判断密码是否修改
            if(empty($data['password'])){

                //插入数据库
                $res = DB::table('admin')->where('id',$data['id'])->update(['username'=>$data['username'],'sex'=>$data['sex'],'phone'=>$data['phone'],'status'=>$data['status']]);

                if($res){
                    return back()->with('success','管理员修改成功');
                }else{
                    return back()->withErrors('管理员修改失败');
                }
            }else{
                //密码哈希加密
                $data['password']=Hash::make($data['password']);

                //插入数据库
                $res = DB::table('admin')->where('id',$data['id'])->update(['password'=>$data['password'],'sex'=>$data['sex'],'phone'=>$data['phone'],'status'=>$data['status']]);
                if($res){
                    return back()->with('success','管理员修改成功');
                }else{
                    return back()->withErrors('管理员修改失败');
                }
            }
        }else{
            //判断名字是不是原来的名字
            if($a[0]->id == $data['id']){

                //判断密码是否为空
                if(empty($data['password'])){
                    $res = DB::table('admin')->where('id',$data['id'])->update(['sex'=>$data['sex'],'phone'=>$data['phone'],'status'=>$data['status']]);
                    if($res){
                        return back()->with('success','管理员修改成功');
                    }else{
                        return back()->withErrors('管理员修改失败');
                    }
                }else{
                    //密码哈希加密
                    $data['password']=Hash::make($data['password']);

                    //插入数据库
                    $res = DB::table('admin')->where('id',$data['id'])->update(['password'=>$data['password'],'sex'=>$data['sex'],'phone'=>$data['phone'],'status'=>$data['status']]);
                    if($res){
                        return back()->with('success','管理员修改成功');
                    }else{
                        return back()->withErrors('管理员修改失败');
                    }
                }

            }else{
                return back()->withErrors('用户名重复,请更换');
            }
        }
    }


    //删除管理员动作
    public function getDel(Request $request)
    {
        $id=$request->input('id');

        //执行管理员删除
        $res = DB::table('admin')->where('id',$id)->delete();
        //判断
        return $res;


    }


    //Ajax修改管理员状态
    //禁止管理员登录
    public function getTing(Request $rquest)
    {
        //获取要修改的管理员的id
        $id = $_GET['id'];

        //执行修改动作
        $res = DB::table('admin')->where('id',$id)->update(['status'=>1]);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    //允许管理员登录
    public function getKai()
    {
        //获取要修改的管理员的 id
        $id = $_GET['id'];

        //执行修改动作
        $res = DB::table('admin')->where('id',$id)->update(['status'=>0]);
        //判断
        if($res){
            return 1;
        }else{
            return 2;
        }

    }


    //执行用户退出的操作
   public function getLogout(Request $request)
   {

       //清除session
       $request->session()->forget('admin');
       //将页面转到登录页面
       return redirect('admin/admin/login');

   }
}
