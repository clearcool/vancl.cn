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

       <span>{{$search}}</span>
      </div> 
     </div> 
     <div class="selectarea"> 
      <div class="typearea"> 
       <div class="autoheightcontrol  selectareali01
 clearfix" toggle="0" style=""> 
        <div class="selectareaLeft"> 
         <em>{{$search}}</em> 
        </div> 
        <div class="selectareaRight  autoheight" loadattribute="false"> 
         <ul> 
          <li> <a class="track" name="s-s-filter_cat-27545" href=""> <span>{{$search}}(126)</span> </a> </li> 
         </ul> 
        </div> 
       </div> 
       <span class="selectareali_a" toggle="0" style=""></span> 
      </div> 
      <div class="selectkinds"> 
       
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
        </div> 
        
        <div class="hbDpBox"> 
         <ul> 
          <li class="hblist hblistHover"> <a href="" name="s_browsetype_1" class="track">全部商品</a> </li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
  
 <span class="blank15"></span>
  <div class="pruarea pruarea0124" id="vanclproducts"  style="color:red;"> 
     @foreach($searchshop as $k=>$v)
      <ul > 
       <li class="scListArea borCdbd7d6 productwrapper border"> 
        <div pop="6375836" class="pic" time="20170322200552"> 
         <a href="/home/details?id={{$v->s_id}}" class="track" name="s-s-k_rs__4b027f1187744664931c0e13c6c1398a_07739bec6018c084-1_1-6375836_Sort01_qb_000-v" title="{{$v->shopname}}" target="_blank"> <img style="display: block;" src="{{$v->picurl}}" class="productPhoto" original="{{$v->picurl}}" alt="{{$v->shopname}}" height="230" width="230" /> </a>
         <div class="presale"></div> 
         <div class="vancllist_logo"></div> 
       <p> <span style="color: #b81c22;font-weight: bolder;">【热售】</span> <a href="" class="track" name="" title="{{$v->shopname}}" target="_blank">{{$v->describe}}</a> </p> 
        <div class="Mpricediv0124"> 
         @if($v->sname=='Vancl')
                        <span class="shopname">自营</span>
                           @else <a href="/home/shop?id={{$v->us_id}}"><span class="shopname">{{$v->sname}}</span></a>
                                @endif
          <span class="preSprice">售价￥<strong style="font-weight: bold;">{{$v->price}}</strong></span> 
        </div>
         </div> 
         </li> 
      </ul> 
      @endforeach
      </div> 
     <span class="blank0"></span> 
     <span class="blank25"></span> 
   
      <div  style="margin-left:1030px;"> 
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
