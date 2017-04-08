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
Route::controller('/home', 'home\HomeController');

//个人中心
Route::group(['middleware' => 'person'], function () {
    Route::controller('/person', 'home\PersonController');
});

//后台登录路由
Route::get('/admin', function () {
    return view('admin.login');
});

//后台中间件
Route::group(['middleware' => 'login'], function () {

    //桌面路由
    Route::get('/admin/welcome', function () {
        return view('admin.welcome');
    });

    //商品类别管理
    Route::controller('/admin/product','admin\ProductController');

    //商品列表管理路由
    Route::controller('/admin/shop','admin\ShopController');

    //商品详情管理路由
    Route::controller('/admin/goods','admin\GoodsController');

    //评论管理
    Route::controller('/admin/feedback', 'admin\feedbackController');

    //会员管理
    Route::controller('/admin/member', 'admin\MemberController');

    //管理员管理
    Route::controller('/admin/admin', 'admin\AdminController');

    //系统管理
    Route::controller('/admin/system', 'admin\systemController');

});


//后台登录判断
Route::controller('/admin', 'admin\LoginController');









