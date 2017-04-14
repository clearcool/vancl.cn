@extends('home.shoppage.layout.index')
@section('middle')
<div class="col-lg-12">
    <div class="panel panel-default">
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
        @if(Session::has('success'))
        <div class="alert alert-danger"> {{Session::get('success')}} 
        </div> 
        @endif
        </div>
        <div class="panel-heading">
            添加商品详情
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
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