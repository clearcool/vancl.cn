@extends('home.layout.person')

@section('nr')
    <div class="user-order">

        <!--标题 -->
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退货管理</strong></div>
        </div>
        <hr/>

        <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

            <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">退款中</a></li>
                <li><a href="#tab2">退款完成</a></li>
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                    <div class="order-top">
                        <div class="th th-item">
                            <td class="td-inner">商品</td>
                        </div>
                        <div class="th th-orderprice th-price">
                            <td class="td-inner">交易金额</td>
                        </div>
                        <div class="th th-changeprice th-price">
                            <td class="td-inner">退款金额</td>
                        </div>
                        <div class="th th-status th-moneystatus">
                            <td class="td-inner">交易状态</td>
                        </div>
                        <div class="th th-change th-changebuttom">
                            <td class="td-inner">交易操作</td>
                        </div>
                    </div>

                    <div class="order-main">
                        <div class="order-list">
                            @foreach ($detail as $k=>$v)
                                @if($v->status == 5)
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
                                                    合计：{{$v->totalprice}}
                                                    <p>含运费：<span>10.00</span></p>
                                                </div>
                                            </li>
                                            <div class="move-right">
                                                <li class="td td-status">
                                                    <div class="item-status">
                                                        <p class="Mystatus">交易成功</p>
                                                        <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                        <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                    </div>
                                                </li>
                                                <li class="td td-change">
                                                        <a href="#?o_id={{$v->o_id}}">
                                                            <div class="am-btn am-btn-danger anniu">已申请退款</div></a>
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
                                @if($v->status == 6)
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
                                                        合计：{{$v->totalprice}}
                                                        <p>含运费：<span>10.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">交易成功</p>
                                                            <p class="order-info"><a href="orderinfo.html">订单详情</a></p>
                                                            <p class="order-info"><a href="logistics.html">查看物流</a></p>
                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <a href="#?id={{$d}}">
                                                            <div class="am-btn am-btn-danger anniu">
                                                                退款完成</div>
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

            </div>

        </div>
    </div>

@endsection