<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admincss/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admincss/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admincss/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admincss/lib/Hui-iconfont/1.0.8/iconfont.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admincss/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<![endif]-->
<title>分类管理</title>
	<script src="/bootstrap/js/jquery-1.12.4.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<link href="/bootstrap/css/docs.min.css" rel="stylesheet">
	<style>
		body{overflow-x:hidden;}
		*{margin:0px;padding:0px;}
		h4
		{
			background:#DAD8D3;
		}
		 .alert-success{
			 position:absolute;
			 background:#9c6;
			 width:150px;
			 height:50px;
			 line-height:50px;
			 border-radius:10px;
			 z-index:100;
			 left:50%;top:50%;
		 }
		.alert-danger{
			position:absolute;
			background:#f66;
			width:150px;
			height:50px;
			line-height:50px;
			border-radius:10px;
			z-index:100;
			left:50%;top:50%;
		}

		.col-md-8 h4
		{
			color:white;
			background:#006666;
			margin-right:20px;
		}
		#add
		{
			height:100px;
			width:220px;
			margin-left:60px;
			border-radius:10px;
			border-top:3px solid #333;
			border-left:1px solid #333;
			border-right:1px solid #333;
			border-bottom:1px solid #333;
			box-shadow:10px 10px 15px 5px #DAD8D3;
		    background:#f5f5f5;
		}
		#sonk{
			position: absolute;
			left:200px;
			top:200px;
			height:120px;
			width:200px;
			border-radius:10px;
			border-top:3px solid #333;
			border-left:1px solid #333;
			border-right:1px solid #333;
			border-bottom:1px solid #333;
			box-shadow:10px 10px 15px 5px #DAD8D3;
			background:#f5f5f5;
			display:none;
		}
		#add:hover
		{
			box-shadow:15px 15px 20px 5px #DAD8D3;
		}
		#inp
		 {
			 height:25px;
			 margin-top:10px;
			 margin-left:30px;
			 border-radius:6px;border:1px solid #DAD8D3;
		 }
		#inp2
		{
			height:25px;
			margin-top:10px;
			margin-right:8px;
			border-radius:6px;border:1px solid #DAD8D3;
		}
		.btn
		{
			border-radius:6px;border:1px solid #036;
			margin-top:15px;
			margin-left:20px;
		}
		#tab1{
			width:82%;
			margin-top:120px;
			margin-left:24px;
			border-top:3px solid #333;
			border-left:1px solid #333;
			border-right:1px solid #333;
			border-bottom:1px solid #333;
			background:#f5f5f5;
		}
		#tab1:hover{
			box-shadow:10px 10px 15px 5px #DAD8D3;
		}
		#tabdiv
		{
			width:90%;
			margin-top:10px;
			margin-left:28px;
			height:440px;
			overflow:auto;
		}
		#tab2 {
			width:100%;
			border-top:3px solid #333;
			border-left:1px solid #333;
			border-right:1px solid #333;
			border-bottom:1px solid #333;
			box-shadow:10px 10px 15px 5px #DAD8D3;
			background:#f5f5f5;
		}
		#tab1 tr:hover
		{
			background:#BEBEBE;
		}
		#tab2 tr:hover
		{
			background:#BEBEBE;
		}
		#tab1 th{
			text-align:center;
			background:#96CDCD;
			height:30px;
		}
		#tab2 th{
			text-align:center;
			background:#96CDCD;
			height:20px;
		}
		#tab1 tr
		{
			height:30px;
		}
		#tab2 tr
		{
			height:40px;
		}
		input{
			border:1px dashed #066;
		}
	</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 分类管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="row">
	<div class="alert alert-success alert-dismissable" style="display:none;text-align:center">
	</div>
	<div class="alert alert-danger alert-dismissable" style="display:none;text-align:center">
	</div>
	<div class="col-md-4">
		<center><h4>顶级分类</h4></center>
		<div id="add" class="col-md-10 col-md-offset-1">
			<input id="inp" type="text" placeholder="添加顶级分类">
			<button id="jia"  type="button" class="btn btn-default">添加</button>
			<input  type="reset" class="btn btn-default" value="重置"/>
		</div>
		<table id="tab1" border="1">
			<tr>
				<th>类名</th>
			    <th style="width:70%;">操作 |<a href="/admin/product"> 查看全部</a></th>
			</tr>
			@foreach($type as $k=>$v)
			<tr align="center">
				<td>{{$v->stname}}</td>
				<td>
					<a  href="/admin/product?id={{$v->st_id}}">查看</a>
					<a id="{{$v->st_id}}" class="del" href="">删除</a>
					<a class="addson" href="">添加子分类</a>
					<a class="update" href="">修改</a>
				</td>
			</tr>
		@endforeach
		</table>
	</div>
	<div class="col-md-8">
		<center><h4>子分类</h4></center>
		<div id="sonk">
			<center><div>父级:<span>123</span></div>
			<input id="inp2" type="text" placeholder="添加子分类">
			<button id="adds" style="margin-left:0px;"  type="button" class="btn btn-default">添加</button>
			<button id="close"  type="button" class="btn btn-default">关闭</button>
			</center>
		</div>
		<div id="tabdiv">
			<table id="tab2" border="1">
				<tr>
					<th style="width:33%;">父级类名</th>
					<th style="width:33%;">子类名</th>
					<th style="width:33%;">操作</th>
				</tr>
				@if(!empty($zitype))
				@foreach($zitype as $k=>$v)

					<tr align="center">
						<td align="center">{{$v->fname}}</td>
						<td>{{$v->sname}}</td>
						<td>
							<a class="update" href="">修改</a>
							<a id="{{$v->id}}" class="del" href="">删除</a>
							<a href="">管理商品</a>
						</td>
					</tr>
				@endforeach
				@else
					<tr>
						<td align="center" colspan="3">该分类没有数据</td>
					</tr>
				@endif
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
  //添加顶级分类
	$('#jia').click(
	     function(){
             var link=$(this);
             $value=$(this).prev().val();
            $.get('/admin/product/add',{value:$value},function(data){
                if(data=='c'){
                    $('.alert-danger').html('类名过长').show().fadeOut(3000);
				}
				if(data=='a'){
                    $('.alert-danger').html('类名不能为空').show().fadeOut(3000);
				}
                if(data=='b'){
                    $('.alert-danger').html('该类已存在').show().fadeOut(3000);
                }
                if(data=='d'){
                    $('.alert-danger').html('顶级分类已达上限').show().fadeOut(3000);
                }
                if(data!='a'&&data!='b'&&data!='d'&&data!='c'){
                    $id=data;
                    $('.alert-success').html('添加成功').show().fadeOut(3000);
                    $tr=$('<tr align="center"> <td>'+$value+'</td> <td> <a href="">&nbsp;查看</a> <a id="'+$id+'" class="del" href="">&nbsp;删除</a>	<a class="addson" href="">添加子分类</a> <a class="update" href="">修改</a> </td> </tr>');
                    $('#tab1').append($tr);
                }
            });
	    })

    //删除
    $('.del').click(function(){
        //获取id
        var id=$(this).attr('id');
        var link=$(this);
        $.get('/admin/product/del',{id:id},function($data){
            if($data==1){
                $('.alert-success').html('删除成功').show().fadeOut(3000);
                link.parents('tr').remove();
            }else{
                $('.alert-danger').html('删除失败').show().fadeOut(3000);
                return false;

            }
        })
        return false;
    })
	//添加子分类
	  //显示
	$('.addson').click(function(){
        var name=$(this).parent().prev().html();
	    $('#sonk').fadeIn('slow').children('center').children('div').children('span').html(name);
        //添加
        $('#adds').click(function(){
            $value=$(this).prev().val();
            $.get('/admin/product/addson',{value:$value,stname:name},function(data){
                if(data=='c'){
                    $('.alert-danger').html('类名过长').show().fadeOut(3000);
                }
                if(data=='a'){
                    $('.alert-danger').html('类名不能为空').show().fadeOut(3000);
                }
                if(data=='b'){
                    $('.alert-danger').html('该类已存在').show().fadeOut(3000);
                }
                if(data!='a'&&data!='b'&&data!='c'){
                    $id=data;
                    $('.alert-success').html('添加成功').show().fadeOut(3000);
                }
            });
		})
		$('#close').click(function(){
            $('#sonk').fadeOut('slow');
		})
	    return false;
	})

	 //修改分类
	var oldv='';
	$('.update').click(function(){
		oldv=$(this).parent().prev().html();
        $(this).parent().prev().empty().append('<input type="text" size="10" value="'+oldv+'"/>');
        $(this).html('保存');
        var bc='<a class="bc" href="">保存</a>'
        $(this).replaceWith(bc);

        $('.bc').click(function(){
            var value=$(this).parent().prev().children('input').val();
            $.get('/admin/product/update',{value:value,oldv:oldv},function(data){
                if(data=='c'){
                    $('.alert-danger').html('类名过长').show().fadeOut(3000);
                }
                if(data=='a'){
                    $('.alert-danger').html('类名不能为空').show().fadeOut(3000);
                }
                if(data=='b'){
                    $('.alert-danger').html('该类已存在').show().fadeOut(3000);
                }
                if(data!='a'&&data!='b'&&data!='c'){
                    $('.bc').parent().prev().empty().html(value);
                    var update='<a class="update" href="">修改</a>';
                    $('.bc').replaceWith(update);
                    $id=data;
                    $('.alert-success').html('修改成功').show().fadeOut(3000);

                }
            });
            return false;
        })
	    return false;
	})



</script>
</body>
</html>