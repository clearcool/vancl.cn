@extends('admin.layout._meta')
<meta name="_token" content="{{ csrf_token() }}"/>
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
<title>友情链接</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span
			class="c-gray en">&gt;</span> 友情链接 <a class="btn btn-success radius r"
												  style="line-height:1.6em;margin-top:3px"
												  href="javascript:location.replace(location.href);" title="刷新"><i
				class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<center>
		<form action="/admin/system/systemlink" method="get">
			<input type="text" class="input-text" style="width:250px" placeholder="输入链接名" id="" name="value">
			<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜链接
			</button>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</center>
</div>
<div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l">
		<a href="javascript:;" onclick="link_add('添加链接','/admin/system/systemlinkadda','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加链接</a></span>
        </span> <span class="r">共有链接：<strong></strong>{{ $number }} 条</span>
</div>
<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
		<tr class="text-c">
			<th width="">id</th>
			<th width="">链接名</th>
			<th width="">链接地址</th>
			<th width="">网站关键字</th>
			<th width="">排序</th>
			<th width="">状态</th>
			<th width="">操作</th>
		</tr>
		</thead>
		@foreach($links as $k => $v)
			<tbody>
			<tr class="text-c">
				<td>{{ $v->f_id }}</td>
				<td>{{ $v->linkname }}</td>
				<td>{{ $v->linkpath }}</td>
				<td>{{ $v->content }}</td>
				<td class="text-l">{{ $v->order }}</td>
				<td class="td-status"><span class="label {{ $v->status == 0 ? 'label-success radius' : 'label-defaunt danger' }}">{{$v->status == 0 ? '已启用' : '已停用'}}</span></td>
				<td class="td-manage">
					@if($v->status == 0)
						<a style="text-decoration:none" onClick="system_stop(this,{{ $v->f_id }})" href="javascript:;" title="停用">
							<i class="Hui-iconfont">&#xe631;</i></a>
					@else
						<a style="text-decoration:none" onClick="system_start(this,{{ $v->f_id }})" href="javascript:;" title="启用">
							<i class="Hui-iconfont">&#xe6e1;</i></a>
					@endif
					<a title="删除" href="javascript:;" onclick="system_del(this, {{ $v->f_id }})" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr>
			</tbody>
		@endforeach
	</table>
	<center>
		{!! $links->render() !!}
	</center>
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admincss/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admincss/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function () {
        $('.table-sort').dataTable({
            "aaSorting": [[1, "desc"]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable": false, "aTargets": [0, 8, 9]}// 制定列不参与排序
            ]
        });

    });

    /*link-添加*/
    function link_add(title,url,w,h){
        layer_show(title,url,w,h);
    }

	/*link-停用*/
    function system_stop(obj, id) {
        $.ajax({
            type: 'POST',
            url: '/admin/system/systemstop',
            data: { id : id},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                if (data == 0) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="system_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt danger">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!', {icon: 5, time: 1000});
                } else if (data == 1){
                    layer.msg('停用失败!', {icon: 5, time: 1000});
                }
            },
            error: function (data) {
                console.log(data.msg);
            },
        });
    }

	/*link-启用*/
    function system_start(obj, id) {
        $.ajax({
            type: 'POST',
            url: '/admin/system/systemstart',
            data: { id : id},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                if (data == 0) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="system_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!', {icon: 6, time: 1000});
                } else if (data == 1) {
                    layer.msg('启用失败!', {icon: 6, time: 1000});
                }
            },
            error: function (data) {
                console.log(data.msg);
            },
        });
    }

	/*link-删除*/
    function system_del(obj, id) {
        $.ajax({
            type: 'POST',
            url: '/admin/system/systemdel',
            data: { id : id},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            },
            success: function (data) {
                if (data == 1) {
                    layer.msg('已删除!', {icon: 6, time:1000});
                    $(obj).parents('tr').remove();
                } else {
                    layer.msg('删除失败', {icon: 6, time:1000});
                }
            },
            async: true,
        });
    }
</script>
</body>
</html>