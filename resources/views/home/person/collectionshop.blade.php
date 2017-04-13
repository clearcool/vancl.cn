@extends('home.layout.person')

@section('nr')
    <div class="user-foot">
        <!--标题 -->
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">收藏店铺</strong> / <small>Browser&nbsp;Shop</small></div>
        </div>
        <hr/>

        <!--收藏店铺列表 -->
@foreach($Collectionshop as $k=>$v)
        <div class="clear"></div>

        <div class="goods">
           
            <div class="goods-box">
                <div class="goods-pic">
                    <div class="goods-pic-box">
                        <a class="goods-pic-link" target="_blank" href="#" title="{{$v->sname}}">
                            <img src="/homecss/person/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
                    </div>
                    <a class="goods-delete" href="/person/delshop?id={{$v->id}}"><i class="am-icon-trash"></i></a>
                </div>

                <div class="goods-attr">
                    <div class="good-title">
                        <a class="title" href="#" target="_blank">{{$v->sname}}</a>
                        <a class="title" href="#" target="_blank">级别：{{$v->shopcredit}}</a>

                    </div>
                </div>
            </div>
        </div>
@endforeach

    </div>
@endsection