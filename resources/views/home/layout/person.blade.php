@extends('home.layout/index')
@section('style')
    <title>个人中心</title>
    <link href="/homecss/person/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/systyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/addstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/infstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/cpstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/orstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/newstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/cmstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/bostyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/colstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/blstyle.css" rel="stylesheet" type="text/css">
    <link href="/homecss/person/css/footstyle.css" rel="stylesheet" type="text/css">
    <script src="/homecss/person/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homecss/person/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
@endsection
@section('ej')
    @endsection
@section('lb')
    <!--头 -->
    <header>
        <article>
            <div class="mt-logo">
                <div class="clear"></div>
            </div>
        </article>
    </header>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                @section('nr')

                @show
            </div>
        </div>
        <aside class="menu">
            <ul>
                <li class="person">
                    <a href="/person/index">个人中心</a>
                </li>
                <li class="person">
                    <a href="#">个人资料</a>
                    <ul>
                        <li><a href="/person/information">个人信息</a></li>
                        <li><a href="/person/safety">安全设置</a></li>
                        <li><a href="/person/address">收货地址</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的交易</a>
                    <ul>
                        <li><a href="/person/order">订单管理</a></li>
                        <li><a href="/person/change">退款售后</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的资产</a>
                    <ul>
                        <li><a href="/person/coupon">优惠券 </a></li>
                        <li><a href="/person/bonus">红包</a></li>
                        <li><a href="/person/bill">账单明细</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li><a href="/person/collection">收藏</a></li>
                        <li><a href="/person/foot">足迹</a></li>
                        <li><a href="/person/comment">评价</a></li>
                        <li><a href="/person/news">消息</a></li>
                    </ul>
                </li>

            </ul>

        </aside>
    </div>
@endsection
