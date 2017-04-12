@extends('home.layout/index')
@section('style')
    <title>飞翔购物车</title>
    <link rel="stylesheet" href="/homecss/xiangqing/css/css_002.css">
    <link rel="stylesheet" href="/homecss/xiangqing/css/css_002.css">
    <link rel="stylesheet" href="/homecss/xiangqing/css/css_002.css">

    <style type="text/css">.SpriteColors{background-image: url(/homecss/xiangqing/img/joinimages.ashx.jpg); width:36px; height:36px; display:inline-block;float:left;}</style>
    <!-- {{--<script type="text/javascript" src="/homecss/xiangqing/js/ld.js"></script>--}} -->
    <style type="text/css">
        body{
            margin: 0px;
            padding: 0px;}
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
        .danpin_colLef
        {
            /*background:#fc0;*/
            width:500px;
            height:500px;
        }

        .leftimg a
        {
            text-align:center;
            margin:auto 20px;
        }

        *{list-style:none;margin: 0;padding: 0;}
        #small{width: 400px;height: 400px;
            position: absolute;left: 220px;
        }
        #big{width: 400px;height: 400px;
            position: absolute;top:50px;left:510px;
            overflow:hidden;display: none;
        }
        #move{width: 100px;height: 100px;
            background: url(/uploads/goods/bg.png);
            position: absolute;top:0px;left: 0px;
            display:none;
        }
        #uimg{
            position: absolute;left:100px;

        }
        #uimg li{
            margin-top:10px;
            border:1px dashed red;margin-right: 5px;
        }
        #carnum
        {
            font-size:15px;
            color:white;
            background:#b81e20;
            border-radius:50%;
        }

        .licolor
        {
            border:1px solid black;
            text-align:center;
            width:60px;
            float:left;
            height:30px;
            line-height:30px;
            margin-right:10px;
        }
        .licolor:hover
        {
            border:1px solid red;
        }
        .selectArea
        {
            border:0px;
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
             <a href="{{url('/home/head?name=')}}{{$type->stname}}" title="{{$type->pname}}"> {{$type->pname}}</a>
             <span>&gt;</span>
             <a href="{{url('/home/list?id=')}}{{$type->st_id}}" title="{{$type->tname}}"> {{$type->tname}}</a>
             <span>&gt;</span>
             <span id="styleinfo" name="1067365">{{$shop->shopname}}</span>
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
                     <h2 title="【预售】{{$type->describe}}"> <span style="color:#A10000">【预售】</span>{{$type->describe}} <span></span></h2>
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

        <div id="leftbox" class="danpin_colLef">
             <div>
                 <ul id="uimg">
                     @foreach($picc[0]['goodsurl'] as $k=>$v)
                         <li><img class="limg" src="{{$v}}" alt="" width="80px"></li>
                     @endforeach
                 </ul>
             </div>
             <div id="small">
                 <img id="simg" src="{{$picc[0]['goodsurl'][0]}}" width="100%">
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
      <span class="tehuiMoney" style="line-height: 26px;">  <span> 售价：</span><span style="font-family: '微软雅黑';">￥<strong>{{$shop->price}}</strong></span> </span>
                         <a href="//" target="_blank" style="float: left;
                    height: 26px; display: inline-block; margin-left: 200px; line-height: 26px; margin-top: 7px;
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
                             <div>
                                 <ul>
                                         @foreach($stock as $k=>$v)
                                         <a href="#"><li id="{{$shop->s_id}}" class="licolor">{{$k}}</li></a>
                                         @endforeach
                                 </ul>
                             </div>
                         </div>
                         <span class="blank20"></span>
                         <div class="selSizeArea">
                             <div class="danpinColorTitle">
                                 <p> 尺码：</p>
                             </div>
                             <div class="selSize">
                                 <ul id="sizeul">
                                     @foreach($stock[$picc[0]['color']] as $k=>$v)
                                     <li class="lisize"> <p> {{$v->size}}</p> </li>
                                     @endforeach
                                 </ul>
                             </div>
                             <div class="danpin_xuanzeGMcm" style="display:none;">
                                 <span style="height: 16px; display: block; width: 16px; background-position: -1911px 0pt; margin: 2px;float: left; " class="sprites"></span>
                                 <p> 请选择您要购买的商品颜色和尺码</p>
                             </div>
                         </div>
                         <span class="blank10"></span>
                         <div class="blank8ie">
                         </div>
                         <div class="goodsNum">
                             <div class="danpinColorTitle" style="line-height: 18px;">
                                 <p> 数量：</p>
                             </div>
                             <div class="danpinnumSelect">
                                <form id="ff" method="post" action="{{url('/pay/dobuy')}}">
                                 <select name="gnum" id="selectedAmount"> <option selected="selected" value="1"> 1</option> <option value="2"> 2</option> <option value="3"> 3</option> <option value="4"> 4</option> <option value="5"> 5</option> <option value="6"> 6</option> <option value="7"> 7</option> <option value="8"> 8</option> <option value="9"> 9</option> <option value="10"> 10</option> </select>
                                 <span class="blank15"></span>
                             </div>
                             <span>&nbsp;库存:</span><span id="stock">{{$num}}</span>
                         </div>
                         <div class="AreaItotal SelectGoods">
                             <div class="SelectAreaItotal SelectGoods">
                                 <div class="goodsAddArea SelectGoods">
                                     <div class="goodsAdd">
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
                             .lisize p
                             {
                                 height:10px;
                             }
                             .lijidingzhiR span
                             {
                                 display: block;
                                 font-size: 20px;
                                 font-weight: bold;
                                 color: white;
                             }
                             .dobuy
                             {
                                 cursor:pointer;
                                 float:left;
                                 text-align:center;
                                 background:#F7ABAF;
                                 height:30px;
                                 line-height:30px;
                                 font-family:"微软雅黑";
                                 color:#B81D25;
                                 font-size:16px;
                                 border:1px solid #B81D25;
                                 width:180px;
                             }
                             .addcar
                             {
                                 float:left;
                                 text-align:center;
                                 background:#B81D25;
                                 height:30px;
                                 line-height:30px;
                                 margin-top:-30px;
                                 margin-left:220px;
                                 font-family:"微软雅黑";
                                 color:white;
                                 font-size:16px;
                                 border:1px solid #B81D25;
                                 width:180px;
                             }
                             #tishi
                             {
                                 width:100px;
                                 height:40px;
                                 line-height:40px;
                                 display:none;
                                 border-radius: 10px;
                                 position:fixed;
                                 text-align:center;
                                 left:50%;
                                 top:50%;
                             }
                         </style>
                         <div  id="tishi"></div>
                         <div class="shoppingNews">

                                 <input type="hidden" id="idd" name="id" value="">
                                 <input type="hidden" id="gnum" name="num" value="">
                                 {{ csrf_field() }}
                                 <button class="dobuy">直接购买</button>
                             </form>

                             <a href=""><span class="addcar">加入购物车</span></a>
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
         <script type="text/javascript" src=""></script>
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
 <center>
 <table id="cpcm" align="center" border="0"> 
         <tbody> 
          <tr class="firstRow"> 
           <td><img alt="" original="/homecss/xiangqing/img/1090426ccx23_08.jpg" width="1200" height="314" src="./凡客T恤 長場 雄 23 白色 - VT 男款 短袖VT - VANCL 凡客诚品_files/1090426ccx23_08.jpg" style="display: block;" /> </td>
          </tr>
         </tbody>
        </table> 
        <p></p> 
        <table align="center" border="0"> 
         <tbody> 
          <tr class="firstRow"> 
           <td><img alt="" original="/homecss/xiangqing/img/1090426ccx23_09.jpg" width="1200" height="314" src="./凡客T恤 長場 雄 23 白色 - VT 男款 短袖VT - VANCL 凡客诚品_files/1090426ccx23_09.jpg" style="display: block;" /> </td>
          </tr>
         </tbody>
        </table> 
        <p></p> 
        <table id="xdby" align="center" border="0"> 
         <tbody> 
          <tr class="firstRow"> 
           <td><img alt="" original="/homecss/xiangqing/img/1090426ccx23_12.jpg" width="1200" height="391" src="./凡客T恤 長場 雄 23 白色 - VT 男款 短袖VT - VANCL 凡客诚品_files/1090426ccx23_12.jpg" style="display: block;" /> </td>
          </tr>
         </tbody>
        </table> 
       </div> 
       <a id="feedback"></a> 
      </div> 
     </div> 
     <span class="blank20"></span> 
     <div class="RsetTabCon"> 
      <div class="productPinglun"> 
      
       <div style="width: 464px; float: left"> 
        <div id="yushouMainS"> 
        </div> 
       </div> 
       <div> 
        
         <a id="anchorPinglun">&nbsp;</a> 
         
         <div class="NewComment"> 
          
          <div class="pinglunContent" style="margin-left: 34px;"> 
           <div class="NewCommentDetail"> 
           </div> 
          </div> 
         </div> 
         <input id="StyleID" value="1066737" type="hidden" /> 
         <a id="anchorQuiz">&nbsp;</a> 
        </div> 
        <div class="productQuiz "> 
         <span class="blank20"></span> 
         <div class="area3 root" name="1"> 
          <h2 class="hotTitle" style="position: static; top: 0px; left: 0px; height: 40px;
        line-height: 40px; padding: 0px 0px 0px 25px; border-bottom: 1px solid #b4b4b4;"> <span>最新评论</span> <span class="zuixinpinglunnum">(共<strong id="quizcount">1</strong>条)</span> 
           <div class="pinglunTabRig " style="line-height: 40px; width: 120px; height: 33px;
            float: right; padding: 0px; margin-top: 3px; *margin-top:-38px; margin-right: 32px;  border-top: 0px dotted #b4b4b4;"> 
            <span id="tiwen"><a name="item-item-quiz-mine" href="" style="width: 120px; height: 33px;
                background-color: #d46a6a; color: #fff; display: block; vertical-align: middle;
                float: right; line-height: 33px;"><span style="line-height:33px;">商品评论</span></a> <a href="" name="quiz"> </a></span> 
           </div> </h2> 
          <div class="area3Head" style="display: none;"> 
           <span  class="area3Sp01"> 
            <div class="sprites" style="width: 14px; height: 14px;"> 
            </div> </span>
           <span class="zuixinpingluntitle">最新提问</span> 
           <span class="zuixinpinglunnum">(共<strong id="quizcount">1</strong>条)</span> 
           <span id="tiwen"><a class="danpinBtnStyle track" name="item-item-quiz-mine" href=""><span>我要提问</span></a> <a href="" name="quiz"></a></span> 
          </div> 
          <div id="stylequestionslist"> 
          @foreach($shop_comment as $ks=>$vs)
           <div class="area3Con"> 
            <div class="areaquestion" style="border-top: 0px dotted #b4b4b4;"> 
             <span class="blank20"></span> 
             <div class="userQuesArea"> 
              <h4> <span class="danpinQ fl">Q</span>{{$vs->username}}：</h4> 
              <h5> {{$vs->commenttime}}<a href="" class="showfile track myReply" name="item-item-quiz-reply" onclick="return false">我要回复<span>(0)</span></a></h5> 
             </div> 
             <div class="questionTitle">
               {{$vs->content}}
             </div> 
             <span class="blank30"></span> 
             <h6 style="display: none;"> 管理员45040<span>回答：</span></h6> 
             <p class="adminAsk"> <span class="danpinA fl">A</span> {{$vs->backcomment}}</p> 
            </div> 
            <span class="blank15"></span> 
            <div style="display: none;" class="notesNewpl"> 
            </div> 
           </div> 
           @endforeach
          </div> 
          <div id="stylequestionsPager" class="area2Page"> 
           <div class="area2Page"> 
            <ul> 
             <li class="track" name="item-item-quiz-page_1"><strong>1</strong></li> 
            </ul> 
           </div> 
          </div> 
          <div class="act0703Link04" style="display: none;"> 
           <a href="" target="_blank">查看全部问答&gt;&gt;</a>
          </div> 
         </div> 
         </center>
     @endsection

      @section('dddh')
         <div class="m-sidebar">
            <div class="cart">
                <a href="/cart">
                    <i id="end">
                    </i>
                    <span>购物车</span>
                    <div id="carnumdiv"><span id="carnum">{{$carnum}}</span></div>
                </a>
            </div>
                 <div onclick="javascript:document.getElementById('headerTopArea').scrollIntoView()"  id="huiding"><span>返回顶部</span></div>
             </a>
        </div>
         
    @endsection
    @section('js')
     <script type="text/javascript">

            //加入购物车
            $(".addcar").click(function (e) {
                var offset = $("#end").offset();
                var addcar = $(this);
                var id=$('.on').attr('id');
                if(id){
                    var num=$('#selectedAmount').val();
                    $.get('/cart/addcar',{id:id,num:num},function(data){
                        switch(data)
                        {
                            case '1':
                                $('#tishi').addClass('alert-danger').html('该商品库存不足').show().fadeOut(3000);
                                break;
                            case '2':
                                $('#tishi').addClass('alert-success').html('添加成功').show().fadeOut(3000);
                                //动画
                                var img = $('#simg').attr('src');
                                var flyer = $('<img class="u-flyer" src="' + img + '">');
                                flyer.fly({
                                    start: {
                                        left: e.clientX,
                                        top: e.clientY
                                    },
                                    end: {
                                        left: offset.left + 10,
                                        top: offset.top + 10,
                                        width: 0,
                                        height: 0
                                    },
                                    onEnd: function () {
                                        $("#msg").show().animate({width: '250px'}, 200).fadeOut(1000);
                                        this.destory();
                                    }
                                });
                                break;
                            case '3':
                                $('#tishi').addClass('alert-success').html('添加成功').show().fadeOut(3000);
                                //动画
                                var img = $('#simg').attr('src');
                                var flyer = $('<img class="u-flyer" src="' + img + '">');
                                flyer.fly({
                                    start: {
                                        left: e.clientX,
                                        top: e.clientY
                                    },
                                    end: {
                                        left: offset.left + 10,
                                        top: offset.top + 10,
                                        width: 0,
                                        height: 0
                                    },
                                    onEnd: function () {
                                        $("#msg").show().animate({width: '250px'}, 200).fadeOut(1000);
                                        this.destory();
                                    }
                                });
                                var n=parseInt($('#carnum').html());
                                $('#carnum').html(n+1);
                                break;
                        }
                    })
                }else{
                    $('.danpin_xuanzeGMcm').css('display','block');
                    return false;
                };




                return false;
            });

        //颜色
        $('.licolor').click(function(){
            $(this).parent().siblings().children('li').css('border','1px solid black');
            $(this).css('border','1px solid red');
            var color =$(this).html();
            var id=$(this).attr('id');
            $.get('/home/pic',{color:color,id:id},function(data){
                $('#uimg').empty();
                for($i=0;$i<=data.length-1;$i++)
                {
                $str='<li><img class="limg" src="'+data[$i]+'" alt="" width="80px"></li>';
                $('#uimg').append($str);
                }
                $('#small').empty();
                $('#small').append('</div><img id="simg" src="'+data[0]+'" width="100%"> </div>');
            });
            $.get('/home/size',{color:color,id:id},function(data){
                $('#sizeul').empty();
                for($i=0;$i<=data.length-1;$i++)
                {
                    $('#sizeul').append(' <li a='+data[$i]['stock']+' class="lisize"> <p id='+data[$i]["id"]+' class="pst">'+data[$i]['size']+'</p> </li>');
                }
            });
            $('.pst').live('click',function(){
                $('.danpin_xuanzeGMcm').css('display','none');
                $(this).parent().siblings().css('border','1px solid #c8c8c8');
                $(this).parent().siblings().children('p').removeClass('on');
                $(this).addClass('on');
                $(this).parent().css('border','1px solid red');
                $('#stock').html($(this).parent().attr('a'));
                $('#idd').val($(this).attr('id'));
//                $('#gnum').val($('#selectedAmount').val());
            })

            return false;
        });

        //直接购买
        $('.dobuy').click(function()
        {
                var id=$('.on').attr('id');
                if(!id)
                {
                    $('.danpin_xuanzeGMcm').css('display', 'block');
                    return false;
                }else{
                    var num = $('#selectedAmount').val();
                    if (num > parseInt($('#stock').html())) {
                        $('#tishi').addClass('alert-danger').html('该商品库存不足').show().fadeOut(3000);
                        return false;
                    }
                }
        });
        //单击换大图
        $('.limg').live('click',function()
        {
            $(this).parent().siblings().css('border','1px dashed red');
            $(this).parent().css('border','1px solid red');
            $('#simg').attr('src',$(this).attr('src'));
        });

    </script>
    @endsection