@extends('admin.layout._meta')
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 管理员管理
        <span class="c-gray en">&gt;</span> 管理员列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:-5px" href="javascript:location.replace(location.href);" title="刷新" >
    <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>
<div class="page-container">
        <form action="/admin/admin/adminlist" method="get">
            <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="keyword" value="">
            <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜登录名</button>
            </div>
        </form>
    </div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l" style="display: {{session('admin')->auth==0 ? 'block' : 'none'}};">
            <a href="javascript:;" onclick="admin_add('添加管理员','/admin/admin/adminadd','800','500')" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加管理员
            </a>
        </span> <span class="r">
            共有数据：<strong>{{ $admin }}</strong> 条
        </span>
    </div>

	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">性别</th>
				<th width="150">手机</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">状态</th>
                @if(session('admin')->auth == 0)
				<th width="100">操作</th>
                @else
                @endif
			</tr>
		</thead>
		<tbody>
		@foreach ($admins as $k=>$v)
			<tr class="text-c">
				<td>{{$v->id}}</td>
				<td>{{$v->username}}</td>
				<td>{{$v->sex == 1? '男' : '女'}}</td>
				<td>{{$v->phone}}</td>
				<td>{{$v->auth == 0 ? '超级管理员' : '管理员'}}</td>
				<td>{{date('Y-m-d H:i:s',$v->jointime)}}</td>
                <td class="td-status">{{$v->status == 0 ? '已启用' : '已停用'}}</td>
                @if(session('admin')->auth == 0)
                <td class="td-manage">
                    @if($v->auth == 0)
                        <a style="text-decoration:none" onClick="admin_stop(this,{{ $v->id }})" href="javascript:;" title="停用">
                            <i class="Hui-iconfont">{{$v->auth == 0 ? '' : '&#xe631;'}}</i></a>
                    @else
                        <a style="text-decoration:none" onClick="admin_start(this,{{ $v->id }})" href="javascript:;" title="启用">
                            <i class="Hui-iconfont">{{$v->auth == 0 ? '' : '&#xe6e1;'}}</i></a>
                    @endif
                    <a title="修改" href="javascript:;" onclick="admin_edit('修改管理员','/admin/admin/adminupdate?id={{$v->id}}','500','800')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">{{$v->auth == 0 ? '' : '&#xe6df;'}}</i>
					</a>
					<a title="删除" href="javascript:;" onclick="admin_del(this,{{$v->id}})" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">{{$v->auth == 0 ? '' : '&#xe6e2;'}}</i>
					</a>
                    <span style="display: {{$v->auth == 0 ? 'black' : 'none'}};">无操作权限</span>
				</td>
                @else
                @endif
			</tr>
		@endforeach
		</tbody>
    </table>
</div>
{{--分页--}}
<div style="float:right;margin-right: 50px;">{!! $admins->appends($all)->render() !!}</div>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admincss/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admincss/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
		$.ajax({
			type: 'get',
			url: '/admin/admin/del',
            data:{id:id},
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('删除成功!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
            async:true
		});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);

}


/*管理员-停用*/
function admin_stop(obj,id){

    $.ajax({
        type: 'get',
        url: '/admin/admin/ting',
        data:{id:id},
        success: function(data){
            if(data==1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                $(obj).parents("tr").find(".td-status").html("已停用");
                $(obj).remove();
                layer.msg('已停用!', {icon: 5, time: 1000});
            }else{
                layer.msg('停用失败!',{icon: 5,time:1000});
            }
        },
        error:function(data) {
            console.log(data.msg);
        },
        async:true
    });
}

/*管理员-启用*/
function admin_start(obj,id){
    $.ajax({
        type: 'get',
        url: '/admin/admin/kai',
        data:{id:id},
        success: function(data){

            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html("已启用");
                $(obj).remove();
                layer.msg('已启用!', {icon: 6, time: 1000});
            }else{
                layer.msg('启用失败!', {icon: 6,time:1000});
            }
        },
        error:function(data) {
            console.log(data.msg);
        },
        async:true
    });
}

</script>

</body>
</html>