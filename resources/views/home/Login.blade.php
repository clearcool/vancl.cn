<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>凡客诚品 - 会员登录</title>
    <link href="{{asset('homecss/login/css/login.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('homecss/login/css/footer.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('homecss/login/css/css.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{asset('homecss/login/img/favicon.ico')}}" type="image/x-icon">
    <script type="text/javascript" language="javascript" src="{{asset('homecss/login/ashx/js.ashx')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('homecss/login/ashx/script.ashx')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('homecss/login/js/login.js')}}"></script>
    <meta name="keywords" content="凡客诚品 - 会员登录,"><meta name="description" content="凡客诚品 - 会员登录">
    <style charset="utf-8" type="text/css" class="firebugResetStyles">/* See license.txt for terms of usage */

        /** reset styling **/

        .firebugResetStyles {

            z-index: 2147483646 !important;

            top: 0 !important;

            left: 0 !important;

            display: block !important;

            border: 0 none !important;

            margin: 0 !important;

            padding: 0 !important;

            outline: 0 !important;

            min-width: 0 !important;

            max-width: none !important;

            min-height: 0 !important;

            max-height: none !important;

            position: fixed !important;

            transform: rotate(0deg) !important;

            transform-origin: 50% 50% !important;

            border-radius: 0 !important;

            box-shadow: none !important;

            background: transparent none !important;

            pointer-events: none !important;

            white-space: normal !important;

        }

        style.firebugResetStyles {

            display: none !important;

        }



        .firebugBlockBackgroundColor {

            background-color: transparent !important;

        }



        .firebugResetStyles:before, .firebugResetStyles:after {

            content: "" !important;

        }

        /**actual styling to be modified by firebug theme**/

        .firebugCanvas {

            display: none !important;

        }



        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

        .firebugLayoutBox {

            width: auto !important;

            position: static !important;

        }



        .firebugLayoutBoxOffset {

            opacity: 0.8 !important;

            position: fixed !important;

        }



        .firebugLayoutLine {

            opacity: 0.4 !important;

            background-color: #000000 !important;

        }



        .firebugLayoutLineLeft, .firebugLayoutLineRight {

            width: 1px !important;

            height: 100% !important;

        }



        .firebugLayoutLineTop, .firebugLayoutLineBottom {

            width: 100% !important;

            height: 1px !important;

        }



        .firebugLayoutLineTop {

            margin-top: -1px !important;

            border-top: 1px solid #999999 !important;

        }



        .firebugLayoutLineRight {

            border-right: 1px solid #999999 !important;

        }



        .firebugLayoutLineBottom {

            border-bottom: 1px solid #999999 !important;

        }



        .firebugLayoutLineLeft {

            margin-left: -1px !important;

            border-left: 1px solid #999999 !important;

        }



        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

        .firebugLayoutBoxParent {

            border-top: 0 none !important;

            border-right: 1px dashed #E00 !important;

            border-bottom: 1px dashed #E00 !important;

            border-left: 0 none !important;

            position: fixed !important;

            width: auto !important;

        }



        .firebugRuler{

            position: absolute !important;

        }



        .firebugRulerH {

            top: -15px !important;

            left: 0 !important;

            width: 100% !important;

            height: 14px !important;

            background: url("") repeat-x !important;

            border-top: 1px solid #BBBBBB !important;

            border-right: 1px dashed #BBBBBB !important;

            border-bottom: 1px solid #000000 !important;

        }



        .firebugRulerV {

            top: 0 !important;

            left: -15px !important;

            width: 14px !important;

            height: 100% !important;

            background: url("") repeat-y !important;

            border-left: 1px solid #BBBBBB !important;

            border-right: 1px solid #000000 !important;

            border-bottom: 1px dashed #BBBBBB !important;

        }



        .overflowRulerX > .firebugRulerV {

            left: 0 !important;

        }



        .overflowRulerY > .firebugRulerH {

            top: 0 !important;

        }



        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

        .fbProxyElement {

            position: fixed !important;

            pointer-events: auto !important;

        }

    </style>
</head>
<body>
<center>
    <div id="Head" align="left">
        <a class="logo" href="/"></a>
        <p>
            <a href="#" target="_blank">帮助</a>
        </p>
    </div>
