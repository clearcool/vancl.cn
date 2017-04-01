<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>凡客商城 登录页</title>
    <link href="/homecss/zhuye/img/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">
    <!-- http://v3.bootcss.com/assets/css/docs.min.css -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <link href="/homecss/zhuye/css/css.ashx" type="text/css" rel="stylesheet" charset="utf-8"/>
    <link rel="stylesheet" href="/homecss/login/css/css.css">
</head>
<body>
<div>
    <div id="nav" >
        <div style="width:130px;height:130px;float:left;"><a href="/"><img id="weblogo" src="/homecss/zhuye/img/Vancl.png" alt=""/></a></div>
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
                        <form action="">
                            <input type="text" id="input1" style="width:320px;height:40px" class="form-control" placeholder="请输入用户名">
                            <input type="text" id="input2"style="width:320px;height:40px" class="form-control" placeholder="请输入密码">
                            <div class="bt">
                                <a href=""><span>找回密码</span></a>
                            <button  type="button" class="btn btn-danger btn1">登录</button>
                            </div>
                        </form>
                    </div>
                    <div id="ksbox">
                        <form action="">
                            <div id="shouji">
                                <input type="text" id="input3" style="width:230px;height:40px" class="form-control" placeholder="请输入手机号">
                                <button id="dxbtn" class="btn btn-default" type="submit">获取短信验证码</button>
                            </div>
                            <div id="error_phone" class="tishi">请输入有效手机号码</div>
                            <div id="yanzhengma">
                                <input type="text" id="input4"style="width:180px;height:40px" class="form-control" placeholder="验证码">
                                <a onclick="javascript:re_captcha();" ><img src="{{ URL('/home/captcha') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="yzm" border="0"></a>
                                <div id="error_phone" class="tishi">请输入有效手机号码</div>
                                <input type="text" id="input5"style="width:350px;height:40px" class="form-control" placeholder="请输入手机验证码">
                            </div>
                            <div class="bt">
                                <button  type="button" class="btn btn-danger btn1">登录</button>
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
            src="/homecss/zhuye/img/kexin_brand_for_others.png"/></a>
            <div class="blank0"></div>
        </div>
    </div>


</div>

<script type="text/javascript">
 $('#ptdl').click(function(){
     $('#ptbox').css('display','block');
     $('#ksbox').css('display','none');
     $(this).removeClass('bg1').addClass('bg2');
     $(this).next().removeClass('bg2').addClass('bg1');
 })
 $('#ksdl').click(function(){
     $('#ksbox').css('display','block');
     $('#ptbox').css('display','none');
     $(this).removeClass('bg1').addClass('bg2');
     $(this).prev().removeClass('bg2').addClass('bg1');
 })

 function re_captcha() {
     $url = "{{ URL('/home/captcha') }}";
     $url = $url + "/" + Math.random();
     document.getElementById('yzm').src=$url;
 }
</script>

</body>
</html>