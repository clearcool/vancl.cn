<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class productController extends Controller
{

	//产品列表
    public function getProductList(Request $request)
    {
        return view('admin.product.product-list');
    }

    //新增产品
    public function getProductAdd(Request $request)
    {
        return view('admin.product.product-add');
    }

    //品牌管理
    public function getProductBrand(Request $request)
    {
        return view('admin.product.product-brand');
    }

    //产品分类
    public function getProductCategory(Request $request)
    {
        return view('admin.product.product-category');
    }

    //添加产品分类
    public function getProductCategoryAdd(Request $request)
    {
        return view('admin.product.product-category-add');
    }
}