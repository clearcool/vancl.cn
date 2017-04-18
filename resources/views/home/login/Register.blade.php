<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>凡客商城 注册页</title>
    <link href="/homecss/login/img/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">
    <!-- http://v3.bootcss.com/assets/css/docs.min.css -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <link href="/homecss/zhuye/css/css1.css" type="text/css" rel="stylesheet" charset="utf-8"/>
    <link rel="stylesheet" href="/homecss/login/css/css.css">
</head>
<style>
    #span0
    {
      border-bottom:2px solid #b81e20;
    }
</style>
<body>
<div>
    <div id="nav" >
        <div style="width:130px;height:130px;float:left;"><a href="/"><img id="weblogo" src="/homecss/login/img/Vancl.png" alt=""/></a></div>
        <div id="navleft">
            <span>你只有一定要，才一定会得到....</span>
        </div>
    </div>

    <div id="zhong">
        <div>
            <img id="denglulogo" src="/homecss/login/img/denglulogo.png" alt="">
        </div>
            <div>
            <div id="box">
                <div id="span0">
                    <span id="span1">凡客Vancl注册</span>
                    <span id="span2">已有账号现在去<a href="/home/login">登录</a></span>
                </div>
                <div id="kuang2">
                    {{--错误的提示信息要放到相应位置--}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" id="one" style="margin-left:;position: absolute;float: left; margin-left: 450px; margin-bottom: -30px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{url('/home/registerb')}}" method="post">
                    {{--防跨站攻击--}}
                    {{ csrf_field() }}

                    <input type="text" id="input6"  name="userphone" style="width:270px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="请输入手机号" value="">
                    <button id="dxbtn" class="btn btn-default" disabled="true"; type="button" style="margin-bottom: 20px;">获取短信验证码</button>
                    <div id="error_phone" class="" style="display: none;">请输入有效手机号码</div>
                    <input type="text" id="input7" name="code" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="请填写手机验证码">
                    <div id="error_yan" class="" style="display: none;">验证码有误,请重新输入</div>
                    <input type="text" name="username" id="input10" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="请填写6-18位用户名">
                    <div id="error_yong" class="" style="display: none;">用户名重复,请更换</div>
                    <input type="password" name="password" id="input8" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="设定登录密码">
                    <div id="error_pass"  class="" style="display: none;">请输入6-18位的密码</div>
                    <input type="password" name="password2" id="input9" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="确定登录密码">
                    <div id="error_pass2" class="" style="display: none;">两次密码不一致</div>
                    <div id="tjbox">
                        <input  id="ischange" type="checkbox" > <span>请阅读</span><a href="">《VANCL凡客诚品服务条款》</a>
                        <button id="anniu" disabled="disabled"  type="submit" class="btn btn-danger btn2">立即注册</button>
                    </div>
                </form>
                </div>
                </div>
            </div>

        </div>
    </div>
    <div  class="col-md-10 col-md-offset-1"  id="footerArea" class="">
        <div class="footBottom">
            <div class="footBottomTab">
                <p> Copyright 2007 - 2016 vancl.com All Rights Reserved 京ICP证100557号 京公网安备11011502002400号
                    出版物经营许可证新出发京批字第直110138号</p>
                <p> 凡客诚品（北京）科技有限公司</p>
            </div>
        </div>
        <span class="blank20"></span>
        <div class="subFooter">
            <a rel="nofollow" href="#" class="redLogo" target="_blank"></a>
            <span class="costumeOrg"></span>
            <a rel="nofollow" href="#" class="wsjyBzzx" target="_blank"></a>
            <a rel="nofollow" href="#" class="vanclMsg" target="_blank"></a>
            <a class="vanclqingNian" target="_blank" href="#" rel="nofollow"></a>
            <a href="#" style="display: inline-block;" target="_blank"><img style="width: 120px; height: 39px;"
            src="/homecss/login/img/kexin_brand_for_others.png"/></a>
            <div class="blank0"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //全局变量
    var one = true;
    var two = true;
    var three = true;
    var four = true;
    var five = true;
    //提交表单时 出发所以得丧失焦点事件
    $('form').submit(function(){
        //触发所有的丧失焦点事件
        $('input').trigger('blur');
        //检测所有字段是否正确
        if(one && three && four && five){
            return true;
        }else{
            //阻止默认行为
            return false;
        }
    });


    $("#ischange").change(function() {
        if($(this).attr("checked")){
            $(this).removeAttr("checked");
            $('#anniu').attr('disabled','disabled');
        }else{
            $(this).attr("checked",'true');
            $('#anniu').removeAttr('disabled');
        }
    });


    //判断手机号是否正确
    //获取焦点事件
    $("#input6").focus(function(){
        $("#error_phone").css('display', 'none');
        one = true;
    });
    //丧失焦点事件
    $("#input6").blur(function(){
        //获取用户输入的手机号
        var str = $("#input6").val();

        if(str.length == 11){
            //正则验证
            var reg = /1+[3,5,7,8]\d{9}/;
            var res = reg.test(str);
            if(!res){
                $("#error_phone").css('display', 'block').html('请输入有效手机号码');
                $("#dxbtn").attr('disabled','true');
                one = false;
            }else{
                //发送ajax判断手机号是否已经注册
                $.ajax({
                    type: 'get',
                    url: '/home/phone',
                    data: {c: str},
                    success: function (data) {
                        if(data == 2){
                            $("#error_phone").css('display','block').html('手机号以注册过');
                            $("#dxbtn").attr('disabled','true');
                            one = false;
                        }else{
                            $("#dxbtn").removeAttr('disabled');
                        }
                    },
                    error: function (data) {
                        console.log(data.msg);
                    },
                    async: true
                });
            }
        }else{
            $("#error_phone").css('display','block').html('请输入正确格式的手机号');
            $("#dxbtn").attr('disabled','true');
            one = false;
        }
    });


    //点击按钮后 60s内不让在点击
    var a = 60;
    $("#dxbtn").click(function(){
        $("#dxbtn").attr('disabled','true');
        init = setInterval(function(){
            $("#dxbtn").html(a+"后获取验证码");
            a--;
            if(a==-1){
                clearInterval(init);
                $("#dxbtn").removeAttr('disabled').html('获取短信验证码');
                a = 60;
            }
        },1000);
        //获取手机号
        var phone = $("#input6").val();
        //发送ajax
        $.ajax({
            type: 'get',
            url: '/home/yanzheng',
            data: {phone: phone},
            success: function (data) {

            },
            error: function (data) {
                console.log(data.msg);
            },
            async: true
        });


    });

    //判断密码是否符合要求
    //获取焦点事件
    $("#input8").focus(function(){
        $("#error_pass").css('display', 'none');
        $("#input8").css('margin-bottom','20px');
        three=true;
    });
    //丧失焦点事件
    $("#input8").blur(function(){
        //获取用户输入的信息
        var str = $("#input8").val();

        if(str.length >=6 && str.length <=18){
            //正则验证
            var reg = /\w{6,18}/;
            var res = reg.test(str);
            if(!res){
                $("#error_pass").css('display', 'block');
                $("#input8").css('margin-bottom','0px');
                three = false;
            }
        }else{
            $("#error_pass").css('display','block');
            $("#input8").css('margin-bottom','0px');
            three = false;
        }
    });


    //判断两次密码是否一致
    //获取焦点事件
    $("#input9").focus(function(){
        $("#error_pass2").css('display','none');
        $("#input9").css('margin-bottom','20px');
        four = true;
    });
    //丧失焦点事件
    $("#input9").blur(function(){
        //获取上次输入的密码和这次的密码
        var str = $("#input8").val();
        var str1 = $("#input9").val();

        if(str != str1){
            $("#error_pass2").css('display','block');
            $("#input9").css('margin-bottom','0px');
            four = false;
        }
    });


    //判断用户名是否存在
    //获取焦点事件
    $("#input10").focus(function(){
        $("#error_yong").css('display', 'none');
        $("#input10").css('margin-bottom','20px');
        five = true;
    });
    //丧失焦点事件
    $("#input10").blur(function(){
        //获取输入的用户名
        var name = $("#input10").val();
        //约束用户名位数
        if(name.length >=6  && name.length <= 18) {

            //正则验证
            var reg = /^[a-zA-Z\u4e00-\u9fa5]+$/;
            var res = reg.test(name);
            if (!res) {
                $("#error_yong").css('display','block');
                $("#error_yong").html('请输入6到18位的用户名');
                $("#input10").css('margin-bottom','0px');
                five = false;
            }

            //发送ajax
            $.ajax({
                type: 'get',
                url: '/home/registerb',
                data: {name: name},
                success: function (data) {
                    //判断
                    if (data == 2) {
                        $("#error_yong").css('display','block').html('用户名已存在');
                        $("#input10").css('margin-bottom','0px');
                        five = false;
                    }
                },
                error: function (data) {
                    console.log(data.msg);
                },
                async: true
            });

        }else{
            $("#error_yong").css('display','block');
            $("#error_yong").html('请输入6到18位的用户名');
            $("#input10").css('margin-bottom','0px');
            five = false;
        };
    });


    //判断验证码是否存在
    //获取焦点事件
    $("#input7").focus(function(){
        $("#error_yan").css('display', 'none');
        $("#input7").css('margin-bottom','20px');
        two = true;
    });
    //丧失焦点事件
    $("#input7").blur(function(){
        //获取输入的验证码
        var code = $("#input7").val();
        //发送ajax
        $.ajax({
            type: 'get',
            url: '/home/code',
            data: {code: code},
            success: function (data){
                //判断
                if (data == 1) {
                    two = true;
                }else{
                    $("#error_yan").css('display','block').html('验证码错误');
                    $("#input7").css('margin-bottom','0px');
                    two = false;
                }
            },
            error: function (data) {
                console.log(data.msg);
            },
            async: true
        });
    });

    //错误信息
    setTimeout(function(){
        $('#one').fadeOut('div');
    },2500);

</script>
</body>
</html>
