<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\GoodsPostRequest;
use App\Http\Requests\StockPostRequest;

class GoodsController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
    	//提取商品ID
        $s_id = $request->input('s_id');
        
        //查询商品信息
        $shop = DB::table('shop')->where('shop.s_id','=',$s_id)->first();
        
        //查询商品详情详细
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$s_id)
            ->get();
            
            for($i=0;$i<=count($goods)-1;$i++){
                $goods[$i]->goodsurl = explode(';', $goods[$i]->goodsurl);
            }

        $stocks = DB::table('shop_stock')
            ->where('shop_stock.s_id','=',$s_id)
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->select('shop_stock.*', 'shop_detail.color') 
            ->get();

    	//跳转页面
        return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop,'stocks'=>$stocks]);
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
        //提取商品ID数据
        $s_id = $request->input('s_id');

        //提取商品详情数据
        $data = $request->except('_token');
        //查询是否颜色重复
        $color = DB::table('shop_detail')->where('shop_detail.s_id','=',$data['s_id'])->value('color');
        if($color == $data['color']){
            return back()->withInput()->with('error','同种商品颜色重复');
        }
         //查询图片个数
        $a = count($data['goodsurl']);

        if($a > 3){
            return back()->withInput()->with('error','图片不能大于3张');
        }
        //插入商品图片表 多文件
        $str='';
            if($request->hasFile('goodsurl')){
                foreach($request->file('goodsurl') as $file) 
                {
                    // 上传文件之后的文件名
                        $name = md5(time()+rand(1,999999));
                    // 获取后缀名，判断格式
                        $suffix = $file->getClientOriginalExtension();
                        $arr = ['png','jpeg','gif','jpg'];
                        if(!in_array($suffix,$arr)){
                            return back()->with('error','上传文件格式不正确');
                        }
                        $file->move('./uploads/goods/',$name.'.'.$suffix);
                        $str=$str.$name.'.'.$suffix.';';
                }
                  
            }
        $str=rtrim($str,';');
        $data['goodsurl'] = $str;

        //执行数据入库操作
        $res = DB::table('shop_detail')->insertGetId($data);

        //查询商品信息
        $shop = DB::table('shop')->where('shop.s_id','=',$s_id)->first();
        
        //查询商品详情详细
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$s_id)
            ->get();
            for($i=0;$i<=count($goods)-1;$i++){
                $goods[$i]->goodsurl = explode(';', $goods[$i]->goodsurl);
            }
        $stocks = DB::table('shop_stock')
            ->where('shop_stock.s_id','=',$s_id)
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->select('shop_stock.*', 'shop_detail.color') 
            ->get();

        //跳转到列表页
        if($res){
            return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop,'stocks'=>$stocks])->with('success','商品详情添加成功');
        }else{
            return back()->withInput()->with('error','商品详情添加商失败');
        }

    }


    //添加库存
    public function getSadd(Request $request)
    {  
        $id = $request->input('id');
        $good = DB::table('shop_detail')
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->where('shop_detail.sd_id','=',$id)
            ->select('shop_detail.*', 'shop.shopname')
            ->first();
        
        //跳转页面
        return view('admin.goods.sadd',['good'=>$good]);
    }
    //执行商品库存的添加
    public function postSadd(StockPostRequest $request)
    {
        //提取商品ID数据
        $s_id = $request->input('s_id');

        //提取商品详情数据
        $data = $request->except('_token');

        //查询是否尺码重复
        $size = DB::table('shop_stock')->where('shop_stock.sd_id','=',$data['sd_id'])->value('size');

        if($size == $data['size']){
            return back()->withInput()->with('error','同种颜色尺码重复');
        }


        //执行数据入库操作
        $res = DB::table('shop_stock')->insertGetId($data);

        //查询商品信息
        $shop = DB::table('shop')->where('shop.s_id','=',$s_id)->first();
        
        //查询商品详情详细
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$s_id)
            ->get();
            for($i=0;$i<=count($goods)-1;$i++){
                $goods[$i]->goodsurl = explode(';', $goods[$i]->goodsurl);
            }
        $stocks = DB::table('shop_stock')
            ->where('shop_stock.s_id','=',$s_id)
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->select('shop_stock.*', 'shop_detail.color') 
            ->get();

        //跳转到列表页
        if($res){
            return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop,'stocks'=>$stocks])->with('success','商品库存添加成功');
        }else{
            return back()->withInput()->with('error','商品详情添加商失败');
        }

    }


    //修改货存操作
    public function getEdit(Request $request)
    {

        //接收数据
        $ss_id = $request->input('id');
        //查询商品货存
        $stocks = DB::table('shop_stock')
            ->where('shop_stock.ss_id','=',$ss_id)
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->join('shop', 'shop_detail.s_id', '=', 'shop.s_id')
            ->select('shop_stock.*', 'shop_detail.color','shop.shopname') 
            ->first();

        //跳转页面
        return view('admin/goods/edit',['stocks'=>$stocks]);

    }

    //执行修改
    public function postUpdate(Request $request)
    {
        //提取数据
        $data = $request->except('_token');

        //执行命令
        $res = DB::table('shop_stock')->where('ss_id',$data['ss_id'])->update($data);
        //查询商品信息
        $shop = DB::table('shop')->where('shop.s_id','=',$data['s_id'])->first();
        
        //查询商品详情详细
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$data['s_id'])
            ->get();
            for($i=0;$i<=count($goods)-1;$i++){
                $goods[$i]->goodsurl = explode(';', $goods[$i]->goodsurl);
            }
        $stocks = DB::table('shop_stock')
            ->where('shop_stock.s_id','=',$data['s_id'])
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->select('shop_stock.*', 'shop_detail.color') 
            ->get();

        //跳转页面
        return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop,'stocks'=>$stocks]);
    }



    //ajax删除详情
    public function postDelsd(Request $request)
    {
        //获取id
        $sd_id = $request->input('id');
        //查询有无库存
        $stock = DB::table('shop_stock')->where('sd_id','=',$sd_id)->get();
        if(!$stock){
            //获取图片字段
            $path = DB::table('shop_detail')->where('sd_id','=',$sd_id)->value('goodsurl');
            $a = explode(";",$path);
            $b = count($a);
            for( $i = 0; $i < $b; $i++){
                //获取图片地址
                $c = $a[$i];
                //删除图片
                unlink('./uploads/goods/'.$c);
            }
            //执行删除
            $res = DB::table('shop_detail')->where('shop_detail.sd_id','=',$sd_id)->delete();
            echo $res;
        }
    }


     //ajax删除库存
    public function postDelss(Request $request)
    {
        //获取id
        $ss_id = $request->input('id');
        //执行删除
        $res = DB::table('shop_stock')->where('shop_stock.ss_id','=',$ss_id)->delete();
        echo $res;
    }

    //查看库存
    public function getSearch(Request $request)
    {
        //提取商品ID
        $s_id = $request->input('s_id');
        $sd_id = $request->input('sd_id');
        //查询商品信息
        $shop = DB::table('shop')->where('shop.s_id','=',$s_id)->first();
        
        //查询商品详情详细
        $goods = DB::table('shop_detail')
            ->where('shop_detail.s_id','=',$s_id)
            ->get();
            for($i=0;$i<=count($goods)-1;$i++){
                $goods[$i]->goodsurl = explode(';', $goods[$i]->goodsurl);
            }
        //查找
        $data = DB::table('shop_stock')->where('shop_stock.sd_id','=',$sd_id)
            ->join('shop_detail', 'shop_detail.sd_id', '=', 'shop_stock.sd_id')
            ->select('shop_stock.*', 'shop_detail.color') 
            ->get();

        //跳转
        return view('admin.goods.index',['goods'=>$goods,'shop'=>$shop,'stocks'=>$data]);
    }



}