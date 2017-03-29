<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ShopController extends Controller
{
	public function getIndex(Request $request)
    {
    	//查询所有分类
        $shops = DB::table('shop')->get();
    	//跳转页面
        return view('admin.shop.index',['shops'=>$shops]);
    }

    public function getAdd(Request $request)
    {
        return view('admin.shop.add');
    }
    //执行商品的添加
    public function postAdd(Request $request)
    {
        //提取数据
        $data = $request->except(['_token']);

        //调用方法进行图片上传
        $data['picurl'] = self::upload($request);

        //执行数据入库操作
        $res = DB::table('shop')->insertGetId($data);

        //跳转到列表页
        if($res){
            return redirect('admin/shop/index');
        }else{
            return back()->withInput();
        }
    }
    //图片上传
    static public function upload($request)
    {
        //判断是否有文件上传
        if($request->hasFile('picurl')){
            //随机文件名
            $name = md5(time()+rand(1,999999));
            //获取文件的后缀名
            $suffix = $request->file('picurl')->getClientOriginalExtension();
            $arr = ['png','jpeg','gif','jpg'];
            if(!in_array($suffix,$arr)){
                return back()->with('error','上传文件格式不正确');
            }
            $request->file('picurl')->move('./uploads/',$name.'.'.$suffix);
            //返回路径
            return '/uploads/'.$name.'.'.$suffix;
        }
    }
    //删除操作
    public function getDel(Request $request)
    {
        //接收数据
        $id = $request->input('id');
       
        //删除
        $res = DB::table('shop')->where('s_id','=',$id)->delete();

        if($res)
        {
            return redirect('admin/shop/index');
        }else{
            return redirect('admin/shop/index');
        }
    }

    //修改操作
    public function getEdit(Request $request)
    {
        $id = $request->input('id');
        //查询信息
        $res = DB::table('shop')->where('s_id',$id)->first();

        //解析模板 分配数据
        return view('admin.shop.edit',['shops'=>$res]);
    }

    //执行修改
    public function postUpdate(Request $request)
    {
        //提取数据
        $data = $request->except('_token');

        $picurl = $request->input('picurl');

    


        $res = DB::table('shop')->where('s_id',$data['s_id'])->update($data);
        if($res)
        {
            return redirect('admin/shop/index');
        }else{
            return back()->withInput();
        }
    }

}