@extends('home.layout.person')

@section('nr')
    <div class="user-address">
        <!--标题 -->
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
        </div>
        <hr/>

        <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
            @foreach($value as $k => $v)
                @if($v->default == 1)
                    <li class="user-addresslist defaultAddr">
                @else
                    <li class="user-addresslist">
                @endif
                        <span class="new-option-r"><div id="id" style="display: none;">{{ $v->add_id }}</div><i class="am-icon-check-circle"></i>设为默认</span>
                        <p class="new-tit new-p-re">
                            <span class="new-txt">{{ $v->addressname }}</span>
                            <span class="new-txt-rd2">{{ $v->phone }}</span>
                        </p>
                        <div class="new-mu_l2a new-p-re">
                            <p class="new-mu_l2cw">
                                <span class="title">地址：</span>
                                <span class="province">{{ $v->address }}</span>
                                <span class="province">{{ $v->add_detail }}</span>
                        </div>
                        <div class="new-addr-btn">
                            <a href="javascript:void(0);" onclick="address_del(this, {{ $v->add_id }});"><i class="am-icon-trash"></i>删除</a>
                        </div>
                    </li>
            @endforeach
        </ul>
        <div class="clear"></div>
        <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
        <!--例子-->
        <div class="am-modal am-modal-no-btn" id="doc-modal-1">

            <div class="add-dress">

                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
                </div>
                <hr/>

                <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                    <form class="am-form am-form-horizontal" method="post" action="/person/addressadd">

                        <div class="am-form-group">
                            <label for="user-name" class="am-form-label">收货人</label>
                            <div class="am-form-content">
                                <input type="text" id="user-name" placeholder="收货人" name="addressname">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-form-label">手机号码</label>
                            <div class="am-form-content">
                                <input id="user-phone" placeholder="手机号必填" type="text" name="phone">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-address" class="am-form-label">所在地</label>
                            <div class="am-form-content address" style="position: absolute;width: 500px;">
                                <select id="s_province" name="s_province"></select>  

                                <select id="s_city" name="s_city" ></select>  

                                <select id="s_county" name="s_county" style="margin-top: -15px;"></select>

                                <script class="resources library" src="/homecss/person/js/area.js" type="text/javascript"></script>

                                <script type="text/javascript">_init_area();</script>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-intro" class="am-form-label">详细地址</label>
                            <div class="am-form-content">
                                <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="centent"></textarea>
                                <small>100字以内写出你的详细地址...</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
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
                                <button>保存</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </form>
                </div>

            </div>

        </div>

        <script type="text/javascript">
            setTimeout(function () {
            $('.ts').remove();
            }, 2000);

            //地址删除
            $(document).ready(function() {
                //设置默认
                $(".new-option-r").click(function() {
                    var id = $(this).children('#id').html();
                    var a = this;
                    $.ajax({
                        type: 'GET',
                        url: '/person/ajaxaddress',
                        data: { id : id },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                        },
                        success: function (data) {
                            if (data == 1) {
                                $(a).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                            } else {

                            }
                        },
                    });
                });

                var $ww = $(window).width();
                if($ww>640) {
                    $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
                }
            });
            function address_del(obj, id) {
                $.ajax({
                type: 'POST',
                url: '/person/ajaxaddressdel',
                data: { id : id},
                dataType: 'json',
                headers: {
                'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
            },
                success: function (data) {
                        if (data == 1) {
                            $(obj).parents("li").remove();
                            layer.msg('删除成功!', {icon: 6, time: 1500});
                        } else if (data == 0){
                            layer.msg('删除失败!', {icon: 5, time: 1500});
                        }
                    },
                error: function (data) {
                        console.log(data.msg);
                    },
            });
            }


            var Gid  = document.getElementById ;
            var showArea = function(){

                Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +

                Gid('s_city').value + " - 县/区" +

                Gid('s_county').value + "</h3>"

            }

            Gid('s_county').setAttribute('onchange','showArea()');
        </script>
    </div>

    <div class="clear"></div>
@endsection