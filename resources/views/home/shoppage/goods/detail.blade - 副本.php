@extends('home.shoppage.layout.index')
@section('middle')
<div class="row">
    <div id="successMessage" class="alert alert-success alert-dismissable" style="display:none">
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$shop->shopname}}
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">添加详情</button>
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
                                    <button class="btn btn-default" type="button">添加库存</button>
                                    <button class="btn btn-default" type="button">查看库存</button>
                                    <button class="btn btn-default" type="button">删除</button>
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
                                    <button class="btn btn-default" type="button">修改</button>
                                    <button class="btn btn-default" type="button">删除</button>
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
<!--添加详情模态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:1px solid red;">添加详情</div>
            <div class="modal-body">
                <div id="successMessage" >
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger"> {{Session::get('error')}} 
                </div> 
                @endif
                </div>
                <form role="form" action="/usergoods/detailadd" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>商品名称：</label>
                        <input type="hidden" class="form-control-static" name="s_id" value="{{$shop->s_id}}">{{$shop->shopname}}</input>
                    </div>
                    <div class="form-group">
                        <label>商品颜色：</label>
                        <input class="form-control" placeholder="商品颜色" name="color" type="text">
                    </div>
                    <div class="form-group">
                        <label>商品图片：</label>
                        <input type="file" multiple name="goodsurl[]">
                    </div>
                    <button class="btn btn-default" type="submit">保存</button>
                    <button class="btn btn-default" type="reset">重置</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admincss/lib/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
 setTimeout(function(){ 
    $('#successMessage').hide();
  },3000);
</script>
@endsection