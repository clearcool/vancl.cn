<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link href="/homecss/zhuye/img/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">
    <!-- http://v3.bootcss.com/assets/css/docs.min.css -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    @section('style')
    @show
    <script src="/bootstrap/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <title>凡客VANCL-互联网快时尚品牌,服装,鞋,配饰,网上购物货到付款网站,7天无条件退货</title>
    <link rel="shortcut icon" href="homecss/zhuye/img/favicon.ico" type="image/x-icon"/>
    <link href="/homecss/zhuye/css/css.ashx" type="text/css" rel="stylesheet" charset="utf-8"/>
    <link href="/homecss/zhuye/css/css.ashx" type="text/css" rel="stylesheet" charset="utf-8"/>
    {{--<script src="/homecss/zhuye/js/push.js"></script>--}}
    <script type="text/javascript" src="/homecss/zhuye/css/js.ashx"></script>
    <script type="text/javascript" src="/homecss/zhuye/js/ld.js"></script>
    <script type="text/javascript" src="/homecss/zhuye/js/jquery.fly.min.js"></script>
    <link rel="stylesheet" href="/homecss/zhuye/css/css.css">

</head>
<body class="full">
<!--<script type="text/javascript">try{if (window.screen.width >= 1210 && $(document).width() >= 1228){window.document.body.className="full";} }catch(e){;}</script>-->
<div id="Head" class="vanclHead">
    <div id="headerTopArea" class="headerTopAreaBox">
        <div class="headerTopArea">
            <div class="headerTop">
                <div class="headerTopRight" style="width: 126px;">
                    <div class="active notice" id="vanclCustomer">
                        <a class="mapDropTitle" href="#" target="_blank">网站公告</a>
                    </div>

                </div>
                <div id="welcome" class="top loginArea">
                    您好,
                    <span class="top">欢迎光临凡客诚品！&nbsp;</span>
                    <span><a href="/login" name="hp-hp-head-signin-v:n" class="top track">登录</a> |
                            <a href="/register" name="hp-hp-head-register-v:n" class="track">注册</a>
                        </span>
                </div>
                <div class="headerTopLeft">
                    <div id="favorites" class="recommendArea">
                        <div>
                        <span id="xing" class="glyphicon glyphicon-star-empty"></span>
                        <a href="#" rel="nofollow" class="track" name="hp-hp-head-order-v:n">收藏夹</a>
                        </div>
                    </div>
                    <div id="gouwuche" class="recommendArea">
                        <div>
                            <a href="#" rel="nofollow" class="track" name="hp-hp-head-order-v:n">
                            <img src="/homecss/zhuye/img/gouwuche.png" alt="">
                            <span>购物车</span></a>
                        </div>
                    </div>
                    <div class="recommendArea">
                        <a href="#" rel="nofollow" class="track" name="hp-hp-head-order-v:n"> 我的订单</a>
                    </div>

                    <div id="buyercenter" class="recommendArea">
                        <div>
                            <span>
                                <a href="#" style="text-align:center;" class="track" name="hp-hp-head-order-v:n">卖家中心</a>
                            </span>

                        </div>
                    </div>
                </div>
                <span class="blank0"></span>
            </div>
        </div>
    </div>
    <!--顶部通栏广告位-->

    <div id="logoArea" class="vanclLogoSearch">
        <div class="vanclSearch fr">
            <div class="searchTab">

                <div id="ssd" class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" id="sss" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"></button>
          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rm" class="hotWord">
            <p> 热门搜索：<a name="hp-hp-classhotsearch-1_1-v:n" class="track" href="#" target="_blank">T恤</a>
                <a name="hp-hp-classhotsearch-1_2-v:n" class="track" href="#" target="_blank">免烫衬衫</a>
                <a name="hp-hp-classhotsearch-1_6-v:n" class="track" href="#" target="_blank">黑标</a>
                <a name="hp-hp-classhotsearch-1_3-v:n" class="track" href="#" target="_blank">羊毛大衣</a>
                <a name="hp-hp-classhotsearch-1_4-v:n" class="track" href="#" target="_blank">休闲裤</a>
                <a name="hp-hp-classhotsearch-1_5-v:n" class="track" href="#" target="_blank">户外鞋</a>
                <a name="hp-hp-classhotsearch-1_7-v:n" class="track" href="#" target="_blank">袜品</a></p>
        </div>

    </div>

</div>

<div class="navlist clear" id="mainNavBox" style="z-index:300!important;">
    <ul id="ful">
        <li class="track" name="hp-hp-head-nav_1-v:n" style="text-align: left;">
            <a href="#"><img id="weblogo" src="/homecss/zhuye/img/Vancl.png" alt=""/>
            </a>
        </li>
        <li style="margin-left:-50px;"><a href="#">首页</a><span class="NavLine"></span></li>
        @foreach($title as $k=>$v)
            <li>
                <a href="#" target="_blank">{{$k}}</a><span class="NavLine"></span>
                <div class="subNav" style="display: none;*postion:relative;*z-index:300;">
                    <span></span>
                    <ul>
                        @for($i=0;$i<count($v);$i++)
                            <a href="home/list?id={{$v[$i]->st_id}}" class="track" name="hp-hp-head-nav_1-{{ $i }}-v:n" target="_blank">{{ $v[$i]->stname }}</a><br><div style="width: 15px;height: 15px;"></div>
                        @endfor
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>


