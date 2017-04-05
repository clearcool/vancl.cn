<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminController extends Controller
{

    /**
     * 管理员列表页 和搜索
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminlist(Request $request)
    {
        //获取总条数
        $num = DB::table('admin')->count();

        //判断用户是否搜索 和几条一页
        if($request->input('keyword')){
            $admins = DB::table('admin')
                ->where('username','like','%'.$request->input('keyword').'%')
                ->paginate(8);
        }else{
            $admins = DB::table('admin')->paginate(8);
        }

        //获取搜索参数
        $all = $request->all();

        //返回列表页视图
        return view('admin.admin.admin-list',['admins'=>$admins,'all'=>$all,'admin'=>$num]);

    }

    /**
     * 跳转到添加页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminadd(Request $request)
    {
        return view('admin.admin.admin-add');
    }


    /**
     * 执行添加动作
     * @param Requests\AdminPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * 跳转到管理员修改页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAdminupdate(Request $request)
    {
        //获取要修改的管理员 id
        $id=$request->input('id');

        //查询数据
        $admin = DB::table('admin')->where('id',$id)->get();

        //将数据放到修改页面
        return view('admin.admin.admin-edit',['admin'=>$admin]);
    }


    /**
     * 将管理员的修改信息插入数据库
     * @param Requests\EditPostRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
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


    /**
     * 执行管理员的删除
     * @param Request $request
     * @return int
     * 0 删除成功
     * 1 删除失败
     */
    public function getDel(Request $request)
    {
        $id=$request->input('id');

        //执行管理员删除
        $res = DB::table('admin')->where('id',$id)->delete();
        //判断
        if($res){
            return 0;
        }else{
            return 1;
        }

    }


    /**
     * 禁止管理员登录的动作
     * @param Request $request
     * @return int
     * 0 停用成功
     * 1 停用失败
     */

    public function getTing(Request $request)
    {
        //获取要修改的管理员的id
        $id = $_GET['id'];

        //执行修改动作
        $res = DB::table('admin')->where('id',$id)->update(['status'=>1]);
        //判断
        if($res){
            return 0;
        }else{
            return 1;
        }
    }

    /**
     * 开启管理员登录的动作
     * @param Request $request
     * @return int
     * 0 开启成功
     * 1 开启失败
     */
    public function getKai(Request $request)
    {
        //获取要修改的管理员的 id
        $id = $_GET['id'];

        //执行修改动作
        $res = DB::table('admin')->where('id',$id)->update(['status'=>0]);
        //判断
        if($res){
            return 0;
        }else{
            return 1;
        }

    }


    /**
     * 执行管理员退出的动作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
   public function getLogout(Request $request)
   {
       //清除session
       $request->session()->forget('admin');
       //将页面转到登录页面
       return redirect('/admin');

   }
}
