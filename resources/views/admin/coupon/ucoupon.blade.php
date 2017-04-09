@extends('admin.layout._meta')
<title>用户优惠劵列表</title>
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
</style>
</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 优惠劵管理
        <span class="c-gray en">&gt;</span> 用户优惠劵列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
    <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
        </span> <span class="r">
            共有数据：<strong>{{$count}}</strong> 条
        </span>
    </div>
    <div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
        <tr class="text-c">
				<th width="">ID</th>
				<th width="">优惠劵类型</th>
				<th width="">用户</th>
				<th width="">领取时间--过期时间</th>
				<th width="">是否已使用</th>
                <th width="">优惠劵编号</th>
               
			</tr>
		</thead>
		<tbody> 
        @foreach($ucoupon as $k=>$v)
			<tr class="text-c">
				<td>{{$v->id}}</td>
				<td>{{$v->denomination}}</td>
				<td>{{$v->username}}</td>
				<td>{{date('Y-m-d H:i:s',$v->starttime)}}---{{date('Y-m-d H:i:s',$v->endtime)}}</td>
                <td class="td-status">{{$v->s=='1'?'未使用':'已使用'}}</td>
              <td class="td-status">{{$v->number}}</td>
			</tr>
        @endforeach
		
        </tbody>

    </table>

<center></center>
</div>

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
			    if(data == 0) {
                    $(obj).parents("tr").remove();
                    layer.msg('删除成功!', {icon: 1, time: 1000});
                }else if(data == 1){
                    layer.msg('删除失败!', {icon: 1, time: 1000});
                }

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
            if(data==0){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                $(obj).parents("tr").find(".td-status").html("已停用");
                $(obj).remove();
                layer.msg('已停用!', {icon: 5, time: 1000});
            }else if(data==1){
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

            if(data==0){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html("已启用");
                $(obj).remove();
                layer.msg('已启用!', {icon: 6, time: 1000});
            }else if(data==1){
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