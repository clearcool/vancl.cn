@extends('home.layout.index')
@section('style')

    <style type="text/css">

        .topad
        {
            margin: 0 auto;
            width: 980px;
        }
        .full .topad .narrow
        {
            display: none;
        }
        .topad .narrow
        {
            display: block;
            width: 980px;
        }
        .full .topad .wide
        {
            display: block;
        }
        .topad .wide
        {
            display: none;
            width: 1200px;
        }

        /*焦点图及公共样式*/
        .slider2016-container,#rslides2016{height: 601px;overflow: hidden;width: 1200px;margin:0 auto;position:relative;}
        #rslides2016{}
        .rslides1_nav{position:absolute;top: 280px;cursor: pointer;height: 63px;width: 28px;z-index: 100;}
        .rslides1_nav.prev{background: url(./homecss/zhuye/img/cslef.png) no-repeat scroll 0px 0px;left: 0;}
        .rslides1_nav.next{background: url(./homecss/zhuye/img/csrig.png) no-repeat scroll 0px 0px;right: 0;}
        .commondefault2016{width:1200px;margin:0 auto;}

        /*导航*/
        .nautilus_subnav{ width:1200px; height:50px; border-bottom:1px solid #c7c7c7; margin:0px auto ;background:#fbfbfb; }
        .nautilus_subnav ul{ float:left;}
        .nautilus_subnav ul li{ float:left; margin-right:85px; font-size:14px; line-height:50px;}
        .nautilus_subnav ul li a:link,.nautilus_subnav ul li a:visited{ color:#676767;}
        .nautilus_subnav ul li a:hover{ color:#ca0000;}
        .nautilus_subnav .vanclcon{ float:right;}
        .nautilus_subnav .vanclcon,.nautilus_subnav .vanclcon a{ display:block; width:75px; height:50px;}
        .nautilus_subnav_two{ border-top:1px solid #c7c7c7;}
        .nautilus_subnav_two ul li{ margin:0px 75px 0px 20px; font-family:微软雅黑; color:#F00;}
        .nautilus_subnav_two ul li.none{ margin:0px 0px 0px 20px;}
        .nautilus_subnav_two_1 ul li{ margin:0px 75px 0px 20px; font-family:微软雅黑; color:#F00;}
        .nautilus_subnav_two_1 ul li.none{ margin:0px 0px 0px 20px;}
        .nautilus_subnav_two_1{
            font-family:微软雅黑;
            position:fixed;
            width:1200px;
            height:50px;
            z-index:9999;
            background-color:#fbfbfb;

            top:0px;
            _position:absolute;
            _bottom:0px;
            _top:expression(eval(document.documentElement.scrollTop));
        }
        /*商品列表*/
        .list-title-img{width:1200px;margin:0 auto;}
        .shirts-product-list{width:1200px;margin:0 auto;}
        .shirts-product-list li{background: #FFF; margin: 20px 15px 45px 20px;width: 260px; height: 260px;float: left;}
        .shirts-product-list li .tit,.shirts-product-list li .price{display:block;}
        .shirts-product-list li .tit{height: 17px;line-height: 17px;text-align: center;color: #676767; font-weight: bold; background: #ffffff;text-align:center;overflow: hidden;margin-top:5px;}
        .shirts-product-list li .price{font-size: 13px;font-family: "微软雅黑";color: #b80001;line-height: 25px;text-align:center;padding:8px;}
        .line-through{text-decoration:line-through;}
        .shirts-product-list .product-img{position:relative;}
        .shirts-product-list .product-img h3{    position: absolute; right: 0; bottom: 10px; background: #A10000; color: #fff; font-size: 15px; font-family: microsoft yahei; height: 45px; width: 45px; text-align: center; border-radius: 50%; padding: 5px;}
        .buy2_half_point{ width: 45px;  height: 45px;  position: absolute; left: 200px; top: -254px;}
        .shirt-list0926a ul li,.shirt-list_fbx ul li,.shirt-listxxx ul li{ position:relative;}
        .shirt-list0926a .buy2_half_point{ display:none;}
        .buy2_half_pointa{ width: 33px;  height: 23px;  position: absolute; left: 10px; top: 10px;}
        .catalog_half_pointa{ width: 33px;  height: 23px;  position: absolute; left: 10px; top: 10px;}
        .catalog_half_pointfbx{ width:50px; height: 50px;  position: absolute; left: 10px; top: 10px;}
        .catalog_half_pointxxx{ width:50px; height: 50px;  position: absolute; left: 10px; top: 10px;}

        .shirt-list1009 .buy2_half_point{ display:none; }

        .channelContent2016 img{transition: 0.2s all linear;-webkit-transition:0.2s all linear;}
        .channelContent2016 img:hover{-webkit-box-shadow: 0 15px 30px rgba(0,0,0,0.1); box-shadow: 0 15px 30px rgba(0,0,0,0.1); -webkit-transform: translate3d(0, -2px, 0); transform: translate3d(0, -2px, 0); }
        .vjiaIcon
        {
            display: none;
        }
        .Mprice
        {
            display: none;
        }
        .msTipjJ03
        {
            display: none;
        }
        .vjiaproductlist
        {
            display: none;
        }
        #vjiaproducts
        {
            display: none;
        }
        .presale
        {
            background: url(/homecss/zhuye/img/presale.png) no-repeat;
            bottom: 0;
            height: 50px;
            position: absolute;
            right: 0;
            width: 50px;
        }
        .searchCol ul li.jiageHover
        {
            text-align: left;
        }
        .shirts-product-list .product-img h3{position: absolute;right: 0px;bottom: 110px;background: #A10000 none repeat scroll 0% 0%;
            color: #FFF;font-size: 15px;font-family: microsoft yahei;height: 60px;width: 60px;text-align: center;
            border-radius: 50%;padding: 5px;
        }
    </style>
    <!--headlist结尾-->
    @endsection
@section('lb') 
<div style="right: 10px; bottom: 10px; position: fixed; z-index: 9999; display: none;"><a href="#"><div style="cursor: pointer;background-image:url(http://i.vanclimg.com/channel/list2013/go2top.png);background-color:transparent;background-repeat:no-repeat;width:25px;height:90px"></div></a></div>
    <div id="Head">


    <!--  content  -->
    <div class="channelContent2016">
        <!--  菜单导航 S  -->
        <div id="nautilus_subnav" class="nautilus_subnav nautilus_subnav_two">
  <ul>
    <li><b><a style="color: rgb(103, 103, 103);" href="#xfdy">西服大衣</a></b></li>
    <li><b><a style="color: rgb(103, 103, 103);" href="#wyjk">卫衣夹克</a></b></li>
    <li><b><a style="color: rgb(103, 103, 103);" href="#fkyrf">羽绒服</a></b></li>
    <li><b><a style="color: rgb(103, 103, 103);" href="#fkpfy">凡客皮肤衣</a></b></li>
    <li class="none"><b><a style="color: rgb(103, 103, 103);" href="" target="_blank">全部</a></b></li>
  </ul>
</div>
<table align="center" border="0" width="0">
  <tbody><tr>
    <td><a href="" target="_blank"><img src="/homecss/zhuye/img/wtad01.jpg" alt="凡客棉夹克 意式立领 收纳帽" height="708" width="380"></a></td>
    <td><img src="/homecss/zhuye/img/wt-hd_12.jpg" alt="" height="708" width="31"></td>
   <td><a href="" target="_blank"><img src="/homecss/zhuye/img/wtad02.jpg" alt="凡客羊毛西服 MOON 英伦人字纹" height="708" width="380"></a></td>
   <td><img src="/homecss/zhuye/img/wt-hd_12.jpg" alt="" height="708" width="31"></td>
    <td><a href="" target="_blank"><img src="/homecss/zhuye/img/wtad03.jpg" alt="凡客羽绒服智能温控 连帽" height="708" width="380"></a></td>
  </tr>
</tbody></table>
<table align="center" border="0" width="0">
  <tbody><tr>
  	<td><a href="" target="_blank"><img src="/homecss/zhuye/img/wtad04.jpg" alt="凡客卫衣 基础拉链开衫" height="708" width="380"></a></td>
    <td><img src="/homecss/zhuye/img/wt-hd_12.jpg" alt="" height="708" width="31"></td>
    <td><a href="" target="_blank"><img src="/homecss/zhuye/img/2wyy5g9yg.jpg" alt="凡客羊毛西服 意式修身暗格纹" height="708" width="380"></a></td>
    <td><img src="/homecss/zhuye/img/wt-hd_12.jpg" alt="" height="708" width="31"></td>
    
    <td><a href="" target="_blank"><img src="/homecss/zhuye/img/wtad06.jpg" alt="凡客羊毛大衣 强缩绒 DUFFEL" height="708" width="380"></a></td>
  
  </tr>
</tbody></table>
        <!--  广告列表 E  -->
        <!--  商品列表 S  -->
        <div id="xfdy"></div>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="0">
  <tbody>
    <tr>
      <td><img original="/homecss/zhuye/img/161012xf1.jpg" alt="西服" src="/homecss/zhuye/img/161012xf1.jpg" style="display: inline;" height="60" width="1200"></td>
    </tr>
  </tbody>
</table>
<div class="shirt-list">
    <ul class="shirts-product-list">
         <li><a href="" class="product-img" target="_blank" title="2017 春款 凡客西服 棉麻针织 舒爽透气 男.."><img alt="2017 春款 凡客西服 棉麻针织 舒爽透气 男.." src="/homecss/zhuye/img/6375482-1j201703031450116086.jpg"></a><a title="2017 春款 凡客西服 棉麻针织 舒爽透气 男.." class="tit" href="">2017 春款 凡客西服 棉麻针织 舒爽透气 男..</a><span class="price">售价 ￥599</span></li>
            <li><a href="" class="product-img" target="_blank" title="2017 春款 凡客羊毛西服 针织毛边 弹力修.."><img alt="2017 春款 凡客羊毛西服 针织毛边 弹力修.." src="/homecss/zhuye/img/6375421-1j201611211542464258.jpg"></a><a title="2017 春款 凡客羊毛西服 针织毛边 弹力修.." class="tit" href="">2017 春款 凡客羊毛西服 针织毛边 弹力修..</a><span class="price">售价 ￥999</span></li>
    </ul>
    <div class="blank20"></div>
 </div>
<div id="ymdy"></div>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="0">
  <tbody>
    <tr>
      <td><img original="/homecss/zhuye/img/161012ymdy1.jpg" alt="羊毛大衣" src="/homecss/zhuye/img/161012ymdy1.jpg" style="display: inline;" height="60" width="1200"></td>
    </tr>
  </tbody>
</table>
<div class="shirt-list shirt-list0926a">
    <ul class="shirts-product-list">
             <li><a href="" class="product-img" target="_blank" title="凡客羊绒西服 手工双面呢 男款 黑色"><img alt="凡客羊绒西服 手工双面呢 男款 黑色" src="/homecss/zhuye/img/6375437-1j201611010845211356.jpg"><h3 class="youhui"><span class="tehui">特惠</span><span class="sprice">￥999</span></h3></a><a title="凡客羊绒西服 手工双面呢 男款 黑色" class="tit" href="">凡客羊绒西服 手工双面呢 男款 黑色</a><span class="price line-through">售价 ￥1,699</span><img src="/homecss/zhuye/img/new3323.png" class="catalog_half_pointa"></li>
             <li><a href="" class="product-img" target="_blank" title="凡客羊绒大衣 手工双面呢 意式立领 男款 .."><img alt="凡客羊绒大衣 手工双面呢 意式立领 男款 .." src="/homecss/zhuye/img/6375438-1j201611010839109374.jpg"><h3><span class="tehui">特惠</span><span class="sprice">￥1,199</span></h3></a><a title="凡客羊绒大衣 手工双面呢 意式立领 男款 .." class="tit" href="">凡客羊绒大衣 手工双面呢 意式立领 男款 ..</a><span class="price line-through">售价 ￥1,999</span><img src="/homecss/zhuye/img/new3323.png" class="catalog_half_pointa"></li> 
    </ul>
    <div class="blank20"></div>
 </div>

<div style="height:50px"></div>
<div id="wyjk"></div>
        <!--  商品列表 E  -->
        
    </div>
</div>
    <script type="text/JavaScript" src="./js/js_003.ashx"></script>
   <script>
   
    </script>
<div id="arrowicon" class="ico" style="display:none;z-index:1002"></div><div id="popup" style="position:absolute;z-index:1001;height:499px"></div>     
@endsection