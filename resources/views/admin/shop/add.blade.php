<!--_meta 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/meta 作为公共模版分离出去-->
<title>添加商品</title>
<link href="/admincss/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form role="form" action="{{url('/admin/shop/add')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="shopname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>商品类别：
			</label>
			<div class="formControls col-xs-8 col-sm-9" >
				<select  name="" id="one">
					<option value="">请选择一级分类</option>
				@foreach($cates as $k=>$v)
					@if(($v->p_id) === 0)
					<option value="{{$v->st_id}}">{{$v->stname}}</option>
					@endif
				@endforeach
				</select>
				<select name="st_id" id="two">
					<option value="">请选择二级分类</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否精品：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
					非精品：<input type="radio" checked="checked" name="isboutique" value="0">&nbsp;&nbsp;&nbsp;&nbsp;
					精品：<input type="radio" name="isboutique" value="1">
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="price" id="" placeholder="" value="" class="input-text" style="width:90%">
				元</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
			<input type="file" name="picurl">
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">产品描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="describe" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		{{ csrf_field() }}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
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

<script type="text/javascript">

	//获取元素对象
	 var one = document.getElementById('one');
	 var two = document.getElementById('two');


	one.onchange = function()
	{
		var a = this.value;

		$.get('/admin/shop/cate',{id:a},function(data){
			var str = '<option value="">请选择二级分类</option>';
			for(var i=0; i < data.length;i++){
			    str += '<option value="'+ data[i].st_id +'">'+ data[i].stname +'</option>';
			}

			$('#two').html(str);

		},'json');

	}


</script>

</body>
</html>
