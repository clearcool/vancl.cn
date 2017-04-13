<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>分类列表</title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../css/style.css" />
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
      <div class="panel-heading">商品管理/分类列表</div>
      <table class="table table-hover text-center">
          <tr>
            <th class="text-center">分类名称</th>
            <th class="text-center">分类排序</th>
            <th class="text-center">是否显示</th>
            <th class="text-center">下级分类</th>
            <th class="text-center">操作</th>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
          <tr>
            <td>婴幼食品</td>
            <td>0</td>
            <td>是</td>
            <td><a href="#">查看</a></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">编辑</button><button type="button" class="btn btn-danger btn-xs delete" onClick="return confirm('确认删除？')">删除</button></td>
          </tr>
      </table>
    </div><!--end panel panel-info-->
    <ul class="pagination">
      <li><a href="#">&laquo;</a></li>
      <li class="active"><a href="#">1<span class="sr-only">(current)</span></a> </li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul><!--end pagination-->
  </div><!--end container text-center--> 
  <!--弹出层 模态框-->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">当前位置：分类列表>>编辑
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
        </div><!--end modal-header-->
        <div class="modal-body">
          <form role="form" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">上级分类</label>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-xs-3">
                  <select class="form-control">
                    <option>请选择分类</option>
                    <option>分类1</option>
                    <option>分类2</option>
                    <option>分类3</option>
                    <option>分类4</option>
                  </select>
                </div> 
                <div class="col-xs-3"> 
                  <select class="form-control">
                    <option>请选择分类</option>
                    <option>分类1-1</option>
                    <option>分类1-2</option>
                    <option>分类1-3</option>
                    <option>分类1-4</option>
                  </select>
                </div>
              </div><!--end row-->
            </div><!--end col-sm-10-->
          </div><!--end form-group--> 
          <div class="form-group">
            <label class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-3">
              <input type="text" name="name" class=" form-control" required />
            </div>
          </div><!--end form-group-->
          <div class="form-group">
            <label class="col-sm-2 control-label">分类排序</label>
            <div class="col-sm-3">
              <input type="number" name="order" class="form-control" />
            </div>
          </div><!--end form-group-->
          <div class="form-group">
            <label class="col-sm-2 control-label">是否显示</label>
            <div class="col-sm-5">
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 显示
              </label>
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 不显示
              </label>
            </div>
          </div><!--end form-group-->
          <div class="form-group text-center">
            <button type="submit" class="btn btn-info">保存</button>
          </div><!--end form-group text-center-->
        </form>
        </div><!--end modal-body-->
      </div><!--end modal-content-->
    </div><!--end modal-dialog modal-lg-->
  </div><!--end modal fade bs-example-modal-lg-->
  <script src="../../js/jquery-1.8.3.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
