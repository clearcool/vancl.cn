<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class ProductController extends Controller
{

    /**
     * 分类列表
     * @return type
     */
    public function getIndex(Request $request)
    {
        //查询所有顶级分类
        $type = DB::table('shop_type')->where('p_id',0)->get();
        //查询自分类
        //判断是否有传值
        $id=$request->input('id');
        if(empty($id))
        {
            $zitype=DB::table('shop_type as s')
                ->leftjoin('shop_type as t','s.p_id','=','t.st_id')
                ->where('s.p_id','!=',0)
                ->select('s.st_id as id','s.stname as sname','t.stname as fname')
                ->get();
        }else{
            $zitype=DB::table('shop_type as s')
                ->leftjoin('shop_type as t','s.p_id','=','t.st_id')
                ->where('s.p_id','=',$id)
                ->select('s.st_id as id','s.stname as sname','t.stname as fname')
                ->get();
        }

        // 显示添加表单
        return view('admin.product.index',['type'=>$type,'zitype'=>$zitype]);
    }


    /**
     *  添加顶级分类
     * @return data
     */
    public function getAdd(Request $request)
    {
        $value = $request->input('value');
        $res = DB::table('shop_type')->where('stname', '=', $value)->get();
        $ress=DB::table('shop_type')->where('p_id',0)->get();
        $num=count($ress);
        if (empty($value)) {
            //0为空
            return 'a';
        }elseif (strlen($value) > 11) {
            //4为过长
            return 'c';
        }elseif (!empty($res)) {
            //1该类重复
            return 'b';
        }elseif($num>8){
            return 'd';
        }else{
            $id = DB::table('shop_type')->insertGetId(['stname' => $value, 'p_id' => 0, 'path' => 0]);
            if (!empty($id)) {
                //2为添加成功
                return $id;
            }
        }
    }

    /**
     * @param 添加子分类
     * return data
     */

    public function getAddson(Request $request)
    {
        $value = $request->input('value');
        $stname = $request->input('stname');

        if (empty($value)) {
            //0为空
            return 'a';
        }
        if (strlen($value) > 20) {
            //4为过长
            return 'c';
        }
        $res = DB::table('shop_type')->where('stname', '=', $value)->get();
        if (!empty($res)) {
            //1该类重复
            return 'b';
        } else {
            $res=DB::table('shop_type')->where('stname',$stname)->get();
            $id = DB::table('shop_type')->insertGetId(['stname' => $value, 'p_id' => $res[0]->st_id, 'path' => '0,'.$res[0]->st_id]);
            if (!empty($id)) {
                //2为添加成功
                return $id;
            }
        }
    }

    public function getUpdate(Request $request)
    {
        $value = $request->input('value');
        $oldv=$request->input('oldv');
        if (empty($value)) {
            //0为空
            return 'a';
        }
        if (strlen($value) > 20) {
            //4为过长
            return 'c';
        }
        $res = DB::table('shop_type')->where('stname', '=', $value)->get();
        if (!empty($res)) {
            //1该类重复
            return 'b';
        }else {
            $res=DB::table('shop_type')->where('stname',$oldv)->update(['stname'=>$value]);
//            DB::connection()->enableQueryLog();
            (DB::getQueryLog());
            if (!empty($id)) {
                //2为添加成功
                return $id;
            }
        }
    }

        /**
         * @param 子分类删除
         * return data
         */
        public function getSondel(Request $request)
        {
            $id=$request->input('id');
            $shop=DB::table('shop')
                ->where('st_id','=',$id)
                ->get();
            if($shop){
                echo 0;
            }else{
                    $num=DB::table('shop_type')->where('st_id',$id)->delete();
                    echo 1;
            }

        }

    /**
     * @param 父分类删除
     * return data
     */
    public function getFudel(Request $request)
    {
        $id=$request->input('id');
        $res=DB::table('shop_type')->where('p_id',$id)->get();
        if(empty($res))
        {
            $num=DB::table('shop_type')->where('st_id',$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }




}