@extends('home.layout.person')

@section('nr')

    {{--错误的提示信息要放到相应位置--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger one" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 47px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--成功提示信息--}}
    @if(session('success'))
        <div class="alert alert-success one" style="margin-left:;position: absolute;float: left; margin-left: 300px; margin-top: 47px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

        <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1">所有订单</a></li>
            <li><a href="#tab2">待付款</a></li>
            <li><a href="#tab3">待发货</a></li>
            <li><a href="#tab4">待收货</a></li>
            <li><a href="#tab5">待评价</a></li>
        </ul>

        <div class="am-tabs-bd">
            {{--所有订单--}}
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
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
                    <div class="order-list">
                        @foreach ($details as $k=>$v)
                            <div class="order-status5">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                    <span>成交时间{{date('Y-m-d H:i:s',$v->ordertime)}}</span>
                                    <span style="float: left;margin-left: 60px;position: absolute;"><em>店铺：{{$v->sname}}</em></span>
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->picurl}}" class="itempic J_ItemImg">
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-basic-info">
                                                        <a href="#">
                                                            <p>{{$v->shopname}}</p>
                                                        </a>
                                                        <div>
                                                            <p style="font-size:10px;color:gray;">尺寸:{{$v->size}}</p>
                                                            <p style="font-size:10px;color:gray;">颜色:{{$v->color}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price" style="margin-top: 30px;">
                                                    ￥{{$v->price}}
                                                </div>
                                            </li>
                                            <li class="td td-number">
                                                <div class="item-number" style="margin-top: 30px;">
                                                    <span>×</span>{{$v->num}}
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
                                            <div class="item-amount">
                                                合计：{{($v->price*$v->num)>=199 ? $v->price*$v->num : $v->price*$v->num+10}}
                                                <p><span>{{$v->price*$v->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status" style="margin-top: 10px;">
                                                    <p class="order-info"><a href="/person/details?od_id={{$v->od_id}}">订单详情</a></p>
                                                </div>
                                            </li>
                                            <li class="td td-change">
                                                @if($v->status == 0)
                                                    <form action="/pay/topay" method="post">
                                                        {{--防止跨攻击--}}
                                                        {{ csrf_field() }}
                                                    <input type="hidden" name="od_id" value="{{$v->od_id}}"/>
                                                    <input type="submit" value="去付款" class="am-btn am-btn-danger anniu"/>
                                                    </form>
                                                @elseif($v->status == 1)
                                                    <a>
                                                        <div class="am-btn am-btn-danger anniu tixing" od_id="{{$v->od_id}}" style="margin-top: -20px;">提醒发货</div>
                                                    </a>
                                                        <div class="am-btn am-btn-danger anniu tuikuan" data-toggle="modal" data-target="#myModal" od_id="{{$v->od_id}}" style="margin-top: 15px;">申请退款</div>

                                                @elseif($v->status == 2)
                                                    <a>
                                                    <div class="am-btn am-btn-danger anniu shouhuo" od_id="{{$v->od_id}}" s_id="{{$v->s_id}}">确认收货</div></a>
                                                @elseif($v->status == 3)
                                                    <div class='am-btn am-btn-danger anniu pinglun' od_id="{{$v->od_id}}"  s_id="{{$v->s_id}}" data-target='#myModal1' data-toggle='modal'>去评价</div>
                                                @elseif($v->status == 4)
                                                    <a>
                                                    <div class="am-btn am-btn-danger anniu delete" id="delete" od_id="{{$v->od_id}}">删除订单</div></a>
                                                @elseif($v->status == 5)
                                                    <a od_id="{{$v->od_id}}">
                                                    <div class="am-btn am-btn-danger anniu">已申请退款</div></a>
                                                @elseif($v->status == 6)
                                                    <a od_id="{{$v->od_id}}">
                                                    <div class="am-btn am-btn-danger anniu">退款完成</div></a>
                                                @endif
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--分页--}}
                    <div style="float: right;">{!!  $details->render() !!}</div>
                </div>
        </div>
            {{--待付款--}}
            <div class="am-tab-panel am-fade" id="tab2">
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
                    <div class="order-list">
                        @foreach ($detail as $k=>$v)
                            @if($v->status == 0)
                            <div class="order-status5">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                    <span>成交时间{{date('Y-m-d H:i:s',$v->ordertime)}}</span>
                                    <span style="float: left;margin-left: 60px;position: absolute;"><em>店铺：{{$v->sname}}</em></span>
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->picurl}}" class="itempic J_ItemImg">
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-basic-info">
                                                        <a href="#">
                                                            <p>{{$v->shopname}}</p>
                                                        </a>
                                                        <div>
                                                            <p style="font-size:10px;color:gray;">尺寸:{{$v->size}}</p>
                                                            <p style="font-size:10px;color:gray;">颜色:{{$v->color}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price" style="margin-top: 30px;">
                                                    ￥{{$v->price}}
                                                </div>
                                            </li>
                                            <li class="td td-number">
                                                <div class="item-number" style="margin-top: 30px;">
                                                    <span>×</span>{{$v->num}}
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
                                            <div class="item-amount">
                                                合计：{{($v->price*$v->num)>=199 ? $v->price*$v->num : $v->price*$v->num+10}}
                                                <p><span>{{$v->price*$v->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status" style="margin-top: 10px;">
                                                    <p class="order-info"><a href="/person/details?od_id={{$v->od_id}}">订单详情</a></p>
                                                </div>
                                            </li>
                                            <li class="td td-change">
                                                <form action="/pay/topay" method="post">
                                                    {{--防止跨攻击--}}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="od_id" value="{{$v->od_id}}"/>
                                                    <input type="submit" value="去付款" class="am-btn am-btn-danger anniu"/>
                                                </form>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            {{--待发货--}}
            <div class="am-tab-panel am-fade" id="tab3">

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
                    <div class="order-list">
                        @foreach ($detail as $k=>$v)
                            @if($v->status == 1)
                            <div class="order-status5">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                    <span>成交时间{{date('Y-m-d H:i:s',$v->ordertime)}}</span>
                                    <span style="float: left;margin-left: 60px;position: absolute;"><em>店铺：{{$v->sname}}</em></span>
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->picurl}}" class="itempic J_ItemImg">
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-basic-info">
                                                        <a href="#">
                                                            <p>{{$v->shopname}}</p>
                                                        </a>
                                                        <div>
                                                            <p style="font-size:10px;color:gray;">尺寸:{{$v->size}}</p>
                                                            <p style="font-size:10px;color:gray;">颜色:{{$v->color}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price" style="margin-top: 30px;">
                                                    ￥{{$v->price}}
                                                </div>
                                            </li>
                                            <li class="td td-number">
                                                <div class="item-number" style="margin-top: 30px;">
                                                    <span>×</span>{{$v->num}}
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
                                            <div class="item-amount">
                                                合计：{{($v->price*$v->num)>=199 ? $v->price*$v->num : $v->price*$v->num+10}}
                                                <p><span>{{$v->price*$v->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status" style="margin-top: 10px;">
                                                    <p class="order-info"><a href="/person/details?od_id={{$v->od_id}}">订单详情</a></p>
                                                </div>
                                            </li>
                                            <a>
                                                <div class="am-btn am-btn-danger anniu ti" o_id="{{$v->o_id}}" style="margin-top: -20px;">提醒发货</div>
                                            </a>
                                            <div class="am-btn am-btn-danger anniu tuikuan" data-toggle="modal" data-target="#myModal" od_id="{{$v->od_id}}" style="margin-top: 15px;">申请退款</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            {{--待收货--}}
            <div class="am-tab-panel am-fade" id="tab4">

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
                    <div class="order-list">

                        @foreach ($detail as $k=>$v)
                            @if($v->status == 2)
                            <div class="order-status5">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                    <span>成交时间{{date('Y-m-d H:i:s',$v->ordertime)}}</span>
                                    <span style="float: left;margin-left: 60px;position: absolute;"><em>店铺：{{$v->sname}}</em></span>
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->picurl}}" class="itempic J_ItemImg">
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-basic-info">
                                                        <a href="#">
                                                            <p>{{$v->shopname}}</p>
                                                        </a>
                                                        <div>
                                                            <p style="font-size:10px;color:gray;">尺寸:{{$v->size}}</p>
                                                            <p style="font-size:10px;color:gray;">颜色:{{$v->color}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price" style="margin-top: 30px;">
                                                    ￥{{$v->price}}
                                                </div>
                                            </li>
                                            <li class="td td-number">
                                                <div class="item-number" style="margin-top: 30px;">
                                                    <span>×</span>{{$v->num}}
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
                                            <div class="item-amount">
                                                合计：{{($v->price*$v->num)>=199 ? $v->price*$v->num : $v->price*$v->num+10}}
                                                <p><span>{{$v->price*$v->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status" style="margin-top: 10px;">
                                                    <p class="order-info"><a href="/person/details?od_id={{$v->od_id}}">订单详情</a></p>
                                                </div>
                                            </li>
                                            <li class="td td-change ">
                                                <a>
                                                <div class="am-btn am-btn-danger anniu shouhuo" od_id="{{$v->od_id}}" s_id="{{$v->s_id}}">确认收货</div>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            {{--待评价--}}
            <div class="am-tab-panel am-fade" id="tab5">

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
                    <div class="order-list">

                        @foreach ($detail as $k=>$v)
                            @if($v->status == 3)
                            <div class="order-status5">
                                <div class="order-title">
                                    <div class="dd-num">订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                    <span>成交时间{{date('Y-m-d H:i:s',$v->ordertime)}}</span>
                                    <span style="float: left;margin-left: 60px;position: absolute;"><em>店铺：{{$v->sname}}</em></span>
                                </div>
                                <div class="order-content">
                                    <div class="order-left">
                                        <ul class="item-list">
                                            <li class="td td-item">
                                                <div class="item-pic">
                                                    <a href="#" class="J_MakePoint">
                                                        <img src="{{$v->picurl}}" class="itempic J_ItemImg">
                                                    </a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-basic-info">
                                                        <a href="#">
                                                            <p>{{$v->shopname}}</p>
                                                        </a>
                                                        <div>
                                                            <p style="font-size:10px;color:gray;">尺寸:{{$v->size}}</p>
                                                            <p style="font-size:10px;color:gray;">颜色:{{$v->color}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="td td-price">
                                                <div class="item-price" style="margin-top: 30px;">
                                                    ￥{{$v->price}}
                                                </div>
                                            </li>
                                            <li class="td td-number">
                                                <div class="item-number" style="margin-top: 30px;">
                                                    <span>×</span>{{$v->num}}
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
                                            <div class="item-amount">
                                                合计：{{($v->price*$v->num)>=199 ? $v->price*$v->num : $v->price*$v->num+10}}
                                                <p><span>{{$v->price*$v->num >= 199 ? '免运费' : '含运费 10.00元'}}</span></p>
                                            </div>
                                        </li>
                                        <div class="move-right">
                                            <li class="td td-status">
                                                <div class="item-status" style="margin-top: 10px;">
                                                    <p class="order-info"><a href="/person/details?od_id={{$v->od_id}}">订单详情</a></p>
                                                </div>
                                            </li>
                                            <li class="td td-change">
                                                <div class='am-btn am-btn-danger anniu pinglun' od_id="{{$v->od_id}}" s_id="{{$v->s_id}}" data-target='#myModal1' data-toggle='modal'>去评价</div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            @endif
                        @endforeach
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

    //所有订单
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
//                    a.parent('a').append("<div class='am-btn am-btn-danger anniu pinglun' data-target='#myModal1' data-toggle='modal'>去评价</div>");
//                    a.remove();
                    window.location.reload();
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
                    layer.msg('删除成功!', {icon: 6, time: 2000});
                    $("#delete").parents(".order-status5").remove();
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



    // 待发货订单 提醒发货
    $(".ti").click(function(){
        //获取要提醒发货的订单o_id
        var o_id = $(".ti").attr('o_id');
        //修改提示信息
        var a = $(this).html('已提醒发货');
        layer.msg('已经提醒商家,尽快发货', {icon: 6, time: 2000});
    });

    //定时隐藏提示信息
    setTimeout(function(){
        $(".one").hide();
    },2000);
</script>
@endsection
