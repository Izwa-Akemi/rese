<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header>
        @include('layouts.header_home')
    </header>
    <main>
        <section class="main-section" id="main-section">
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

                            <div><button onclick="location.href='{{route('detail',$item->id)}}'">詳しく見る</button></div>
                            <div class="favor">
                                @if ($favorites[$loop->iteration]==1)
                                <a href="{{route('fav_off',$item->id)}}"><img src="{{asset('img/fav1.png')}}" alt="お気に入り削除"></a>
                                @else
                                <a href="{{route('fav_on',$item->id)}}"><img src="{{asset('img/fav2.png')}}" alt="お気に入り追加"></a>
                                @endif
                                <span>{{$fav_counts[$loop->iteration]}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </section>
    </main>
    <script src="{{ mix('js/search.js') }}"></script>
</body>

</html>