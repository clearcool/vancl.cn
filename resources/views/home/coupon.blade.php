@extends('home.layout.index')
@section('style')
    <link href="/homecss/person/css/cpstyle.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    .c-limit,.c-time,.label,.txt{font-size:15px;}
   .range-item .txt{position: relative; left:45px;}
   .op-btns .btn .txt{position: relative;top:-5px;}
   .coupon-item-d{margin:20px;}
   #tishi{
    width:120px;
    height: 60px;
    line-height:60px;
    text-align:center;
    font-size:14px;
    border-radius:10px;
    position: fixed;
    top:50%;
    left:50%;
    z-index:99;
    display:none;
    font-family:"微软雅黑";
   }
    </style>
@endsection
@section('lb')
<div id="tishi"></div>
<span class="blank10"></span> 
  <div style="margin: 0 auto;" class=""> 
   <span class="selectareali"></span> 
   <div class="sr_contation"> 
    <div class="sr_left" id="vjiaTop"> 
     <div class="breadnav"> 
      <div class="locationdiv"> 
       <span>当前位置：</span>
       <a href="">所有分类</a> &gt;

       <span>优惠劵</span>
      </div>
      </div> 
      </div>
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">

<div class="coupon-items">
    @foreach($coupon as $k=>$v)
    <div class="coupon-item coupon-item-d">
        <div class="coupon-list">
            <div class="c-type">
                
                <div class="c-price">
                    <strong>￥{{$v->denomination}}</strong>
                </div>
                <div class="c-limit">
                    【消费满&nbsp;{{$v->min_price}}元&nbsp;可用】
                </div>
                <div class="c-time">有效期限:{{$v->effective/86400}}天</div>
                <div class="c-type-top"></div>

                <div class="c-type-bottom"></div>
            </div>

            <div class="c-msg">
                <div class="c-range">
                    <div class="range-all">
                        <div class="range-item">
                            <span class="label">券&nbsp;余&nbsp;量：</span>
                            <span class="txt">{{$v->sheets}}</span>
                        </div>
                    </div>
                </div>
                <div class="op-btns">
                    <a href="" id="{{$v->c_id}}" class="btn"><span class="txt">立即领取</span></a>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
     </div>
     </div>
@endsection

@section('js')
 <script type="text/javascript">
$('.btn').live('click',function(){
  var id=$(this).attr('id');
    $.get('/home/receive',{id:id},function(data){
        switch(data){
          case "0":
          $('#tishi').addClass('alert-danger').html('请登录后领取').show().fadeOut(3000);
          break;
          case"1":
          $('#tishi').addClass('alert-danger').html('您已经领过，请去查看').show().fadeOut(3000);
          break;
          case"2":
          $('#tishi').addClass('alert-success').html('领取成功！').show().fadeOut(3000);
          break;
        }
    });
    return false;
      });
  </script>
@endsection
