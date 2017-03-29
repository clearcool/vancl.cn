@extends('admin.layout._meta')
<title>添加产品分类</title>
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-user-add" action="{{url('/admin/cate/add')}}">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				选择分类：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<select class="input-text" id="user-name" name="p_id">
					<option value="0">顶级分类</option>
				@foreach($cates as $k=>$v)
					<option value="{{$v->st_id}}">{{$v->stname}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				分类名称：
			</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="stname">
			</div>
		</div>
		{{ csrf_field() }}
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="javascript:history.back();" />
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/_footer 作为公共模版分离出去-->

</body>
</html>