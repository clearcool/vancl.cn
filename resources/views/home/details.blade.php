<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script type="text/javascript" src="/home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/home/js/jquery.fly.min.js"></script>
    <!--[if lte IE 9]-->
    <script src="/home/js/requestAnimationFrame.js"></script>
    <link href="/home/img/favicon.ico" rel="icon">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/docs.min.css" rel="stylesheet">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>飞翔购物车</title>
    <style>
        .m-sidebar{position: fixed;top: 0;right: 0;background: #000;z-index: 2000;width: 35px;height: 100%;font-size: 12px;color: #fff;}
        .cart{color: #fff;text-align:center;line-height: 20px;padding: 200px 0 0 0px;}
        .cart span{display:block;width:20px;margin:0 auto;}
        .cart i{width:35px;height:35px;display:block; background:url(car.png) no-repeat;}
        .u-flyer{display: block;width: 50px;height: 50px;border-radius: 50px;position: fixed;z-index: 9999;}
    </style>
    <script>
        $(function() {
            var offset = $("#end").offset();
            $(".addcar").click(function (event) {
                var addcar = $(this);
                var img = addcar.parent().parent().parent().find('img').attr('src');
                var flyer = $('<img class="u-flyer" src="' + img + '">');
                flyer.fly({
                    start: {
                        left: event.pageX,
                        top: event.pageY
                    },
                    end: {
                        left: offset.left + 10,
                        top: offset.top + 10,
                        width: 0,
                        height: 0

                    },
                    onEnd: function () {
                        $("#msg").show().animate({width: '250px'}, 200).fadeOut(1000);
//                        addcar.css("cursor","default").removeClass('orange').unbind('click');
                        this.destory();
                    }
                });

            });
        });
    </script>
    </head>
    <body>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/home/img/04.jpg" alt="...">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>...</p>
                                <p><a href="#" class="btn btn-primary">直接购买</a>
                                    <a href="#" class="btn btn-danger addcar">加入购物车</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-sidebar">
                <div class="cart">
                    <i id="end"></i>
                    <span>购物车</span>
                </div>
            </div>
    </body>
    </html>