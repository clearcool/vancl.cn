@extends('home.layout.person')

@section('nr')
<div id="tishi"></div>
<div class="user-coupon">
    <!--标题 -->
<div class="am-cf am-padding">
<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">优惠券</strong> / <small>Coupon</small></div>
</div>
<hr/>

<div class="am-tabs-d2 am-tabs  am-margin" data-am-tabs>

<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
<li class="am-active"><a href="#tab1">可用优惠券</a></li>
<li><a href="#tab2">已用/过期优惠券</a></li>

</ul>

<div class="am-tabs-bd">
<div class="am-tab-panel am-fade am-in am-active" id="tab1">
<div class="coupon-items">
@foreach($coupon as $k=>$v)
    <div class="coupon-item coupon-item-d">
        <div class="coupon-list">
            <div class="c-type">
                <div class="c-class">
                    <strong>购物券</strong>
                </div>
                <div class="c-price">
                    <strong>￥{{$v->denomination}}</strong>
                </div>
                <div class="c-limit">
                    【消费满&nbsp;{{$v->min_price}}元&nbsp;可用】
                </div>
                <div class="c-time"><span>使用期限</span>{{date('Y-m-d',$v->starttime)}}--{{date('Y-m-d',$v->endtime)}}</div>
                <div class="c-type-top"></div>

                <div class="c-type-bottom"></div>
            </div>

            <div class="c-msg">
                <div class="c-range">
                    <div class="range-all">
                        <div class="range-item">
                            <span class="label">券&nbsp;编&nbsp;号：</span>
                            <span class="txt">{{$v->number}}</span>
                        </div>
                    </div>
                </div>
                <div class="op-btns">
                    <a  class="btn"><span class="txt">暂未使用</span><b></b></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
<div class="am-tab-panel am-fade" id="tab2">
<div class="coupon-items"> 
    @foreach($oldcoupon as $k=>$v)
    <div class="coupon-item coupon-item-d">
   

        <div class="coupon-list">
            <div class="c-type">
                <div class="c-class">
                    <strong>购物券</strong>
                    <span class="am-icon-trash"></span>
                </div>
                <div class="c-price">
                    <strong>￥{{$v->denomination}}</strong>
                </div>
                <div class="c-limit">
                    【消费满&nbsp;{{$v->min_price}}元&nbsp;可用】
                </div>
                <div class="c-time"><span>使用期限</span>{{date('Y-m-d',$v->starttime)}}--{{date('Y-m-d',$v->endtime)}}</div>
                <div class="c-type-top"></div>

                <div class="c-type-bottom"></div>
            </div>

            <div class="c-msg">
                <div class="c-range">
                    <div class="range-all">
                        <div class="range-item">
                            <span class="label">券&nbsp;编&nbsp;号：</span>
                            <span class="txt">{{$v->number}}</span>
                        </div>
                    </div>
                </div>
                <div class="op-btns c-del">
                    <a href="" id="{{$v->c_id}}" class="btn"><span class="txt">删除</span><b></b></a>
                </div>
            </div>

            <li class="td td-usestatus ">
                <div class="item-usestatus ">
                    <span><img src="../images/gift_stamp_31.png"</span>
                </div>
            </li>
        </div>
    

    </div>
   @endforeach
</div>

</div>
</div>

</div>

</div>

@endsection
@section('dd')
 <script type="text/javascript">
$('.btn').click(function(){
	var b=$(this);
  var id=$(this).attr('id');
    $.get('/person/delcoupon',{id:id},function(data){
        switch(data){
          case "0":
          $('#tishi').addClass('alert-danger').html('删除失败').show().fadeOut(3000);
          break;
          case"1":
          $
          $('#tishi').addClass('alert-success').html('删除成功！').show().fadeOut(3000);
     		b.parents('.coupon-item').remove();
          break;
        }
    });
    return false;
      });
  </script>
@endsection