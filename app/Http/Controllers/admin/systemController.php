<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;







class systemController extends Controller
{

	//基本设置
    public function getSystembase()
    {
        $config = DB::table('config')->get();

        dd($config);
        return view('admin.system.system-base');
    }

}