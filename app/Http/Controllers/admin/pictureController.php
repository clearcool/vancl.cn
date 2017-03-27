<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class pictureController extends Controller
{

	//图片列表
    public function getPictureList(Request $request)
    {
        return view('admin.picture.picture-list');
    }

    //新增图片
    public function getPictureAdd(Request $request)
    {
        return view('admin.picture.picture-add');
    }

}