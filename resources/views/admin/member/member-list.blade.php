@extends('admin.layout._meta')
<meta name="_token" content="{{ csrf_token() }}"/>
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span
            class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r"
                                                  style="line-height:1.6em;margin-top:3px"
                                                  href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin"
               class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax"
               class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户
        </button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l">
        </span> <span class="r">共有数据：<strong>88</strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="80">ID</th>
                <th width="100">用户名</th>
                <th width="40">性别</th>
                <th width="90">手机</th>
                <th width="150">邮箱</th>
                <th width="">地址</th>
                <th width="130">加入时间</th>
                <th width="70">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            @foreach($users as $k => $v)
                <tbody>
                <tr class="text-c">
                    <td>{{$v->u_id}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->sex == 1 ? '男' : '女'}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->email}}</td>
                    <td class="text-l">{{$v->address}}</td>
                    <td>{{$v->created_at}}</td>
                    <td class="td-status"><span class="label {{ $v->status == 0 ? 'label-success radius' : 'label-defaunt danger' }}">{{$v->status == 0 ? '已启用' : '已停用'}}</span></td>
                    <td class="td-manage">
                        @if($v->status == 0)
                            <a style="text-decoration:none" onClick="member_stop(this,{{ $v->u_id }})" href="javascript:;" title="停用">
                                <i class="Hui-iconfont">&#xe631;</i></a>
                        @else
                            <a style="text-decoration:none" onClick="member_start(this,{{ $v->u_id }})" href="javascript:;" title="启用">
                                <i class="Hui-iconfont">&#xe6e1;</i></a>
                        @endif
                        <a title="删除" href="javascript:;" onclick="member_del(this, {{ $v->u_id }})" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>

    </div>
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
    /*用户-停用*/
    function member_stop(obj, id) {
        console.log(id);
            $.ajax({
                type: 'POST',
                url: '/admin/member/memberstop',
                data: { id : id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    if (data == 0) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
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

    /*用户-启用*/
    function member_start(obj, id) {
        console.log(id);
            $.ajax({
                type: 'POST',
                url: '/admin/member/memberstart',
                data: { id : id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    if (data == 0) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
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

    /*用户-删除*/
    function member_del(obj, id) {
        console.log(id);
            $.ajax({
                type: 'POST',
                url: '/admin/member/memberdel',
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