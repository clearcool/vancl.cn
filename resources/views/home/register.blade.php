<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>凡客商城 注册页</title>
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
<style>
    #span0
    {
      border-bottom:2px solid #b81e20;
    }
</style>
<body>
<div>
    <div id="nav" >
        <div style="width:130px;height:130px;float:left;"><a href="/"><img id="weblogo" src="/homecss/zhuye/img/Vancl.png" alt=""/></a></div>
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
                    <input type="text" id="input6" style="width:270px;height:40px" class="form-control" placeholder="请输入手机号">
                    <button id="dxbtn" class="btn btn-default" type="submit">获取短信验证码</button>
                    <div id="error_phone" class="tishi">请输入有效手机号码</div>
                    <input type="text" id="input7" style="width:400px;height:40px" class="form-control" placeholder="请填写手机验证码">
                    <div id="error_phone" class="tishi">请输入有效手机号码</div>
                    <input type="text" id="input8" style="width:400px;height:40px" class="form-control" placeholder="设定登录密码">
                    <div id="error_phone" class="tishi">请输入有效手机号码</div>
                    <input type="text" id="input9" style="width:400px;height:40px" class="form-control" placeholder="确定登录密码">
                    <div id="tjbox">
                        <input  id="ischange" type="checkbox" > <span>请阅读</span><a href="">《VANCL凡客诚品服务条款》</a>
                        <button id="anniu" disabled="disabled"  type="button" class="btn btn-danger btn2">立即注册</button>
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
    $("#ischange").change(function() {
        if($(this).attr("checked")){
            $(this).removeAttr("checked");
            $('#anniu').attr('disabled','disabled');
        }else{
            $(this).attr("checked",'true');
            $('#anniu').removeAttr('disabled');
        }
    });
</script>

</body>
</html>