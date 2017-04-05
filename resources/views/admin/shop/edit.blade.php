<!--_meta 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/meta 作为公共模版分离出去-->
<title>添加商品</title>
<link href="/admincss/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form role="form" action="{{url('/admin/shop/update')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<input type="hidden" name="s_id" value="{{$shop->s_id}}">
		<input type="hidden" name="state" value="0">
		<input type="hidden" name="us_id" value="0">
		<input type="hidden" name="praise" value="0">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="" name="shopname" value="{{$shop->shopname}}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>商品类别：
			</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="st_id" class="select">
						<option value="{{$shop->st_id}}">{{$shop->stname}}</option>
					@foreach($cates as $k=>$v)
						<option value="{{$v->st_id}}">{{$v->stname}}</option>
					@endforeach
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否精品：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
						非精品：<input type="radio" name="isboutique" value="0" {{(($shop->isboutique) == 0)?'checked':''}}>&nbsp;&nbsp;&nbsp;&nbsp;
						精品：<input type="radio"  name="isboutique" value="1" {{(($shop->isboutique) == 1)?'checked':''}}>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" id="" placeholder="" value="{{$shop->price}}" class="input-text" style="width:90%">
				元</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
			<input type="file" name="picurl">
			<input type="hidden" name="ypicurl" value="{{$shop->picurl}}">
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="describe" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)">{{$shop->describe}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		{{ csrf_field() }}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改并提交审核</button>
				<button class="btn btn-secondary radius" type="reset"><i class="Hui-iconfont">&#xe632;</i> 重置</button>
				<input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="javascript:history.back();" />
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

</body>
</html>