<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;

class ListController extends Controller
{
    public function getIndex(Request $request)
    {   
        
        //用户列表页
        $title=Cache::get('title');
       //接收数据
        if(!isset($title))
        {
            return redirect()->action('home\HomeController@index');

        }

        $id = $request->input('id');
        if(!empty("a"))
        {
            // DB::connection()->enableQueryLog();
            $shop = DB::table('shop as s')
                ->join('shop_comment as sc','s.s_id','=','sc.s_id')
                ->where('s.st_id',$id) 
                ->paginate(2);
                
               
                // dd(DB::getQueryLog());
        }


            
        switch($request->input('a')){
            case "default":
                $shop = DB::table('shop as s')
                ->join('shop_comment as sc','s.s_id','=','sc.s_id')
                ->where('s.st_id',$id)
                ->paginate(2);
                
            break;
            case "sole":
                $shop = DB::table('shop as s')
                ->join('shop_comment as sc','s.s_id','=','sc.s_id')
                ->where('s.st_id',$id)
                ->orderBy('Sales', 'desc')
                ->paginate(2);
            break;
            case "praise":
              // DB::connection()->enableQueryLog();
            $shop = DB::table('shop as s')
                ->join('shop_comment as sc','s.s_id','=','sc.s_id')
                ->where('s.st_id',$id)
                ->orderby('sc.star','desc')
                ->paginate(2);
                 // dd(DB::getQueryLog());
            break;
             case "newtime":
            $shop = DB::table('shop as s')
                ->join('shop_comment as sc','s.s_id','=','sc.s_id')
                ->where('s.st_id',$id)
                ->orderBy('uptime', 'desc')
                ->paginate(2);
            break;

        }
        //商品库存
        $shopsales = DB::table('shop')
                ->where('st_id',$id)
               ->value('Sales');
        //类别名查询
        $titletype=DB::table('shop_type')
                ->where('st_id',$id)
                ->value('stname');

      //获取所有的请求参数
         $all = $request->all();
        //解析模板
        return view('home.list',['title'=>$title,'id'=>$id,'shopsales'=>$shopsales,'titletype'=>$titletype,'shop'=>$shop ,'all'=>$all]);

    }
    
}
