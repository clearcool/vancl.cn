@extends('home.layout/index')
@section('style')
    <title>个人中心</title>
    <meta name="_token" content="{{ csrf_token() }}"/>
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
    <script type="text/javascript" src="/admincss/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/admincss/lib/layer/2.4/skin/layer.css"></script>
    <script src="/homecss/person/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homecss/person/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
    <style>
    .c-limit,.c-time,.label,.txt{font-size:15px;}
   .range-item .txt{position: relative; left:45px;}
   .op-btns .btn .txt{position: relative;top:-5px;}
   .coupon-item-d{margin:20px;}
    #tishi{
    width:120px;
    height: 60px;
    line-height:60px;
    text-align:center;
    font-size:14px;
    border-radius:10px;
    position: fixed;
    top:50%;
    left:50%;
    z-index:99;
    display:none;
    font-family:"微软雅黑";
   }
   	#ding {
			width:100%;
			height:60px;
			background:#DD514C;
		}
		#ding a{
			color:white;
			font-size:22px;
			line-height:60px; 
			margin-left:10px;
			font-family:"微软雅黑";
			 text-decoration:none;
		}
    </style>
@endsection
@section('qwer')
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
	<div id="ding">
		<a href="/">我的凡客</a>
	</div>
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
                        
                        <li><a href="/person/bill">充值中心</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li><a href="/person/collection">收藏商品</a></li>
                        <li><a href="/person/collectionshop">收藏店铺</a></li>
                    </ul>
                </li>

            </ul>

        </aside>
    </div>
@endsection
@section('dd')
    @endsection
@section('dddh')
    @endsection
