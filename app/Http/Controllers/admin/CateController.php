<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
{
	public function getIndex(Request $request)
    {
    	//查询所有分类
        $cates = DB::table('shop_type')->get();
    	//跳转页面
        return view('admin.cate.index',['cates'=>$cates]);
    }

    public function getAdd(Request $request)
   {
        //查询所有分类
        $cates = DB::table('shop_type')->get();
    	//跳转页面
        return view('admin.cate.add',['cates'=>$cates]);
    }

    public function postAdd(Request $request)
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
        //跳转页面
        if($res)
        {
            return redirect('admin/cate/index');
        }else{
            return back()->withInput();
        }
   }
}