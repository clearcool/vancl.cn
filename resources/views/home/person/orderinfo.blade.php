@extends('home.layout.person')

@section('nr')
	{{--错误的提示信息要放到相应位置--}}
	@if (count($errors) > 0)
		<div class="alert alert-danger one" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 10px;">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{{--成功提示信息--}}
	@if(session('success'))
		<div class="alert alert-success one" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 10px;">
			{{ session('success') }}
		</div>
	@endif

	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong></div>
		<a  href="javascript:history.go(-1)" style="margin-left: 800px;">返回上一级</a>
	</div>
	<hr/>
	@if($detail[0]->status == 0)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
							<p class="text">你还没有付款呦!</p>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
							<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 1)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
						<p class="text">等待商家发货...</p>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 2)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
							<p class="text">宝贝正在飞奔的路上!!</p>
							<div class="inquire">
								<span class="package-detail">物流：天朝快递</span>
								<span class="package-detail">快递单号: </span>
								<span class="package-number">373269427868</span>
							</div>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 3)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
							<p class="text">已签收,签收人是{{$detail[0]->addressname}}签收，感谢使用天天快递，期待再次为您服务</p>
							<div class="time-list">
								<span class="date">2016-4-17</span><span class="week">周一</span><span class="time">12:00:00</span>
							</div>
							<div class="inquire">
								<span class="package-detail">物流：天朝快递</span>
								<span class="package-detail">快递单号: </span>
								<span class="package-number">373269427868</span>
							</div>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 4)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
							<p class="text">已签收,签收人是{{$detail[0]->addressname}}签收，感谢使用天天快递，期待再次为您服务</p>
							<div class="time-list">
								<span class="date">2016-4-17</span><span class="week">周一</span><span class="time">12:00:00</span>
							</div>
							<div class="inquire">
								<span class="package-detail">物流：天朝快递</span>
								<span class="package-detail">快递单号: </span>
								<span class="package-number">373269427868</span>
							</div>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 5)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
						<p class="text">你已申请退款!</p>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@elseif($detail[0]->status == 6)
		<div class="order-infoaside">
			<div class="order-logistics">
					<div class="icon-log">
						<i><img src="/homecss/person/images/receive.png" width="50px" height="50px" style="margin-left: -35px;margin-top: -10px;"></i>
					</div>
					<div class="latest-logistics">
						<p class="text">交易关闭</p>
					</div>
					<span class="am-icon-angle-right icon"></span>
				<div class="clear"></div>
			</div>
			<div class="order-addresslist">
				<div class="order-address">
					<div class="icon-add">
					</div>
					<p class="new-tit new-p-re">
						<span class="new-txt">{{$detail[0]->addressname}}</span>
						<span class="new-txt-rd2">{{$detail[0]->phone}}</span>
					</p>
					<div class="new-mu_l2a new-p-re">
						<p class="new-mu_l2cw"><br/>
							<span class="title">收货地址：</span>
							@foreach($detail[0]->address as $k=>$v)
								<span class="province">{{$v}}</span>
							@endforeach
							<span class="street">{{$detail[0]->add_detail}}</span></p>
					</div>
				</div>
			</div>
		</div>
	@endif

	<div class="order-infomain">

		<div class="order-top">
			<div class="th th-item">
				<td class="td-inner">商品</td>
			</div>
			<div class="th th-price">
				<td class="td-inner">单价</td>
			</div>
			<div class="th th-number">
				<td class="td-inner">数量</td>
			</div>
			<div class="th th-operation">
				<td class="td-inner">商品操作</td>
			</div>
			<div class="th th-amount">
				<td class="td-inner">合计</td>
			</div>
			<div class="th th-status">
				<td class="td-inner">交易状态</td>
			</div>
			<div class="th th-change">
				<td class="td-inner">交易操作</td>
			</div>
		</div>

		<div class="order-main">

			<div class="order-status3">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">{{$detail[0]->ordernumber}}</a></div>
					<span>成交时间：{{date('Y-m-d H:i:s',$detail[0]->ordertime)}}</span>
					<em>店铺：{{$detail[0]->sname == 'Vancl' ? '自营':$detail[0]->sname}}</em>
				</div>
				<div class="order-content">
					<div class="order-left">
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="{{$detail[0]->picurl}}" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>{{$detail[0]->shopname}}</p>
										</a>
										<div>
											<p style="font-size:10px;color:gray;">尺寸:{{$detail[0]->size}}</p>
											<p style="font-size:10px;color:gray;">颜色:{{$detail[0]->color}}</p>
										</div>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									￥{{$detail[0]->price}}
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>{{$detail[0]->num}}
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">

								</div>
							</li>
						</ul>

					</div>
					<div class="order-right">
						<li class="td td-amount">
							 <div class="item-amount" style="margin-top:-15px;">
                     	 		合计：{{($detail[0]->price*$detail[0]->num)>=199 ? $detail[0]->price*$detail[0]->num : $detail[0]->price*$detail[0]->num+10}}
								<p><span>{{$detail[0]->price*$detail[0]->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>       
                                    @if(!empty($v->c_id))
                                     <span>优惠券: -{{$coupon[$detail[0]->c_id]->denomination}}</span><br/>
                                     @endif
                                     <span>订单总额: {{$detail[0]->totalprice}}</span>
                    </div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status" style="margin-top: 10px;">
									@if($detail[0]->status == 0)
									<p class="Mystatus">待付款</p>
									@elseif($detail[0]->status == 1)
									<p class="Mystatus">未发货</p>
									@elseif($detail[0]->status == 2)
									<p class="Mystatus">待收货</p>
									@elseif($detail[0]->status == 3)
									<p class="Mystatus">待评价</p>
									@elseif($detail[0]->status == 4)
									<p class="Mystatus">交易完成</p>
									@elseif($detail[0]->status == 5)
									<p class="Mystatus">退款中</p>
									@elseif($detail[0]->status == 6)
									<p class="Mystatus">退款完成</p>
									@endif
								</div>
							</li>
							<li class="td td-change">
								@if($detail[0]->status == 0)
									<form action="/pay/topay" method="post">
										{{--防止跨攻击--}}
										{{ csrf_field() }}
										<input type="hidden" name="od_id" value="{{$detail[0]->od_id}}"/>
										<input type="submit" value="去付款" class="am-btn am-btn-danger anniu"/>
									</form>
								@elseif($detail[0]->status == 1)
									<a>
										<!-- <div class="am-btn am-btn-danger anniu tixing" o_id="{{$detail[0]->o_id}}" style="margin-top: -20px;">提醒发货</div> -->
									</a>
									<div class="am-btn am-btn-danger anniu tuikuan" data-toggle="modal" data-target="#myModal" od_id="{{$detail[0]->od_id}}" style="margin-top: 15px;">申请退款</div>
								@elseif($detail[0]->status == 2)
									<a>
										<div class="am-btn am-btn-danger anniu shouhuo" od_id="{{$detail[0]->od_id}}" s_id="{{$detail[0]->s_id}}">确认收货</div></a>
								@elseif($detail[0]->status == 3)
									<div class='am-btn am-btn-danger anniu pinglun' od_id="{{$detail[0]->od_id}}"  s_id="{{$detail[0]->s_id}}" data-target='#myModal1' data-toggle='modal'>去评价</div>
								@elseif($detail[0]->status == 4)
									<a>
										<!-- <div class="am-btn am-btn-danger anniu delete" id="delete" od_id="{{$detail[0]->od_id}}">删除订单</div></a> -->
								@elseif($detail[0]->status == 5)
									<div class="am-btn am-btn-danger anniu">退款中</div>
								@elseif($detail[0]->status == 6)
									<div class="am-btn am-btn-danger anniu">退款完成</div>
								@endif
							</li>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- 申请退款的模态框 -->
	<form action="/person/tuikuan" method="post" class="motai">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">申请退款</h4>
					</div>
					<div class="modal-body">
						{{--防止跨站攻击--}}
						{{ csrf_field() }}
						退款原因: <input type="radio" name="reason" value="0" checked/>拍错了
						<input type="radio" name="reason" value="1"/>不想要了
						<input type="radio" name="reason" value="2"/>没钱了
						<input type="radio" name="reason" value="3"/>卖完后悔了
						<input type="radio" name="reason" value="4"/>其他原因
						<input type="hidden" name="u_id" value="{{session('home')->u_id}}"/>
						<input type="hidden" name="od_id" value="" class="yingcang"/>
						<script>
                            $(".tuikuan").click(function(){
                                //获取要退款的订单od_id
                                var od_id = $(this).attr('od_id');
                                $(".yingcang").val(od_id);
                            });
						</script>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default sub">确认</button>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">取消</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- 添加评论的模态框 -->
	<form action="/person/pinglun" method="post" class="motai">
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">评论订单</h4>
					</div>
					<div class="modal-body">
						{{--防止跨站攻击--}}
						{{ csrf_field() }}
						<div id="div">
							<ul>
								您对这次购物的满意度:
								<span>☆</span>
								<span>☆</span>
								<span>☆</span>
								<span>☆</span>
								<span>☆</span>
							</ul>
						</div>
						<div>
							&nbsp&nbsp
							<p id="score">&nbsp</p>
							&nbsp&nbsp
						</div>
						您对宝贝的意见:
						<textarea name="content"cols="30" rows="10"></textarea>
						<input type="hidden" name="od_id" value="" class="od_id"/>
						<input type="hidden" name="s_id" value="" class="s_id"/>
						<input type="hidden" name="star" value="" class="xing">
						<input type="hidden" name="commenttime" value="{{time()}}">
						<script type="text/javascript">
                            $(function () {
                                $("#div span").bind({
                                    mouseout :function () {
                                        $(this).css("color", "black").html("☆").prevAll().css("color", "black").html("☆")
                                    },
                                    mouseover: function () {
                                        $(this).css("color", "red").html("★").prevAll().css("color", "red").html("★")
                                    }
                                });
                                //鼠标按下时，确定分数。额，就不更改了，大局已定。
                                $("#div span").mousedown(function () {
                                    $("#score").html(("你选择的分数是" + (parseInt($(this).index("#div span")) + 1)));
                                    $(this).css("color", "red").html("★").prevAll().css("color", "red").html("★");
                                    //全部span标签的绑定事件全部清除--unbind方法可以加参数清除特定的事件。不加全部清除
                                    $(this).unbind().prevAll().unbind().nextAll().unbind();

                                    //将星数提取出来
                                    var a = $("#score").html();
                                    $(".xing").val(a.substr(7,1));
                                });
                            });

                            $(".pinglun").click(function(){
                                //获取要退款的订单od_id 和 s_id
                                var s_id = $(this).attr('s_id');
                                var od_id = $(this).attr('od_id');
                                $(".s_id").val(s_id);
                                $(".od_id").val(od_id);
                            });
						</script>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" >确认</button>
						<button type="submit" class="btn btn-primary" data-dismiss="modal">取消</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<script>

        //提醒发货事件
		$(".tixing").click(function(){
			//获取要提醒发货的订单o_id
			var od_id = $(".tixing").attr('od_id');
			//修改提示信息
			var a = $(this).html('已提醒发货');
			layer.msg('已经提醒商家,尽快发货', {icon: 6, time: 2000});
		});

		//退货申请
		$(".sub").click(function(){
			layer.msg('申请已提交', {icon: 6, time: 2000});
		});

        //确认收货
        $(".shouhuo").click(function(){
            //获取要提醒发货的订单o_id
            var od_id = $(this).attr('od_id');
            var a = $(this);
            //发送ajax确认收货
            $.ajax({
                type:'post',
                url:'/person/shouhuo',
                data:{od_id:od_id,'_token':'{{csrf_token()}}'},
                success:function(data){
                    if(data==1){
                        a.parent('a').append("<div class='am-btn am-btn-danger anniu pinglun' data-target='#myModal1' data-toggle='modal'>去评价</div>");
                        a.remove();
                        layer.msg('已收货', {icon: 6, time: 2000});

                    }else{
                        layer.msg('收货失败', {icon: 6, time: 2000});
                    }
                },
                error:function(data){
                    console.log(data.msg);
                },
                async:true
            });
        });

        //删除订单
        $(".delete").click(function(){
            //获取要删除的订单的o_id
            var od_id = $(this).attr('od_id');

            //发送ajax执行删除动作
            $.ajax({
                type:'post',
                url:'/person/delete',
                data:{od_id:od_id,'_token': '{{ csrf_token() }}'},
                success:function(data){
                    if(data == 1){
                        window.location.href='/person/order';
                        layer.msg('删除成功!', {icon: 6, time: 2000});
                    }else{
                        layer.msg('删除失败',{icon:5,time:2000});
                    }
                },
                error:function(data){
                    console.log(data.msg);
                },
                async:true
            });
        });

        //定时隐藏提示信息
        setTimeout(function(){
            $(".one").hide();
        },2000);

	</script>
@endsection
