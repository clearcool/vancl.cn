<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> @yield('title')</title>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="/bootstrap/css/style.css" />
<div class="navbar navbar-default" role="navigation">
    <div class="container" style="float: left;">
        <a class="navbar-brand user-control" href="#">凡客商家后台管理系统</a>
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
                    <li><a href="goods-add.html">添加商品</a></li>
                    <li><a href="goods-list.html">商品列表</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">商品分类</li>
                    <li><a href="goods-addfenlei.html">添加分类</a></li>
                    <li><a href="goods-listfenlei.html">分类列表</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">商品品牌</li>
                    <li><a href="goods-addpinpai.html">添加品牌</a></li>
                    <li><a href="goods-listpinpai.html">品牌列表</a></li>
                </ul>
            </li>
            <div class="btn-group navbar-right" style="float: right; position: absolute;margin-left:850px;">
                <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>李朝辉 <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="/" target="_blank">网站首页</a></li>
                    <li><a href="#">清除缓存</a></li>
                    <li><a href="#">随机销量</a></li>
                    <li><a href="#" target="_blank">自动收货</a></li>
                    <li class="divider"></li>
                    <li><a href="#">安全退出</a></li>
                </ul>
            </div>
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

