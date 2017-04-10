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
        //登录信息
        if(session('home'))
        {
            $u=session('home');
        }else{
            $u=null;
        }
        view()->share('title',$title,'user',$u);

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
