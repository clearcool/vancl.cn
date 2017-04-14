@extends('home.shoppage.layout.index')
@section('middle')
    {{--错误的提示信息要放到相应位置--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger one" style="margin-left:;position: absolute;float: left; margin-left: 700px; margin-top: -65px;">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
        </div>
    @endif

    {{--成功提示信息--}}
    @if(session('success'))
        <div class="alert alert-success one" style="margin-left:;position: absolute;float: left; margin-left: 700px; margin-top: -65px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="container text-center">
        <div class="panel panel-info text-left">
            <div class="panel-heading">订单管理/待发货订单</div>
            <div class="panel-body">
            </div><!--end panel-body-->
        </div><!--end panel panel-info-->
        <table class="table table-hover table-bordered text-center">
            <tr>
                <th class="text-center">商品ID</th>
                <th class="text-center">商品名称</th>
                <th class="text-center">商品照片</th>
                <th class="text-center">商品描述</th>
                <th class="text-center">单价</th>
                <th class="text-center">销量</th>
                <th class="text-center">好评</th>
            </tr>
            <tr>
                <td>{{$shop->s_id}}</td>
                <td>{{$shop->shopname}}</td>
                <td><img style="width: 40px;height: 40px;" src="{{$shop->picurl}}"/></td>
                <td>{{$shop->describe}}</td>
                <td>{{$shop->price}}</td>
                <td>{{$shop->Sales}}</td>
                <td>{{$shop->praise}}</td>
            </tr>
        </table>
        <table class="table table-hover table-bordered text-center">
            <tr>
                <th class="text-center">评论ID</th>
                <th class="text-center">用户名</th>
                <th class="text-center">头像</th>
                <th class="text-center">电话</th>
                <th class="text-center">评论</th>
                <th class="text-center">回复评论</th>
            </tr>
            @foreach($detail as $k=>$v)
                <tr>
                    <td>{{$v->cm_id}}</td>
                    <td>{{$v->username}}</td>
                    <td>@if($v->pic != '')
                            <img style="width:50px;height:50px;" src="{{$v->pic}}"/>
                        @else
                        @endif
                    </td>
                    <td>{{$v->userphone}}</td>
                    <td>{{$v->content}}<br/>
                        @if($v->commenttime != '')
                            评论时间:{{date('Y-m-d H:i:s',$v->commenttime)}}
                        @else
                        @endif
                    </td>
                    <td>{{$v->backcomment}}<br/>
                        @if($v->commenttime != '')
                        <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal{{$v->cm_id}}">
                           编辑
                        </a>
                        @else
                        @endif
                    </td>
                </tr>
                <form action="/orders/huifu" method="post">
                    {{--防止跨站攻击--}}
                    {{ csrf_field() }}
                <div class="modal fade" id="myModal{{$v->cm_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">回复买家</h4>
                            </div>
                            <div class="list-inline">
                                <textarea name="backcomment" cols="50" rows="10"></textarea>
                                <input type="hidden" name="cm_id" value="{{$v->cm_id}}"/>
                                <dd>
                                    <ul class="list-inline btn_ul">
                                       <input type="submit" value="提交" role="button" class="btn btn-success btn-sm"/>
                                    </ul>
                                </dd>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            @endforeach
        </table>
        {{--分页--}}
        {{--{!! $detail->appends("a")->render() !!}--}}
    </div><!--end container-->
    <script>
        //定时隐藏提示信息
        setTimeout(function(){
            $(".one").hide();
        },2000);
    </script>
@endsection
