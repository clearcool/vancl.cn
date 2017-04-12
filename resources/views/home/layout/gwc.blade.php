 @if($cart)
        @foreach($cart as $k=>$v)
        <li>
            <div class="gwcli">
               <div class="gwcone">
                   <a href="/home/details?id={{$v->s_id}}"><img class="gwcpic" src="{{$v->picurl}}" alt=""></a>
               </div>
                <div class="gwctwo">
                    <a href=""><span>{{$v->describe}}</span></a>
                    <span>&nbsp;&yen;</span><span class="gwcqian">{{$v->price}}</span><br/>
                    <span>尺码:{{$v->size}}&nbsp; 颜色:{{$v->color}}</span>
                    <a href="" id="{{$v->sc_id}}" class="gwcdel">删除</a>
                </div>
            </div>
        </li>
        @endforeach
       @if($num=2)
           <li>......</li>
           @endif
    @else
        <span>你的购物车里没有任何宝贝</span>
        @endif
