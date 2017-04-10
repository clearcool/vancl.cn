<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/homecss/zhuye/img/favicon.ico" rel="icon">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">
    <script type="text/javascript" src="/bootstrap/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <title>支付页面</title>
    <style type="text/css">
        *{
            margin:0px;
            padding:0px;
            list-style:none;
         }
        a:hover
        {
            color:red;
        }
        body{background:#EFf0f1;}
        #top
        {
            background:#FFFFFF;
            height:50px;
            width:100%;
            border-bottom:2px solid #D7D8D8;
        }
        #top_center
        {
            width:900px;
            height:100%;
            margin:0px auto;
        }
        #top_left
        {
            font-size:16px;
            line-height:50px;
            font-family:"微软雅黑";
        }
        #zimg
        {
            margin-top:-10px;
            height:50px;
        }
        #top_left span
        {
            font-size:18px;
        }

        #box
        {
            margin:0 auto;
            width:900px;
            height:800px;
            background:#FFFFFF;
        }
        #box_top
        {
            height:120px;
            background:#EFf0f1;
            border-bottom:3px solid #B3B3B3;
            line-height:60px;

        }
        #box_top #box_top_left
        {
            float:left;
            line-height:30px;
            padding-top:20px;
        }
        #box_top #box_top_right
        {
            line-height:120px;
            float:right;
            margin-right:20px;
        }
        #box_top_right span
        {
            color: #ff8208;
            font-size: 22px;
            font-weight: 700;
        }
        #erweima
        {
            float:left;
            margin-top:3px;
            height:110px;
        }
        #box_center
        {
            width:100%;
            height:380px;
            border-bottom:3px solid #B3B3B3;
        }
        #fangshi
        {
            width:90%;
            margin:20px auto;
        }
        .toli
        {
            width:100%;
            height:60px;
            line-height:60px;
            padding-left:30px;
            border:4px solid white;
        }
        .daixuan:hover
        {
            border:4px solid #CAD6EF;
        }
        #qianlogo
        {
            margin-top:-3px;
            margin-left:5px;
        }
        #zhifubaologo
        {
            width:15px;
            margin-left:7px;
            margin-top:-5px;
            margin-right:10px;
        }
        .morenkuang
        {
            border:4px solid #85A1D4;
        }
        #tishi
        {
            width:200px;
            height:40px;
            line-height:40px;
            display:none;
            border-radius: 10px;
            position:fixed;
            text-align:center;
            left:50%;
            top:50%;
            z-index:99;
        }
        #zhifu
        {
            padding-top:10px;
            height:200px;
            width:300px;
            margin-left:30px;
            margin-top:10px;
        }
        #zhifu span
        {
            font-size:16px;
        }
    </style>
</head>
<body>
    <div id="top">
        <div id="top_center">
            <div id="top_left">
                <img id="zimg" src="/homecss/pay/img/zhifu.jpg" alt=""> <span>Vancl</span>  | 我的收银台
            </div>
        </div>

    </div>
<div id="box">
    <div id="box_top">
        <img id="erweima" src="/homecss/pay/img/erweima.png" alt="">
        <div id="box_top_left">
            @if(isset($sn))
                <span>&nbsp;合并 | {{$sn}} 件商品</span>
            @else
            <span> &nbsp; {{$shop->describe}}&nbsp; {{$shop->color}} &nbsp; {{$shop->size}}</span><br/>
            <a href=""><span>&nbsp;&nbsp;{{$shop->sname}}</span></a>
                @endif
        </div>
        <div  id="box_top_right">
            <span id="pp">{{$price}}</span> 元
        </div>
    </div>
    <div id="box_center">
        <div id="fangshi">
            <ul>
                <li class="toli morenkuang">
                    <input type="radio" checked="checked" name="">
                    <img id="qianlogo" src="/homecss/pay/img/qian.png" alt="">
                    凡客余额 <span id="ye"> {{$balance->money}} </span>元
                </li>
                <li class="toli daixuan">
                    <input type="radio"  name="">
                    <img id="zhifubaologo" src="/homecss/pay/img/zhifubaologo.jpg" alt="">
                    <span>支付宝</span>
                </li>
            </ul>
        </div>
        <div id="tishi"></div>
        <div id="zhifu">
            <form action="/pay/buy" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="">凡客支付密码:</label>
                        <input name="pass" type="password" style="width:200px;"class="form-control" id="inputpass" placeholder="请输入支付密码"><a href="">忘记密码</a>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input name="o_id" type="hidden" value="{{$o_id}}">
                        {{ csrf_field() }}
                        <button id="btn" type="submit" class="btn btn-primary">确认付款</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $('.toli').click(function(){
        $(this).siblings().removeClass('morenkuang').addClass('daixuan').children('input').attr('checked',false);
        $(this).removeClass('daixuan').addClass('morenkuang').children('input').prop('checked',true);
    })
    $('#btn').click(function(){
        var aaa=true;
        var y=parseFloat($('#ye').html());
        var p=parseFloat($('#pp').html());
            if(y<p){
                $('#tishi').addClass('alert-danger').html('余额不足').show().fadeOut(3000);
                return false;
            }
            var pass=$('#inputpass').val();
        $.ajax({
            url: '/pay/pass',
            type: 'get',
            async: false,
            data: {pass:pass},
            success: function(data){
                if(data==1){
                    aaa = true;
                }else{
                    $('#tishi').addClass('alert-danger').html('密码错误').show().fadeOut(3000);
                    aaa = false;
                }
            }
        });
        if(aaa){
                return true;
        }else{
            return false;
        }
    })
</script>
</html>