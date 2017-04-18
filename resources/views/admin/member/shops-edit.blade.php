<head>
@extends('admin.layout._meta')
<title></title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>

{{--错误的提示信息要放到相应位置--}}
@if (count($errors) > 0)
    <div class="alert alert-danger" id="one" style="margin-left:;position: absolute;float: left; margin-left: 480px; margin-top: 410px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{--成功提示信息--}}
@if(session('success'))
    <div class="alert alert-success" id="two" style="margin-left:;position: absolute;float: left; margin-left: 530px; margin-top: 410px;">
        {{ session('success') }}
    </div>
@endif

<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="{{url('admin/member/modify')}}" method="post">

		{{--防跨站攻击--}}
		{{ csrf_field() }}

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店铺名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$shops[0]->sname}}" placeholder="店铺名" id="shopname" name="shopname" readonly>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店主名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$shops[0]->username}}" placeholder="店主名" id="username" name="username" readonly>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">店铺状态：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
				<select class="select" name="shopcondition" size="1">
					<option value="0" {{$shops[0]->shopcondition == 0 ? 'selected' : ''}}>正常</option>
					<option value="1" {{$shops[0]->shopcondition == 1 ? 'selected' : ''}}>待审核</option>
					<option value="2" {{$shops[0]->shopcondition == 2 ? 'selected' : ''}}>封店</option>
				</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类别：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="类别" id="stname" name="stname" value="{{$shops[0]->stname}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>开店时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="开店时间" id="shoptime" name="shoptime" value="{{date('Y-m-d H:i:s',$shops[0]->shoptime)}}" readonly>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>信誉度：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="信誉度" id="shopcredit" name="shopcredit" value="{{$shops[0]->shopcredit}}" readonly>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>总销售额：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="总销售额" id="sales" name="sales" value="{{$shops[0]->sales}}" readonly>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>店铺等级：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="店铺等级" id="grade" name="grade" value="{{$shops[0]->grade}}" readonly>
		</div>
	</div>
        <input type="hidden" name="u_id" value="{{$shops[0]->u_id}}">
        <input type="hidden" name="st_id" value="{{$shops[0]->st_id}}">
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
		</div>
	</div>
	</form>

</article>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admincss/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admincss/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script src="/bootstrap/js/jquery-1.12.4.min.js"></script>

<script type="text/javascript">

//setTimeout(function(){
//	$('#one').fadeOut('div');
//},2500);
//
//setTimeout(function(){
//    $('#two').fadeOut('div');
//},2500);

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>