@extends('home.layout.person')

@section('nr')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> /
            <small>Bind&nbsp;Phone</small>
        </div>
    </div>
    <hr/>
    <!--进度条-->
    <div class="m-progress">
        <div class="m-progress-list">
                            <span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">绑定手机</p>
                            </span>
            <span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
            <span class="u-progress-placeholder"></span>
        </div>
        <div class="u-progress-bar total-steps-2">
            <div class="u-progress-bar-inner"></div>
        </div>
    </div>
    <form class="am-form am-form-horizontal" method="post" action="/person/bindphone">
        <div class="am-form-group bind">
            <label for="user-phone" class="am-form-label">验证手机</label>
            <div class="am-form-content">
                <span id="user-phone">{{ $value->userphone }}</span>
            </div>
        </div>
        <div class="am-form-group code">
            <label for="user-code" class="am-form-label">验证码</label>
            <div class="am-form-content">
                <input type="tel" id="user-code" placeholder="短信验证码">
            </div>
            <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                <div class="am-btn am-btn-danger" id="btn"
                     style="position: absolute;float: right;margin-left: 830px;margin-top: -40px;">验证码
                </div>
            </a>
            <span id="verification" style="display:none;color: white;background: orangered;width: 70px;padding: 5px 5px;">验证码错误</span>
        </div>
        <div class="am-form-group">
            <label for="user-new-phone" class="am-form-label">验证手机</label>
            <div class="am-form-content">
                <input type="tel" name="newphone" id="user-new-phone" placeholder="绑定新手机号">
            </div>
        </div>
        <div class="am-form-group code">
            <label for="user-new-code" class="am-form-label">验证码</label>
            <div class="am-form-content">
                <input type="tel" disabled="true" id="user-new-code" placeholder="短信验证码">
            </div>
            <a class="btn" href="javascript:void(0);" onclick="sendMobileCode1();" id="sendMobileCode">
                <div class="am-btn am-btn-danger" id="btn1" disabled="true"
                     style="position: absolute;float: right;margin-left: 830px;margin-top: -40px;">验证码
                </div>
            </a>
            <span id="verification1" style="display:none;color: white;background: orangered;width: 70px;padding: 5px 5px;">验证码错误</span>
        </div>
        <div class="info-btn">
            <button id="xg" disabled="true" style="padding:3px;">修改</button>
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
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </div>

    </form>
    <script type="text/javascript">
        function sendMobileCode() {
            var a = 59;
            var time = setInterval(function () {
                $('#btn').attr('disabled', true);
                $('#btn').html('剩余' + a + '秒');
                if (a == 0){
                    clearInterval(time);
                    $('#btn').attr('disabled', false);
                    $('#btn').html('验证码');
                }
                a--;
            },1000);

            var phone = $('#user-phone').html();
            $.ajax({
                type: 'GET',
                url: '/home/yanzheng',
                data: { phone : phone },
                dataType: 'json'
            });
        }

        function sendMobileCode1() {
            var a = 59;
            var time = setInterval(function () {
                $('#btn1').attr('disabled', true);
                $('#btn1').html('剩余' + a + '秒');
                if (a == 0){
                    clearInterval(time);
                    $('#btn1').attr('disabled', false);
                    $('#btn1').html('验证码');
                }
                a--;
            },1000);

            var phone = $('#user-new-phone').val();
            $.ajax({
                type: 'GET',
                url: '/home/yanzheng',
                data: { phone : phone },
                dataType: 'json'
            });
        }

        $('#user-code').blur(function () {
            var code = $('#user-code').val();
            $.ajax({
                type: 'get',
                url: '/home/code',
                data: { code : code },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    if (data == 1) {
                        $('#verification').html('验证码正确');
                        $('#verification').css('display', 'block');
                        $('#verification').css('background', 'lawngreen');
                        setTimeout(function () {
                            $('#verification').css('display', 'none');
                        }, 2000);
                        $('#user-new-code').attr('disabled', false);
                        $('#btn1').attr('disabled', false);
                    } else {
                        $('#verification').html('验证码错误');
                        $('#verification').css('display', 'block');
                        $('#verification').css('background', 'red');
                        setTimeout(function () {
                            $('#verification').css('display', 'none');
                        }, 2000);
                        $('#user-new-code').attr('disabled', true);
                        $('#btn1').attr('disabled', true);
                    }
                }
            });
        });

        $('#user-new-code').blur(function () {
            var code = $('#user-new-code').val();
            $.ajax({
                type: 'get',
                url: '/home/code',
                data: { code : code },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                },
                success: function (data) {
                    if (data == 1) {
                        $('#verification1').html('验证码正确');
                        $('#verification1').css('display', 'block');
                        $('#verification1').css('background', 'lawngreen');
                        $('#xg').attr('disabled', false);
                        setTimeout(function () {
                            $('#verification1').css('display', 'none');
                        }, 2000);
                    } else {
                        $('#verification1').html('验证码错误');
                        $('#verification1').css('display', 'block');
                        $('#verification1').css('background', 'red');
                        $('#xg').attr('disabled', true);
                        setTimeout(function () {
                            $('#verification1').css('display', 'none');
                        }, 2000);
                    }
                }
            });
        });
        setTimeout(function () {
            $('.ts').remove();
        }, 2000);
    </script>
@endsection