<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Cache;

class CarController extends Controller
{

    /**
     * 购物车页面
     * @param
     * @return
     */
    public function getIndex()
    {
        return view('/home/buy/car');
    }

    /**
     * 加入购物车
     * @param 商品ID
     * @return
     */

    public function getAddcar(Request $request)
    {
       $id=$request->input('id');
       $num=$request->input('num');
       $home=session('home');
       //查看库存
       $stock=DB::table('shop_stock')
           ->where('ss_id',$id)
           ->select('stock')
           ->first();
       if($stock->stock<$num)
       {
           //库存不足返回1
           return 1;
       }else{
               //判断是否添加过该商品
               $res=DB::table('shopping_cart')
               ->where('u_id',$home->u_id)
               ->where('ss_id',$id)
               ->get();
               if($res)
               {
                   return 2;
               }else{
                   //添加新商品
                   DB::table('shopping_cart')->insert(
                       ['u_id'=>$home->u_id,'ss_id' => $id, 'num' => $num]
                   );
                   return 3;
               }
           }

    }




}
