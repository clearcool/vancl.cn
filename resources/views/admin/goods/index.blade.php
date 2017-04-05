@extends('admin.layout._meta')
<title>商品详情管理</title>
<style>
#a {
	width:54%;
}
#b {
	width:44%;
}
</style>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	产品管理
	<span class="c-gray en">&gt;</span>
	商品列表管理
	<span class="c-gray en">&gt;</span>
	{{$shop->shopname}}
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="page-container">
	<div class="l" id="a">
		<form role="form" action="{{url('/admin/goods/dels')}}" method="get" enctype="multipart/form-data">
			<input type="hidden" name="s_id" value="{{$shop->s_id}}">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a class="btn btn-primary radius" href="/admin/goods/add?id={{$shop->s_id}}"><i class="Hui-iconfont">&#xe600;</i> 添加商品详情</a>
				</span>
				<span class="r">
					<a class="btn btn-primary radius" href="/admin/shop/index">返回</a>
				</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="20">ID</th>
							<th width="300">缩略图</th>
							<th width="60">颜色</th>
							<th width="60">操作</th>
						</tr>
					</thead>
					<tbody>
					@foreach($goods as $k=>$v)
						<tr class="text-c va-m">
							<td>{{$v->sd_id}}</td>
							<td><img width="60" class="product-thumb" src="{{$v->goodsurl}}"></td>
							<td>{{$v->color}}</td>
							<td class="td-manage">
								<a style="text-decoration:none" class="ml-5" href="/admin/goods/sadd?id={{$v->sd_id}}" title="添加库存">
									<i class="Hui-iconfont">&#xe600;</i>
								</a>
								<a title="查看" href="/admin/goods/search?sd_id={{$v->sd_id}}&s_id={{$v->s_id}}" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe665;</i>
								</a>
								<a style="text-decoration:none" class="ml-5" href="/admin/goods/del?sd_id={{$v->sd_id}}&s_id={{$v->s_id}}" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</form>
	</div>
	<div class="r" id="b">
		<form role="form" action="{{url('/admin/goods/dels')}}" method="get" enctype="multipart/form-data">
			<input type="hidden" name="s_id" value="{{$shop->s_id}}">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<a class="btn btn-primary radius" href="/admin/goods/index?s_id={{$shop->s_id}}">查看全部库存</a>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="20">ID</th>
							<th width="60">颜色</th>
							<th width="60">尺码</th>
							<th width="60">库存</th>
							<th width="60">操作</th>
						</tr>
					</thead>
					<tbody>
					@foreach($stocks as $k=>$v)
						<tr class="text-c va-m">
							<td>{{$v->ss_id}}</td>
							<td>{{$v->color}}</td>
							<td>{{$v->size}}</td>
							<td>{{$v->stock}}</td>
							<td class="td-manage">
								<a style="text-decoration:none" class="ml-5" href="/admin/goods/edit?id={{$v->ss_id}}" title="修改库存">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
								<a style="text-decoration:none" class="ml-5" href="/admin/goods/sdel?ss_id={{$v->ss_id}}&s_id={{$v->s_id}}" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<!--请在下方写此页面业务相关的脚本-->

</body>
</html>