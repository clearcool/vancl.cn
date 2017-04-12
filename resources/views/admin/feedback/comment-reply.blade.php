<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/admincss/favicon.ico" >
    <link rel="Shortcut Icon" href="/admincss/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admincss/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admincss/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admincss/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admincss/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admincss/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admincss/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admincss/static/h-ui.admin/css/style.css" />

    <!-- Bootstrap -->
    <!--<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">

    <!--<script src="/bootstrap/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="/admincss/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">

    <!--[if IE 6]>
    <script type="text/javascript" src="/admincss/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script type="text/javascript" src="/admincss/lib/jquery/1.9.1/jquery.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
<title>商品评论列表</title>
</head>
<body>
    {{--错误的提示信息要放到相应位置--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger two" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 47px; background: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--成功提示信息--}}
    @if(session('success'))
        <div class="alert alert-success two" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 47px; background: green;">
            {{ session('success') }}
        </div>
    @endif


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en" onclick="">&gt;</span>
    <span onclick="history.go(-1);">商品管理</span>
    <span class="c-gray en">&gt;</span>
    商品评论
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
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
            </tr>
            </thead>
            <tbody>
                <tr class="text-c va-m">
                    <td>{{$shop->s_id}}</td>
                    <td><img width="60" class="product-thumb" style="width:100px;height:100px;" src="{{$shop->picurl}}"></td>
                    <td class="text-l">{{$shop->shopname}}</td>
                    <td class="text-l">{{$shop->stname}}</td>
                    <td class="text-l">{{$shop->describe}}</td>
                    <td><span class="price"></span>{{$shop->price}} 元/件</td>
                    <td><span class="price"></span>{{$shop->Sales}}件</td>
                    <td><span class="price"></span>{{$shop->praise}}</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <tr class="text-c">
                <th>评论ID</th>
                <th>用户名</th>
                <th>头像</th>
                <th>电话</th>
                <th>评论</th>
                <th>回复评论</th>
            </tr>
            @foreach($detail as $k=>$v)
                <tr>
                    <td>{{$v->cm_id}}</td>
                    <td>{{$v->username}}</td>
                    <td><img style="width:50px;height:50px;" src="{{$v->pic}}"/></td>
                    <td>{{$v->userphone}}</td>
                    <td>{{$v->content}}<br/>
                        @if($v->commenttime != '')
                        评论时间:{{date('Y-m-d H:i:s',$v->commenttime)}}
                        @else
                        @endif
                    </td>
                    <td>{{$v->backcomment}}<br/>
                        @if($v->commenttime != '')
                            <a class="one" cm_id="{{$v->cm_id}}" style="float: right; color:blue;"  data-toggle="modal" data-target="#myModal">编辑</a>
                        @else
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <form action="/admin/feedback/review" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">回复评论</h4>
                    </div>
                    <div class="modal-body">
                        {{--防止跨站攻击--}}
                        {{ csrf_field() }}
                        回复买家:
                        <textarea name="backcomment" cols="90" rows="10"></textarea>
                        <input type="hidden" name="cm_id" value="" class="cm_id"/>
                    </div>
                    <script src="/admincss/login/js/jquery-1.8.3.min.js"></script>
                    <script>
                        $(".one").click(function(){
                            var cm_id = $(this).attr('cm_id');
                            $(".cm_id").val(cm_id);
                        });

                        //定时隐藏提示信息
                        setTimeout(function(){
                            $(".two").hide();
                        },2000);

                    </script>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default sub">确认</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    {{--分页--}}
    {{--<div style="float: right;">{!! $detail->render() !!}</div>--}}
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
</body>
</html>

