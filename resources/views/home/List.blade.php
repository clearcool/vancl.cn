@extends('home.layout.index')
@section('lb')
<span class="blank10"></span> 
  <div style="margin: 0 auto;" class=""> 
   <span class="selectareali"></span> 
   <div class="sr_contation"> 
    <div class="sr_left" id="vjiaTop"> 
     <div class="breadnav"> 
      <div class="locationdiv"> 
       <span>当前位置：</span>
       <a href="">所有分类</a> &gt;

       <span>{{$titletype}}</span>
      </div> 
      <div class="tsmsg">
       找到和
       <span>义</span>相关商品
       <span>19</span>款
      </div> 
     </div> 
     <div class="selectarea"> 
      <div class="typearea"> 
       <div class="autoheightcontrol  selectareali01
 clearfix" toggle="0" style=""> 
        <div class="selectareaLeft"> 
         <em>{{$titletype}}</em> 
        </div> 
        <div class="selectareaRight  autoheight" loadattribute="false"> 
         <ul> 
          <li> <a class="track" name="s-s-filter_cat-27545" href=""> T恤<span>({{$shopsales}})</span> </a> </li> 
         </ul> 
        </div> 
       </div> 
       <span class="selectareali_a" toggle="0" style=""></span> 
      </div> 
      <div class="selectkinds"> 
       <span class="blank10"></span> 
       <div class="colorarea"> 
        <h2> <span>颜色：</span> 
         <div class="colorlist"> 
          <ul> 
           <li class="hovera"> <a class="s_color0 track" name="s-s-filter_col-all" href=""></a> </li> 
           <li> <a class="s_color1 track" name="s-s-filter_col-black" href="" title="黑色"></a></li> 
            <li> <a class="s_color3 track" name="s-s-filter_col-gray" href="" title="灰色"></a></li> 
           <li> <a class="s_color4 track" name="s-s-filter_col-pink" href="" title="粉色"></a></li> 
           <li> <a class="s_color5 track" name="s-s-filter_col-red" href="" title="红色"></a></li> 
           <li> <a class="s_color6 track" name="s-s-filter_col-yellow" href="" title="黄色"></a></li> 
           <li> <a class="s_color7 track" name="s-s-filter_col-blue" href="" title="蓝色"></a></li> 
           <li> <a class="s_color8 track" name="s-s-filter_col-green" href="" title="绿色"></a></li> 
           <li> <a class="s_color9 track" name="s-s-filter_col-brown" href="" title="棕色"></a></li> 
           <li> <a class="s_color10 track" name="s-s-filter_col-purple" href="" title="紫色"></a></li> 
           <li> <a class="s_color11 track" name="s-s-filter_col-variety" href="" title="花色"></a></li>
          </ul> 
         </div> </h2> 
       </div> 
       <span class="blank10"></span> 
      </div> 
     </div> 
     <div id="recommendkeywords" style="display: none; height: 0px; width: 100%; overflow: hidden;"> 
     </div> 
     <div id="floatposition" style="margin-bottom: 15px"> 
     </div> 
     <div id="floatdiv" style="background-color: White; z-index: 80; position: static; top: 0px;"> 
      <div class="filterTabBarN5"> 
       <ul class="searchTabbarN5"> 
        <li class="hover"><a class="track" name="s-s-link-all" href="">全部商品</a></li> 
       </ul> 
       <div class="pageBoxN5"> 
        <div class="pagediv"> 
         <span>1/1</span> 
         <span> <a class="jquery_pager_prevpage jquery_pager_margintop11" href="javascript:void(0)"></a> </span> 
         <span> <a class="jquery_pager_nextpage jquery_pager_margintop11" href="javascript:void(0)"></a> </span> 
        </div> 
       </div> 
      </div> 
      <div class="filterFormN5"> 
       <div class="filterForm0703"> 
        <div class="searchCol"> 
         <ul> 
          <li class="moren"> <a title="按推荐由高到低" name="s_order_27531_10" class="track" href="/home/list?id={{$id}}&&a=default"> <em>默认</em> <span class="upTrendBottom">按推荐由高到低</span></a></li> 
          <li class="xiaoliang"> <a title="按销量由高到低" name="s_order_27531_2" class="track" href="/home/list?id={{$id}}&&a=sole"> <em>销量</em> <span class="upTrendBottom">按销量由高到低</span></a></li> 
          <li class="haoping"> <a title="按评价从高到低" name="s_order_27531_5" class="track" href="/home/list?id={{$id}}&&a=praise"> <em>好评</em> <span class="upTrendBottom">按评价从高到低</span></a></li> 
          <li class="zuixin"> <a title="上架新品" name="s_order_27531_1" class="track" href="/home/list?id={{$id}}&&a=newtime"> <em>最新</em> <span class="BottomTrendUpRed">上架新品</span></a></li> 
           
         </ul> 
        </div> 
        
        <div class="hbDpBox"> 
         <ul> 
          <li class="hblist hblistHover"> <a href="" name="s_browsetype_1" class="track">合并同款</a> </li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
  
 <span class="blank15"></span>
  <div class="pruarea pruarea0124" id="vanclproducts"  style="color:red;"> 
     @foreach($shop as $k=>$v)
      <ul > 
       <li class="scListArea borCdbd7d6 productwrapper border"> 
        <div pop="6375836" class="pic" time="20170322200552"> 
         <a href="" class="track" name="s-s-k_rs__4b027f1187744664931c0e13c6c1398a_07739bec6018c084-1_1-6375836_Sort01_qb_000-v" title="{{$v->shopname}}" target="_blank"> <img style="display: block;" src="{{$v->picurl}}" class="productPhoto" original="{{$v->picurl}}" alt="2017 春款 凡客T恤 义 林冲 白色" height="230" width="230" /> </a> 
         <div class="presale"></div> 
         <div class="vancllist_logo"></div> 
       <p> <span style="color: #b81c22;font-weight: bolder;">【预售】</span> <a href="" class="track" name="" title="{{$v->shopname}}" target="_blank">{{$v->describe}}</a> </p> 
        <div class="Mpricediv0124"> 
          <span class="preSprice">{{ ($v->us_id)==0 ?'自营':''}}</span> 
          <span class="preSprice">预售价￥<strong style="font-weight: bold;">{{$v->price}}</strong></span> 
        </div>
         </div> 
         </li> 
      </ul> 
      @endforeach
      </div> 
     <span class="blank0"></span> 
     <span class="blank25"></span> 
   
      <div  style="margin-left:1030px;"> 
      {!! $shop->appends($all)->render() !!}
     </div> 
   </div>
   </div> 


  </div> 
@endsection

@section('js')
 <script type="text/javascript">
// $('.onmouse').mouseover(function(){
//     this.style.border="1px solid red";
// })
// $('.onmouse').mouseout(function(){
//     this.style.border="none";
// })
  </script>
@endsection
