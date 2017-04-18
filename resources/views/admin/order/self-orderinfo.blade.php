<link href="/homecss/person/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/personal.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/systyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/personal.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/addstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/infstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/cpstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/orstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/newstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/cmstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/bostyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/colstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/blstyle.css" rel="stylesheet" type="text/css">
<link href="/homecss/person/css/footstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/admincss/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admincss/lib/layer/2.4/skin/layer.css"></script>
<script src="/homecss/person/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/homecss/person/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
<style>
	* li{list-style:none;}
</style>
	<div style="margin-left: 20px;margin-top: 20px;"></div>
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg" onclick="window.location.reload();">订单详情</strong></div>
		<a  href="javascript:history.go(-1)" style="margin-left: 1000px;">返回上一级</a>
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
						<p class="text">已申请退款!</p>
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
				<td class="td-inner"></td>
			</div>
		</div>

		<div class="order-main">

			<div class="order-status3">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">{{$detail[0]->ordernumber}}</a></div>
					<span>成交时间：{{date('Y-m-d H:i:s',$detail[0]->ordertime)}}</span>&nbsp&nbsp&nbsp&nbsp
					<span>店铺：{{$detail[0]->sname}}</span>
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
									<div class="item-basic-info" style="margin-top: -35px;">
											<p>{{$detail[0]->shopname}}</p>
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
							<div class="item-amount" style="margin-top: -15px;">
                               合计：{{($detail[0]->price*$detail[0]->num)>=199 ? $detail[0]->price*$detail[0]->num : $detail[0]->price*$detail[0]->num+10}}
								<p><span>{{$detail[0]->price*$detail[0]->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                    @if(!empty($detail[0]->c_id))
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
						
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

