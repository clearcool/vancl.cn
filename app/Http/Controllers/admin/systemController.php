<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class systemController extends Controller
{

	//基本设置
    public function getSystemBase(Request $request)
    {
        return view('admin.system.system-base');
    }

    //栏目管理
    public function getSystemCategory(Request $request)
    {
        return view('admin.system.system-category');
    }

    //栏目设置
    public function getSystemCategoryAdd(Request $request)
    {
        return view('admin.system.system-category-add');
    }

    //数据字典
    public function getSystemData(Request $request)
    {
        return view('admin.system.system-data');
    }

    //系统日志
    public function getSystemLog(Request $request)
    {
        return view('admin.system.system-log');
    }

    //基本设置
    public function getSystemShielding(Request $request)
    {
        return view('admin.system.system-shielding');
    }
}