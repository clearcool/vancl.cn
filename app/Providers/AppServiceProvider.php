<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 分享数据
     *
     * @return void
     */
    public function boot()
    {
        //首页列表信息
        $goods = DB::table('shop_type')->where('p_id', '0')->get();
        foreach ($goods as $k => $v)
        {
            $goodss = DB::table('shop_type')->where('p_id', $v->st_id)->get();
            $title[$v->stname] = [];
            for ($i = 0; $i < count($goodss); $i++)
            {
                array_push($title[$v->stname], $goodss[$i]);
            }
        }

        //首页新款
        $newshop=DB::table('shop as s')
            ->join('user_shop as us','s.us_id','=','us.us_id')
            ->orderBy('uptime', 'desc')
            ->take(10)
            ->get();
        //首页热卖精品
        $bestshop =DB::table('shop as s')
            ->join('user_shop as us','s.us_id','=','us.us_id')
            ->orderBy('s.Sales', 'desc')
            ->take(10)
            ->get();
        //网站配置
        $config=DB::table('config')
            ->first();
        view()->share('title',$title);
        view()->share('bestshop',$bestshop);
        view()->share('newshop',$newshop);
        view()->share('config',$config);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
