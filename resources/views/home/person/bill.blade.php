@extends('home.layout.person')


@section('nr')

<div id="tishi"></div>
<div class="user-bill">
<!--标题 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">资产</strong> / <small>Electronic&nbsp;bill</small></div>
</div>
<hr/>

<div class="ebill-section">
    

<div class="module-income ng-scope">
<div class="income-slider ">
    <div class="block-income block  fn-left">
        

        <div ng-class="shoppingChart" class="catatory-details  fn-hide shopping">
            <div class="catatory-chart fn-left fn-hide">
                  <center>
    
  <div class="form-group"><br><br>
                          
    <label for="exampleInputEmail1">充值</label><br>
    <input type="text" class="form-control" id="newassets"  style="width:240px;">
  </div>
  <button type="submit" class="btn btn-default" id="moneyq" value="">充值</button>

</center>

            </div>
            
        </div>

    </div>
  <div class="form-group" id="assets" style="font-size:20px;"><br><br>
    
    余额:<div for="exampleInputEmail1" class="money">{{$Assets}}</div><br>
    </div>
</div>

<!--消费走势-->
<div class="module-consumeTrend inner-module">
    
</div>




            </div>

        </div>

    </div>
@endsection
@section('js')
    <script>
$('#moneyq').click(function(){

    var newassets =$('#newassets').val();
   $.ajax({
        url:'/person/assets',
        data:{newassets:newassets,'_token':'{{ csrf_token() }}'},
        type:'post',
        success:function(data){
            if(data != 1 ){
            $('#assets').find('.money').html(data);
          $('#tishi').addClass('alert-success').html('充值成功！').show().fadeOut(3000);
                
            }else{
            $('#tishi').addClass('alert-danger').html('您充值的值不正确').show().fadeOut(3000);

            }
        },
        async:false
    })
})
    </script>
@endsection