<?php

namespace App\Http\Controllers\home;
use DB;
use Illuminate\Http\Request;
use Cache;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HeadlistController extends Controller
{
    
    public function getIndex()
    {
        //用户列表页
        $title=Cache::get('title');

        return view('home.headlist',['title'=>$title]);
    }

    
}
