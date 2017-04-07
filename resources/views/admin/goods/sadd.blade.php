<!--_meta 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/meta 作为公共模版分离出去-->
<title>添加库存</title>
<link href="/admincss/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<div id="successMessage" >
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if(Session::has('error'))
	<div id="a" class="alert alert-danger"> {{Session::get('error')}} 
	</div> 
	@endif
	</div>
	<form role="form" action="{{url('/admin/goods/sadd')}}" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" class="input-text" value="{{$good->s_id}}" placeholder="" id="" name="s_id">{{$good->shopname}}
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品颜色：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" class="input-text" value="{{$good->sd_id}}" placeholder="" id="" name="sd_id">{{$good->color}}
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品尺寸：</label>
			<div class="formControls col-xs-8 col-sm-9">
				L：<input type="radio" name="size" value="L">&nbsp;&nbsp;&nbsp;&nbsp;
				M：<input type="radio" name="size" value="M">&nbsp;&nbsp;&nbsp;&nbsp;
				S：<input type="radio" name="size" value="S">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">库存：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="stock" id="" placeholder="" value="" class="input-text" style="width:90%">件
			</div>
		</div>
		
		{{ csrf_field() }}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
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
// $('#a').ready(function(){
 //   alert(1);
    
 // });
//$('#a').hide();
  
// $(function(){
      // setTimeout(function(){
    //      $('#successMessage').hide();
    //    },1000);
// });
 setTimeout(function(){	
  	$('#successMessage').hide();
  },3000);
</script>
</body>
</html>