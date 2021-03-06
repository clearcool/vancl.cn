<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title> @yield('title')</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/bootstrap/css/style.css" />
</head>
<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <a class="navbar-brand user-control" href="/">首页</a>
        <ul class="nav  nav-pills" role="tablist">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">订单管理 <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/orders/list">已完成订单</a></li>
                    <li><a href="/orders/daifu">待付款订单</a></li>
                    <li><a href="/orders/daifa">待发货订单</a></li>
                    <li><a href="/orders/daishou">待收货订单</a></li>
                    <li><a href="/orders/daiping">待评价订单</a></li>
                    <li><a href="/orders/daitui">待退款订单</a></li>
                    <li><a href="/orders/tuiwan">退款完成订单</a></li>
                </ul>
            </li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">商品管理 <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/shops/shopsadd">商品列表</a></li>
                </ul>
            </li>
        </ul><!--end nav nav-pills-->
    </div><!--end container-->
</div><!--end navbar navbar-default navbar-fixed-top-->
@section('middle')

@show
<script src="/bootstrap/js01/jquery-1.8.3.min.js"></script>
<script src="/bootstrap/js01/bootstrap.min.js"></script>
<script src="/bootstrap/js01/tabPlay.js"></script>
<script src="/bootstrap/js01/details.js"></script>
<script src="/bootstrap/js01/select-addgoods.js"></script>
<script src="/bootstrap/js01/select.js"></script>
