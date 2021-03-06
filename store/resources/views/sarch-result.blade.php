@foreach ($items as $item)
<div class="shop-list">
    <div class="shop-wrap">
        <div class="shop-img">
            <img src="/storage/shops/{{$item->filename}}" alt="">
        </div>
        <div class="shop-detail">
            <h1>{{$item->name}}</h1>
            <p>#<span>{{$item->area->name}}</span>#<span>{{$item->genre->name}}</span></p>
            <div class="star">
            @if($avg[$loop->iteration]==5)
                            <p><span class="star5_rating" data-rate="5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 4.5 && $avg[$loop->iteration] <= 4.9)
                            <p><span class="star5_rating" data-rate="4.5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 4.0 && $avg[$loop->iteration] <= 4.4)
                            <p><span class="star5_rating" data-rate="4"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 3.5 && $avg[$loop->iteration] <= 3.9)
                            <p><span class="star5_rating" data-rate="3.5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 3.0 && $avg[$loop->iteration] <= 3.4)
                            <p><span class="star5_rating" data-rate="3"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 2.5 && $avg[$loop->iteration] <= 2.9)
                            <p><span class="star5_rating" data-rate="2.5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 2.0 && $avg[$loop->iteration] <= 2.4)
                            <p><span class="star5_rating" data-rate="2"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 1.5 && $avg[$loop->iteration] <= 1.9)
                            <p><span class="star5_rating" data-rate="1.5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 1.0 && $avg[$loop->iteration] <= 1.4)
                            <p><span class="star5_rating" data-rate="1"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @elseif($avg[$loop->iteration] >= 0.5 && $avg[$loop->iteration] <= 0.9)
                            <p><span class="star5_rating" data-rate="0.5"></span> {{ round($avg[$loop->iteration],3) }}</p>
                            @else
                            <p><span class="star5_rating" data-rate="0"></span> 0</p>
                            @endif
                </div>
            <div class="shop-button">
                <div><button onclick="location.href='{{route('detail',$item->id)}}'">???????????????</button></div>
                <div class="favor">
                    @if ($favorites[$loop->iteration]==1)
                    <a href="{{route('fav_off',$item->id)}}"><img src="{{asset('img/fav1.png')}}" alt="?????????????????????"></a>
                    @else
                    <a href="{{route('fav_on',$item->id)}}"><img src="{{asset('img/fav2.png')}}" alt="?????????????????????"></a>
                    @endif
                    <span>{{$fav_counts[$loop->iteration]}}</span>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endforeach