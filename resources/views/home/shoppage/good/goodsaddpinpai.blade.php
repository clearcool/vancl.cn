<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>添加品牌</title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../css/style.css" />
<style>
.swfupload {position:absolute;top:0;left:0;}
</style>
</head>
<body>
  <div class="navbar navbar-default" role="navigation">
    <div class="container">
      <a class="navbar-brand user-control" href="#">控制面板</a>
      <ul class="nav  nav-pills" role="tablist">
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">订单管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../list/list.html">订单列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">待处理</li>
            <li><a href="../list/list-daifukuan.html">待付款订单</a></li>
            <li><a href="../list/list-daifahuo.html">待发货订单</a></li>
            <li><a href="../list/list-daituikuan.html">待退款订单</a></li>
            <li><a href="../list/list-daituihuan.html">待退换货订单</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">商品管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="goods-add.html">添加商品</a></li>
            <li><a href="goods-list.html">商品列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">商品分类</li>
            <li><a href="goods-addfenlei.html">添加分类</a></li>
            <li><a href="goods-listfenlei.html">分类列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">商品品牌</li>
            <li><a href="goods-addpinpai.html">添加品牌</a></li>
            <li><a href="goods-listpinpai.html">品牌列表</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">用户管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">会员管理</li>
            <li><a href="../user/user-list.html">会员列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">会员等级</li>
            <li><a href="../user/user-addlevel.html">添加会员等级</a></li>
            <li><a href="../user/user-leverlist.html">会员等级列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">管理员</li>
            <li><a href="../user/user-manageradd.html">添加管理员</a></li>
            <li><a href="../user/user-managerlist.html">管理员列表</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">财务管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">待处理财务</li>
            <li><a href="../finance/finance-fukuandingdan.html">待确认付款订单</a></li>
            <li><a href="../finance/finance-tuikuandingdan.html">待确认退款订单</a></li>
            <li><a href="../finance/finance-tuikuanshangpin.html">待确认退款商品</a></li>
            <li><a href="../finance/finance-daijinquan.html">待处理购买代金券</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">财务报表</li>
            <li><a href="../finance/finanace-dingdancaiwu.html">订单财务报表</a></li>
            <li><a href="../finance/finance-yonghuyue.html">用户余额报表</a></li>
            <li><a href="../finance/finance-yuemingxi.html">用户余额明细报表</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">营销管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">活动管理</li>
            <li><a href="../sale/sale-activeadd.html">添加活动</a></li>
            <li><a href="../sale/sale-activelist.html">活动列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">优惠券管理</li>
            <li><a href="../sale/sale-youhuiadd.html">添加优惠券</a></li>
            <li><a href="../sale/sale-youhuilist.html">优惠券列表</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">网站管理 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../web/web-setting.html">基本设置</a></li>
            <li class="dropdown-header">网站导航</li>
            <li><a href="../web/web-navadd.html">添加导航</a></li>
            <li><a href="../web/web-navlist.html">导航列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">文章分类</li>
            <li><a href="../web/web-addfenlei.html">添加分类</a></li>
            <li><a href="../web/web-fenleilist.html">分类列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">文章管理</li>
            <li><a href="../web/web-paraadd.html">添加文章</a></li>
            <li><a href="../web/web-paralist.html">文章列表</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">区域管理</li>
            <li><a href="../web/web-areaadd.html">添加区域</a></li>
            <li><a href="../web/web-arealist.html">区域列表</a></li>
          </ul>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">数据统计 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../count/count-user.html">用户数据</a></li>
            <li><a href="../count/count-goods.html">商品数据</a></li>
            <li><a href="../count/count-list.html">订单数据</a></li>
            <li><a href="../count/count-finance.html">财务数据</a></li>
          </ul>
        </li>
        <div class="btn-group navbar-right">
          <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span> 李朝辉 <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">修改密码</a></li>
            <li class="divider"></li>
            <li><a href="/" target="_blank">网站首页</a></li>
            <li><a href="#">清除缓存</a></li>
	        <li><a href="#">随机销量</a></li>
			<li><a href="#" target="_blank">自动收货</a></li>
            <li class="divider"></li>
            <li><a href="#">安全退出</a></li>
          </ul>
        </div>
      </ul><!--end nav nav-pills-->
    </div><!--end container-->
  </div><!--end navbar navbar-default navbar-fixed-top-->
  <div class="container text-center">
    <div class="panel panel-info text-left">
      <div class="panel-heading">商品管理/添加品牌</div>
      <div class="panel-body">
        <form role="form" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">品牌名称</label>
            <div class="col-sm-5">
              <input type="text" name="name" class=" form-control" required />
            </div>
          </div><!--end form-group-->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">品牌LOGO</label>
            <div class="col-sm-5">
              <div class="brand_thumb pull-left" data="0">
                <img src="../image/no_image.png" class="img-thumbnail" style="width:120px; height:60px;">
                <p></p>
                <input type="hidden" id="brand_logo" class="form-control" name="brand[file_id]" value="0">
              </div>
              <p class="text-muted" style="margin-top:20px;">尺寸：125 * 60像素</p>
              <object id="SWFUpload_0" type="application/x-shockwave-flash" data="../js/swfUpload/swfupload.swf" width="125" height="60" class="swfupload"><param name="wmode" value="transparent"><param name="movie" value="../js/swfUpload/swfupload.swf"><param name="quality" value="high"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="flashvars" value="dd"></object>
            </div><!--col-sm-5-->
          </div><!--end form-group-->
          <div class="form-group">
            <label class="col-sm-2 control-label">是否推荐</label>
            <div class="col-sm-5">
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 是
              </label>
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 否
              </label>
            </div>
          </div><!--end form-group-->
          <div class="form-group text-center">
            <button type="submit" class="btn btn-info">添加</button>
          </div><!--end form-group text-center-->
        </form>
      </div><!--end panel-body-->
    </div><!--end panel panel-info text-left-->
  </div><!--end container text-center--> 
  <script src="../../js/jquery-1.8.3.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/swfUpload/swfupload.js"></script>
  <script>
$(function($){
    var swfupload = new SWFUpload({
        flash_url : '../js/swfUpload/swfupload.swf',
        upload_url: 'http://haipai.com/admin/upload/brand',
        button_image_url : '../image/no_image.png',
        file_post_name: 'file',
        //post_params : {"admin_id":14},
        file_size_limit : '5120',
        file_types : '*.jpg;*.jpeg;*.png',
        file_queue_limit : 1,
        file_dialog_complete_handler : fileDialogComplete,
        upload_progress_handler : uploadProgress,
        upload_success_handler : uploadSuccess,
        upload_error_handler : uploadError,
        button_placeholder_id : 'swfplace',
        button_height: 60,
        button_width: 125,
        button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
        button_cursor: SWFUpload.CURSOR.HAND,
    });
});
var fileDialogComplete = function (numFilesSelected, numFilesQueued) {
    this.startUpload();
};

var uploadSuccess = function (file, data) {
    var result = jQuery.parseJSON(data);
    if (result.error == 1) {
        alert(result.message);
    }
    $('.brand_thumb').find('p').hide();
    $('#brand_logo').val(result.file_id);
    $('.brand_thumb').find('img').attr('src', result.url);
};

var uploadError = function (file, errorCode, message) {
    alert(message);
};

var uploadProgress = function (file, bytesLoaded, bytesTotal) {
    var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);
    $('.brand_thumb').find('p').show().text('上传 '+percent+'%');
};
</script>
</body>
</html>