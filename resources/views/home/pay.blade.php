@extends('home.layout/index') @section('style')
	<title>结算页面</title>
	<link href="/homecss/pay/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/homecss/pay/css/cartstyle.css" rel="stylesheet" type="text/css" />
	<link href="/homecss/pay/css/jsstyle.css" rel="stylesheet" type="text/css" />
	<link href="/homecss/person/css/addstyle.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/homecss/pay/js/address.js"></script>
	<script type="text/javascript" src="/homecss/pay/js/area.js"></script>
	<script type="text/javascript" src="/homecss/pay/js/js.js"></script>
	<style type="text/css">
		.box
		{
			width:400px;
			line-height:30px;
			background:#fedcbd;
		}

		#holyshit267
		{
			text-align:left;
		}
		.buy-footer-address
		{
			text-align:right;
		}
		#ding
		{
			margin-top:5px;
			width:100%;
			border-bottom:2px solid #DDD;
		}
		#newress{
			margin-right:1px;
			float:right;
		}
		.min
		{
			text-align:center;
			width:20px;
			height:25px;
			line-height: 10px;
		}
		.add
		{
			text-align:center;
			width:20px;
			height:25px;
			line-height: 10px;
		}
		#s_province,#s_city,#s_county
		{
			float:left;
			margin-left:20px;
			width:100px;
			height:35px;
		}
		.user-addresslist
		{
			margin:10px 50px;
		}
		#tishi
		{
			width:200px;
			height:40px;
			line-height:40px;
			display:none;
			border-radius: 10px;
			position:fixed;
			text-align:center;
			left:50%;
			top:50%;
			z-index:99;
		}
	</style>
    @section('qwer')
	@endsection
	@section('dh')
	@endsection
