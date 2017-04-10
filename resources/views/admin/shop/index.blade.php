@extends('admin.layout._meta')
<title>商品列表管理</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	产品管理
	<span class="c-gray en">&gt;</span>
	商品列表管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!--错误的提示信息-->
@if(Session::has('error'))
	<div id="q" class="alert alert-danger"> {{Session::get('error')}} 
	</div> 
@endif
<!--成功的提示信息-->
@if(Session::has('success'))
	<div id="q" class="alert alert-info"> {{Session::get('success')}} 
	</div> 
@endif
<div id="successMessage" class="alert alert-success alert-dismissable" style="display:none">
</div>
<div class="page-container">
	<form method="get" action="{{url('/admin/shop/index')}}">
	<div class="text-c">
		<input type="text" name="shopname" placeholder="名称" style="width:250px" class="input-text">
		<button name="" href="{{url('/admin/shop/index')}}" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a class="btn btn-primary radius" href="/admin/shop/index">查看全部商品</a>
		<a class="btn btn-primary radius" href="/admin/shop/add"><i class="Hui-iconfont">&#xe600;</i> 添加商品</a>
		</span>
		<span class="r">共有数据：<strong>{{$num}}</strong> 条</span>
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
					<th width="60">好评数</th>
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
					<td><span class="price">{{$v->praise}}</span></td>
					<td><span class="label label-success radius">{{(($v->isboutique) == 1)?'精品':'非精品'}}</span></td>
					<td class="td-status"><span class="label label-success radius">{{(($v->state) == 0)?'未上架':'上架'}}</span></td>
					<td class="td-manage">
						<a style="text-decoration:none" href="/admin/shop/state?id={{$v->s_id}}" title="状态">
							<i class="Hui-iconfont">&#xe6de;</i>
						</a>
						<a title="详情" href="/admin/goods/index?s_id={{$v->s_id}}" class="ml-5" style="text-decoration:none">
							<i class="Hui-iconfont">&#xe665;</i>
						</a>
						<a style="text-decoration:none" class="ml-5" href="/admin/shop/edit?id={{$v->s_id}}" title="编辑">
							<i class="Hui-iconfont">&#xe6df;</i>
						</a>
						<a style="text-decoration:none" class="del ml-5" href="" sid="{{$v->s_id}}" title="删除">
							<i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	{!! $shops->appends($all)->render() !!}
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	setTimeout(function(){
        $('#q').hide();
  	},2000);

//删除商品
$('.del').click(function(){
	//获取id
    var id = $(this).attr('sid');
    var links = $(this);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    //发送ajax
    $.post('/admin/shop/del',{id:id},function(data){
        if(data == 1){
          //获取提醒信息
          $('#successMessage').text('删除成功').show(1000);
          setTimeout(function(){
            $('#successMessage').hide(1000);
          },2000);
          links.parents('tr').remove();
        }else{
        	$('#successMessage').text('删除失败，该商品有详情').show(1000);
          setTimeout(function(){
            $('#successMessage').hide(1000);
          },2000);
        }
    });
	return false;
});



</script>
</body>
</html>