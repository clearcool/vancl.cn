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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span
            class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r"
                                                  style="line-height:1.6em;margin-top:3px"
                                                  href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <center>
        <form action="/admin/member/memberlist" method="get">
            <input type="text" class="input-text" style="width:250px" placeholder="输入会员用户名" id="" name="value">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户
            </button>
            <input type="hidden" name="_token" value="">
        </form>
    </center>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l">
        </span> <span class="r">共有数据：<strong></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="">店铺名</th>
                <th width="">店主名</th>
                <th width="">店主详情</th>
                <th width="">店铺状态</th>
                <th width="">类别</th>
                <th width="">开店时间</th>
                <th width="">信誉度</th>
                <th width="">总销售额</th>
                <th width="">店铺等级</th>
                <th width="">操作</th>
            </tr>
            </thead>
            @foreach($shops as $k => $v)
                <tbody>
                <tr class="text-c">
                    <td>{{$v->shopname}}</td>
                    <td>{{$v->name}}</td>
                    <td><a title="店主详情" href="javascript:;" onclick="shop_detail('店长个人详情','/admin/member/shopsdetails?ss_id={{$v->ss_id}}','800','500')" class="ml-5" style="text-decoration:none; color:blue;>
                            <i class="Hui-iconfont">店主详情</i>
                        </a>
                    </td>
                    <td>{{$v->shopcondition == 0 ? '正常营业' : ($v->shopcondition  == 1 ? '待审核' : '封店')}}</td>
                    <td>{{$v->stname}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->shoptime)}}</td>
                    <td>{{$v->shopcredit}}</td>
                    <td>{{$v->sales}}</td>
                    <td>{{$v->grade}}</td>
                    <td class="td-manage">
                        <a title="修改" href="javascript:;" onclick="admin_edit('修改店铺信息','/admin/member/shopedit?u_id={{$shops[0]->u_id}}','500','800')" class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6df;</i>
                        </a>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
        <center>
            {{--{!! $users->render() !!}--}}
        </center>
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

/*
 参数解释：
 title	标题
 url		请求的url
 id		需要操作的数据id
 w		弹出层宽度（缺省调默认值）
 h		弹出层高度（缺省调默认值）
 */
    /*用户-删除*/
    function member_del(obj, id) {
            $.ajax({
                type: 'get',
                url: '/admin/member/delete',
                data: { id : id},
                dataType: 'json',
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

/*查看修改店主详情*/
function shop_detail(title,url,w,h){
    layer_show(title,url,w,h);
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
</script>
</body>
</html>