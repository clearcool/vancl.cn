<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\ShopPostRequest;

class ShopsController extends Controller
{
	public function getShopsadd(Request $request)
	{
		//获取用户
		$id = session('home')->u_id;

		//获取总条数
		$num = DB::table('shop')->where('us_id','=',$id)->count();

		//判断是否搜索
		if($request->input('shopname')){
			$shops = DB::table('shop')
				->where('us_id','=',$id)
				->where('shopname','like','%'.$request->input('shopname').'%')
				->join('shop_type', 'shop.st_id', '=', 'shop_type.st_id')
				->select('shop.*', 'shop_type.stname')
				->paginate(5);
		}else{
			$shops = DB::table('shop')
				->where('us_id','=',$id)
				->join('shop_type', 'shop.st_id', '=', 'shop_type.st_id')
				->select('shop.*', 'shop_type.stname')
				->paginate(5);
		}

		//查询所有类别
		$res = DB::table('shop_type')
   			->where('p_id', '=', '0')
   			->get();

		//获取所有的请求参数
		$all = $request->all();
		//跳转页面
		return view('home.shoppage.good.goodsadd',['shops'=>$shops,'all'=>$all,'num'=>$num, 'value' => $res]);
	}

	/**
	 * [postDel description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 * 删除
	 */
	public function postDel(Request $request)
	{
		//获取id
		$id = $request->input('id');

		//操作数据库
		$res = DB::table('shop')
			->where('s_id', '=', $id)
			->delete();

		//判断是否正确
		if ($res) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * [postUp description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 *上架
	 */
	public function postUp(Request $request)
	{
		//获取id
		$id = $request->input('id');

		//操作数据库
		$res = DB::table('shop')
			->where('s_id', '=', $id)
			->update(['state' => 1]);

		//判断是否正确
		if ($res) {
			return 1;
		}
	}

	/**
	 * [postDown description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 * 下架
	 */
	public function postDown(Request $request)
	{
		//获取id
		$id = $request->input('id');

		//操作数据库
		$res = DB::table('shop')
			->where('s_id', '=', $id)
			->update(['state' => 0]);

		//判断是否正确
		if ($res) {
			return 1;
		}
	}

	/**
	 * [postAup description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 *精品
	 */
	public function postAup(Request $request)
	{
		//获取id
		$id = $request->input('id');

		//操作数据库
		$res = DB::table('shop')
			->where('s_id', '=', $id)
			->update(['isboutique' => 1]);

		//判断是否正确
		if ($res) {
			return 1;
		}
	}

	/**
	 * [postAdown description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 * 非精品
	 */
	public function postAdown(Request $request)
	{
		//获取id
		$id = $request->input('id');

		//操作数据库
		$res = DB::table('shop')
			->where('s_id', '=', $id)
			->update(['isboutique' => 0]);

		//判断是否正确
		if ($res) {
			return 1;
		}
	}

	/**
	 * [postUpdate description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 * 修改
	 */
	public function postUpdate(Request $request)
	{
		//获取所有数据
		$value = $request->except('_token');

		//判断是否为空
        if (empty($value['shopname']) || empty($value['price']) || empty($value['describe']) || empty($value['type'])) {
        	return redirect('shops/shopsadd')->with('empty', '数据不能为空');
        }

        //判断用没有file
		if ($request->hasFile('pic')) {
			$file = $request->file('pic');
				 //获取原来的目录
                $oldpic = DB::table('shop')
                    ->select('picurl')
                    ->where('s_id', '=', $value['id'])
                    ->get();
                $oldpic = $oldpic[0]->picurl;

                //删除原来的文件
				// unlink('.' . $oldpic);

 				//设置上传目录
                $oldname = $file->getClientOriginalName();
                $filetype = $file->getClientOriginalExtension();
                $newname = '/uploads/goods/' . md5(date('Y-m-d H:i:s') . $oldname) . '.' . $filetype;
                $file->move('uploads/goods', $newname);

                //修改数据
                $res = DB::table('shop')
                	->where('s_id', '=', $value['id'])
                	->update(['shopname' => $value['shopname'], 'price' => $value['price'], 'st_id' => $value['type'], 'describe' => $value['describe'], 'picurl' => $newname]);
		} else {
			//修改数据
			$res = DB::table('shop')
                	->where('s_id', '=', $value['id'])
                	->update(['shopname' => $value['shopname'],  'price' => $value['price'], 'st_id' => $value['type'], 'describe' => $value['describe']]);
		}

		//判断是否成功
		if ($res) {
			return redirect('shops/shopsadd')->with('success', '修改成功!');
		} else {
			return redirect('shops/shopsadd')->with('error', '修改失败!');
		}
	}

	public function postGoodsadd(Request $request)
	{
		//获取所有数据
		$value = $request->except('_token');
		$id = $request->session()->get('home')->u_id;

		//判断是否为空
        if (empty($value['shopname']) || empty($value['price']) || empty($value['describe']) || empty($value['type']) || empty($value['pic'])) {
        	return redirect('shops/shopsadd')->with('empty', '数据不能为空');
        }

        //设置上传目录
        $file = $request->file('pic');
        $oldname = $file->getClientOriginalName();
        $filetype = $file->getClientOriginalExtension();
        $newname = '/uploads/goods/' . md5(date('Y-m-d H:i:s') . $oldname) . '.' . $filetype;
        $file->move('uploads/goods', $newname);

        //添加数据
        $res = DB::table('shop')
        	->insert(['shopname' => $value['shopname'], 'price' => $value['price'], 'st_id' => $value['type'], 'describe' => $value['describe'], 'picurl' => $newname, 'us_id' => $id]);

        //判断是否成功
		if ($res) {
			return redirect('shops/shopsadd')->with('success', '修改成功!');
		} else {
			return redirect('shops/shopsadd')->with('error', '修改失败!');
		}
	}
}