</center>
<div class="wrapper">
    <div style="width: 100%; height: 25px; position: relative;">
        <h3 style="font-size: 22px; color: #979797; font-weight: bolder; text-align: left;
                height: 25px; line-height: 25px; float: right; margin: 0 100px 0 0; width: 400px;
                position: relative;">
            凡客 Vancl 登录 <span style="font-size: 14px; font-weight: normal; position: absolute;
                    right: 0px; bottom: 0px;">没有账户免费<a href="/register" style="color: #b42025;
                        margin: 0px;">注册</a></span>
        </h3>
    </div>
    <div class="login">
        <div class="tag">
            <ul id="tags">
                <li class="on">普通登录</li>
                <li class="">快速登录</li>
            </ul>
        </div>
        <!--tag-->
        <div id="shows">
            <div class="user_infor" style="display: block;">
                <div id="vanclLoginError" class="tips">
                    用户名或者密码错误!
                </div>
                <div id="_uname" class="newtxt">
                    <label style="z-index: 10;">
                        请输入用户名
                    </label>

                    <input id="vanclUserName" name="vanclUserName" class="inputtextcolor" type="text">
                </div>
                <div id="vanclUserNameError" class="tips">
                    用户名不能为空!
                </div>
                <div id="_upwd" class="newtxt">
                    <label style="z-index: 10;">
                        请输入密码
                    </label>
                    <input id="vanclPassword" name="vanclPassword" class="inputtextcolor" value="" type="password">
                </div>
                <div id="vanclPasswordError" class="tips">
                    密码不能为空!
                </div>
                <p id="pValidate" style="display:none" class="newtxt">
                    <label style="color: rgb(172, 172, 172); z-index: 10;">
                        验证码</label><input maxlength="6" style="width: 155px; height: 48px; border: 0px none; text-indent: 10px; ime-mode: disabled; -moz-user-select: none;" id="calculatevalidate" name="calcultatevalidate" class="inputtextcolor" type="text">
                    <img id="img_validate" oldsrc="/Controls/CalculateValidateCode.ashx?key=Login" src="" style="/* vertical-align: middle; */width: 145px; height: 53px; cursor: pointer;
                            position: absolute; right: 0px; top: 0px; z-index: 11;">
                    <a style="cursor: pointer; float: right; line-height: 18px;" href="javascript:void(0)">
                        看不清?换一张</a>
                </p>
                <div id="validateError" style="display: none" class="tips">
                    验证码不能为空!
                </div>

                <div class="bt">
                    <!-- <a class="forget" href="https://login.vancl.com/login/GetPwdStep1.aspx">找回密码</a> -->
                    <div class="clear">
                    </div>
                    <a id="vanclLogin" class="log" href="#">登 录</a>
                </div>
            </div>
            <!--
            ****************************************************
            快速登录区域----开始
            ****************************************************
             -->
            <div class="user_infor" style="display: none">
                <div id="_quickmobile" class="newtxt" style="width: 250px; float: left;">
                    <label style="z-index: 10;">
                        输入手机号
                    </label>
                    <input id="_quickmobilenumber" maxlength="11" name="vanclUserName" type="text">
                </div>
                <a href="javascript:void(0);" class="asPhoneregBtn" id="getSmsCode" style="display: block">
                    获取短信验证码</a>
                <div class="asPhoneregBtn" style="display: none" id="sendedSmsCode">
                    已发送
                </div>
                <div class="asPhoneregBtn" style="display: none" id="sendingSmsCode">
                    正在发送验证码
                </div>
                <div id="err_phone" class="tips" style="width: 80%;">
                </div>
                <div id="_quickcode" class="newtxt" style="border: 0 none;">
                    <label style="width: 142px; height: 43px; line-height: 43px; border: 1px solid rgb(203, 203, 203); z-index: 10;">
                        验证码
                    </label>
                    <input id="_quickpiccode" name="vanclUserName" style="width: 142px;
                            border: solid 1px #cbcbcb; height: 43px; line-height: 43px;" type="text">
                    <!-- <img id="_quickpiccodeimg" oldsrc="/Controls/CalculateValidateCode.ashx?key=Login" src="{{asset('homecss/login/img/CalculateValidateCode.jpg')}}" style="vertical-align: middle; width: 140px; height: 45px; position: absolute;
                            top: 0; left: 137px;"> -->
                    <a style="cursor: pointer; float: right; line-height: 18px;" href="javascript:void(0)">
                        看不清?换一张</a>
                </div>
                <div id="_quickpiccodevalidmsg" class="tips">
                    验证码不能为空!
                </div>
                <div id="_quickmobilecode" class="newtxt">
                    <label style="z-index: 10;">
                        请输入手机验证码
                    </label>
                    <input id="_quickmobilevalidcode" name="vanclUserName" type="text">
                </div>
                <div id="_quickmobilecodemsg" class="tips">
                    请输入有效的手机号码!
                </div>
                <div class="bt">
                    <a id="_btnquicklogin" class="log" href="javascript:void(0);">登 录</a>
                </div>
            </div>
            <!-- 横线 -->
            <div class="lines">
            </div>


            <div class="glup">
                <span class="blank10"></span>
                <h2 class="hezuo">
                    使用合作网站账号登录凡客</h2>
                <span class="blank10"></span>
                <p class="qkimg">
                    <!-- <a href="https://login.vancl.com/login/wxlogin.aspx?http%3A%2F%2Fwww.vancl.com%2F%3Fsource%3Dsogou_133174" id="a_wxlogin" class="weixin"> -->
                    </a><a class="xiaomi" onclick="openUrl('xiaomi')" href="javascript:void(0)"></a>
                    <a href="javascript:void(0)" onclick="openUrl('alipay')" class="zhifubao"></a><a class="qq" href="javascript:void(0)" onclick="openUrl('qq')"></a><a class="qihu360" href="javascript:void(0)" onclick="openUrl('qihoo360')"></a><a class="weibo" href="javascript:void(0)" onclick="openUrl('sinaweibo')"></a>

                </p><div class="clear">
                </div>
                <div class="blank10">
                </div>
                <p></p>
            </div>
            <!--tishi-->
        </div>
        <!--user_infor-->
        <div class="user_infor" style="display: none">
            <div id="vjiaLoginError" class="tips">
                用户名或者密码错误!
            </div>
            <p>
                <label>
                    用户名：</label><input id="PartnerUserName" name="PartnerUserName" value="15733265750" class="inputtextcolor" type="text">
            </p>
            <div id="vjiaUserNameError" class="tips">
                用户名不能为空!
            </div>
            <p>
                <label>
                    密 码：</label><input id="PartnerPassword" name="PartnerPassword" class="inputtextcolor" value="" type="password">
            </p>
            <div id="vjiaPasswordError" class="tips">
                密码不能为空!
            </div>
            <p id="pVjiaValidate" style="display:none">
                <label>
                    验证码：</label><input maxlength="6" style="width: 65px;" id="vjiacalculatevalidate" name="vjiacalcultatevalidate" class="inputtextcolor" type="text">
                <img id="img_vjiaValidate" oldsrc="/Controls/CalculateValidateCode.ashx?key=VjiaLogin" src="" style="vertical-align: middle; width: 145px; height: 53px; cursor: pointer;"><a style="cursor: pointer;
                            float: right; line-height: 18px;" href="javascript:void(0)">看不清?换一张</a>
            </p>
            <div id="vjiaValidateError" style="display: none" class="tips">
                验证码不能为空!
            </div>

            <div class="bt">
                <a id="vjiaLogin" class="log" href="#">登 录</a> <a class="forget" href="http://www.vjia.com/Login/GetPwdStep1.aspx">
                    忘记密码啦？</a>
            </div>
            <div class="tishi">
                <span>提示：</span>使用V+账户登录后系统会自动为您注册一个与V+帐户相关联的VANCL帐户。帐户关联后您可共享V+的会员积分和累积消费金额。
            </div>
        </div>
    </div>
    <div class="advert">
        <img src="{{asset('homecss/login/img/login120412_newlogo_002.jpg')}}" id="_advertImage" style="width: 465px; display: none">
        <img src="{{asset('homecss/login/img/login120412_newlogo.jpg')}}" style="width: 465px">
    </div>
    <!--shows-->
    <div style="clear: both;">
    </div>
