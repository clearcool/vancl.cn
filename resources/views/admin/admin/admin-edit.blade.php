<head>
@extends('admin.layout._meta')
<title>修改管理员 - 管理员管理</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>

{{--错误的提示信息要放到相应位置--}}
@if (count($errors) > 0)
	<div class="alert alert-danger" id="one" style="margin-left:;position: absolute;float: left; margin-left: 480px; margin-top: 270px;">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

{{--成功提示信息--}}
@if(session('success'))
	<div class="alert alert-success" id="two" style="margin-left:;position: absolute;float: left; margin-left: 530px; margin-top: 300px;">
		{{ session('success') }}
	</div>
@endif

<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="{{url('admin/admin/adminedit')}}" method="post">

		{{--防跨站攻击--}}
		{{ csrf_field() }}

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$admin[0]->username}}" placeholder="" id="adminName" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>原密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="" name="" value="111111" readonly >
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="新密码"  name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" id="sex-1" value="1" {{$admin[0]->sex==1 ? 'checked' : ''}}>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="sex" value="0" {{$admin[0]->sex==0 ? 'checked' : ''}}>
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$admin[0]->phone}}" placeholder="" id="phone" name="phone">
			</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span>管理员</span>
		</div>
	</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width:150px;">
					<select class="select" name="status" size="1">
						<option value="0" {{$admin[0]->status==0 ? 'selected' : ''}}>开启</option>
						<option value="1" {{$admin[0]->status==1 ? 'selected' : ''}}>停用</option>
					</select>
				</span>
			</div>
		</div>
		<input type="hidden" name="jointime"/>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
		<input type="hidden" name="id" value="{{$admin[0]->id}}">
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

setTimeout(function(){
	$('#one').fadeOut('div');
},2500);

setTimeout(function(){
    $('#two').fadeOut('div');
},2500);
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>