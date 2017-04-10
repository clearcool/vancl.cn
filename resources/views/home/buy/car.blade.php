@extends('home.layout/index')
@section('style')
    <link rel="stylesheet" href="/homecss/pay/css/gwc.css">
    <style>
        #box
        {
            width:1100px;
            min-height:800px;
            margin:0px auto;
        }
        #anniu{text-decoration:blink;}
        #anniu
        {
            color:white;
            background:red;
        }
    </style>
    @endsection
@section('qwer')
    @endsection
@section('lb')
    <div id="box" class="gwc">
        <table cellpadding="0" cellspacing="0" class="gwc_tb1">
            <tbody>
            <tr>
                <td class="tb1_td1"><input id="Checkbox1" type="checkbox" class="allselect" /></td>
                <td class="tb1_td1">全选</td>
                <td class="tb1_td3">商品</td>
                <td class="tb1_td4">商品信息</td>
                <td class="tb1_td6">单价</td>
                <td class="tb1_td5">数量</td>
                <td class="tb1_td6">金额</td>
                <td class="tb1_td7">操作</td>
            </tr>
            </tbody>
        </table>
        @foreach($cargoods as $k=>$v)
        <table cellpadding="0" cellspacing="0" class="gwc_tb2">
            <tbody>
            <tr>
                <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-1" /></td>
                <td class="tb2_td2"><a href="/home/details?id={{$v->s_id}}"><img style="width:100px;height:100px;" src="{{$v->picurl}}" /></a></td>
                <td class="tb2_td3"><a href="/home/details?id={{$v->s_id}}">{{$v->shopname}}</a></td>
                <td class="tb1_td4">{{$v->describe}}&nbsp;{{$v->size}}&nbsp;{{$v->color}}</td>
                <td class="tb1_td6"><label class="dan" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">{{$v->price}}</label></td>
                <td class="tb1_td5">
                    <input class="jian" name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" />
                    <input id="text_box1" name="" ss_id="{{$v->ss_id}}" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
                    <input class="jia" name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="+" /> </td>
                <td class="tb1_td6"><label class="zong" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">{{$v->price}}</label></td>
                <td class="tb1_td7"><a href="#">删除</a></td>
            </tr>
            </tbody>
        </table>
        @endforeach
        <table cellpadding="0" cellspacing="0" class="gwc_tb3">
            <tbody>
            <tr>
                <td class="tb1_td1">&nbsp;</td>
                <td class="tb1_td1">&nbsp;</td>
                <td class="tb3_td1">&nbsp;</td>
                <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
                <td class="tb3_td3">合计(不含运费):<span>￥</span><span style=" color:#ff5500;"><label id="zong1" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></span></td>
                    <td class="tb3_td4"><a href="/pay/carbuy"><button type="button" disabled id="anniu"  class="btn btn-link">结算</button></a></td>
            </tr>
            </tbody>
        </table>
    </div>
    @endsection
@section('dd')
    @endsection
@section('dddh')
    @endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            // 全选
            $(".allselect").click(function () {

                if($(this).attr("checked")){
                    $(".gwc_tb2 input[name=newslist]").each(function () {
                        $(this).attr("checked", true);
                        // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
                    });
                    GetCount();
                }
                else
                {
                    $(".gwc_tb2 input[name=newslist]").each(function () {
                        if ($(this).attr("checked")) {
                            $(this).attr("checked", false);
                            //$(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
                        } else {
                            $(this).attr("checked", true);
                            //$(this).next().css({ "background-color": "#3366cc", "color": "#000000" });
                        }
                    });
                    GetCount();
                }
            });

            //反选
            $("#invert").click(function () {
                $(".gwc_tb2 input[name=newslist]").each(function () {
                    if ($(this).attr("checked")) {
                        $(this).attr("checked", false);
                        //$(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
                    } else {
                        $(this).attr("checked", true);
                        //$(this).next().css({ "background-color": "#3366cc", "color": "#000000" });
                    }
                });
                GetCount();
            });

            //取消
            $("#cancel").click(function () {
                $(".gwc_tb2 input[name=newslist]").each(function () {
                    $(this).attr("checked", false);
                });
                GetCount();
            });

            // 所有复选(:checkbox)框点击事件
            $(".gwc_tb2 input[name=newslist]").click(function () {
                if ($(this).attr("checked")) {
                    //$(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
                } else {
                    // $(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
                }
            });

            // 输出
            $(".gwc_tb2 input[name=newslist]").click(function () {
                // $("#total2").html() = GetCount($(this));
                GetCount();
            });
        });
        //******************
        function GetCount() {
            var conts = 0;
            var aa = 0;
            $(".gwc_tb2 input[name=newslist]").each(function () {
                if ($(this).attr("checked")) {
                    for (var i = 0; i < $(this).length; i++) {
                        conts += parseFloat($(this).parents('tr').children('td:eq(6)').children('label').html());
                        aa += 1;
                    }
                }
                if(aa==0)
                {
                    $('#anniu').attr({'disabled':'disabled'});
                }else{
                    $('#anniu').removeAttr('disabled');
                }
            });
            // alert(conts);
            $("#shuliang").text(aa);
            $("#zong1").html((conts).toFixed(2));

        }

        //商品增加
        $('.jia').click(function(){
            $num=parseInt($(this).prev().val());
            $(this).prev().val($num+1)
            $p=parseFloat($(this).parent().prev().children('label').html());
            $(this).parent().next().children('label').html(($p*($num+1)).toFixed(2));
        })
        //商品减少
        $('.jian').click(function(){
            $num=parseInt($(this).next().val());
            if($num<=1){
                $(this).next().val(1);
                $p=parseFloat($(this).parent().prev().children('label').html());
                $(this).parent().next().children('label').html($p);
            }else{
                $(this).next().val($num-1);
                $p=parseFloat($(this).parent().prev().children('label').html());
                $(this).parent().next().children('label').html(($p*($num-1)).toFixed(2));
            }
        })
        //提交
        $('#anniu').click(function(){
            var car =[];
            $("input[name='newslist']:checked").each(function () {
               var n=$(this).parents('tr').children('td:eq(5)').children('input:eq(1)').val();
               var id=$(this).parents('tr').children('td:eq(5)').children('input:eq(1)').attr('ss_id');
               car.push([id,n]);
            })
            //发送ajax将car存入session
            $.ajax({
                type: 'get',
                url: '/pay/cuncar',
                data: {'car':car},
                async: false
            });
        })
    </script>
    @endsection