</div>
@section('lb')
    <div id="lb">
        <!-- 轮播 -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="./bootstrap/bannerImg/001.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item ">
                    <img src="./bootstrap/bannerImg/002.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item ">
                    <img src="./bootstrap/bannerImg/003.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item ">
                    <img src="./bootstrap/bannerImg/004.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item ">
                    <img src="./bootstrap/bannerImg/005.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>

                <div class="item ">
                    <img src="./bootstrap/bannerImg/006.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>

                <div class="item ">
                    <img src="./bootstrap/bannerImg/007.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <!-- <span class="sr-only">Previous</span> -->
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

@show

<div class="blank0"></div>
<div class="blank0" style="height:32px;"></div>


<div class="vanclFoot" style="margin-top:0px;">
    <div class="vanclCustomer publicfooterclear">
        <ul>
            <li><a href="#" rel="nofollow" target="_blank"><p class="onlineCustomer"><img
                                src="/homecss/zhuye/img/onlinecustomer.png" style="width:auto;height:auto;"/></p>
                    <p class="onlineTime"> 7X9小时在线客服</p></a></li>
            <li><a href="#" rel="nofollow" target="_blank"><p class="seven"><img src="/homecss/zhuye/img/seven.png"
                                                                                 style="width:auto;height:auto;"/></p>
                    <p> 7天内退换货</p>
                    <p> 购物满199元免运费</p></a></li>
            <li class="twocode"><p><img src="/homecss/zhuye/img/2014_8_29_16_39_33_7709.jpg"
                                        style="width: 104px; height: 104px;"/></p>
                <p> 扫描下载<em>凡客</em>客户端</p></li>
        </ul>
    </div>
    <div class="vanclOthers publicfooterclear">
        <ul id="didi">
            <li><a href="#" target="_blank">关于凡客</a></li>
            <li><a href="#" target="_blank">新手指南</a></li>
            <li><a href="#" target="_blank">配送范围及时间</a></li>
            <li><a href="#" target="_blank">支付方式</a></li>
            <li><a href="#" target="_blank">售后服务</a></li>
            <li class="none"><a href="#" target="_blank">帮助中心</a></li>
        </ul>
    </div>
</div>
<div id="footerArea" class="">
    <div class="footBottom">
        <div class="footBottomTab">
            <p> Copyright 2007 - 2016 vancl.com All Rights Reserved 京ICP证100557号 京公网安备11011502002400号
                出版物经营许可证新出发京批字第直110138号</p>
            <p> 凡客诚品（北京）科技有限公司</p>
        </div>
    </div>
    <span class="blank20"></span>
    <div class="subFooter">
        <a rel="nofollow" href="#" class="redLogo" target="_blank"></a>
        <span class="costumeOrg"></span>
        <a rel="nofollow" href="#" class="wsjyBzzx" target="_blank"></a>
        <a rel="nofollow" href="#" class="vanclMsg" target="_blank"></a>
        <a class="vanclqingNian" target="_blank" href="#" rel="nofollow"></a>
        <a href="#" style="display: inline-block;" target="_blank"><img style="width: 120px; height: 39px;"
         src="/homecss/zhuye/img/kexin_brand_for_others.png"/></a>
        <div class="blank0"></div>
    </div>
</div>
@section('dh')
<div id="gg">
    <a href="#" target="_blank">
        <div id="gg1"></div>
    </a>
    <a href="#" target="_blank">
        <div id="gg2"></div>
    </a>
    <a href="javascript:;" onclick="javascript:document.getElementById('headerTopArea').scrollIntoView()">
        <div id="gg3"></div>
    </a>
</div>
@show
<script type="text/javascript" src="/homecss/zhuye/js/xl.js"></script>
<div id="criteo-tags-div" style="display: none;">
</div>
    <script type="text/javascript">
       $('#gouwuche').hover(
           function(){
               $gwcdiv=$('<div id="gwcdiv">123456</div>');
               $('#gouwuche').addClass('gouwuche').append($gwcdiv);
           },
           function(){
               $('#gouwuche').removeClass('gouwuche').children('#gwcdiv').remove();
           }
           );
       $('#buyercenter').hover(
           function(){
               $buydiv=$('<div id="buydiv">' +
                   '<ul>' +
                       '<a href="#"><li>免费开店</li></a>' +
                       '<a href="#"><li>已卖出的宝贝</li></a>' +
                       '<a href="#"><li>出售中的宝贝</li></a>' +
                   '</ul>' +
                   '</div>');
               $('#buyercenter').addClass('buy').append($buydiv);
           },
           function(){
               $('#buyercenter').removeClass('buy').children('#buydiv').remove();
           }
       );
       $('#favorites').hover(
           function(){
               $favoritesdiv=$('<div id="favoritesdiv">' +
                   '<ul>' +
                   '<a href="#"><li>收藏宝贝</li></a>' +
                   '<a href="#"><li>收藏店铺</li></a>' +
                   '</ul>' +
                   '</div>');
               $('#favorites').addClass('favorite').append($favoritesdiv);
           },
           function(){
               $('#favorites').removeClass('favorite').children('#favoritesdiv').remove();
           }
       );
    </script>
   @section('js')
   @show
</body>
</html>