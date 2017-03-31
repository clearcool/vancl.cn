@extends('admin.layout._meta')
{{--标题栏--}}
<header class="navbar-wrapper">
	<div  class="navbar navbar-fixed-top" style="height:45px;">
		<div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:location.reload();">vancl 后台管理系统</a></div>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul>
				<li>{{session('admin')->auth == 0 ? '超级管理员' : '管理员'}}</li>
					<li class="dropDown dropDown_hover">　{{session('admin')->username}}</li>
					<li><a href="/admin/admin/logout">退出</a></li>
				</li>
				<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<body>
@extends('admin.layout._menu')
		<section class="Hui-article-box">
			<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
				<div class="Hui-tabNav-wp">
					<ul id="min_title_list" class="acrossTab cl">
						<li class="active">
							<span title="我的桌面" data-href="{{url('/admin/welcome')}}">我的桌面</span>
							<em></em>
						</li>
					</ul>
				</div>
				<div class="Hui-tabNav-more btn-group">
					<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
						<i class="Hui-iconfont">&#xe6d4;</i>
					</a>
					<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
						<i class="Hui-iconfont">&#xe6d7;</i>
					</a>
				</div>
			</div>
			<div id="iframe_box" class="Hui-article">
				<div class="show_iframe">
					<div style="display:none" class="loading"></div>
					<iframe scrolling="yes" frameborder="0" src="{{url('/admin/welcome')}}"></iframe>
				</div>
			</div>
		</section>
		
		<div class="contextMenu" id="Huiadminmenu">
			<ul>
				<li id="closethis">关闭当前 </li>
				<li id="closeall">关闭全部 </li>
			</ul>
		</div>
		<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
{{--<script type="text/javascript">--}}
	{{--function logout()--}}
	{{--{--}}
        {{--$.ajax({--}}
            {{--url: '/admin/admin/logout',--}}
            {{--data('admin',session('admin')),--}}
        {{--})--}}
        {{--url请求的脚本--}}
        {{--data发送的数据--}}
        {{--dataType数据的类型--}}
        {{--type请求的类型--}}
        {{--success成功的执行代码--}}
        {{--error失败的执行代码--}}
        {{--timeout 超时时间--}}
        {{--async 是否异步--}}

    {{--}--}}
{{--</script>--}}
	</body>
</html>