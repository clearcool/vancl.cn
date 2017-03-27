<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class chartsController extends Controller
{

    //折线图
    public function getCharts1(Request $request)
    {
        return view('admin.charts.charts-1');
    }

    //时间轴折线图
    public function getCharts2(Request $request)
    {
        return view('admin.charts.charts-2');
    }

    //区域图
    public function getCharts3(Request $request)
    {
        return view('admin.charts.charts-3');
    }

    //柱状图
    public function getCharts4(Request $request)
    {
        return view('admin.charts.charts-4');
    }

    //饼状图
    public function getCharts5(Request $request)
    {
        return view('admin.charts.charts-5');
    }

    //3D柱状图
    public function getCharts6(Request $request)
    {
        return view('admin.charts.charts-6');
    }

    //3D饼状图
    public function getCharts7(Request $request)
    {
        return view('admin.charts.charts-7');
    }

}