@extends('home.shoppage.layout.index')
@section('middle')
    {{--错误的提示信息要放到相应位置--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger one" style="margin-left:;position: absolute;float: left; margin-left: 700px; margin-top: -70px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--成功提示信息--}}
    @if(session('success'))
        <div class="alert alert-success one" style="margin-left:;position: absolute;float: left; margin-left: 700px; margin-top: -70px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="container text-center">
        <div class="panel panel-info text-left">
            <div class="panel-heading">订单管理/已完成订单</div>
            <div class="panel-body">
            </div><!--end panel-body-->
        </div><!--end panel panel-info-->
        <table class="table table-hover table-bordered text-center">
            <tr>
                <th class="text-center">订单编号</th>
                <th class="text-center">买家名称</th>
                <th class="text-center">商品照片</th>
                <th class="text-center">商品名称</th>
                <th class="text-center">订单金额</th>
                <th class="text-center">下单时间</th>
                <th class="text-center">订单状态</th>
                <th class="text-center">操作</th>
            </tr>
            @foreach($shops as $k=>$v)
                <tr>
                    <td>{{$v->ordertime}}</td>
                    <td>{{$v->username}}</td>
                    <td><img src="{{$v->picurl}}" width="40" height="40"/></td>
                    <td>{{$v->shopname}}</td>
                    <td>￥{{$v->price*$v->num}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->ordertime)}}</td>
                    <td>{{$v->bb == 0 ? '待付款' : ($v->bb == 1 ? '待发货' : ($v->bb == 2 ? '待收货' : ($v->bb == 3 ? '待评价' : ($v->bb == 4 ? '交易完成' : ($v->bb == 5 ? '退款中' : '交易关闭')))))}}</td>
                    <td><button type="button" class="bt n btn-primary bt n-lg" data-toggle="modal" data-target="#myModal{{$v->od_id}}">
                           查看
                        </button></td>
                </tr>
                <div class="modal fade" id="myModal{{$v->od_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">订单详情</h4>
                            </div>
                            <div class="list-inline">
                                <dt>收货人信息</dt>
                                <dd>
                                <span>收件人：</span>{{$v->addressname}}<br/>
                                <span>地址详情：</span>{{$v->add_detail}}<br/>
                                <span>电话：</span>{{$v->phone}}
                                </dd>
                                <dt>商品信息</dt>
                                <dd>
                                    <span>商品名称：</span>{{$v->shopname}}&nbsp
                                    <span>单价：</span>{{$v->price}}&nbsp
                                    <span>数量：</span>{{$v->num}}
                                </dd>
                                <dd>
                                    <ul class="list-inline btn_ul">
                                        <li><a role="button" class="btn btn-success btn-sm" href="/orders/delete?od_id={{$v->od_id}}">删除订单</a></li>
                                    </ul>
                                </dd>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        {{--分页--}}
        <div style="float: right;">{!! $shops->render() !!}</div>
    </div><!--end container-->
    <script>
        //定时隐藏提示信息
        setTimeout(function(){
            $(".one").hide();
        },2000);
    </script>
@endsection