@section('lb')
	<div  class="concent">
		<!--地址 -->
		<div class="paycont">
			<div class="address">
				<div class="user-address">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div id="ding" class="am-fl am-cf">
							<strong class="am-text-danger am-text-lg">确认收货地址地址</strong>
							<div id="newress"class="control">
								<div  class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
							</div>
						</div>
					</div>
					<div id="tishi"></div>
					<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						@foreach($ress as $k=>$v)
						<li addid="{{$v->add_id}}" class="user-addresslist {{$v->default==1?'defaultAddr':''}}"> <span class="new-option-r"><i class="am-icon-check-circle"></i>收货地址</span> <p class="new-tit new-p-re"> <span class="new-txt">{{$v->addressname}}</span> <span class="new-txt-rd2">{{$v->phone}}</span> </p>
							<div class="new-mu_l2a new-p-re">
								<p class="new-mu_l2cw"> <span class="title">地址：</span> <span class="province">{{$v->address[0]}}  </span> <span class="city">{{$v->address[1]}}</span> <span class="dist">{{$v->address[2]}}</span><span class="street">   {{$v->add_detail}}</span></p>
							</div>

						</li>
						@endforeach

					</ul>
				</div>
				<!--支付方式-->
				<div class="clear"></div>
				<!--订单 -->
				<div class="concent">
					<div id="payTable">
						<div class="cart-table-th">
							<div class="wp">
								<div class="th th-item">
									<div class="td-inner">
										商品信息
									</div>
								</div>
								<div class="th th-price">
									<div class="td-inner">
										单价
									</div>
								</div>
								<div class="th th-amount">
									<div class="td-inner">
										数量
									</div>
								</div>
								<div class="th th-sum">
									<div class="td-inner">
										金额
									</div>
								</div>
								<div class="th th-oplist">
									<div class="td-inner">
										配送方式
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						@foreach($detail as $k=>$v)
						<div class="bundle  bundle-last">
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<div class="pay-phone">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/home/details?id={{$v->s_id}}" class="J_MakePoint"> <img style="height:80;width:80px;"src="{{$v->picurl}}" class="itempic J_ItemImg" /></a>
											</div>
											<div style="margin-top:30px;" class="item-info">

												<div class="item-basic-info">
													<span>店铺:</span><a href="" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->sname}}</a><br/>
													<a href="#"  style="float:left;margin-top:5px;"class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->describe}}</a>
												</div>
											</div>
										</li>
										<li class="td td-info">
											<div style="margin-top:20px;" class="item-props">
												<span class="sku-line">颜色：{{$v->color}}</span>
												<span class="sku-line">尺码：{{$v->size}}</span>
											</div> </li>
										<li class="td td-price">
											<div style="margin-top:20px;" class="item-price price-promo-promo">
												<div class="price-content">
													<em class="J_Price price-now">{{$v->price}}</em>
												</div>
											</div>
										</li>
									</div>
									<li class="td td-amount">
										<div style="margin-top:20px;" class="amount-wrapper ">
											<div class="item-amount ">
												<span class="phone-title">购买数量</span>
												<div class="sl">
													<input  class="min am-btn" name="" type="button" value="-" />
													<input class="text_box" id="shul" name="" type="text" value="{{$num}}" style="width:30px;" />
													<input class="add am-btn" name="" type="button" value="+" />
												</div>
											</div>
										</div> </li>
									<li class="td td-sum">
										<div style="margin-top:20px;" class="td-inner">
											<em tabindex="0" class="J_ItemSum number">{{$detail[0]->price * $num}}</em>
										</div> </li>
									<li class="td td-oplist">
										<div class="td-inner">
											<span class="phone-title">配送方式</span>
											@if($v->price * $num >199)
												<br/>
												<b class="sys_item_freprice">包邮</b>
											@else
											<div style="margin-top:20px;" class="pay-logis">
												快递
												<b class="sys_item_freprice">10</b>元
											</div>
												@endif
										</div> </li>
								</ul>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						@endforeach
						<div class="clear"></div>
						<div class="pay-total">
							<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>
							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-coupon"> <span class="coupon-title">优惠券</span>
									<select id="yhq" data-am-selected=""> <option value="0">  优惠券</option>
										@foreach($coupon as $k=>$v)
										<option  value="{{$v->c_id}}" selected=""> 满{{$v->min_price}} 减 {{$v->denomination}}元 </option>
										@endforeach
									</select>
								</li>
							</div>
							<div class="clear"></div>
						</div>
						<!--含运费小计 -->
						<div class="buy-point-discharge ">
							<p class="price g_price "> 合计（含运费） <span>&yen;</span><em class="pay-sum">{{$detail[0]->price * $num}}</em> </p>
						</div>
						<!--信息 -->
						<div class="order-go clearfix">
							<div class="pay-confirm clearfix">
								<div class="box">
									<div tabindex="0" id="holyshit267" class="realPay">
										<em class="t">实付款：</em>
										<span class="price g_price "> <span>&yen;</span> <em class="style-large-bold-red " id="J_ActualFee">{{$detail[0]->price * $num}}</em> </span>
									</div>
									<div id="holyshit268" class="pay-address">
										<p class="buy-footer-address"> <span class="buy-line-title buy-line-title-type">寄送至：</span> <span class="buy--address-detail"> <span id="sheng" class="province">{{$deress->address[0]}} </span><span id="shi" class="city">{{$deress->address[1]}} </span> <span id="xian" class="dist">{{$deress->address[2]}}  </span><br/><span id="xiangxi" class="street">{{$deress->add_detail}}</span> </span> </p>
										<p class="buy-footer-address"> <span class="buy-line-title">收货人：</span> <span class="buy-address-detail"> <span id="buyname" class="buy-user">{{$deress->addressname}} </span> <span id="buyphone" class="buy-phone">{{$deress->phone}}</span> </span> </p>
									</div>
									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<form action="/pay/danbuy" method="post">
												<input id="shid" type="hidden" name ="address" value="{{$deress->add_id}}">
												<input type="hidden" name ="stock" value="{{$detail[0]->ss_id}}">
												<input id="spsl" type="hidden" name ="num" value="{{$num}}">
												<input id="youhui" type="hidden" name ="coupon" value="">
												{{ csrf_field() }}
												<button type="submit" id="tijiao" class="btn btn-danger"title="点击此按钮，提交订单">提交订单</button>
											</form>

										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="theme-popover-mask"></div>
					<div class="theme-popover">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf">
								<strong class="am-text-danger am-text-lg">新增地址</strong> /
								<small>Add address</small>
							</div>
						</div>
						<hr />
						<div class="am-u-md-12">
							<form class="am-form am-form-horizontal" method="post" action="/person/addressadd">
								<div class="am-form-group">
									<label for="user-name"  class="am-form-label">收货人</label>
									<div class="am-form-content">
										<input type="text" style="width:200px;" name="addressname" id="user-name" placeholder="收货人" />
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">手机号码</label>
									<div class="am-form-content">
										<input id="user-phone" style="width:200px;" name="phone" placeholder="手机号必填" type="text" />
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">所在地</label>
									<div class="info">

										<div>

											<select id="s_province" name="s_province"></select>  

											<select id="s_city" name="s_city" ></select>  

											<select id="s_county" name="s_county"></select>

											<script class="resources library" src="/homecss/pay/js/area.js" type="text/javascript"></script>

											<script type="text/javascript">_init_area();</script>

										</div>
										<div id="show"></div>

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-intro" class="am-form-label">详细地址</label>
									<div class="am-form-content">
										<textarea class="" rows="3" id="user-intro" name="centent" placeholder="输入详细地址"></textarea>
										<small>100字以内写出你的详细地址...</small>
									</div>
								</div>
								<div class="am-form-group theme-poptit">
									<div class="am-u-sm-9 am-u-sm-push-3">
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
			                                <button>保存</button>
										<div class="am-btn am-btn-danger close">
											取消
										</div>
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<input type="hidden" name="panduan" value="1">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">

		setTimeout(function () {
            $('.ts').remove();
            }, 2000);
		//商品数量减
        $('.min').click(function(){
            $('#yhq').val('0');
            $('#youhui').val('0');
            var price=parseFloat($('.price-now').html());
            var num=parseInt($(this).next().val()-1);
             $('#spsl').val(num);
            if(num<=0) {
                p=0;
            }else{
                var p=parseFloat(num * price);
			}
			if(p>199)
			{
				$('.td-oplist').empty().html('<br/>包邮');
                $('.number').html(p);
                $('.pay-sum').html(p);
                $('#J_ActualFee').html(p);
			}else{
                $('.td-oplist').empty().append('<br/><b class="sys_item_freprice">快递 10</b>元')
                $('.number').html(p);
                $('.pay-sum').html(p+10);
                $('#J_ActualFee').html(p+10);
			}
		})
		//商品数量加
        $('.add').click(function(){
            $('#yhq').val('0');
            $('#youhui').val('0');
            var price=parseFloat($('.price-now').html());
            var num=parseInt($(this).prev().val())+1;
            $('#spsl').val(num);
            var p=parseFloat(num * price);
            if(p>199)
            {
                $('.td-oplist').empty().html('<br/>包邮');
                $('.number').html(p);
                $('.pay-sum').html(p);
                $('#J_ActualFee').html(p);
            }else{
                $('.td-oplist').empty().append('<br/><b class="sys_item_freprice">快递 10</b>元')
                $('.number').html(p);
                $('.pay-sum').html(p+10);
                $('#J_ActualFee').html(p+10);
            }

        })

		//地址
		$('.user-addresslist').live('click',function(){
			var id =$('.defaultAddr').attr('addid');
		    $.get('/pay/deress',{id:id},function(data){
		        $('#shid').val(id);
               eval('var ress='+data);
				$('#sheng').html(ress.address[0]);
				$('#shi').html(ress.address[1]);
                $('#xian').html(ress.address[2]);
                if(ress.add_detail){
                    $('#xiangxi').html(ress.add_detail);
				}else{
                    $('#xiangxi').html('');
				}
                $('#buyname').html(ress.addressname);
                $('#buyphone').html(ress.phone);
			})
		})

		//优惠券
		$('#yhq').change(function(){
		    var id=$(this).val();
		    if(id!=0){
                $.get('/pay/coupon',{id:id},function(data){
                    eval('var coupon='+data);
                    if(coupon.min_price>parseInt($('.pay-sum').html()))
                    {
                        $('#tishi').addClass('alert-danger').html('不能达到使用该优惠券的条件').show().fadeOut(3000);
                    }else{
                        $('#youhui').val(id);
                        var n=parseFloat($('.pay-sum').html())-coupon.denomination;
                        $('#J_ActualFee').html(n);
					}
                })
			}
		})

		//提交判断
		$('#tijiao').click(function(){
		    var num=$('#shul').val();
		    if(num<=0)
			{
                $('#tishi').addClass('alert-danger').html('商品数量不能为0').show().fadeOut(3000);
			    return false;
			}
		})
	</script>

@endsection