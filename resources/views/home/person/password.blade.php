@extends('home.layout.person')

@section('nr')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> /
            <small>Password</small>
        </div>
    </div>
    <hr/>
    <!--进度条-->
    <div class="m-progress">
        <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
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
    <form class="am-form am-form-horizontal" method="post" action="/person/password">
        <div class="am-form-group">
            <label for="user-old-password" class="am-form-label">原密码</label>
            <div class="am-form-content">
                <input type="password" id="user-old-password" name="password" placeholder="请输入原登录密码">
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-new-password" class="am-form-label">新密码</label>
            <div class="am-form-content">
                <input type="password" id="user-new-password" name="newpassword" placeholder="由数字、字母组合">
            </div>
        </div>
        <div class="am-form-group">
            <label for="user-confirm-password" class="am-form-label">确认密码</label>
            <div class="am-form-content">
                <input type="password" id="user-confirm-password" name="repassword" placeholder="请再次输入上面的密码">
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
    <script type="text/javascript">
        setTimeout(function () {
            $('.ts').remove();
        }, 2000);
    </script>
@endsection