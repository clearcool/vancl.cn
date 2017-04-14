<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<title> @yield('title')</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/bootstrap/css/style.css" />
</head>
<body>
<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<a class="navbar-brand user-control" href="#">控制面板</a>
		<ul class="nav  nav-pills" role="tablist">
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">订单管理 <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="../list/list.html">订单列表</a></li>
					<li class="divider"></li>
					<li class="dropdown-header">待处理</li>
					<li><a href="../list/list-daifukuan.html">待付款订单</a></li>
					<li><a href="../list/list-daifahuo.html">待发货订单</a></li>
					<li><a href="../list/list-daituikuan.html">待退款订单</a></li>
					<li><a href="../list/list-daituihuan.html">待退换货订单</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">商品管理 <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="goods-add.html">添加商品</a></li>

					<li><a href="/shops/shopsadd">商品列表</a></li>
				</ul>
			</li>
			<div class="btn-group navbar-right">
				<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user"></span> 李朝辉 <span class="caret"></span>
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
</body>
</html>
