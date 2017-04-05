<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function getIndex()
    {
        return view('home.personaldata');
    }

    public function getInformation()
    {
        return view('home.information');
    }
    public function getSafety()
    {
        return view('home.safety');
    }

    public function getAddress()
    {
        return view('home.address');
    }

    public function getOrder()
    {
        return view('home.order');
    }

    public function getChange()
    {
        return view('home.change');
    }

    public function getCoupon()
    {
        return view('home.coupon');
    }

    public function getBonus()
    {
        return view('home.bonus');
    }

    public function getBill()
    {
        return view('home.bill');
    }

    public function getCollection()
    {
        return view('home.collection');
    }

    public function getFoot()
    {
        return view('home.foot');
    }

    public function getComment()
    {
        return view('home.comment');
    }

    public function getNews()
    {
        return view('home.news');
    }

}
