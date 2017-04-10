@extends('home.layout.person')

@section('nr')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">实名认证</strong> / <small>Real&nbsp;authentication</small></div>
    </div>
    <hr/>
    <!--进度条-->
    <div class="m-progress">
        <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">实名认证</p>
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
    <form class="am-form am-form-horizontal" method="post" action="/person/idcard">
        <div class="am-form-group bind">
            <label for="user-info" class="am-form-label">账户名</label>
            <div class="am-form-content">
                <span id="user-info">{{ $value->userphone }}</span>
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-name" class="am-form-label">真实姓名</label>
            <div class="am-form-content">
                <input type="text" name="realname" id="user-name" placeholder="请输入您的真实姓名">
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-IDcard" class="am-form-label">身份证号</label>
            <div class="am-form-content">
                <input type="tel" name="idnumber" id="user-IDcard" placeholder="请输入您的身份证信息">
            </div>
        </div>
        <div class="info-btn">
            <button id="xg" style="padding:3px;">修改</button>
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
        setTimeout(function () {
            $('.ts').remove();
        }, 2000);
    </script>
@endsection