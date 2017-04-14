@extends('admin.layout._meta')
<title>商铺优惠劵列表</title>
<style type="text/css">
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 10px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        z-index: 2;
        color: #23527c;
        background-color: #eee;
        border-color: #ddd;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    .pagination-lg > li > a,
    .pagination-lg > li > span {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.3333333;
    }
    .pagination-lg > li:first-child > a,
    .pagination-lg > li:first-child > span {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }
    .pagination-lg > li:last-child > a,
    .pagination-lg > li:last-child > span {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .pagination-sm > li > a,
    .pagination-sm > li > span {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
    }
    .pagination-sm > li:first-child > a,
    .pagination-sm > li:first-child > span {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    .pagination-sm > li:last-child > a,
    .pagination-sm > li:last-child > span {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
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
</style>
</head>
<body>
<nav class="breadcrumb">
<div id="tishi"></div>
    <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 优惠劵管理
        <span class="c-gray en">&gt;</span> 商铺优惠劵列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
    <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l" style="display: {{session('admin')->auth==0 ? 'block' : 'none'}};">
            <a href="/admin/coupon/add"  class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加优惠劵
            </a>
        </span> <span class="r">
            共有数据：<strong>{{$count}}</strong> 条
        </span>
    </div>
    <div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
        <tr class="text-c">
				<th width="">ID</th>
				<th width="">金额</th>
				<th width="">最低消费</th>
				<th width="">有效期</th>
				<th width="">张数</th>
				<th width="">操作</th>
               
			</tr>
		</thead>
		<tbody> 
        @foreach($coupon as $k=>$v)
			<tr class="text-c">
				<td>{{$v->c_id}}</td>
				<td>{{$v->denomination}}元</td>
				<td>{{$v->min_price}}元</td>
				<td>{{$v->effective/86400}}日</td>
			
                <td class="td-status">{{$v->sheets}}张</td>
              
                <td class="td-manage">
					<a title="删除" id="{{$v->c_id}}" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">删除</i>
					</a>
				</td>
               
			</tr>
		@endforeach
        </tbody>

    </table>
{{--分页--}}
<center></center>
</div>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->
<script src="/admincss/login/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$('.ml-5').click(function(){  
  var id=$(this).attr('id');
  var a = $(this);
    $.get('/admin/coupon/delcoupon',{id:id},function(data){
        switch(data){
          case "0":
          $('#tishi').addClass('alert-danger').html('用户已领取').show().fadeOut(3000);
          break;
          case "1":
          $('#tishi').addClass('alert-danger').html('删除失败').show().fadeOut(3000);
          break;
          case "2":
          $('#tishi').addClass('alert-success').html('删除成功').show().fadeOut(3000);
          a.parents('tr').remove();
          break;
        }
    });
    return false;
      });
</script>
</body>
</html>