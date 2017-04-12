@extends('admin.layout._meta')
<title>商品列表管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    产品管理
    <span class="c-gray en">&gt;</span>
    商品列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <form method="get" action="{{url('/admin/feedback/comment')}}">
        <div class="text-c">
            <input type="text" name="keyword" placeholder="商品名称" style="width:250px" class="input-text">
            <button name="" href="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
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
                <th width="60">评论详情</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $k=>$v)
                <tr class="text-c va-m">
                    <td>{{$v->s_id}}</td>
                    <td><img width="60" class="product-thumb" src="{{$v->picurl}}"></td>
                    <td class="text-l">{{$v->shopname}}</td>
                    <td class="text-l">{{$v->st_id}}</td>
                    <td class="text-l">{{$v->describe}}</td>
                    <td><span class="price"></span> {{$v->price}}元/件</td>
                    <td><span class="price"></span> {{$v->Sales}}件</td>
                    <td><span class="price"></span>{{$v->praise}}</td>
                    <td class="td-manage">
                        <a href="/admin/feedback/commentdetails?s_id={{$v->s_id}}" style="text-align:center;" title="评论详情">评论详情
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--分页--}}
    <div style="float: right;">{!! $shops->appends($all)->render() !!}</div>
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
</body>
</html>