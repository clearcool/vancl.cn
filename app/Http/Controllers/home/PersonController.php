<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function getIndex()
    {
        return view('home.person.personaldata');
    }

    public function getInformation()
    {
        return view('home.person.information');
    }
    public function getSafety()
    {
        return view('home.person.safety');
    }

    public function getAddress()
    {
        return view('home.person.address');
    }

    public function getOrder()
    {
        return view('home.person.order');
    }

    public function getChange()
    {
        return view('home.person.change');
    }

    public function getCoupon()
    {
        return view('home.person.coupon');
    }

    public function getBonus()
    {
        return view('home.person.bonus');
    }

    public function getBill()
    {
        return view('home.person.bill');
    }

    public function getCollection()
    {
        return view('home.person.collection');
    }

    public function getFoot()
    {
        return view('home.person.foot');
    }

    public function getComment()
    {
        return view('home.person.comment');
    }

    public function getNews()
    {
        return view('home.person.news');
    }

}
