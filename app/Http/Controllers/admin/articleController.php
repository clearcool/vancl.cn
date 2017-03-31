<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class articleController extends Controller
{

	//资讯管理
    public function getArticleList(Request $request)
    {
        return view('admin.article.article-list');
    }

    //添加资讯
    public function getArticleAdd(Request $request)
    {
        return view('admin.article.article-add');
    }

}