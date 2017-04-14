@extends('home.shoppage.layout.index')
@section('middle')

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            商品列表
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                	<div class="row">
                    	<div class="col-sm-6">
                    		<div id="dataTables-example_filter" class="dataTables_filter">
                                <a href="/shops/shopsadd"><button class="btn btn-default" type="button">查看全部商品</button></a>
                       			<label>
                    				<form method="get" action="{{url('/shops/shopsadd')}}">                    				
                    				<input class="form-control input-sm" type="text" name="shopname" placeholder="名称" aria-controls="dataTables-example">
                    				<button name="" href="" type="submit">搜索</button>
                                    </form>
                    			</label>
                    		</div>
                    	</div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12">
                        		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
                                        	<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" aria-sort="ascending" >ID</th>
                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >缩略图</th>
                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >商品名</th>
                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >商品类别</th>
                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >商品描述</th>
                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >单价</th>
											<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >销量</th>
											<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >好评数</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >商品评论</th>
											<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >是否精品</th>
											<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >发布状态</th>
											<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: ;" >操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($shops as $k => $v)
                                    	<tr class="gradeA odd" role="row">
                                            <td class="sorting_1">{{ $v->s_id }}</td>
                                            <td class="center"><img src="{{ $v->picurl }}" width="50px"></td>
                                            <td class="center">{{ $v->shopname }}</td>
                                            <td class="center">{{ $v->stname }}</td>
                                            <td class="center">{{ $v->describe }}</td>
                                            <td class="center">{{ $v->price }}</td>
                                            <td class="center">{{ $v->Sales }}</td>
                                            <td class="center">{{ $v->praise }}</td>
                                            <td class="center"><a href="/orders/pinglun?s_id={{ $v->s_id }}">点击查看</a></td>
                                            <td class="center tique" >{{ $v->isboutique == 0 ? '非精品' : '精品'}}</td>
                                            <td class="center status" >{{ $v->state == 0 ? '未上架' : '已上架'}}</td>
                                            <td class="center" style="font-size: 10px">
                                            	<button class="btn" type="button" onclick="{{ $v->state == 0 ? 'up' : 'down'}}({{ $v->s_id }}, this);">{{ $v->state == 0 ? '上架' : '下架'}}</button>
                                            	<button class="btn" type="button" onclick="{{ $v->isboutique == 0 ? 'aup' : 'adown'}}({{ $v->s_id }}, this);">{{ $v->isboutique == 0 ? '设为精品' : '设为非精品'}}</button>
												<button class="btn" type="" onclick="jump({{ $v->s_id}});">详情</button>
                                                <button type="" class="btn" data-toggle="modal" data-target="#myModal" onclick="update({{ $v->s_id }});">
												  编辑
												</button>
												<!-- Modal -->
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
												      </div>
												      <div class="modal-body">
												      <center>
														<form action="/shops/update" method="post" enctype="multipart/form-data">
														  <div class="form-group">
														    <label for="exampleInputEmail1">商品名&nbsp;&nbsp;</label>
														    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="商品名" name="shopname">
														  </div><br><br>
														  <div class="form-group">
														    <label for="exampleInputEmail1">单价&nbsp;&nbsp;</label>
														    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="单价" name="price">
														  </div><br><br>
														  <div class="form-group">
														    <label for="exampleInputEmail1">类别&nbsp;&nbsp;</label>
														    	<select name="type" id="type" value="">
																	<option value=" ">类别</option>
																	@foreach($value as $a => $p)
																		<option value="{{ $p->st_id }}">{{ $p->stname }}</option>
																	@endforeach
																</select> <br><br>
														  </div><br><br>
														  <div class="form-group">
														    <label for="exampleInputPassword1">商品描述</label>
														    <input type="content" class="form-control" id="exampleInputPassword1" placeholder="商品描述" name="describe">
														  </div><br><br>
														  <div class="form-group">
														    <label for="exampleInputFile">商品图片</label>
														    <input type="file" id="exampleInputFile" name="pic">
														    <input type="hidden" name="id" id="id" value="">
														    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
														  </div><br><br>
														</center>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
												        <button type="" class="btn btn-primary">保存</button>
												      </div>
														</form>
												    </div>
												  </div>
												</div>
												<button class="btn" type="button" onclick="delshop({{ $v->s_id }}, this);">删除</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-6">

					        </div>
                        	<div class="col-sm-6">
                        		<center>
                        		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        			{!! $shops->appends($all)->render() !!}
                        		</div>
                        		</center>
                        	</div>
                        </div>
                    </div>
                     <center>
                                @if (session('empty'))
                                        <div class="ts" style="position: absolute;color: white;background: orangered;padding: 5px 5px;">
                                            {{ session('empty') }}
                                        </div>
                                    @endif
                                @if (session('success'))
                                        <div class="ts" style="position: absolute;color: white;background: lawngreen;padding: 5px 5px;">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                @if (session('error'))
                                        <div class="ts" style="position: absolute;color: white;background: red;padding: 5px 5px;">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </center>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script type="text/javascript">
setTimeout(function () {
            $('.ts').remove();
            }, 2000);
	function delshop(id, obj) {
		$.ajax({
			type: 'POST',
                url: '/shops/del',
                data: { id : id},
                dataType: 'json',
                headers: {
                	'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            	},
                success: function (data) {
                	if (data == 1) {
                        $(obj).parents('tr').remove();
                	}
                    },
                error: function (data) {
                        console.log(data.msg);
                    },
		});
	}
	function up(id, obj) {
		$.ajax({
			type: 'POST',
                url: '/shops/up',
                data: { id : id},
                dataType: 'json',
                headers: {
                	'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            	},
                success: function (data) {
                    if (data == 1) {
                    	$(obj).parent().prev().html('已上架');
                    	$(obj).attr('onclick', 'down('+id+', this);')
                    	$(obj).html('下架')
                    }
                },
                error: function (data) {
                    console.log(data.msg);
              	},
		});
	}
	function down(id, obj) {
		$.ajax({
			type: 'POST',
                url: '/shops/down',
                data: { id : id},
                dataType: 'json',
                headers: {
                	'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            	},
                success: function (data) {
                    if (data == 1) {
                    	$(obj).parent().prev().html('已下架');
                    	$(obj).attr('onclick', 'up('+id+', this);')
                    	$(obj).html('上架')
                    }
                },
                error: function (data) {
                    console.log(data.msg);
              	},
		});
	}
	function aup(id, obj) {
		$.ajax({
			type: 'POST',
                url: '/shops/aup',
                data: { id : id},
                dataType: 'json',
                headers: {
                	'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            	},
                success: function (data) {
                    if (data == 1) {
                    	$(obj).parent().prev().prev().html('精品');
                    	$(obj).attr('onclick', 'down('+id+', this);')
                    	$(obj).html('设为非精品')
                    }
                },
                error: function (data) {
                    console.log(data.msg);
              	},
		});
	}
	function adown(id, obj) {
		$.ajax({
			type: 'POST',
                url: '/shops/adown',
                data: { id : id},
                dataType: 'json',
                headers: {
                	'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            	},
                success: function (data) {
                    if (data == 1) {
                    	$(obj).parent().prev().prev().html('非精品');
                    	$(obj).attr('onclick', 'up('+id+', this);')
                    	$(obj).html('设为精品')
                    }
                },
                error: function (data) {
                    console.log(data.msg);
              	},
		});
	}
	function jump(s_id) {
		location.href = '/usergoods/detail?s_id='+s_id;
	}
	function update(id) {
		$('#id').val(id);
	}
</script>
@endsection
