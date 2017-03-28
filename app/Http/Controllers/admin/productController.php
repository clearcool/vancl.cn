<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class ProductController extends Controller
{

	//产品列表
    public function getProductList(Request $request)
    {
        //查询所有分类
        $shops = DB::table('shop')->get();
        // 显示添加表单
        return view('admin.product.product-list',['shops'=>$shops]);
    }



    //新增产品
    public function getProductAdd(Request $request)
    {
        return view('admin.product.product-add');
    }
    //执行用户的添加
    public function postProductAddInsert(Request $request)
    {
        //提取数据
        $data = $request->except(['_token']);

        //调用方法进行图片上传
        // $data['pic'] = $this->upload($request);
        $data['picurl'] = self::upload($request);

        //执行数据入库操作
        $res = DB::table('shop')->insertGetId($data);

        //跳转到列表页
        if($res){
            return redirect('admin/product/product-list')->with('success','商品添加成功');
        }else{
            return back()->withInput();
        }
    }


    //品牌管理
    public function getProductBrand(Request $request)
    {
        return view('admin.product.product-brand');
    }



    //分类管理
    public function getProductCategory(Request $request)
    {
        return view('admin.product.product-category');
    }



    //添加产品分类
    public function getProductCategoryAdd(Request $request)
    {
        
        //查询所有分类
        $cates = DB::table('shop_type')->get();
        // 显示添加表单
        return view('admin.product.product-category-add',['cates'=>$cates]);
    }
    public function postProductCategoryInsert(Request $request)
   {
        //提取数据
        $data = $request->only(['stname','p_id']);

        if($data['p_id'] == 0){
            $data['path'] = '0';
        }else{
            //获取父级path信息
            $res = DB::table('shop_type')->where('st_id',$data['p_id'])->first();
            $data['path'] = $res->path.','.$data['p_id'];
        }
        //执行数据插入
        $res = DB::table('shop_type')->insert($data);
    }



    //商品详情
    public function getProductShow(Request $request)
    {
        return view('admin.product.product-show');
    }
}