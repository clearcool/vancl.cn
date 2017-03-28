<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  //判断是
    public function getValidate()
    {
        return view('admin.index');
    }
}
