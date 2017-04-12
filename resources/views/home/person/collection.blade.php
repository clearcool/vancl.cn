@extends('home.layout.person')

@section('nr')
<div class="user-collection">
<!--标题 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
</div>
<hr/>

<div class="you-like">
    <div class="s-bar">
        我的收藏
    </div>
    <div class="s-content"> @foreach($collection as $k =>$v)
        <div class="s-item-wrap">

       
            <div class="s-item">

                <div class="s-pic">
                    <a href="#" class="s-pic-link">
                        <img src="{{$v->picurl}}" alt="{{$v->describe}}" title="{{$v->describe}}" class="s-pic-img s-guess-item-img">
                    </a>
                </div>
                <div class="s-info">
                    <div class="s-title"><a href="#" title="{{$v->describe}}">{{$v->describe}}</a></div>
                    <div class="s-price-box">
                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
                        <a href="/person/delcollection?id={{$v->s_id}}" id="quxiao" class="am-badge am-badge-danger am-round">取消收藏</a>   
                    </div>
                   
                </div>
            </div>
            
        </div>
@endforeach
    </div>

    <div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

</div>

</div>

@endsection
@section('js')
<script type="text/javascript">
$('quxiao').live('click',function(){
  var id=$(this).attr('id');
    $.get('/home/receive',{id:id},function(data){
        
    });
    return false;
      });
  </script>
    @endsection