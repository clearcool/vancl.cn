<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\ShopPostRequest;

class ShopController extends Controller
{
	public function getIndex(Request $request)
    {
    	//查询所有商品
        $shops = DB::table('shop')
            ->join('shop_type', 'shop.st_id', '=', 'shop_type.st_id')
             ->select('shop.*', 'shop_type.stname')
            ->get();
    	//跳转页面
        return view('admin.shop.index',['shops'=>$shops]);
    }

    public function getAdd(Request $request)
    {
        //查询所有商品分类
        $cates = DB::table('shop_type')->get();

        //跳转页面
        return view('admin.shop.add',['cates'=>$cates]);
    }

    //ajax查询
    public function getCate(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('shop_type')->where('p_id',$id)->get();
        echo json_encode($res);
    }

    //执行商品的添加
    public function postAdd(ShopPostRequest $request)
    {
        //提取数据
        $data = $request->except(['_token']);

        //调用方法进行图片上传
        $data['picurl'] = self::upload($request);
        //执行数据入库操作
        $res = DB::table('shop')->insertGetId($data);

        //跳转到列表页
        if($res){
            return redirect('admin/shop/index')->with('success','商品添加成功');
        }else{
            return back()->withInput()->with('error','商品添加失败');
        }
    }
 

    //修改操作
    public function getEdit(Request $request)
    {
        $id = $request->input('id');
        //查询信息
        $res = DB::table('shop')
            ->where('s_id',$id)
            ->join('shop_type', 'shop.st_id', '=', 'shop_type.st_id')
            ->select('shop.*', 'shop_type.stname')
            ->first();

        $cates = DB::table('shop_type')->get();
        //解析模板 分配数据
        return view('admin.shop.edit',['shop'=>$res,'cates'=>$cates]);
    }

    //执行修改
    public function postUpdate(Request $request)
    {
        //提取数据
        $data = $request->except('_token');
        $data['picurl'] = self::upload($request);
    
        if($data['picurl']){
            unset($data['ypicurl']);
        }else{
            $data['picurl'] = $data['ypicurl'];
            unset($data['ypicurl']);
        }
        
        $res = DB::table('shop')->where('s_id',$data['s_id'])->update($data);
        //跳转到列表页    
        return redirect('admin/shop/index');
     
    }

    //图片上传
    static public function upload($request)
    {
        //判断是否有文件上传
        if($request->hasFile('picurl')){
            //随机文件名
            $name = md5(time().rand(1,999999));
            //获取文件的后缀名
            $suffix = $request->file('picurl')->getClientOriginalExtension();
            $arr = ['png','jpeg','gif','jpg'];
            if(!in_array($suffix,$arr)){
                return back()->with('error','上传文件格式不正确');
            }
            $request->file('picurl')->move('./uploads/maps/',$name.'.'.$suffix);
            //返回路径
            return '/uploads/maps/'.$name.'.'.$suffix;
        }
    }


    //删除操作
    public function getDel(Request $request)
    {
        //接收数据
        $id = $request->input('id');
        $path = DB::table('shop')->select('picurl')->where('s_id','=',$id)->first();

        //查询是否有详情
        $goods = DB::table('shop_detail')->where('s_id','=',$id)->get();

        if($goods){
            return redirect('admin/shop/index')->with('error','商品内有详情，删除失败');
        }else{
            //删除
            unlink('.'.$path->picurl);
            $res = DB::table('shop')->where('s_id','=',$id)->delete();
            return redirect('admin/shop/index')->with('success','商品删除成功');
        }
    }

    //搜索
    public function getSearch(Request $request)
    {
        //获取
        $shopname = $request->input('shopname');
        //查找
        $data = DB::table('shop')->where('shopname','like','%'.$shopname.'%')
            ->join('shop_type', 'shop.st_id', '=', 'shop_type.st_id')
            ->select('shop.*', 'shop_type.stname')
            ->get();

        //跳转
        return view('admin.shop.index',['shops'=>$data]);
    }
    
    //更改商品状态
    public function getState(Request $request)
    {

        $id = $request->input('id');       
        $state = DB::table('shop')
            ->where('s_id',$id)
            ->value('state');

        //更改信息
        if($state){
            $res = DB::table('shop')->where('s_id',$id)->update(['state'=>0]);
        }else{
            $res = DB::table('shop')->where('s_id',$id)->update(['state'=>1]);
        }
        
        //跳转到列表页    
        return redirect('admin/shop/index');
    }
   





















}