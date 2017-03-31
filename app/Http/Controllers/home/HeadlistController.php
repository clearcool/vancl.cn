<?php

namespace App\Http\Controllers\home;
use DB;
use Illuminate\Http\Request;
use Cache;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HeadlistController extends Controller
{
    
    public function Index()
    {

        return view('home.headlist');
    }

    
}
