@extends('admin.layout._meta')
<title>商品详情</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img src="/admincss/temp/product/Thumb/1.jpg">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18">张三</span>
			<span class="pl-10 f-12">余额：40</span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">这家伙很懒，什么也没有留下</dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="80">尺寸：</th>
				<td>S</td>
			</tr>
			<tr>
				<th class="text-r">颜色：</th>
				<td>红</td>
			</tr>
			<tr>
				<th class="text-r">库存：</th>
				<td>0 件</td>
			</tr>
			<tr>
				<th class="text-r">描述：</th>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.layout._footer')
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
</body>
</html>