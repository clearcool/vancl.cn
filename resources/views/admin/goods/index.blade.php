@extends('admin.layout._meta')
<title>商品详情管理</title>
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
	<div class="text-c">
		<input type="text" name="" id="" placeholder="名称、id" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a class="btn btn-primary radius" href="/admin/goods/add?id={{$shop->s_id}}"><i class="Hui-iconfont">&#xe600;</i> 添加商品详情</a>
			<a class="btn btn-primary radius" href="/admin/shop/index">返回</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="40">ID</th>
					<th width="60">缩略图</th>
					<th width="60">商品名称</th>
					<th width="60">尺寸</th>
					<th width="60">颜色</th>
					<th width="100">描述</th>
					<th width="60">库存</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($goods as $k=>$v)
				<tr class="text-c va-m">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$v->sd_id}}</td>
					<td><img width="60" class="product-thumb" src="{{$v->goodsurl}}"></td>
					<td class="text-l">{{$v->shopname}}</td>
					<td class="text-l">{{$v->size}}</td>
					<td class="text-l">{{$v->color}}</td>
					<td class="text-l">{{$v->shop_describe}}</td>
					<td><span class="price">{{$v->stock}}</span> 件</td>
					<td class="td-manage">
						<a style="text-decoration:none" class="ml-5" href="/admin/goods/edit?id={{$v->sd_id}}" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i>
						</a>
						<a style="text-decoration:none" class="ml-5" href="/admin/goods/del?id={{$v->sd_id}}&sid={{$v->s_id}}" title="删除">
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