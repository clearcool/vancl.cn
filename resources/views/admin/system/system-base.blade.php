<!--_meta 作为公共模版分离出去-->
@extends('admin.layout._meta')
<!--/meta 作为公共模版分离出去-->
<meta name="_token" content="{{ csrf_token() }}"/>
<title>网站设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	网站设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
	<form class="form form-horizontal" id="form-article-add" action="/admin/system/systemupdate" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
			<div class="tabBar cl">
				<span>网站设置</span>
			</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title" placeholder="控制在25个字、50个字节以内" value="{{ $config->webname }}" class="input-text" name="webname">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						关键词：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="{{ $config->keyword }}" class="input-text" name="keyword">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-description" placeholder="空制在80个汉字，160个字符以内" value="{{ $config->dsbe }}" class="input-text" name="dsbe">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
                        <div style="background:#000;color:red;display:block;width: 15px;position: absolute;margin-left: 75px;margin-bottom: 20px;">必选</div>
                        <span class="c-red">*</span>
						网站logo：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="file" id="website-static" placeholder="网站logo的目录"  name="logo">
						<img src="{{ $config->logo }}" width="50px">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						底部版权信息&copy：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-copyright" placeholder="&copy; 2016 H-ui.net" value="{{ $config->crtifa }}" class="input-text" name="crtifa">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">备案号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-icp" placeholder="京ICP备00000000号" value="{{ $config->recordnb }}" class="input-text" name="recordnb">
					</div>
				</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                <input type="hidden" value="{{ $a }}" id="a">
			</div>
		</div>
	</form>
<script type="text/javascript" src="/admincss/lib/jquery/1.9.1/jquery.js"></script>

<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admincss/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admincss/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admincss/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admincss/lib/layer/2.4/skin/layer.css"></script>
<script type="text/javascript">
    $(function(){
    	$('.skin-minimal input').iCheck({
    		checkboxClass: 'icheckbox-blue',
    		radioClass: 'iradio-blue',
    		increaseArea: '20%'
    	});
    	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
    });
    var a = $('#a').val();
    if(a == 1){
        layer.msg('修改成功!', {icon: 6, time:1500});
    }else if(a == 2){
        layer.msg('修改失败', {icon: 6, time:1500});
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>