</div>
<center>

    <div id="bottom" align="center">
        <div id="bottoms">
            <p class="bZp3">Copyright 2007 - 2016 vancl.com All Rights Reserved 京ICP证100557号 京公网安备11010102000579号 出版物经营许可证新出发京批字第直110138号</p>
            <div id="footerArea">
               <!--  <div class="subFooter">
                    <a rel="nofollow" href="https://search.szfw.org/cert/l/CX20111229001302001330" class="redLogo" target="_blank"></a><span class="costumeOrg"></span>
                    <a rel="nofollow" href="http://www.315online.com.cn/member/315090053.html" class="wsjyBzzx" target="_blank"></a>
                    <a rel="nofollow" href="{{asset('homecss/login/img/11')}}" class="vanclMsg" target="_blank"></a>
                </div> -->
            </div>
        </div>
    </div>
</center>
<!--Bottom End-->
<script type="text/javascript">
    function openUrl(type) {
        var curUrl = document.URL.toLowerCase();
        if (curUrl.indexOf('https://') != -1) {
            openwindow("https://api-login.vancl.com/redirect/" + type + "?callbackurl=https://login.vancl.com/login/ReceiveCallback.aspx", "siteWin", "950", "850");
        }
        else {
            openwindow("http://api-login.vancl.com/redirect/" + type + "?callbackurl=http://login.vancl.com/login/ReceiveCallback.aspx", "siteWin", "950", "850");
        }
    }
    function openwindow(url, name, iWidth, iHeight) {
        var url; //转向网页的地址;
        var name; //网页名称，可为空;
        var iWidth; //弹出窗口的宽度;
        var iHeight; //弹出窗口的高度;
        var iTop = (window.screen.availHeight - 30 - iHeight) / 2; //获得窗口的垂直位置;
        var iLeft = (window.screen.availWidth - 10 - iWidth) / 2; //获得窗口的水平位置;
        window.open(url, name, 'height=' + iHeight + ',innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',z-look=yes,toolbar=no, menubar=no, scrollbars=no, resizable=no ,alwaysRaised=yes, location=no, status=no');
    }

</script>
<script type="text/javascript">
    /*函数在这里*/
    function scroll(a, b, c, d, e) {
        var EACH = function (o, fn) { for (var i = 0; i < o.length; i++) { fn.call(o[i], i, o) } }
        var GF = function (o, t) { var s = o.getElementsByTagName(t), R = []; EACH(s, function (i, v) { s[i].parentNode == o && R.push(s[i]); }); return R; }
        var G = function (x, y) { return GF(document.getElementById(x), y); }
        var T = G(a, b), S = G(c, d); _show(0);
        EACH(T, function (i, o) { T[i].onclick = (function (n) { return function () { _show(n); } })(i); });
        function _show(n) { EACH(T, function (i, o) { S[i].style.display = "none"; T[i].className = "" }); T[n].className = e; S[n].style.display = "block"; }
    }
    /*用法在这里*/
    /*绑定id为tags里的li为标签, id为shows里的div为展示层, hov为标签选中时的样式*/
    scroll("tags", "li", "shows", "div", "on");


    function hoverinput(id) {
        var jqobj = $("#" + id);
        //            $(jqobj).hover(function () {
        //                var _value = $(this).find("input").val();
        //                $(this).find("input").focus();
        //                if (_value == "") {
        //                    $(this).find("label").css({ "z-index": "8" });
        //                    $(this).find("input").removeClass("hoverinput").addClass("hoverinput");
        //                }
        //            }, function () {
        //                var _value = $(this).find("input").val();
        //                if (_value != "") {
        //                    $(this).find("input").removeClass("hoverinput");
        //                } else {
        //                    $(this).find("label").css({ "z-index": "10" });
        //                }
        //                $(this).find("input").blur();
        //            });

        setTimeout(function () {
            if ($(jqobj).find("input").val() != "") {
                $(jqobj).find("label").css({ "z-index": "8" });
                $(jqobj).find("input").removeClass("hoverinput");
            }
        }, 1000);


        $(jqobj).bind("click", function () {
            var _value = $(this).find("input").val();
            $(this).find("input").focus();
            if (_value == "") {
                $(this).find("label").css({ "z-index": "8" });
                $(this).find("input").removeClass("hoverinput").addClass("hoverinput");
            }
        });

        $(jqobj).find("input").focus(function () {
            var _value = $(this).val();
            if (_value == "") {
                $(this).parent().find("label").css({ "z-index": "8" });
                $(this).parent().find("input").removeClass("hoverinput").addClass("hoverinput");
            }
        });

        $(jqobj).find("input").blur(function () {
            var _value = $(this).val();
            if (_value != "") {
                $(this).removeClass("hoverinput");
            } else {
                $(this).parent().find("label").css({ "z-index": "10" });
            }
            //$(this).blur();
        });

        $(jqobj).find("input").keyup(function () {
            var _value = $(this).val();
            if (_value != "") {
                $(this).removeClass("hoverinput");
            }
        });

        $(jqobj).find("input").keydown(function () {
            var _value = $(this).val();
            if (_value != "") {
                $(this).removeClass("hoverinput");
            }
        });

        setTimeout(function () {
            $("input").blur();
        }, '500');
    }


    $(document).ready(function () {
        hoverinput("_uname", "Email/手机号");
        hoverinput("_upwd");
        hoverinput("pValidate");
        hoverinput("_quickmobile");
        hoverinput("_quickmobilecode");
        hoverinput("_quickcode");

        //            setTimeout(function () {
        //                $("input").blur();
        //            },'500');

    });

    //        window.onload = function () {
    //            $("input").blur();
    //        }

</script>

<script src="{{asset('homecss/login/js/quicklogin.js')}}"></script>


</body>
</html>