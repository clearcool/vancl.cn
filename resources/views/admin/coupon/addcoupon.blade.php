@extends('admin.layout._meta')
<title>添加优惠劵</title>
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-user-add" action="{{url('/admin/coupon/a')}}">
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				面额：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="denomination">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				最低消费：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="min_price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				有效期：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="effective">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				张数：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="sheets">
			</div>
		</div>
		{{ csrf_field() }}
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="javascript:history.back();" />
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/_footer 作为公共模版分离出去-->

</body>
</html>