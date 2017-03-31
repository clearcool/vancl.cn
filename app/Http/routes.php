<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//前台主页路由
Route::get('/', 'home\HomeController@index');

//前台
Route::controller('/home','home\HomeController');


//后台登录路由
Route::get('/admin',function(){
    return view('admin.login');
});

//临时后台登录路由
Route::get('/admin/index',function(){
    return view('admin.index');
});


//后台中间件
Route::group(['middleware' => 'login'], function ()
{

    //资讯管理
    Route::controller('/admin/article','admin\articleController');


    //图片管理
    Route::controller('/admin/picture','admin\pictureController');


    //类别管理
    Route::controller('/admin/product','admin\ProductController');


    //评论管理
    Route::controller('/admin/feedback','admin\feedbackController');


    //会员管理
    Route::controller('/admin/member','admin\memberController');


    //管理员管理
    Route::controller('/admin/admin','admin\AdminController');


    //系统统计
    Route::controller('/admin/charts','admin\chartsController');


    //系统管理
    Route::controller('/admin/system','admin\systemController');

});


//后台登录判断
Route::controller('/admin','admin\LoginController');









