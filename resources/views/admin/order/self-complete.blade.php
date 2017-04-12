<title></title>
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
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/bootstrap/css/docs.min.css" rel="stylesheet">
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/homecss/person/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/homecss/person/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
<style>
    li{list-style:none;}
</style>
<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

    <div style="width: 100%;height: 40px;background:lightgray;">
    <a style="color:blue;line-height:37px;margin-left: 75px;" href="{{url("/admin/order/complete")}}">全部完成订单</a>
    <a style="color:black;margin-left: 160px;" href="{{url("/admin/order/daifu")}}">待付款订单</a>
    <a style="color:black;margin-left: 160px;" href="{{url("/admin/order/daifa")}}">待发货订单</a>
    <a style="color:black;margin-left: 160px;" href="{{url("/admin/order/daishou")}}">待收货订单</a>
    <a style="color:black;margin-left: 160px;" href="{{url("/admin/order/daiping")}}">待评价订单</a>
    </div>
        {{--已完成的所有订单--}}
        <div class="am-tab-panel am-fade am-in am-active">
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
                        @foreach($detail as $k=>$v)
                        <div class="order-status5">
                            <div class="order-title">
                                <div class="dd-num">&nbsp订单编号：<a href="javascript:;">{{$v->ordernumber}}</a></div>
                                <span>商品ID:{{$v->s_id}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <span>成交时间：{{$v->ordertime}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <span>店铺：{{$v->sname}}</span>
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
                                                <div class="item-basic-info" style="margin-top:-25px;">
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
                                                <p class="order-info"><a href="/admin/order/details?od_id={{$v->od_id}}">订单详情</a></p>
                                            </div>
                                        </li>
                                        <li class="td td-change">
                                            <a>
                                                <div class="am-btn am-btn-danger anniu delete" id="delete" od_id="{{$v->od_id}}">删除订单</div></a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                    </div>
                        @endforeach
                    </div>
                {{--分页--}}
                <div style="float: right; margin-bottom: 50px;">{!! $detail->render() !!}</div>
            </div>
        </div>
</div>

<script type="text/javascript" src="/admincss/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admincss/lib/layer/2.4/skin/layer.css"></script>
<script>

    //删除订单
    $(".delete").click(function(){
        //获取要删除的订单的o_id
        var od_id = $(this).attr('od_id');
        //发送ajax执行删除动作
        $.ajax({
            type:'post',
            url:'/admin/order/delete',
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

</script>



