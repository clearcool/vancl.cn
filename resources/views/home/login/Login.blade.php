<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>凡客商城 登录页</title>
    <link href="/homecss/login/img/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/bootstrap/css/docs.min.css')}}" rel="stylesheet">
    <!-- http://v3.bootcss.com/assets/css/docs.min.css -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('/bootstrap/js/jquery-1.12.4.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <link href="{{asset('/homecss/zhuye/css/css.ashx')}}" type="text/css" rel="stylesheet" charset="utf-8"/>
    <link rel="stylesheet" href="{{asset('/homecss/login/css/css.css')}}">
</head>
<body>
<div>
    <div id="nav" >
        <div style="width:130px;height:130px;float:left;"><a href="/"><img id="weblogo" src="/homecss/login/img/Vancl.png" alt=""/></a></div>
        <div id="navleft">
            <span>你只有一定要，才一定会得到....</span>
            <a href="">帮助</a>
        </div>
    </div>

    <div id="zhong">
        <div>
            <img id="denglulogo" src="/homecss/login/img/denglulogo.png" alt="">
        </div>

            <div>

            <div id="box">
                <div id="span0">
                    <span id="span1">凡客Vancl登录</span>
                    <span id="span2">没有账号免费<a href="/home/register">注册</a></span>
                </div>
                <div id="kuang">
                    <div class="bg2" id="ptdl">普通登录</div>
                    <div class="bg1" id="ksdl">快速登录</div>
                    <div id="ptbox">
                        {{--用户名登录错误提示--}}
                        <div id="yonghu" style="float: left;position: absolute;margin-top: 130px;margin-left: 45px; display:none;">
                            <ul>
                                用户名不存在
                            </ul>
                        </div>
                        <form action="{{url('home/logina')}}" method="post" id="one">
                            {{--防跨站攻击--}}
                            {{ csrf_field() }}

                            <input type="text" id="input1" name="username1" value="" style="width:320px;height:40px" class="form-control" placeholder="请输入用户名">
                            <input type="password" id="input2" name="password1" value="" style="width:320px;height:40px" class="form-control" placeholder="请输入密码">
                            <div class="bt">
                                <a href=""><span>找回密码</span></a>
                            <button  type="submit" class="btn btn-danger btn1">登录</button>
                            </div>
                        </form>
                    </div>
                    <div id="ksbox">
                        <form action="{{url('home/loginb')}}" method="post" id="two">
                            {{--防跨站攻击--}}
                            {{ csrf_field() }}
                            <div id="shouji">
                                <input type="text" name="userphone" id="input3" style="width:230px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="请输入手机号">
                                <input id="dxbtn" class="btn btn-default" type="button" disabled=true; value="获取短信验证码"/>
                            </div>
                            <div id="error_phone" class="" style="display: none; float: left;position: absolute;margin-top: 53px;margin-left: 40px;">请输入正确格式的手机号</div>
                            <div id="yanzhengma">
                                <input type="text" name="code" id="input4" style="width:230px;height:40px;margin-bottom: 15px;" class="form-control" placeholder="请输入手机验证码">
                            </div>
                            <div id="error_yan" class="" style="display: none; float: left;position: absolute;margin-top:115px;margin-left: 40px;">请输入验证码</div>
                            <div class="bt">
                                <button  type="submit" class="btn btn-danger btn1">登录</button>
                           </div>
                        </form>
                    </div>

                    <div class="hezuo">
                        <div><span>使用合作网站账号登录凡客</span></div>

                        <div class="hzlogo">
                            <ul>
                                <li>
                                    <a href=""><img src="/homecss/login/img/logos_01.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href=""> <img src="/homecss/login/img/logos_02.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href=""><img src="/homecss/login/img/logos_03.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href=""> <img src="/homecss/login/img/logos_04.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href=""><img src="/homecss/login/img/logos_05.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href=""> <img src="/homecss/login/img/logos_06.gif" alt=""></a>
                                </li>
                            </ul>
                        </div>
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
    //定义全局变量
    var three = true;
    var four = true;

    $('#ptdl').click(function(){
         $('#ptbox').css('display','block');
         $('#ksbox').css('display','none');
         $(this).removeClass('bg1').addClass('bg2');
         $(this).next().removeClass('bg2').addClass('bg1');
    });

    $('#ksdl').click(function(){
         $('#ksbox').css('display','block');
         $('#ptbox').css('display','none');
         $(this).removeClass('bg1').addClass('bg2');
         $(this).prev().removeClass('bg2').addClass('bg1');
    });


    //用户名和密码登录
    $('#one').submit(function(){
        var username1 = $("#input1").val();
        var password1 = $("#input2").val();

        //发送ajax
        $.ajax({
            type:'post',
            url:'/home/logina',
            data:{username1:username1,password1:password1,'_token':'{{ csrf_token() }}'},
            success:function(data){
                //判断用户名和密码是否为空
                if(data == 1){
                    $("#yonghu").css('display','block').html('用户名和密码不能为空');
                    setTimeout(function(){
                        $("#yonghu").css('display','none');
                    },2500);
                }
                //判断用户名是否正确
                if(data == 2){
                    $("#yonghu").css('display','block').html('用户名不存在');
                    setTimeout(function(){
                        $("#yonghu").css('display','none');
                    },2500);
                }
                //判断权限是否足够
                if(data == 3){
                    $("#yonghu").css('display','block').html('你已经被封号');
                    setTimeout(function(){
                        $("#yonghu").css('display','none');
                    },2500);
                }
                //判断密码是否正确
                if(data == 4){
                    $("#yonghu").css('display','block').html('密码错误');
                    setTimeout(function(){
                        $("#yonghu").css('display','none');
                    },2500);
                }
                //当用户名和密码都正确时
                if(data == 5){
                    window.location.href="/";
                }
            },
            error:function(data){
                console.log(data.msg);
            },
            async:true
        });
        return false;
    });

    //手机号登录
    $("#two").submit(function(){

        //触发所有的丧失焦点事件
        $('input').trigger('blur');
        //检测所有字段是否正确
        if(three && four ) {

            var userphone = $("#input3").val();
            var yanzhema = $("#input4").val();

            //发送ajax
            $.ajax({
                type: 'post',
                url: '/home/loginb',
                data: {userphone: userphone, yanzhema: yanzhema, '_token': '{{ csrf_token() }}'},
                success: function (data) {
                    //判断手机号和验证码是否为空
                    if (data == 1) {
                        $("#error_phone").css('display', 'block').html('手机号和验证码不能为空');
                    }
                    //判断手机号是否正确
                    if (data == 2) {
                        $("#error_phone").css('display', 'block').html('手机号不正确');
                    }
                    //判断权限是否足够
                    if (data == 3) {
                        $("#error_phone").css('display', 'block').html('你已经被封号');
                    }
                    //当手机号和验证码都正确时
                    if (data == 5) {
                        window.location.href = "/";
                    }
                },
                error: function (data) {
                    console.log(data.msg);
                },
                async: true
            });
            return false;
        }else{
            return false;
        }

    });

    //判断手机号是否正确
    //获取焦点事件
    $("#input3").focus(function(){
        $("#error_phone").css('display', 'none').html('请输入正确格式的手机号');
    });

    //丧失焦点事件
    $("#input3").blur(function(){
    var str = $("#input3").val();
        if(str.length == 11){
            //正则验证
            var reg = /1+[3,5,7,8]\d{9}/;
            var res = reg.test(str);
            if(!res){
                $("#error_phone").css('display', 'block');
                $("#dxbtn").attr('disabled','true');
                three = false;
            }else{
                //发送ajax判断手机号是否已经注册
                $.ajax({
                    type: 'get',
                    url: '/home/phone',
                    data: {c: str},
                    success: function (data) {
                        if(data == 1){
                            $("#error_phone").css('display','block').html('该手机号未注册账号');
                            $("#dxbtn").attr('disabled','true');
                            three = false;
                        }else{
                            $("#dxbtn").removeAttr('disabled').html('获取短信验证码');
                            three = true;
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
            three = false;
        }
    });

        //发送按钮
        $("#dxbtn").click(function () {
            var phone = $("#input3").val();
            //点击按钮后 60s内不让在点击
            a = 60;
            $("#dxbtn").attr('disabled', 'true');
            init = setInterval(function () {
                $("#dxbtn").val(a + "后获取验证码");
                a--;
                if (a == -1) {
                    clearInterval(init);
                    $("#dxbtn").removeAttr('disabled').val('获取短信验证码');
                    a = 60;
                }
            }, 1000);

            //发送ajax
            $.ajax({
                type: 'get',
                url: '/home/yanzheng',
                data: {phone: phone},
                success: function (data) {
                    code = data[1];
                },
                error: function (data) {
                    console.log(data.msg);
                },
                async: true
            });

        });


        //判断验证码是否正确
        //获取焦点事件
        $("#input4").focus(function(){
            $("#error_yan").css('display', 'none');
        });
        //丧失焦点事件
        $("#input4").blur(function(){
            //获取输入的验证码
            var c = $("#input4").val();
            //判断验证码是不是空
            if (typeof (code) == "undefined"){
                code = '8899283902890ianjkasbkdhi';
            }
            //判断是否一致
            if(c != code){
                $("#error_yan").css('display', 'block').html('验证码不正确');
                four = false;
            }else{
                four = true;
            }
        });

</script>

</body>
</html>