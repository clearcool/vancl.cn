@extends('home.layout.Index')

@section('qwer')
    <center>
        <div style="height: 100px;">
            <h1 style="margin: 50px 50px;font-size: 50px;color: red;">商家注册</h1>
        </div>
@endsection

@section('lb')
        <form action="{{url('/shop/register')}}" method="post">
                {{--防跨站攻击--}}
                {{ csrf_field() }}
                <label for="">店铺名:<br></label><input type="text" id="input6"  name="shopname" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="店铺名" value="">
                <label for="">姓名: <br></label><input type="text" id="input7" name="name" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="姓名">
                <label for="">身份证: <br></label><input type="text" name="idcard" id="input10" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="身份证">
                <label for="">手机号: <br></label><input type="text" name="phone" id="input8" style="width:400px;height:40px;margin-bottom: 20px;" class="form-control" placeholder="手机号">
                <label for="">地址: <br></label><div class="am-form-content address" style="width: 500px;margin-bottom: 20px">
                    <select id="s_province" name="s_province"></select>  
                    <select id="s_city" name="s_city" ></select>  
                    <select id="s_county" name="s_county" style="margin-top: -15px;"></select>
                    <script class="resources library" src="/homecss/person/js/area.js" type="text/javascript"></script>
                    <script type="text/javascript">_init_area();</script>
                </div>
                <div id="tjbox">
                    <button id="anniu" type="submit" class="btn btn-danger btn2">立即注册</button>
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
                </div>
        </form>
@endsection

@section('dd')
    </center>
    <script type="text/javascript">
        setTimeout(function () {
            $('.ts').remove();
        }, 2000);
    </script>
@endsection