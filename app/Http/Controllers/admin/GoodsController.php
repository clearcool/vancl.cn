<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\GoodsPostRequest;

class GoodsController extends Controller
{
	public function getIndex(Request $request)
    {
    	//提取数据
        $id = $request->input('id');
        //查询商品详情
        $shop = DB::table('shop')->where('shop.s_id','=',$id)->first();
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$id)
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->get();

    	//跳转页面
        return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop]);
    }

    public function getAdd(Request $request)
    {  
        $id = $request->input('id');
        $shop = DB::table('shop')->where('shop.s_id','=',$id)->first();
        //跳转页面
        return view('admin.goods.add',['shop'=>$shop]);
    }
    //执行商品的添加
    public function postAdd(GoodsPostRequest $request)
    {
        //提取数据
        $data = $request->except(['_token']);
        $id = $request->input('s_id');
        //调用方法进行图片上传
        $data['goodsurl'] = self::upload($request);

        //执行数据入库操作
        $res = DB::table('shop_detail')->insertGetId($data);
        //查询商品详情
        $shop = DB::table('shop')->where('shop.s_id','=',$id)->first();
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$id)
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->get();

        //跳转到列表页
        if($res){
            return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
        }else{
            return back()->withInput();
        }
    }
 
    //图片上传
    static public function upload($request)
    {
        //判断是否有文件上传
        if($request->hasFile('goodsurl')){
            //随机文件名
            $name = md5(time()+rand(1,999999));
            //获取文件的后缀名
            $suffix = $request->file('goodsurl')->getClientOriginalExtension();
            $arr = ['png','jpeg','gif','jpg'];
            if(!in_array($suffix,$arr)){
                return back()->with('error','上传文件格式不正确');
            }
            $request->file('goodsurl')->move('./uploads/maps/',$name.'.'.$suffix);
            //返回路径
            return '/uploads/maps/'.$name.'.'.$suffix;
        }
    }


    //修改操作
    public function getEdit(Request $request)
    {

        //接收数据
        $id = $request->input('id');
        //查询商品详情
        $goods = DB::table('shop_detail')
            ->where('shop_detail.sd_id','=',$id)
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->first();

        //跳转页面
        return view('admin/goods/edit',['goods'=>$goods]);

    }

    //执行修改
    public function postUpdate(Request $request)
    {
        //提取数据
        $data = $request->except('_token');
        $data['goodsurl'] = self::upload($request);

        //判断图片是否更新
        if($data['goodsurl']){
            unset($data['ygoodsurl']);
        }else{
            $data['goodsurl'] = $data['ygoodsurl'];
            unset($data['ygoodsurl']);
        }
        //执行命令
        $res = DB::table('shop_detail')->where('sd_id',$data['sd_id'])->update($data);
        //查询商品详情
        $shop = DB::table('shop')->where('shop.s_id','=',$data['s_id'])->first();
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$data['s_id'])
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->get();
        //跳转页面
        return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
    }


    //删除操作
    public function getDel(Request $request)
    {
        //接收数据
        $id = $request->input('id');
        $sid = $request->input('sid');
        dd($id);
        $path = DB::table('shop_detail')->select('goodsurl')->where('sd_id','=',$id)->first();
        //删除
        unlink('.'.$path->goodsurl);
        $res = DB::table('shop_detail')->where('shop_detail.sd_id','=',$id)->delete();
        //查询商品详情
        $shop = DB::table('shop')->where('shop.s_id','=',$sid)->first();
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$sid)
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->get();

        if($res)
        {
            return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
        }else{
            return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
        }
    }


    public function getDels(Request $request)
    {
        $id = $request->except('s_id');
        $sid = $request->input('s_id');
        //遍历删除
        foreach($id as $k=>$v){
            $res = DB::table('shop_detail')
            ->where('shop_detail.sd_id','=',$k)
            ->delete();
        }
        
        //查询商品详情
        $shop = DB::table('shop')->where('shop.s_id','=',$sid)->first();
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$sid)
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_detail.*', 'shop.shopname')
            ->get();

        if($res)
        {
            return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
        }else{
            return view('admin/goods/index',['goods'=>$goods,'shop'=>$shop]);
        }
    }


}