@extends('admin.layout._meta')
<title>商品列表管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	产品管理
	<span class="c-gray en">&gt;</span>
	商品列表管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form method="get" action="{{url('/admin/shop/search')}}">
	<div class="text-c">
		<input type="text" name="shopname" placeholder="名称" style="width:250px" class="input-text">
		<button name="" href="{{url('/admin/shop/index')}}" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a class="btn btn-primary radius" href="/admin/shop/add"><i class="Hui-iconfont">&#xe600;</i> 添加商品</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="60">缩略图</th>
					<th width="100">商品名称</th>
					<th width="100">商品类别</th>
					<th width="100">商品描述</th>
					<th width="60">单价</th>
					<th width="60">销量</th>
					<th width="60">是否精品</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($shops as $k=>$v)
				<tr class="text-c va-m">
					<td>{{$v->s_id}}</td>
					<td><img width="60" class="product-thumb" src="{{$v->picurl}}"></td>
					<td class="text-l">{{$v->shopname}}</td>
					<td class="text-l">{{$v->stname}}</td>
					<td class="text-l">{{$v->describe}}</td>
					<td><span class="price">{{$v->price}}</span> 元/件</td>
					<td><span class="price">{{$v->Sales}}</span> 件</td>
					<td><span class="label label-success radius">{{(($v->isboutique) == 1)?'精品':'非精品'}}</span></td>
					<td class="td-status"><span class="label label-success radius">{{$v->state}}</span></td>
					<td class="td-manage">
						<a style="text-decoration:none" onClick="product_stop(this,'10001')" href="javascript:;" title="下架">
							<i class="Hui-iconfont">&#xe6de;</i>
						</a>
						<a title="详情" href="/admin/goods/index?id={{$v->s_id}}" class="ml-5" style="text-decoration:none">
							<i class="Hui-iconfont">&#xe665;</i>
						</a>
						<a style="text-decoration:none" class="ml-5" href="/admin/shop/edit?id={{$v->s_id}}" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i>
						</a>
						<a style="text-decoration:none" class="ml-5" href="/admin/shop/del?id={{$v->s_id}}" title="删除">
							<i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

</script>
</body>
</html>