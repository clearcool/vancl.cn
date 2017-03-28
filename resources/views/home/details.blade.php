@extends('home.layout/index')
@section('style')
    <title>飞翔购物车</title>
    <script src="/homecss/xiangqing/js/push.js"></script>
    <link rel="stylesheet" href="/homecss/xiangqing/css/css.css">
    <link rel="stylesheet" href="/homecss/xiangqing/css/css_002.css">
    <style type="text/css">.SpriteColors{background-image: url(/homecss/xiangqing/img/joinimages.ashx.jpg); width:36px; height:36px; display:inline-block;float:left;}</style>
    <script type="text/javascript" src="/homecss/xiangqing/js/js.ashx"></script>
    <script src="/homecss/xiangqing/js/ld.js" type="text/javascript"></script>
    <script src="/homecss/xiangqing/js/cloud-zoom.1.0.2.min.js" type="text/javascript"></script>
    <style>
        .m-sidebar{position: fixed;top: 0;right: 0;border:1px solid #cdcdcd;background: #eee;z-index: 2000;width: 35px;height: 100%;font-size: 12px;color: #fff;}
        .cart{color: #fff;text-align:center;line-height: 20px;height:85px;margin: 200px 0 0 0px;}
        .cart span{display:block;width:20px;margin:0 auto;}
        .cart i{width:35px;height:25px;display:block; background:url(/homecss/zhuye/img/gouwuche.png) no-repeat center center;}
        .u-flyer{display: block;width: 50px;height: 50px;border-radius: 50px;position: fixed;z-index: 9999;}
        #box{width:1000px;margin:auto;}

        .cloud-zoom-lens {
            border: 4px solid #888;
            margin:-4px;	/* Set this to minus the border thickness. */
            background-color:#fff;
            cursor:move;
        }

        .cloud-zoom-title {
            font-family:Arial, Helvetica, sans-serif;
            position:absolute !important;
            background-color:#000;
            color:#fff;
            padding:3px;
            width:100%;
            text-align:center;
            font-weight:bold;
            font-size:10px;
            top:0px;
        }

        .cloud-zoom-big {
            border:4px solid #ccc;
            overflow:hidden;
        }

        .cloud-zoom-loading {
            color:white;
            background:#222;
            padding:3px;
            border:1px solid #000;
        }

        .leftimg a
        {
            text-aliign:center;
            margin:auto 20px;
        }
    </style>
@endsection

@section('lb')
    <body>

     <div class="danpinBox">
         <input id="CustomerMade" value="NoMade" type="hidden" />
         <a name="top"></a>
         <span class="blank10"></span>
         <div class="breadNav">
             <a href="{{url('/')}}" title="首页" name="nav"> 首页</a>
             <span>&gt;</span>
             <a href="{{url('/')}}" title="男装"> 男装</a>
             <span>&gt;</span>
             <a href="{{url('/')}}" title="夹克"> 夹克</a>
             <span>&gt;</span>
             <input id="mainCategories" value="27531,27549" type="hidden" />
             <span id="styleinfo" name="1067365"> 针织夹克 轻弹复古 男款</span>
         </div>
         <span class="blank0"></span>
         <div class="danpinArea">
             <div id="ProductTitleShow" class="danpinTitleTab newclear">
                 <style type="text/css">
                     #ProductTitleShow #productTitle .brandNumArea
                     {
                         display: none;
                     }
                 </style>
                 <div id="productTitle">
                     <div class="brandNumArea">
                         <span id="productcode">商品编号：6375735</span>
                     </div>
                     <h2 title="【预售】2017 春款 针织夹克 轻弹复古 男款 墨绿色"> <span style="color:#A10000">【预售】</span>2017 春款 针织夹克 轻弹复古 男款 墨绿色</h2>
                     <ul class="ProductSubnav fr" id="ItemTag">
                         <li><a href="#gmzn">购买指南</a>|</li>
                         <li><a href="#mtdp">模特搭配</a>|</li>
                         <li><a href="#xdby">洗涤保养</a>|</li>
                         <li><a href="#anchorPinglun">评论</a>|</li>
                         <li><a href="#anchorQuiz">提问</a></li>
                     </ul>
                 </div>
             </div>
         </div>
    <span class="bank30"></span>
     <div style="height:30px;"></div>

     <div class="danpin_colLef">
         <div class="danpinLeft">
             <div class="smallImg">
                 <div class="smallImgUp upper" style="visibility: hidden"></div>
                 <div class="leftimg">
                     <a href='/homecss/xiangqing/img2/bigimage00.jpg' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '/homecss/xiangqing/img2/smallimage.jpg' ">
                         <img src="/homecss/xiangqing/img2/tinyimage.jpg" alt = "Thumbnail 1"/>
                     </a>
                     <a href='/homecss/xiangqing/img2/bigimage01.jpg' class='cloud-zoom-gallery' title='Thumbnail 2' rel="useZoom: 'zoom1', smallImage: '/homecss/xiangqing/img2/smallimage-1.jpg'">
                         <img src="/homecss/xiangqing/img2/tinyimage-1.jpg" alt = "Thumbnail 2"/>
                     </a>

                     <a href='/homecss/xiangqing/img2/bigimage02.jpg' class='cloud-zoom-gallery' title='Thumbnail 3' rel="useZoom: 'zoom1', smallImage: '/homecss/xiangqing/img2/smallimage-2.jpg' ">
                         <img src="/homecss/xiangqing/img2/tinyimage-2.jpg" alt = "Thumbnail 3"/>
                     </a>
                 </div>
                 <div class="smallImgDown downer" style="visibility: hidden"></div>
             </div>
         </div>

         <div class="danpinColCenter">
             <div id="main">
                 <div class="demo">
                     <a class="cloud-zoom" id="zoom1" href="/homecss/xiangqing/img2/bigimage00.jpg" rel="adjustX: 10, adjustY:-4, softFocus:true">
                         <img src="/homecss/xiangqing/img2/smallimage.jpg" title="123" alt="" />
                     </a>
                 </div>
             </div>

         </div>
     </div>

         <div id="danpinRight" class="danpinRight" style="top: 0px; display: block;">
             <div class="danpinfixedtitle">
                 <h4 class="fl"> 加入购物车 </h4>
                 <span class="close1 fr"></span>
             </div>
             <div class="danpinFixedLeftContent">
                 <img id="danpinFixedLeftContentImg" src="/homecss/xiangqing/img/6375735-1j201703161122076681.jpg" title="" alt="" />
             </div>
             <div class="danpinFixedRightContent">
                 <div name="Normal" id="pricearea">
                     <input id="shopid" value="10258" type="hidden" />
                     <input id="hidattr" value="0" type="hidden" />
                     <span class="blank10"></span>
                     <style type="text/css">
                         .priceLayout
                         {
                             color: Black !important;

                         }
                         .priceLayout1
                         {
                             position: relative;
                             top: 1px;
                             margin-right: -5px;
                             margin-left: -5px;
                             *margin-right: 0px !important;
                             *margin-left: 0px !important;
                         }
                         .priceLayout2
                         {
                             position: relative;
                             top: 2px;
                         }

                         .tehuipricelayout
                         {
                             *position: relative;
                             *top: 13px;
                         }
                         .tehuipricelayout1
                         {
                             *position: relative;
                             *top: 14px;
                         }
                         .tehuipricelayout2
                         {
                             *top: -1px;
                         }
                     </style>
                     <input id="hidyue" value="False" type="hidden" />
                     <input id="Hidden1" value="True" type="hidden" />
                     <div class="cuxiaoPrice ">
      <span class="tehuiMoney" style="line-height: 26px;"> <span style="color: black;">原价：</span><span style="font-family: '微软雅黑'; color: black;">￥</span><span style="color: black;">
        <s>
          399.00
        </s></span> <span> 预售价：</span><span style="font-family: '微软雅黑';">￥<strong>319.00</strong></span> &nbsp; 定金：<span style="font-family: '微软雅黑';">￥</span><span><strong>19.00</strong></span> </span>
                         <a href="http://cz.vancl.com/DepositPre.aspx" target="_blank" style="float: left;
                    height: 26px; display: inline-block; margin-left: 20px; line-height: 26px; margin-top: 7px;
                    color: #a10000;">充100返100，点击充值</a>
                     </div>
                     <span class="blank10"></span>
                 </div>
                 <div class="selectArea">
                     <div class="selColorArea">
                         <span class="blank10"></span>
                         <a id="colorlist"></a>
                         <div class="danpinColor_Select">
                             <div class="danpinColorTitle" style="line-height: 18px;">
                                 <p> 颜色：</p>
                             </div>
                             <div class="selColor">
                                 <ul>
                                     <li class="" name="6375734" title="黑色">
                                         <div class="colorBlock" name="False">
                                             <a class="track" name="item-item-select-color_1" href=""> <span class="SpriteColors" style="background-position: 0px -0px">&nbsp;</span> <p> 黑色</p> </a>
                                         </div> </li>
                                     <li class="" id="onlickColor" name="6375735" title="墨绿色">
                                         <div class="colorBlock" name="False">
                                             <a class="track" name="item-item-select-color_2" href=""> <span class="SpriteColors" style="background-position: 0px -36px">&nbsp;</span> <p> 墨绿色</p> </a>
                                         </div> <span class="colorHoverok"></span> </li>
                                     <li name="6375736" title="黄色">
                                         <div class="colorBlock" name="False">
                                             <a class="track" name="item-item-select-color_3" href=" "> <span class="SpriteColors" style="background-position: 0px -72px">&nbsp;</span> <p> 黄色</p> </a>
                                         </div> </li>
                                 </ul>
                             </div>
                         </div>
                         <div class="selSizeArea">
                             <div class="danpinColorTitle">
                                 <p> 尺码：</p>
                             </div>
                             <div class="selSize">
                                 <ul>
                                     <li onclick="ChooseThisSize(this,'15772239',10)" name="15772239"> <p> M</p> </li>
                                     <li onclick="ChooseThisSize(this,'15772240',10)" name="15772240"> <p> L</p> </li>
                                 </ul>
                             </div>
                             <div class="danpin_xuanzeGMcm" style="display:none;">
                                 <span style="height: 16px; display: block; width: 16px; background-position: -1911px 0pt; margin: 2px;float: left; " class="sprites"></span>
                                 <p> 请选择您要购买的商品尺码</p>
                             </div>
                         </div>
                         <div class="blank8ie">
                         </div>
                         <div class="goodsNum">
                             <div class="danpinColorTitle" style="line-height: 18px;">
                                 <p> 数量：</p>
                             </div>
                             <div class="danpinnumSelect">
                                 <select id="selectedAmount"> <option selected="selected" value="1"> 1</option> <option value="2"> 2</option> <option value="3"> 3</option> <option value="4"> 4</option> <option value="5"> 5</option> <option value="6"> 6</option> <option value="7"> 7</option> <option value="8"> 8</option> <option value="9"> 9</option> <option value="10"> 10</option> </select>
                                 <span id="comeon" class="LastNum">余量有限</span>
                                 <span class="blank15"></span>
                             </div>
                         </div>
                         <span class="blank0"></span>
                         <div class="AreaItotal SelectGoods">
                             <div class="SelectAreaItotal SelectGoods">
                                 <div class="goodsAddArea SelectGoods">
                                     <div class="danpinColorTitle">
                                         <p class="SelectDetail"> 已选：</p>
                                     </div>
                                     <div class="goodsAdd">
                                         <p class="SelectName">墨绿色</p>
                                         <span style="display: none;" class="SelectPoint">，</span>
                                         <p style="display: none;" class="SelectSize"> </p>
                                         <p class="NowHasGoods"> 现在有货</p>
                                         <span class="blank0"></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <style type="text/css">
                             .lijidingzhiG
                             {
                                 background: #B4B4B4;
                                 width: 166px;
                                 height: 40px;
                                 display: block;
                                 float: left;
                                 margin-right: 13px;
                                 border: solid 1px #675D5D;
                                 text-align: center;
                                 line-height: 40px;
                             }
                             .lijidingzhiG span
                             {
                                 display: block;
                                 font-size: 20px;
                                 font-weight: bold;
                                 color: white;}
                             .lijidingzhiR
                             {
                                 background: #A50309;
                                 width: 166px;
                                 height: 40px;
                                 display: block;
                                 float: left;
                                 margin-right: 13px;
                                 line-height: 40px;
                                 border: solid 1px rgb(183, 27, 33);
                                 text-align: center;
                             }
                             .lijidingzhiR span
                             {
                                 display: block;
                                 font-size: 20px;
                                 font-weight: bold;
                                 color: white;
                             }
                             }
                         </style>
                         <div class="shoppingNews">
                             <a id="nowbuy" name="item-item-select-shopping" href="#" class="btnnowbuy track"><span>立即购买</span></a>
                             <a id="addToShoppingCar" name="item-item-select-shopping" href="#" class="btnaddtocart track addcar"></a>
                         </div>
                         <span class="blank20"></span>
                     </div>
                     <div class="blank0">
                     </div>
                 </div>
                 <div id="promotion">
                     <div class="danpin_YhTsBox danpin_YhTsTab">
                         <h4> <span>优惠提示</span> </h4>
                         <ul>
                             <li style="background: none; padding: 0px;">全场购物满199免运费</li>
                         </ul>
                     </div>
                 </div>
                 <div class="blank15">
                 </div>
             </div>
         </div>
         <script type="text/JavaScript" src="/"></script>
         <div id="reshouMainH">
         </div>
         <input id="hdCategoryCode" value="1319" type="hidden" />
         <span class="blank20"></span>
         <div class="sideBarSettabArea">
             <div class="RsetTabArea">
                 <div id="product_set">
                 </div>
                 <div id="floatposition"></div>
                 <span class="blank8"></span>
             </div>
         </div>

 </div>

     {{--<div id="box" class="row">--}}

        {{--<div class="col-sm-6 col-md-10">--}}
            {{--<div class="thumbnail">--}}
                {{--<img width="100px" src="/homecss/zhuye/img/04.jpg" alt="...">--}}
                {{--<div class="caption">--}}
                    {{--<h3>Thumbnail label</h3>--}}
                    {{--<p>...</p>--}}
                        {{--<p><a href="#" class="btn btn-primary">直接购买</a>--}}
                            {{--<a href="#" class="btn btn-danger addcar">加入购物车</a>--}}
                        {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
      @section('dh')
         <div class="m-sidebar">
            <div class="cart">
                <a href="">
                    <i id="end">
                        <span>1</span>
                    </i>
                    <span>购物车</span>
                </a>
            </div>
             <a  href="javascript:;" onclick="javascript:document.getElementById('headerTopArea').scrollIntoView()">
                 <div id="huiding"><span>返回顶部</span></div>
             </a>
        </div>
       @endsection
    @endsection
    @section('js')
    <script>
        $(function() {
            var offset = $("#end").offset();
            $(".addcar").click(function (event) {
                var addcar = $(this);
                var img = addcar.parent().parent().parent().find('img').attr('src');
                var flyer = $('<img class="u-flyer" src="' + img + '">');
                flyer.fly({
                    start: {
                        left: event.pageX,
                        top: event.pageY
                    },
                    end: {
                        left: offset.left + 10,
                        top: offset.top + 10,
                        width: 0,
                        height: 0
                    },
                    onEnd: function () {
                        $("#msg").show().animate({width: '250px'}, 200).fadeOut(1000);
//                        addcar.css("cursor","default").removeClass('orange').unbind('click');
                        this.destory();
                    }
                });
                return false;
            });
        });
    </script>
    @endsection