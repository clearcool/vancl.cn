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
    <title>付款成功</title>
    <style type="text/css">
        #box
        {
            width:300px;
            height:200px;
            float:left;
            margin-top:100px;
            margin-left:200px;
        }
        #img
        {
            width:25px;
        }
        #center
        {
            padding-left:40px;
        }
        #center_top
        {
            font-size:18px;
            margin-top:10px;
        }
        #center_top span
        {
            color:red;
            font-size:14px;
        }
        #address
        {
            width:400px;
            height:150px;
            border:1px solid red;
            margin-left:37px;
            padding-left:10px;
            line-height:45px;
        }
        #foot
        {
            width:400px;
            margin-left:37px;
            margin-top:15px;
            line-height:30px;
        }
        a{
            list-style:none;
            color:red;
        }
    </style>
<body>
    <div id="box">
            <div id="top">
                <img id="img" src="/homecss/pay/img/success.png" alt="">
                <span>你已经付款成功</span>
            </div>
            <div id="center">
                <div id="center_top">付款金额 &nbsp;  <span> &yen;{{$order->totalprice}}</span></div>
            </div>
            <div id="address">
                <span>收货人 : {{$order->addressname}}</span><br/>
                <span>联系电话 : {{$order->phone}}</span><br/>
                <span>收货地址 : {{$order->address[0]}}&nbsp; {{$order->address[1]}}&nbsp; {{$order->address[2]}}&nbsp;
                @if($order->add_detail)
                    {{$order->add_detail}}
                    @else
                    @endif
                </span>
            </div>
            <div id="foot">
                <span>请认真核对您的收货信息，如有错误请联系客服</span><br/>
                <span>你还可以&nbsp;&nbsp; 查看<a href="/person/order">&nbsp;已买到的宝贝</a>
            </div>
        </div>
</body>
</html>
