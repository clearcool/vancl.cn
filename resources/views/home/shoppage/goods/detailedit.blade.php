@extends('home.shoppage.layout.index')
@section('middle')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            修改商品库存
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form role="form" action="/usergoods/update" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>商品名称：</label>
                            <input type="hidden" name="ss_id" value="{{$stocks->ss_id}}">
                            <input type="hidden" class="form-control-static" name="s_id" value="{{$stocks->s_id}}">{{$stocks->shopname}}</input>
                        </div>
                        <div class="form-group">
                            <label>商品颜色：</label>
                            <input type="hidden" class="form-control" name="sd_id" value="{{$stocks->sd_id}}">{{$stocks->color}}
                        </div>
                        <div class="form-group">
                            <label>商品尺码：</label>&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="hidden" class="form-control" value="{{$stocks->size}}" name="size">{{$stocks->size}}
                        </div>
                        <div class="form-group">
                            <label>商品库存：</label>
                            <input type="text" name="stock" id="" placeholder="{{$stocks->stock}}" value="{{$stocks->stock}}" class="form-control">
                        </div>
                        <button class="btn btn-default" type="submit">保存</button>
                        <button class="btn btn-default" type="reset">重置</button>
                        <input class="btn btn-default" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;" onclick="javascript:history.back();" />
                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
 setTimeout(function(){ 
    $('#successMessage').hide();
  },3000);
</script>
@endsection