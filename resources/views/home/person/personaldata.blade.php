@extends('home.layout.person')

@section('nr')

    <div class="wrap-left">
        <div class="wrap-list">
            <div class="m-user">
                <!--个人信息 -->
                <div class="m-bg"></div>
                <div class="m-userinfo">
                    <div class="m-baseinfo">
                        <a href="/person/information">
                            <img src="{{ $detail->pic }}">
                        </a>
                        <em class="s-name">({{ $detail->nickname }})<span class="vip1"></em>
                    </div>
                    <div class="m-right">
                        <div class="m-new">
                            <a href="/person/news"><i class="am-icon-bell-o"></i>消息</a>
                        </div>
                        <div class="m-address">
                            <a href="/person/address" class="i-trigger">我的收货地址</a>
                        </div>
                    </div>
                </div>

                <!--个人资产-->
                <div class="m-userproperty">
                    <div class="s-bar">
                        <i class="s-icon"></i><center>个人资产</center>
                    </div>
                    <p class="m-coupon">
                        <a href="/person/coupon">
                            <i><img src="/homecss/person/images/coupon.png"/></i>
                            <span class="m-title">优惠券</span>
                            <em class="m-num">{{ $coupon }}</em>
                        </a>
                    </p>
                    <p class="m-bill">
                        <a href="/person/bill">
                            <i><img src="/homecss/person/images/wallet.png"/></i>
                            <span class="m-title">钱包</span>
                        </a>
                    </p>
                    <p class="m-big">
                        <a href="#">
                            <i><img src="/homecss/person/images/day-to.png"/></i>
                            <span class="m-title">签到有礼</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="box-container-bottom"></div>
            <div class="user-patternIcon"></div>
            <div class="you-like"><div></div></div>
        </div>
    </div>
@endsection