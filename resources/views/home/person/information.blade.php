@extends('home.layout.person')

@section('nr')
    <div class="user-info">
        <!--标题 -->
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
        </div>
        <hr/>

        <!--头像 -->
        <div class="user-infoPic">

            <div class="filePic">
                <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                <img class="am-circle am-img-thumbnail" src="{{ $detail->pic }}" alt="" />
            </div>

            <p class="am-form-help">头像</p>

            <div class="info-m">
                <div><b>用户名：<i>{{ $detail->nickname }}</i></b></div>
                <div class="u-level">
                    <span class="rank r2">
                        <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
                    </span>
                </div>
            </div>
        </div>

    <!--个人信息 -->

        <div class="info-main">
            <form class="am-form am-form-horizontal" method="post" action="/person/userup" enctype="multipart/form-data">

                <div class="am-form-group">
                    <label for="user-name2" class="am-form-label">昵称</label>
                    <div class="am-form-content">
                        <input type="text" id="user-name2" placeholder="6-18位昵称" name="nickname" value="{{ $detail->nickname }}">

                    </div>
                </div>
                <div class="am-form-group">
                    <label class="am-form-label">性别</label>
                    <div class="am-form-content sex">
                        <label class="am-radio-inline">
                            <input type="radio" name="radio10" value="1" data-am-ucheck {{ $detail->sex == 1 ? 'checked' : ''}}> 男
                        </label>
                        <label class="am-radio-inline">
                            <input type="radio" name="radio10" value="0" data-am-ucheck {{ $detail->sex == 0 ? 'checked' : ''}}> 女
                        </label>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-phone" class="am-form-label">电话</label>
                    <div class="am-form-content">
                        <input id="user-phone" placeholder="telephonenumber" type="tel" name="phone" value="{{ $detail->userphone }}">

                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-email" class="am-form-label">电子邮件</label>
                    <div class="am-form-content">
                        <input id="user-email" placeholder="Email" type="email" name="email" value="{{ $detail->email }}">

                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-email" class="am-form-label">头像</label>
                    <div class="am-form-content">
                        <input id="user-email" placeholder="Email" type="file" name="pic">

                    </div>
                </div>
                <div class="info-btn">
                    <center>
                        @if (session('empty'))
                            <div class="ts" style="position: absolute;color: white;background: orangered;padding: 5px 5px;">
                                {{ session('empty') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="ts" style="position: absolute;color: white;background: lawngreen;padding: 5px 5px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="ts" style="position: absolute;color: white;background: red;padding: 5px 5px;">
                                {{ session('error') }}
                            </div>
                        @endif
                    </center>
                    <button>保存修改</button>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
        </div>

    </div>
    <script type="text/javascript">
        setTimeout(function () {
            $('.ts').remove();
        }, 2000);
    </script>
@endsection