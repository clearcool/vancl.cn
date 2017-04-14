@extends('home.shoppage.layout.index')
@section('middle')
<div class="row">
    <div id="successMessage" class="alert alert-success alert-dismissable" style="display:none">
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$shop->shopname}}
                <a href="/usergoods/detailadd?id={{$shop->s_id}}"><button class="btn btn-default" type="button">添加详情</button></a>
                <button class="btn btn-default" type="button">返回</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>缩略图</th>
                                <th>颜色</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($goods as $k=>$v)
                            <tr>
                                <td>{{$v->sd_id}}</td>
                                <td>                            
                                    @foreach($v->goodsurl as $i=>$j)
                                    <img float="left" width="60" src="/uploads/goods/{{ $j }}">
                                    @endforeach                         
                                </td>
                                <td>{{$v->color}}</td>
                                <td>
                                    <a href="/usergoods/detailsadd?id={{$v->sd_id}}"><button class="btn btn-default" type="button">添加库存</button></a>
                                    <button class="btn btn-default" type="button">查看库存</button>
                                    <button class="delsd btn btn-default" type="button">删除</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                商品库存图
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>颜色</th>
                                <th>尺码</th>
                                <th>库存</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $k=>$v)
                            <tr>
                                <td>{{$v->ss_id}}</td>
                                <td>{{$v->color}}</td>
                                <td>{{$v->size}}</td>
                                <td>{{$v->stock}}</td>
                                <td>
                                    <a href="/usergoods/detailedit?id={{$v->ss_id}}"><button class="btn btn-default" type="button">修改</button>
                                    <button class="delss btn btn-default" type="button">删除</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
 setTimeout(function(){ 
    $('#successMessage').hide();
  },3000);

 //删除详情
$('.delsd').click(function(){
    //获取id
    var id = $(this).attr('sdid');
    var links = $(this);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    //发送ajax
    $.post('/usergoods/delsd',{id:id},function(data){
        if(data == 1){
          //获取提醒信息
          $('#successMessage').text('删除成功').show(1000);
          setTimeout(function(){
            $('#successMessage').hide(1000);
          },2000);
          links.parents('tr').remove();
        }else{
            $('#successMessage').text('删除失败，该颜色有库存').show(1000);
          setTimeout(function(){
            $('#successMessage').hide(1000);
          },2000);
        }
    });
    return false;
});

//删除库存
$('.delss').click(function(){
    //获取id
    var id = $(this).attr('ssid');
    var links = $(this);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    //发送ajax
    $.post('/usergoods/delss',{id:id},function(data){
        if(data == 1){
          //获取提醒信息
          $('#successMessage').text('删除成功').show(1000);
          setTimeout(function(){
            $('#successMessage').hide(1000);
          },2000);
          links.parents('tr').remove();
        }
    });
    return false;
});
</script>
@endsection